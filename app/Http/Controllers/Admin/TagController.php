<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Tag;

class TagController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

    	$per_page = request()->query('per', 10);
        $search = request()->query('s','');
        $param = [];

        $query = new Tag();

        if($search != null && $search != ""){
            $param['name'] = $search;
        }

        $query = $query->filter($param);

        $tags = $query->paginate($per_page);
        
        return view('admin.tag.index',compact('tags','per_page','search'));
    }

    public function detail($value='')
    {
    	# code...
    }

    public function getAdd()
    {   
    	return view('admin.tag.add');
    }

    public function add(Request $request)
    {
    	$rules = [
            'code' => ['required','size:10','unique:tags,code'],
            'pretty_name' => ['required','min:1','max:50'],
        ];

        $messages = [
            'code.required' => 'Vui lòng bấm nút tạo hoặc tự tạo mã',
            'code.size' => 'Độ dài mã là 10 kí tự',
            'code.unique' => 'Mã vừa tạo đã trùng',
            'pretty_name.required' => 'Vui lòng nhập tên danh mục',
            'pretty_name.min' => 'Tối thiểu 1 kí tự',
            'pretty_name.max' => 'Tối đa 100 kí tự',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }else{
        	$code = $request->input('code');
        	$pretty_name = $request->input('pretty_name');

        	$created = Tag::create([
    			'code' => $code, 
    			'pretty_name' => $pretty_name,
    			'created_by' => Auth::user()->id,
    			'created_at' => Carbon::now()
        	]);

        	if($created){
    			return back()->with('success', 'Tạo mới thành công');
        	}else{
        		$messages = 'Có gì đó sai sai !';
        		return view('admin.alertpages.404',compact('messages'));
        	}
        }
    }

    public function getEdit(Request $request,$id)
    {
        $id = base64_decode($id);
    	$tag = Tag::where('id',$id)->first();
    	if($tag){
    		return view('admin.tag.edit',compact('tag'));
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
        ];

        $messages = [
            'code.required' => 'Vui lòng nhập mã danh mục',
            'code.alpha_num' => 'Vui lòng chỉ nhập chữ và số',
            'code.min' => 'Tối thiểu 1 kí tự',
            'code.max' => 'Tối đa 30 kí tự',
            'pretty_name.required' => 'Vui lòng nhập tên danh mục',
            'pretty_name.min' => 'Tối thiểu 1 kí tự',
            'pretty_name.max' => 'Tối đa 30 kí tự',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }else{
        	$code = $request->input('code');
        	$pretty_name = $request->input('pretty_name');
        	$tag = Tag::find($id);

        	if($tag){
        		$tag->code = $code;
        		$tag->pretty_name = $pretty_name;
        		$update_tag = $tag->save();

        		if($update_tag){
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
