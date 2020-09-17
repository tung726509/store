<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Response;
use Illuminate\Support\Arr;
use App\Rules\VietnamesePhone;
use App\Rules\PasswordCorrect;

use App\User;
use App\Role;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->_m = new User();
        $this->role_m = new Role();
    }

    public function index(){
    	$per_page = request()->query('per', 10);
        $search = request()->query('s','');
        $param = [];

        $query = $this->_m->with([]);

        if($search != null && $search != ""){
            $param['code'] = $search;
        }

        $query = $query->filter($param);
        $users = $query->orderBy('created_at','desc')->paginate($per_page);

        // dd($users);
    	
    	return view('admin.user.index',compact('per_page','search','users'));
    }

    public function getAdd()
    {
    	$roles = $this->role_m->get();

    	return view('admin.user.add',compact('roles'));
    }

    public function add(Request $request)
    {
        $req = $request->all();

        $rules = [
            'username' => ['required','string','unique:users,username'],
            'name' => ['nullable','string','max:255'],
            'email' => ['nullable','email','unique:users,email'],
            // 'role' => ['required','exists:customers,phone'],
            'current_password' => [new PasswordCorrect],
            'password' => ['required','string','min:6','max:255','confirmed'],
            'fb' => ['nullable','url','max:255'],
            'ins' => ['nullable','url','max:255'],
            'skype' => ['nullable','url','max:255'],
        ];

        $messages = [
            'username.required' => 'Vui lòng nhập tên đăng nhập !',
            'username.string' => 'Chỉ nhập chuỗi !',
            'username.unique' => 'Tên đăng nhập đã được sử dụng !',
            'name.string' => 'Chỉ nhập chuỗi !',
            'name.max' => 'Tối đa 255 kí tự',
            'email.email' => 'Email không hợp lệ !',
            'email.unique' => 'Email đã được sử dụng !',
            'password.required' => 'Vui lòng nhập mật khẩu !',
            'password.string' => 'Chỉ nhập chuỗi !',
            'password.min' => 'Tối thiểu 6 kí tự !',
            'password.max' => 'Tối đa 255 kí tự !',
            'password.confirmed' => 'Mật khẩu nhập lại không trùng khớp !',
            'fb.url' => 'Link không hợp lệ !',
            'fb.max' => 'Tối đa 255 kí tự !',
            'ins.url' => 'Link không hợp lệ !',
            'fb.max' => 'Tối đa 255 kí tự !',
            'skype.url' => 'Link không hợp lệ !',
            'skype.max' => 'Tối đa 255 kí tự !',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }else{
            $data['username'] = $request->input('username');
            $data['name'] = $request->input('name');
            $data['email'] = $request->input('email');
            $data['password'] = bcrypt($request->input('password'));
            $social_network['fb'] = $request->input('fb');
            $social_network['ins'] = $request->input('ins');
            $social_network['skype'] = $request->input('skype');
            $data['social_network'] = json_encode($social_network);
            $data['lock'] = 1;

            $created = $this->_m->create($data);

            if($created){
                $url = url()->current();
                return redirect($url)->with(['success'=>'Thêm mới thành công !']);
            }else{
                return back()->withInput()->with('fail','Lỗi hệ thống , vui lòng thử lại sau !');
            }
        }
    }

    public function getEdit($id)
    {
        $user = $this->_m->with([])->find($id);
        $social_network = json_decode($user->social_network,true);
        $roles = $this->role_m->get();
        $form_id = null;
        // dd($roles);
        
        if($user){
            return view('admin.user.edit',compact('user','roles','social_network','form_id'));
        }else{
            $messages = 'Không tìm thấy gì cả =((';
            return view('admin.alertpages.404',compact('messages'));
        }
    }

    public function edit(Request $request,$id)
    {	
    	$req = $request->all();
    	$rules = [];
        $messages = [];
    	// dd($req);

    	if(Arr::has($req,'accountForm')){
    		$rules = [
	            'username' => ['required','string','unique:users,username,'.$id.',id'],
	            'name' => ['nullable','string','max:255'],
	            'email' => ['nullable','email','unique:users,email,'.$id.',id'],
	            // 'role' => ['required','exists:customers,phone'],
	        ];

	        $messages = [
	            'username.required' => 'Vui lòng nhập tên đăng nhập !',
	            'username.string' => 'Chỉ nhập chuỗi !',
	            'username.unique' => 'Tên đăng nhập đã được sử dụng !',
	            'name.string' => 'Chỉ nhập chuỗi !',
	            'name.max' => 'Tối đa 255 kí tự',
	            'email.email' => 'Email không hợp lệ !',
	            'email.unique' => 'Email đã được sử dụng !',
	        ];
    	}elseif (Arr::has($req,'passwordChangeForm')) {
    		$rules = [
	            'current_password' => [new PasswordCorrect],
	            'password' => ['required','string','min:6','max:255','confirmed'],
	        ];

	        $messages = [
	            'password.required' => 'Vui lòng nhập mật khẩu !',
	            'password.string' => 'Chỉ nhập chuỗi !',
	            'password.min' => 'Tối thiểu 6 kí tự !',
	            'password.max' => 'Tối đa 255 kí tự !',
	            'password.confirmed' => 'Mật khẩu nhập lại không trùng khớp !',
	        ];
    	}elseif (Arr::has($req,'contactForm')) {
    		$rules = [
	            'fb' => ['nullable','url','max:255'],
	            'ins' => ['nullable','url','max:255'],
	            'skype' => ['nullable','url','max:255'],
	        ];

	        $messages = [
	        	'fb.url' => 'Link không hợp lệ !',
	        	'fb.max' => 'Tối đa 255 kí tự !',
	        	'ins.url' => 'Link không hợp lệ !',
	        	'fb.max' => 'Tối đa 255 kí tự !',
	        	'skype.url' => 'Link không hợp lệ !',
	        	'skype.max' => 'Tối đa 255 kí tự !',
	        ];
    	}elseif (Arr::has($req,'otherForm')) {
    	}

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }else{
        	$data = [];
        	$form_id = '';
        	if($request->has('accountForm')){
        		$data['username'] = $request->input('username');
        		$data['name'] = $request->input('name');
        		$data['email'] = $request->input('email');
        		$form_id = 'account';
        	}elseif($request->has('passwordChangeForm')){
        		$data['password'] = bcrypt($request->input('password'));
        		$form_id = 'password_change';
        	}elseif($request->has('contactForm')){
        		$social_network['fb'] = $request->input('fb');
        		$social_network['ins'] = $request->input('ins');
        		$social_network['skype'] = $request->input('skype');
        		$data['social_network'] = json_encode($social_network);
        		$form_id = 'contact';
        	}elseif($request->has('otherForm')){
        		
        	}

        	$updated = $this->_m->where('id',$id)->update($data);

        	if($updated){
        		$url = url()->current();
                // dd($form_id);
                return redirect($url)->with(['success'=>'Cập nhật thành công !','form_id'=>$form_id]);
            }else{
                return back()->withInput()->with('fail','Lỗi hệ thống , vui lòng thử lại sau !');
            }
    	}
    }
}
