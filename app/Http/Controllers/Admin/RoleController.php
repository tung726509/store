<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Response;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

// use App\Role;
// use App\Permission;

class RoleController extends Controller
{
    public function __construct(){
    	$this->_m = new Role;
    	$this->permission_m = new Permission;
    }

    public function index()
    {
    	$roles = $this->_m->get();
    	return view('admin.role.index',compact('roles'));
    }

    public function getAdd()
    {
    	return view('admin.role.add');
    }

    public function getDetail(Request $request,$id){
    	$role = $this->_m->where('id',$id)->first();
    	$permissions = $this->permission_m->where('show',1)->get()->groupBy('group');
        $arr_permissOfRole = $role->permissions->pluck('id')->toArray();
        $str_arr_permissOfRole = implode(",",$arr_permissOfRole);

    	// dd($str_arr_permissOfRole);

    	return view('admin.role.detail',compact('role','permissions','str_arr_permissOfRole'));
    }

    public function detail(Request $req,$id){
    	$role_id = $id;
        $role = $this->_m->find($id);

    	// lọc ra mảng permission hợp lệ
    	$all_req = $req->all();
    	$collect = collect($all_req)->values();
    	$arr_filtered = $collect->filter(function($value,$key){
    		return strlen($value) <= 3 && $value != 'on';
    	});
    	$arr_filtered_in_db = $this->permission_m->whereIn('id',$arr_filtered)->get()->pluck('id')->toArray();

        // attach cái đống permission cho cái role
        $givePermissToRole = $role->syncPermissions($arr_filtered_in_db);

        if($givePermissToRole){
            return back()->with('success','Cập nhật thành công !');
        }else{
            return back()->withInput()->with('fail','Lỗi hệ thống , vui lòng thử lại sau !');    
        }

    }
}
