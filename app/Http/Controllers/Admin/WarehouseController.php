<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Warehouse;
use App\WarehouseItem;
use App\WarehouseLog;
use App\Product;;

class WarehouseController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }i

    public function index(){
    	$warehouses = Warehouse::with(['wh_items'])->get();

    	return view('admin.warehouse.index',compact('warehouses'));
    }

    public function detail($id)
    {
        $per_page = request()->query('per', 10);
        $products_count = Product::count();
        $warehouse_id = $id;

        $wh_items = WarehouseItem::with(['product'])->where('warehouse_id',$warehouse_id);
        $wh_items_copy = clone $wh_items;
        $wh_items_paginate = $wh_items->paginate($per_page);
        $wh_items_count = $wh_items_copy->count();
        $wh_logs_array = $wh_items_copy->pluck('id')->toArray();
        $wh_logs = WarehouseLog::with(['product'])->whereIn('warehouse_item_id',$wh_logs_array)->orderByDesc('created_at')->limit(30)->get();
        // dd($wh_logs_array);

        return view('admin.warehouse.detail',compact('wh_items','wh_logs','warehouse_id','products_count','wh_items_count','per_page','wh_items_paginate'));
    }

    public function getAdd()
    {
    	return view('admin.warehouse.add');
    }

    public function add(Request $request)
    {
		$rules = [
            'name' => ['required','string','unique:warehouses,name'],
            'address' => ['nullable','string','max:255'],
        ];

        $messages = [
            'name.required' => 'Vui lòng nhập tên kho hàng',
            'name.string' => 'Chỉ được nhập chuỗi',
            'name.unique' => 'Tên kho đã bị trùng',
            'address.string' => 'Chỉ được nhập chuỗi',
            'address.max' => 'Tối đa 255 kí tự',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }else{
        	$data = [
                'name' => $request->input('name'),
                'address' => $request->input('address'),
            ];

            $created = Warehouse::create($data);

            if($created){
                return back()->with('success','Thêm mới thành công !');
            }else{
                return back()->withInput()->with('fail','Lỗi hệ thống , vui lòng thử lại sau !');    
            }
        }
    }

    public function getEdit($id)
    {
        $warehouse = Warehouse::find($id);

        return view('admin.warehouse.edit',compact('warehouse'));
    }

    public function edit(Request $request,$id)
    {
        $rules = [
            'name' => ['required','string','unique:warehouses,name,'.$id.',id'],
            'address' => ['nullable','string','max:255'],
        ];

        $messages = [
            'name.required' => 'Vui lòng nhập tên kho hàng',
            'name.string' => 'Chỉ được nhập chuỗi',
            'name.unique' => 'Tên kho đã bị trùng',
            'address.string' => 'Chỉ được nhập chuỗi',
            'address.max' => 'Tối đa 255 kí tự',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }else{
            $data = [
                'name' => $request->input('name'),
                'address' => $request->input('address'),
            ];

            $warehouse = Warehouse::find($id);
            $updated_warehouse = $warehouse->update($data);

            if($updated_warehouse){
                return back()->with('success','Cập nhật thành công !');
            }else{
                return back()->withInput()->with('fail','Lỗi hệ thống , vui lòng thử lại sau !');    
            }
        }
    }
}
