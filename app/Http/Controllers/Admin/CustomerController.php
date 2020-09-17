<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Rules\VietnamesePhone;

use App\Customer;

class CustomerController extends Controller
{
	function __construct()
	{
		$this->_m = new Customer();
	}

    public function index(){
        $per_page = request()->query('per', 10);
        $search = request()->query('s','');
        $param = [];

        $query = $this->_m->with(['orders']);

        if($search != null && $search != ""){
            $param['phone'] = $search;
        }

        $query = $query->filter($param);

        $customers = $query->orderBy('total_money','desc')->paginate($per_page);
    	
    	return view('admin.customer.index',compact('customers','per_page','search'));
    }

    public function detail(Request $request,$id)
    {
        $id = base64_decode($id);
        $customer = $this->_m->find($id);
        $orders = $customer->orders()->orderBy('created_at','desc')->paginate(10);
        $orders1 = $customer->orders()->get();

        $total_orders = $orders1->count();
        $un_process_orders = $orders1->where('status',1)->count();
        $cancel_orders = $orders1->where('status',2)->count();
        $confirm_orders = $orders1->where('status',3)->count();
        $success_orders = $orders1->where('status',4)->count();
        $fail_orders = $orders1->where('status',5)->count();

        return view('admin.customer.detail',compact('customer','orders','total_orders','un_process_orders','cancel_orders','confirm_orders','success_orders','fail_orders'));
    }

    public function getAdd()
    {
        return view('admin.customer.add');
    }

    public function add(Request $request)
    {
        $rules = [
            'phone' => ['required',new VietnamesePhone,'unique:customers,phone'],
            'name' => ['required','min:1','max:255'],
            'd_o_b' => ['nullable','date'],
            'address' => ['required','min:1','max:255'],
        ];

        $messages = [
            'phone.required' => 'Vui lòng nhập SĐT',
            'phone.unique' => 'SĐT bị trùng',
            'name.required' => 'Vui lòng nhập tên KH',
            'name.min' => 'Tối thiểu 1 kí tụ',
            'name.max' => 'Tối đa 255 kí tụ',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'address.min' => 'Tối thiểu 1 kí tụ',
            'address.max' => 'Tối đa 255 kí tụ',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }else{
            $phone = $request->input('phone');
            $name = $request->input('name');
            $d_o_b = $request->input('d_o_b');
            $address = $request->input('address');
            
            $created = $this->_m->create([
                'phone' => $phone,
                'name' => $name,
                'd_o_b' => date('Y-m-d H:i:s',strtotime($d_o_b)),
                'address' => $address,
            ]);

            if($created){
                return back()->with('success', 'Thêm mới thành công !');
            }else{
                return back()->with('fail', 'Lỗi hệ thống , vui lòng thử lại !');
            }

        }
    }


    public function getEdit(Request $request,$id)
    {
        $id = base64_decode($id);
        $customer = $this->_m->where('id',$id)->first();
        // dd($customer);

        return view('admin.customer.edit',compact('customer'));
    }

    public function edit(Request $request,$id)
    {
        $id = base64_decode($id);

        $rules = [
            'phone' => ['required',new VietnamesePhone,'unique:customers,phone,'.$id.',id'],
            'name' => ['required','min:1','max:255'],
            'd_o_b' => ['nullable','date'],
            'address' => ['required','min:1','max:255'],
        ];

        $messages = [
            'phone.required' => 'Vui lòng nhập SĐT',
            'phone.unique' => 'Mã đã bị trùng',
            'name.required' => 'Vui lòng nhập tên KH',
            'name.min' => 'Tối thiểu 1 kí tụ',
            'name.max' => 'Tối đa 255 kí tụ',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'address.min' => 'Tối thiểu 1 kí tụ',
            'address.max' => 'Tối đa 255 kí tụ',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }else{
            $phone = $request->input('phone');
            $name = $request->input('name');
            $d_o_b = $request->input('d_o_b');
            $address = $request->input('address');
            
            $updated = $this->_m->where('id',$id)->update([
                'phone' => $phone,
                'name' => $name,
                'd_o_b' => date('Y-m-d H:i:s',strtotime($d_o_b)),
                'address' => $address,
            ]);

            if($updated){
                return back()->with('success', 'Cập nhật thành công !');
            }else{
                return back()->with('fail', 'Lỗi hệ thống , vui lòng thử lại !');
            }

        }
    }
}
