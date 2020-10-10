<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Image;
use File;

use App\Category;

class CategoryController extends Controller
{
    public function __construct(){
        $this->_m = new Category;
    }

    public function index(){
        $per_page = request()->query('per', 10);
        $search = request()->query('s','');
        $param = [];

        $query = new Category();

        if($search != null && $search != ""){
            $param['code'] = $search;
        }

        $query = $query->filter($param);

        $categories = $query->paginate($per_page);
    	
    	return view('admin.category.index',compact('categories','per_page','search'));
    }

    public function detail($value='')
    {
    	# code...
    }

    public function getAdd(){
    	return view('admin.category.add');
    }


    public function add(Request $request)
    {
    	$rules = [
            'code' => ['required','alpha_num','min:1','max:30','unique:categories,code'],
            'pretty_name' => ['required','min:1','max:40'],
            'category_image' => ['nullable','mimes:jpeg,jpg,png,gif','max:1024'],
        ];

        $messages = [
            'code.required' => 'Vui lòng nhập mã danh mục',
            'code.alpha_num' => 'Vui lòng chỉ nhập chữ , số , viết liền và không dấu',
            'code.min' => 'Tối thiểu 1 kí tự',
            'code.max' => 'Tối đa 30 kí tự',
            'pretty_name.required' => 'Vui lòng nhập tên danh mục',
            'pretty_name.min' => 'Tối thiểu 1 kí tự',
            'pretty_name.max' => 'Tối đa 30 kí tự',
            'category_image.mimes' => 'Chỉ chấp nhận định dạng (jpeg,jpg,png,gif)',
            'category_image.max' => 'Kích thước tối đa là 1MB .',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }else{
            // dd($request->all());
            $data = null;
        	$code = $request->input('code');
        	$pretty_name = $request->input('pretty_name');

            $data = [
                'code' => $code, 
                'pretty_name' => $pretty_name,
                'created_by' => Auth::user()->id
            ];

            if ($request->hasFile('category_image')){
                $now = strtotime(Carbon::now());
                $image = $request->file('category_image');
                $origin_name = $image->getClientOriginalName();
                $type = $image->extension();
                $location = public_path('homepage/images/');
                $name = $now.'.'.$type;
                $move = $image->move($location,$name);

                $img = Image::make('homepage/images/'.$name);

                if(File::exists($location.$name)){
                    File::delete($location.$name);
                }

                $img->resize(200,200)->save('homepage/images/'.$name);

                $data['image_name'] = $name;

            }

        	$created = $this->_m->create($data);

        	if($created){
    			return back()->with('success', 'Tạo mới thành công');
        	}else{
        		$messages = 'Có gì đó sai sai , không tạo mới được rồi !';
        		return view('admin.alertpages.404',compact('messages'));
        	}
        }
    }

    public function getEdit(Request $request,$id)
    {
        $id = base64_decode($id);
    	$category = $this->_m->where('id',$id)->first();
    	if($category){
    		return view('admin.category.edit',compact('category'));
    	}else{
    		$messages = 'Không tìm thấy gì cả =((';
    		return view('admin.alertpages.404',compact('messages'));
    	}
    }

    public function edit(Request $request,$id)
    {
        $id = base64_decode($id);
    	$rules = [
            'code' => ['required','alpha_num','min:1','max:30','unique:categories,code,'.$id.',id'],
            'pretty_name' => ['required','min:1','max:40'],
            'category_image' => ['nullable','mimes:jpeg,jpg,png,gif','max:1024'],
        ];

        $messages = [
            'code.required' => 'Vui lòng nhập mã danh mục',
            'code.alpha_num' => 'Vui lòng chỉ nhập chữ , số , viết liền và không dấu',
            'code.min' => 'Tối thiểu 1 kí tự',
            'code.max' => 'Tối đa 30 kí tự',
            'code.unique' => 'Mã đã bị trùng',
            'pretty_name.required' => 'Vui lòng nhập tên danh mục',
            'pretty_name.min' => 'Tối thiểu 1 kí tự',
            'pretty_name.max' => 'Tối đa 30 kí tự',
            'category_image.mimes' => 'Chỉ chấp nhận định dạng (jpeg,jpg,png,gif)',
            'category_image.max' => 'Kích thước tối đa là 1MB .',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }else{
            // dd($request->all());
        	$code = $request->input('code');
        	$pretty_name = $request->input('pretty_name');
        	$category = $this->_m->find($id);

        	if($category){

        		$category->code = $code;
        		$category->pretty_name = $pretty_name;

                if ($request->hasFile('category_image')){
                    $now = strtotime(Carbon::now());
                    $image = $request->file('category_image');
                    $origin_name = $image->getClientOriginalName();
                    $type = $image->extension();
                    $location = public_path('homepage/images/');
                    $name = $now.'.'.$type;
                    $move = $image->move($location,$name);

                    $img = Image::make('homepage/images/'.$name);

                    if(File::exists($location.$name)){
                        File::delete($location.$name);
                    }

                    if($category->image_name != null && $category->image_name != ''){
                        File::delete($location.$category->image_name);
                    }

                    $img->resize(200,200)->save('homepage/images/'.$name);

                    $category->image_name = $name;

                }

        		$update_category = $category->save();

        		if($update_category){
        			return back()->with('success', 'Lưu thành công');
        		}else{
        			return back()->with('fail', trans('messages.system_error'));
        		}
        	}else{
        		$messages = 'Có gì đó sai sai !';
        		return view('admin.alertpages.404',compact('messages'));
        	}
        }
    }
}
