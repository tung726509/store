<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Response;

use App\Product;
use App\Warehouse;
use App\WarehouseLog;
use App\WarehouseItem;

class WarehouseItemController extends Controller
{
	function __construct()
	{
        $this->middleware('auth');
		$this->_m = new WarehouseItem();
		$this->product_m = new Product();
		$this->wh_m = new Warehouse();
		$this->wh_log_m = new WarehouseLog();
	}

    public function getAdd($id)
    {
    	$warehouse = $this->wh_m->with(['wh_items'])->find($id);

    	if($warehouse){
    		$arr_products_in_wh = $warehouse->wh_items->pluck('product_id')->toArray();
	    	$products_notin_wh = $this->product_m->whereNotIn('id',$arr_products_in_wh)->get();

	    	return view('admin.warehouseitem.add',compact('warehouse','products_notin_wh'));
    	}else{
    		$messages = 'Có gì đó sai sai !';
    		return view('admin.alertpages.404',compact('messages'));
    	}
    }

    public function add(Request $request,$id)
    {
    	if($id == $request->warehouse_id)
    	{
    		$rules = [
	            'product_id' => ['required','int','exists:products,id'],
	            'quantity' => ['required','int','min:1'],
	        ];

	        $messages = [
	            'product_id.required' => 'Vui lòng chọn sản phẩm',
	            'product_id.int' => 'Chỉ được nhập số nguyên',
	            'product_id.exists' => 'Sản phẩm không tồn tại',
	            'quantity.required' => 'Vui lòng nhập số lượng',
	            'quantity.int' => 'Chỉ được nhập số nguyên',
	            'quantity.min' => 'Tối thiểu số lượng là 1',
	        ];

	        $validator = Validator::make($request->all(), $rules, $messages);

	        if($validator->fails()){
	            return back()->withInput()->withErrors($validator);
	        }else{
	        	$warehouse = $this->wh_m->find($id);

	        	if($warehouse != null){
	        		$data = [
		                'product_id' => $request->input('product_id'),
		                'warehouse_id' => $request->input('warehouse_id'),
		                'quantity' => $request->input('quantity'),
		                'created_at' => Carbon::now(),
		                'created_by' => Auth::user()->id,
		            ];

		            $created = $this->_m->create($data);

		            if($created){
		            	$data_log = [
		            		'warehouse_item_id' => $created->id,
		            		'product_id' => $request->input('product_id'),
		            		'quantity' => $request->input('quantity'),
		            		'old_quantity' => 0,
		            		'reason' => 'nhập lần đầu',
		            		'action' => 1,
		            	];

		            	$message = $this->_m->makeWarehouseLog($data_log);

		                return back()->with('success','Nhập mới thành công !');
		            }else{
		                return back()->withInput()->with('fail','Lỗi hệ thống , vui lòng thử lại !');    
		            }

	        	}else{
	        		return back()->with('fail','Lỗi hệ thống , vui lòng thử lại !');
	        	}
	        }
    	}else{
    		return back()->with('fail','Lỗi hệ thống , vui lòng thử lại !'); 
    	}
    }
    
    public function editAjax(Request $request)
    {
    	if($request->ajax()){
    		$wh_items_id = $request->wh_items_id;
    		$type = $request->type;
    		$quantity = $request->quantity;
    		$reason = $request->reason;

        	if($type == "edit" || $type == "warehousing"){
    			$wh_item = $this->_m->where('id',$wh_items_id)->first();

    			if($wh_item == null){
        			return false;
        		}

    			$updated = "";
    			$message = "";
    			$data_log['warehouse_item_id'] = $wh_items_id;
    			$data_log['product_id'] = $wh_item->product_id;
    			$data_log['quantity'] = $quantity;
    			$data_log['old_quantity'] = $wh_item->quantity;
    			$data_log['reason'] = $reason;

    			if($type == "warehousing"){
    				$message = "warehousing success";
    				$updated = $wh_item->increment('quantity',$quantity);

    				$data_log['action'] = 1;
    			}elseif($type == "edit"){
    				$message = "edit success";
    				$updated = $wh_item->update(['quantity'=>$quantity]);
    				
    				$data_log['action'] = 2;
    			}

    			if($updated){

    				$this->_m->makeWarehouseLog($data_log);
    				return Response::json(['success'=>true,'message'=>$message]);
    			}
        	}else{
        		return false;
        	}
    	}

    	return false;
    }
}
