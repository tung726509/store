<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Image;
use Carbon\Carbon;
use Response;
use File;
use Illuminate\Support\Facades\Storage;

use App\Product;
use App\ProductDescription;
use App\ProductImage;
use App\Category;
use App\Tag;

class ProductController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->_m = new Product();
        $this->pd_m = new ProductDescription();
        $this->pi_m = new ProductImage();
        $this->category_m = new Category();
        $this->tag_m = new Tag();
    }

    function random($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    public function index()
    {
        $per_page = request()->query('per', 10);
        $sale = request()->query('sale', '');
        $search = request()->query('s', '');
        $param = [];

        $query = $this->_m->with(['wh_items', 'category']);

        if ($sale != null && $sale != "") {
            if ($sale == "sale") {
                $param['sale'] = $sale;
            } elseif ($sale == "not_sale") {
                $param['sale'] = $sale;
            }
        }

        if ($search != null && $search != "") {
            $param['sku'] = $search;
        }

        $query = $query->filter($param);

        $products = $query->paginate($per_page);

    	$now = strtotime(Carbon::now());
        // dd($products);

        return view('admin.product.index', compact('products', 'now', 'per_page', 'sale', 'search'));
    }

    public function detail()
    {
    }

    public function getAdd()
    {
        $categories = $this->category_m->get();

        return view('admin.product.add', compact('categories'));
    }

    public function add(Request $request)
    {
		$rules = [
            'pretty_name' => ['required','string','min:1','max:100'],
            'category_id' => ['required','integer','exists:categories,id'],
        ];

        $messages = [
            'pretty_name.required' => 'Vui lòng nhập tên sản phẩm',
            'pretty_name.string' => 'Chỉ nhập chuỗi',
            'pretty_name.min' => 'Tối thiểu 1 kí tự',
            'pretty_name.max' => 'Tối đa 100 kí tự',
            'buy_into.integer' => 'Phải là số nguyên',
            'buy_into.min' => 'Tối thiểu 500',
            // 'price.required' => 'Vui lòng nhập giá bán',
            // 'price.integer' => 'Phải là số nguyên',
            // 'price.min' => 'Tối thiểu 500',
            'category_id.required' => 'Vui lòng chọn danh mục',
            'category_id.integer' => 'Phải là số nguyên',
            'category_id.exists' => 'Danh mục không tồn tại',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
            $code = $this->random(10);
            $data = [
                'code' => $code,
                'sku' => $this->createSlugString($request->input('pretty_name')),
                'pretty_name' => $request->input('pretty_name'),
                'buy_into' => $request->input('buy_into'),
                'price' => $request->input('price'),
                'category_id' => $request->input('category_id'),
                'created_at' => Carbon::now(),
                'created_by' => Auth::user()->id,
            ];

            $created = $this->_m->create($data);

            if($created){
                return back()->with('success','Thêm mới thành công !');
            }else{
                return back()->withInput()->with('fail','Lỗi hệ thống , vui lòng thử lại sau !');
            }
        }
    }

    public function getEdit($id)
    {
        $product = $this->_m->with(['tags', 'description', 'product_images'])->find($id);

        if (is_null($product)) {
            return view('admin.alertpages.404');
        }

        $tags = $this->tag_m->get();
        $categories = $this->category_m->get();

        $tags_of_product = [];
        if ($product->tags != null) {
            $tags_of_product = $product->tags->pluck('id')->toArray();
        }

        // dd($product);

    	if($product){
    		return view('admin.product.edit',compact('product','tags','categories','tags_of_product'));
    	}
    }

    public function edit(Request $request, $id)
    {
        $rules = [];
        $messages = [];

        if ($request->has('editForm')) {
            $rules = [
                'pretty_name' => ['required','string','min:1','max:80'],
                'category_id' => ['required','integer','exists:categories,id'],
                'tags[]' => ['array'],
            ];

            $messages = [
                'pretty_name.required' => 'Vui lòng nhập tên sản phẩm',
                'pretty_name.string' => 'Chỉ nhập chuỗi',
                'pretty_name.min' => 'Tối thiểu 1 kí tự',
                'pretty_name.max' => 'Tối đa 80 kí tự',
                'buy_into.integer' => 'Phải là số nguyên',
                'buy_into.min' => 'Tối thiểu 500',
                'price.required' => 'Vui lòng nhập giá bán',
                'price.integer' => 'Phải là số nguyên',
                'price.min' => 'Tối thiểu 500',
                'category_id.required' => 'Vui lòng chọn danh mục',
                'category_id.integer' => 'Phải là số nguyên',
                'category_id.exists' => 'Danh mục không tồn tại',
                'tags[].array' => 'wtf, man =))',
            ];
        }

        if($request->has('descriptionForm')){
            $rules = [
                'description' => ['nullable','string'],
            ];

            $messages = [
                'description.string' => 'Chỉ được nhập chuỗi',
            ];
        }

        if ($request->has('imageForm')) {
            $rules = [
                'productimage' => ['required', 'mimes:jpeg,jpg,png,gif', 'max:1024'],
            ];

            $messages = [
                'productimage.required' => 'Vui lòng chọn file ảnh .',
                'productimage.mimes' => 'Chỉ chấp nhận định dạng (jpeg,jpg,png,gif)',
                'productimage.max' => 'Kích thước tối đa là 1MB .',
            ];
        }

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
            $data = [];
            $updated_product = '';
            $form_id = '';

            // tạo mảng data editForm
            if ($request->has('editForm')) {
                $data = [
                    'sku' => $this->createSlugString($request->input('pretty_name')),
                    'pretty_name' => $request->input('pretty_name'),
                    'buy_into' => $request->input('buy_into'),
                    'price' => $request->input('price'),
                    'category_id' => $request->input('category_id'),
                    'created_at' => Carbon::now(),
                    'created_by' => Auth::user()->id,
                ];

                $tags = $request->input('tags');
                $form_id = 'editForm';
            }

            // tạo mảng và update descriptionForm
            if ($request->has('descriptionForm')) {
                $froala_default = '<p data-f-id="pbf" style="text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;">Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a></p>';

                $data = [
                    'description' => $request->input('description') == $froala_default ? null : $request->input('description'),
                ];

                $updated_product = $this->pd_m->updateOrCreate(
                    ['product_id' => $id],
                    $data
                );

                $form_id = 'descriptionForm';
            }

            // update editForm hoặc saleForm
            if($request->has('editForm')){
                $product = $this->_m->find($id);
                $updated_product = $product->update($data);

                // if($request->has('editForm')){
                    $updated_tags = $product->tags()->sync($tags);
                // }
            }

            //gán image cho product
            if ($request->has('imageForm')) {
                if ($request->hasFile('productimage')) {
                    $now = strtotime(Carbon::now());
                    $image = $request->file('productimage');
                    $origin_name = $image->getClientOriginalName();
                    $type = $image->extension();
                    $location = public_path('admini/productImages/');
                    $name = $now . '.' . $type;
                    $move = $image->move($location, $name);

                    $img = Image::make('admini/productImages/' . $name);

                    if (File::exists($location . $name)) {
                        File::delete($location . $name);
                    }

                    $img->resize(600, 600)->save('admini/productImages/' . $name);

                    $data = [
                        'product_id' => $id,
                        'name' => $name,
                        'origin_name' => $origin_name,
                        'created_at' => Carbon::now(),
                        'created_by' => Auth::user()->id,
                    ];

                    $updated_product = $this->pi_m->create($data);

                    $form_id = 'imageForm';
                }
            }

            if ($updated_product) {
                $url = url()->current() . '#' . $form_id;
                return redirect($url)->with('success', 'Cập nhật thành công !');
            } else {
                return back()->withInput()->with('fail', 'Lỗi hệ thống , vui lòng thử lại sau !');
            }
        }
    }

    public function pickStarAjax(Request $request)
    {
        if ($request->ajax()) {
            $star = $request->star;
            $product_id = $request->product_id;
            $updated = $this->_m->where('id', $product_id)->update(['star' => $star]);
            if ($updated) {
                return Response::json(['success' => true]);
            } else {
                return false;
            }
        }

        return false;
    }

    public function deleteImageAjax(Request $request)
    {
        if ($request->ajax()) {
            $product_image = $this->pi_m->where('id', $request->id)->first();
            if (!is_null($product_image)) {
                $name = $product_image->name;
                $location = public_path('admini/productImages/');

                if (File::exists($location . $name)) {
                    File::delete($location . $name);
                }

                $deleted =  $product_image->delete();
                if ($deleted) {
                    return Response::json(['success' => true]);
                }
            }

            return false;
        }

        return false;
    }

    public function uploadImageAjax(Request $request)
    {
        $rules = [
            'file' => ['required', 'file', 'image', 'mimetypes:image/jpeg,image/png,image/gif', 'mimes:jpeg,jpg,png,gif', 'max:5120']
        ];

        $messages = [
            'file.required' => 'Vui lòng chọn ảnh cần upload',
            'file.file' => 'Upload file không thành công',
            'file.image' => 'Chỉ chấp nhận tập tin ảnh',
            'file.mimetypes' => 'Chỉ chấp nhận tập tin ảnh jpg, png, gif',
            'file.mimes' => 'Chỉ chấp nhận tập tin ảnh jpg, png, gif',
            'file.max' => 'Dung lượng file tối đa 5Mb'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return Response::json(['success' => false, 'message' => 'validate fail']);
        } else {
            if ($request->hasFile('file')) {
                $now = strtotime(Carbon::now());
                $image = $request->file('file');
                $origin_name = $image->getClientOriginalName();
                $type = $image->extension();
                $location = public_path('admini/productImages/');
                $name = $now . '.' . $type;
                $move = $image->move($location, $name);

                return Response::json([
                    'link' => asset('admini/productImages/' . $name),
                ]);
            }

            return Response::json(['success' => false, 'message' => 'have not file']);
        }
    }

    public function createSlugString($value) {
        $slug = Str::slug($value);

        return $slug;
    }
}
