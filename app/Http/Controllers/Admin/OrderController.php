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

use App\Order;
use App\OrderItem;
use App\Product;
use App\Warehouse;
use App\Customer;
use App\WarehouseItem;
use App\WarehouseLog;
use App\Option;

class OrderController extends Controller
{
    function __construct(){
        $this->middleware('auth');
        $this->_m = new Order();
        $this->oi_m = new OrderItem();
        $this->product_m = new Product();
        $this->customer_m = new Customer();
        $this->warehouse_m = new Warehouse();
        $this->wh_items_m = new WarehouseItem();
        $this->wh_logs_m = new WarehouseLog();
    	$this->option_m = new Option();
        $this->res_status_mess_default = ['success'=>false,'message'=>'Lỗi hệ thống !'];
    }

    public function index(){
        $per_page = request()->query('per', 10);
        $search = request()->query('s','');
        $o_status = request()->query('o_status','');
        $param = [];

        $query = $this->_m->with(['customer','user']);

        if($search != null && $search != ""){
            $param['code'] = $search;
        }

        if($o_status != null && $o_status != ""){
            $param['status'] = $o_status;
        }

        $query = $query->filter($param);
        $orders = $query->orderBy('created_at','desc')->paginate($per_page);
        $orders1 = clone $orders;

        $total_orders = $orders1->count();
        $un_process_orders = $orders1->where('status',1)->count();
        $cancel_orders = $orders1->where('status',2)->count();
        $confirm_orders = $orders1->where('status',3)->count();
        $success_orders = $orders1->where('status',4)->count();
        $fail_orders = $orders1->where('status',5)->count();
        $deli_orders = $orders1->where('status',6)->count();
    	
    	return view('admin.order.index',compact('orders','per_page','search','o_status','total_orders','deli_orders','un_process_orders','cancel_orders','confirm_orders','success_orders','fail_orders'));
    }

    public function detail(Request $request,$id){
    	$id = base64_decode($id);
        $order = $this->_m->with(['customer','order_items','user'])->find($id);
        $order_items = $order->order_items;
        $types_of_fee = json_decode($order->types_of_fee,true);
        $ubd = null;
        $ufs = null;
        $ship_fee = null;

        if(Arr::has($types_of_fee, 'ubd')){
            $ubd = $types_of_fee['ubd'];
        }

        if(Arr::has($types_of_fee, 'ufs')){
            $ufs = $types_of_fee['ufs'];
        }

        if($order->ship_fee != null && $order->ship_fee != ""){
            $ship_fee = $order->ship_fee;
        }

        return view('admin.order.detail',compact('order','order_items','ubd','ufs','ship_fee'));
    }

    public function getAdd(){
        $products = $this->product_m->with(['wh_items'])->get();
    	$now = Carbon::now();
        $warehouses = $this->warehouse_m->get();
        $warehouse_main = $warehouses->where('main',1)->first();
        $options = $this->option_m->get();
        $use_birth_discount = json_decode($options->where('slug','use_birth_discount')->pluck('content')[0],true);
        $use_free_ship = json_decode($options->where('slug','use_free_ship')->pluck('content')[0],true);
        // dd($use_birth_discount,$use_free_ship);      

    	return view('admin.order.add',compact('now','products','warehouses','warehouse_main','use_birth_discount','use_free_ship'));
    }

    public function add(Request $request){
    	$rules = [
            'phone' => ['required',new VietnamesePhone],
            'name' => ['required','min:1','max:255'],
            'd_o_b' => ['nullable','date'],
            'address' => ['required','min:1','max:255'],
            'date' => ['required','date'],
            'cost' => ['nullable','integer','min:1000'],
            'note' => ['nullable','string','max:255'],
            'warehouse_id' => ['required','integer','exists:warehouses,id'],
        ];

        $messages = [
            'phone.required' => 'Vui lòng nhập SĐT',
            'name.required' => 'Vui lòng nhập tên KH',
            'name.min' => 'Tối thiểu 1 kí tụ',
            'name.max' => 'Tối đa 255 kí tụ',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'address.min' => 'Tối thiểu 1 kí tụ',
            'address.max' => 'Tối đa 255 kí tụ',
            'd_o_b.date' => 'Không đúng định dạng ngày tháng',
            'cost.integer' => 'Chỉ nhập số nguyên dương',
            'cost.min' => 'Tối thiểu 1000đ',
            'note.string' => 'Chỉ được nhập chuỗi',
            'note.max' => 'Tối đa 255 kí tự',
            'warehouse_id.required' => 'Vui lòng chọn kho hàng',
            'warehouse_id.integer' => 'Kho hàng ko hợp lệ',
            'warehouse_id.exists' => 'Kho hàng không tồn tại',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }else{
            // dd($request->all());
            $user_id = Auth::user()->id;
            //dữ liệu request
            $phone = $request->input('phone');
            $name = $request->input('name');
            $address = $request->input('address',null);
            $date = $request->input('date');
            $cost = $request->input('cost',null);
            $note = $request->input('note','');
            $warehouse_id = $request->input('warehouse_id');
            $d_o_b = null;
            $m_o_b = null;
            if($request->input('d_o_b') != null && $request->input('d_o_b') != ""){
                $d_o_b = date('Y-m-d H:i:s',strtotime($request->input('d_o_b')));
                $m_o_b = date('m',strtotime($request->input('d_o_b')));
            }

            // dd($d_o_b);

            $m_o_b = (int)date('m',strtotime($d_o_b));

            $data_order = [];

            // tìm hoặc tạo customer
            $customer = $this->customer_m->firstOrCreate(
                ['phone' => $phone],
                ['name' => $name,'d_o_b'=>$d_o_b,'address'=>$address,'created_at'=>Carbon::now(),'created_by'=>Auth::user()->id]
            );

            // RANDOM STRING FOR ORDER code
            $randomString = $this->generateRandomString(12);
            $make_code = 'U'.$user_id.'CD'.$randomString;

            // request arrays các products
            $arr_product_id = $request->input('product_id');
            $arr_quantity = $request->input('quantity');
            $arr_discount = $request->input('discount');
            $arr_price = $request->input('price');

            $arr_products = [];

            //  chỉnh sửa lại colect sản phẩm
            for ($i = 0; $i < count($arr_product_id); $i++){
                $arr_products[$i]['product_id'] = (int)$arr_product_id[$i];
                $arr_products[$i]['quantity'] = $arr_quantity[$i];
                $arr_products[$i]['discount'] = $arr_discount[$i];
                $arr_products[$i]['price'] = $arr_price[$i];
            }

            // collect sản phẩm từ request
            $coll_products = collect($arr_products)->keyBy('product_id')->filter(function($value,$key){
                return $value['quantity'] >= 1;
            });
                $arr_coll_products = $coll_products->toArray();
                $arr_products_id = $coll_products->pluck('product_id')->all();

            //tổng đơn hàng
            $order_price = 0;
                $tempo = $coll_products->values()->all();
                for ($i=0; $i < count($tempo) ; $i++){
                    $order_price = $order_price + $tempo[$i]['quantity']*$tempo[$i]['price']*((100-$tempo[$i]['discount'])/100);
                }

            // get settings discount
            $options = $this->option_m->get();
                $use_birth_discount = json_decode($options->where('slug','use_birth_discount')->pluck('content')[0],true);
                $use_free_ship = json_decode($options->where('slug','use_free_ship')->pluck('content')[0],true);
                $types_of_fee = [];

            // giảm % sinh nhật
            $month = Carbon::now()->month;
                if($request->input('d_o_b') != null && $request->input('d_o_b') != ""){
                    if($use_birth_discount['key'] == 1){
                        if($month == $m_o_b){
                            $order_price = $order_price*((100-$use_birth_discount['value'])/100);
                            $types_of_fee['ubd'] =  $use_birth_discount['value'];
                        }
                    }
                }

            // bật freeship thì cộng cost ship
            if($cost != null && $cost != ""){
                $cost = (int)$cost;
                if($use_free_ship['key'] == 1){
                    if($order_price < $use_free_ship['value']){
                        $order_price = $order_price + $cost;
                    }else{
                        $types_of_fee['ufs'] =  $use_free_ship['value'];
                    }
                }else{
                    $order_price = $order_price + $cost;
                }
            }

            $types_of_fee = json_encode($types_of_fee);

            // dd($request->all(),$make_code,$arr_products,$types_of_fee,$order_price);

            $data_order = [
                'code' => $make_code,
                'user_id' => $user_id,
                'customer_id' => $customer->id,
                'warehouse_id' => $warehouse_id,
                'price' => $order_price,
                'types_of_fee' => $types_of_fee,
                'ship_fee' => $cost,
                'note' => $note,
                'address' => $address,
                'status' => 3,
                'status_at' => Carbon::now(),
                'export_at' => date('Y-m-d H:i:s',strtotime($date)),
                'export_by' => Auth::user()->id,
            ];

            $create_order = $this->_m->create($data_order);

            // tạo mới các order_items
            if(count($arr_products) >= 1){
                for($i = 0; $i < count($arr_products); $i++){
                    $this->oi_m->create([
                        'order_id' => $create_order->id,
                        'product_id' => $arr_products[$i]['product_id'],
                        'quantity' => $arr_products[$i]['quantity'],
                        'discount' => $arr_products[$i]['discount'],
                        'price' => $arr_products[$i]['price'],
                        'items_origin' => 'false',
                        'created_at' => Carbon::now(),  
                    ]);
                    // TẠO LOG TRONG KHO HÀNG
                    // $wh_item = $this->wh_items_m->where('product_id',$arr_products[$i]['product_id'])->where('warehouse_id',$warehouse_id)->first();
                    // $old_quantity = $wh_item->quantity;
                    // $updated = $wh_item->decrement('quantity',$arr_products[$i]['quantity']);
                    // $data_log = [
                    //     'warehouse_item_id' => $wh_item->id,
                    //     'product_id' => $wh_item->product_id,
                    //     'quantity' => $arr_products[$i]['quantity'],
                    //     'old_quantity' => $old_quantity,
                    //     'reason' => base64_encode($create_order->id),
                    //     'action' => 3,
                    // ];
                    // $message = $this->wh_items_m->makeWarehouseLog($data_log);
                }
            }else{
                $this->_m->where('id',$create_order->id)->delete();
                return back()->with('fail', 'Không có sản phẩm , vui lòng thử lại !');
            }

            if($create_order){
                return back()->with('success', 'Thêm mới thành công !');
            }else{
                return back()->with('fail', 'Lỗi hệ thống , vui lòng thử lại !');
            }
        }
    }

    public function getEdit(Request $request,$id){
        $id = base64_decode($id);
        $order = $this->_m->with(['customer','order_items'])->find($id);
        if($order){
            $order_items = $order->order_items;
            // test
            $products = $this->product_m->with(['wh_items'])->get();
            $arr_products_out_order = $products->whereNotIn('id',$order_items->pluck('product_id'))->keyBy('id')->toArray();
            $arr_products_in_order = $products->whereIn('id',$order_items->pluck('product_id'))->keyBy('id')->toArray();
            $arr_order_items = $order_items->keyBy('product_id')->toArray();
            $new_arr_products_in_order = [];
            foreach($arr_products_in_order as $key => $value){
                Arr::set($value, 'price', $arr_order_items[$key]['price']);
                Arr::set($value, 'discount', $arr_order_items[$key]['discount']);
                $new_arr_products_in_order[$key] = $value;
            }
            $products = collect(Arr::collapse([ $new_arr_products_in_order,$arr_products_out_order])); 
            // end test

            $now = Carbon::now();
            $warehouses = $this->warehouse_m->with(['wh_items'])->get();
            $warehouse_main = $warehouses->where('main',1)->first();
            $warehouse_selected = null;

            // khác null là order đã sử lý và đã chọn kho hàng
            if($order->warehouse_id != null){
                $warehouse_selected = $warehouses->where('id',$order->warehouse_id)->first();
                // dd($warehouse_selected);
            }else{
                $warehouse_selected = $warehouse_main;
            }
            $options = $this->option_m->get();
            $use_birth_discount = json_decode($options->where('slug','use_birth_discount')->pluck('content')[0],true);
            $use_free_ship = json_decode($options->where('slug','use_free_ship')->pluck('content')[0],true);
            // $product = Product::where('id',$product_id)

            $m_o_b = '';
            if($order->customer->d_o_b != null){
                $m_o_b = (int)date('m',strtotime($order->customer->d_o_b));
            }else{
                $m_o_b = null;
            }

            $arr_ois_origin = implode(",",$order_items->where('items_origin','true')->pluck('product_id')->toArray());

            $types_of_fee = json_decode($order->types_of_fee,true);
            $ubd = null;
            $ufs = null;
            $ship_fee = null;

            if(Arr::has($types_of_fee, 'ubd')){
                $ubd = $types_of_fee['ubd'];
            }

            if(Arr::has($types_of_fee, 'ufs')){
                $ufs = $types_of_fee['ufs'];
            }

            if($order->ship_fee != null && $order->ship_fee != ""){
                $ship_fee = $order->ship_fee;
            }
            // dd($order_items->where('quantity','>',0)->load(['product']));

            return view('admin.order.edit',compact('now','products','order','warehouses','warehouse_selected','use_birth_discount','use_free_ship','m_o_b','arr_ois_origin','ubd','ufs','order_items'));
        }else{
            $messages = 'Không tìm thấy gì cả =((';
            return view('admin.alertpages.404',compact('messages'));
        }
    }

    public function edit(Request $request,$id){
        $id = base64_decode($id);
        $order = $this->_m->where('id',$id)->first();

        if($order){
            $rules = [
                'phone' => ['required',new VietnamesePhone,'exists:customers,phone'],
                'name' => ['required','min:1','max:255'],
                'd_o_b' => ['nullable','date'],
                'address' => ['required','min:1','max:255'],
                'date' => ['required','date'],
                'cost' => ['nullable','integer'],
                'note' => ['nullable','string','max:255'],
                'warehouse_id' => ['required','integer','exists:warehouses,id'],
            ];

            $messages = [
                'phone.required' => 'Vui lòng nhập SĐT',
                'phone.exists' => 'SĐT không tồn tại',
                'name.required' => 'Vui lòng nhập tên KH',
                'name.min' => 'Tối thiểu 1 kí tụ',
                'name.max' => 'Tối đa 255 kí tụ',
                'address.required' => 'Vui lòng nhập địa chỉ',
                'address.min' => 'Tối thiểu 1 kí tụ',
                'address.max' => 'Tối đa 255 kí tụ',
                'd_o_b.date' => 'Không đúng định dạng ngày tháng',
                'cost.integer' => 'Chỉ nhập số nguyên dương',
                // 'cost.min' => 'Tối thiểu 1000đ',
                'note.string' => 'Chỉ được nhập chuỗi',
                'note.max' => 'Tối đa 255 kí tự',
                'warehouse_id.required' => 'Vui lòng chọn kho hàng',
                'warehouse_id.integer' => 'Kho hàng ko hợp lệ',
                'warehouse_id.exists' => 'Kho hàng không tồn tại',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if($validator->fails()){
                return back()->withInput()->withErrors($validator);
            }else{
                //dữ liệu request
                $phone = $request->input('phone');
                $name = $request->input('name');
                $d_o_b = $request->input('d_o_b_1');
                $address = $request->input('address','');
                $date = $request->input('date');
                $cost = (int) $request->input('cost',null);
                $note = $request->input('note','');
                $warehouse_id = $request->input('warehouse_id');
                $status = $order->status;
                $status_at = $order->status_at;
                $data_order = [];

                // get incentives option
                $options = $this->option_m->get();
                $use_birth_discount = json_decode($options->where('slug','use_birth_discount')->pluck('content')[0],true);
                $use_free_ship = json_decode($options->where('slug','use_free_ship')->pluck('content')[0],true);
                $types_of_fee = [];

                if(in_array($status,[1,3])){
                    $status = 3;
                    $status_at = Carbon::now();
                }

                // chỉ update thông tin đơn hàng
                if(Arr::has($request->all(),'btn_update_1')){
                    $t_o_f = json_decode($order->types_of_fee,true);
                    $ship_fee = (int) $order->ship_fee;
                    $original_order_price = 0;
                    $old_price = (int) $order->price;
                    $order_price = 0;


                    // tính giá gốc của sản phẩm
                        if(Arr::has($t_o_f, 'ufs')){
                            $original_order_price = $old_price;
                        }else{
                            $original_order_price = $old_price - $ship_fee;
                        }

                        if(Arr::has($t_o_f, 'ubd')){
                            $original_order_price = $original_order_price * ( 100 / (100 - (int) $t_o_f['ubd']) );
                        }

                    $order_price = $original_order_price;

                    // giảm % sinh nhật
                    if($d_o_b){
                        $month = Carbon::now()->month;
                        $m_o_b = (int) date('m',strtotime($d_o_b));
                        if($use_birth_discount['key'] == 1){
                            if($month == $m_o_b){   
                                $order_price = $original_order_price*((100-$use_birth_discount['value'])/100);
                                $types_of_fee['ubd'] =  $use_birth_discount['value'];
                            }
                        }
                    }

                    // bật freeship thì cộng cost ship
                    if($use_free_ship['key'] == 1){
                        if($original_order_price < (int) $use_free_ship['value']){
                            $order_price = $order_price + $cost;
                        }else{
                            $types_of_fee['ufs'] =  $use_free_ship['value'];
                        }
                    }else{
                        $order_price = $order_price + $cost;
                    }

                    $data_order = [
                        'price' => $order_price,
                        'ship_fee' => $cost,
                        'types_of_fee' => $types_of_fee,
                        'address' => $address,
                        'note' => $note,
                        'export_at' => date('Y-m-d H:i:s',strtotime($date)),
                        'export_by' => Auth::user()->id,
                        'status' => $status ,
                        'status_at' => $status_at
                    ];

                }else{// update toàn bộ đơn hàng
                    // arr request products
                    $arr_product_id = $request->input('product_id');
                    $arr_quantity = $request->input('quantity');
                    $arr_discount = $request->input('discount');
                    $arr_price = $request->input('price');

                    $arr_ois_origin = [];
                    if($request->input('arr_ois_origin') != null || $request->input('arr_ois_origin') != ""){
                        $arr_ois_origin = explode(',',$request->input('arr_ois_origin'));
                    }

                    $arr_products = [];

                    //  chỉnh sửa lại colect sản phẩm
                    for ($i = 0; $i < count($arr_product_id); $i++){
                        $arr_products[$i]['product_id'] = (int)$arr_product_id[$i];
                        $arr_products[$i]['quantity'] = $arr_quantity[$i];
                        $arr_products[$i]['discount'] = $arr_discount[$i];
                        $arr_products[$i]['price'] = $arr_price[$i];
                        $arr_products[$i]['order_id'] = $id;
                    }

                    // collect sản phẩm từ request
                    $coll_products = collect($arr_products)->keyBy('product_id')->filter(function($value,$key){
                        return $value['quantity'] >= 1;
                    });
                    $arr_coll_products = $coll_products->toArray();
                    $arr_products_id = $coll_products->pluck('product_id')->all();

                    // collect order-items gốc mà khách đặt
                    $order_items1 = $this->oi_m->where(['order_id'=>$id,'items_origin'=>'true']);
                    $order_items2 = clone $order_items1;
                    $coll_ois_in_cps = $order_items1->whereIn('product_id',$arr_products_id)->get()->keyBy('product_id')->toArray();
                    [$keys_in, $values_in] = Arr::divide($coll_ois_in_cps);
                    $coll_ois_out_cps = $order_items2->whereNotIn('product_id',$arr_products_id)->get()->keyBy('product_id')->toArray();
                    [$keys_out, $values_out] = Arr::divide($coll_ois_out_cps);
                        // update order-items có trong collect sản phẩm từ request --> updated_1
                        if(count($keys_in) >= 1){
                            for ($i = 0; $i < count($keys_in); $i++){
                                $this->oi_m->where(['order_id'=>$id,'items_origin'=>'true'])->where('product_id',$keys_in[$i])->update([
                                    'quantity' => $arr_coll_products[$keys_in[$i]]['quantity'],
                                ]);
                            }
                        }
                        // update order-items ko có trong collect sản phẩm từ request --> updated_2
                        if(count($keys_out) >= 1){
                            for ($i = 0; $i < count($keys_out); $i++){
                                $this->oi_m->where(['order_id'=>$id,'items_origin'=>'true'])->where('product_id',$keys_out[$i])->update([
                                    'quantity' => 0,
                                ]);
                            }
                        }

                    // collect product mới từ request
                    $arr_new_products_id = collect($arr_products_id)->diff($arr_ois_origin)->values()->all();
                        // xóa những cái cũ đi
                        $this->oi_m->where(['order_id'=>$id,'items_origin'=>'false'])->delete();
                        // thêm mới vào order-items từ collect sản phẩm từ request và xóa những cái cũ
                        if(count($arr_new_products_id) >= 1){
                            for($i = 0; $i < count($arr_new_products_id); $i++){
                                $this->oi_m->create([
                                    'order_id' => $id,
                                    'product_id' => $arr_coll_products[$arr_new_products_id[$i]]['product_id'],
                                    'quantity' => $arr_coll_products[$arr_new_products_id[$i]]['quantity'],
                                    'discount' => $arr_coll_products[$arr_new_products_id[$i]]['discount'],
                                    'price' => $arr_coll_products[$arr_new_products_id[$i]]['price'],
                                    'items_origin' => 'false',
                                    'created_at' => Carbon::now(),  
                                ]);
                            }
                        }

                    //tổng đơn hàng
                    $order_price = 0;
                    $tempo = $coll_products->values()->all();
                    for ($i=0; $i < count($tempo) ; $i++){
                        $order_price = $order_price + $tempo[$i]['quantity']*$tempo[$i]['price']*((100-$tempo[$i]['discount'])/100);
                    }

                    $original_order_price = $order_price;

                    

                    // giảm % sinh nhật
                    if($d_o_b){
                        $month = Carbon::now()->month;
                        $m_o_b = (int)date('m',strtotime($d_o_b));
                        if($use_birth_discount['key'] == 1){
                            if($month == $m_o_b){   
                                $order_price = $order_price*((100-$use_birth_discount['value'])/100);
                                $types_of_fee['ubd'] =  $use_birth_discount['value'];
                            }
                        }
                    }

                    // bật freeship thì cộng cost ship
                    if($cost != null && $cost != ""){
                        // if(Arr::has($request->all(),'checkbox_freeship')){
                        if($use_free_ship['key'] == 1){
                            if($original_order_price < (int)$use_free_ship['value']){
                                $order_price = $order_price + $cost;
                            }else{
                                $types_of_fee['ufs'] =  $use_free_ship['value'];
                            }
                        }else{
                            $order_price = $order_price + $cost;
                        }
                    }

                    $types_of_fee = json_encode($types_of_fee);

                    $data_order = [
                        'price' => $order_price,
                        'warehouse_id' => $warehouse_id,
                        'types_of_fee' => $types_of_fee,
                        'ship_fee' => $cost,
                        'address' => $address,
                        'note' => $note,
                        'export_at' => date('Y-m-d H:i:s',strtotime($date)),
                        'export_by' => Auth::user()->id,
                        'status' => $status,
                        'status_at' => $status_at,
                    ];
                }

                $update_order = $this->_m->where('id',$id)->update($data_order);

                if($update_order){
                    return back()->with('success', 'Cập nhật thành công !');
                }else{
                    return back()->with('fail', 'Lỗi hệ thống , vui lòng thử lại !');
                }
            }

        }else{
            $messages = 'Không tìm thấy gì cả =((';
            return view('admin.alertpages.404',compact('messages'));
        }
    }

    public function checkPhoneAjax(Request $request){
        if($request->ajax()){
            $phone = $request->input('phone');
            $data['phone'] = $phone;

            $customer = $this->_m->checkExist($data);
            // dd($customer);
            if($customer != null){
                $info['name'] = $customer->name;
                $info['address'] = $customer->address;
                if($customer->d_o_b != null && $customer->d_o_b != ""){
                    $info['d_o_b'] = date('m/d/Y',strtotime($customer->d_o_b));
                    $info['m_o_b'] = (int)date('m',strtotime($customer->d_o_b));
                }else{
                    $info['d_o_b'] = null;
                }
                return Response::json(['success'=>true,'message'=>'exist','info'=>$info]);
            }else{
                return Response::json(['success'=>true,'message'=>'null']);
            }
        }

        return false;
    }

    public function productListAjax(Request $request){
        if($request->ajax()){
            $warehouse_id = $request->warehouse_id;
            // nếu có order_id thì là từ form sửa đơn hàng
            if($request->has('order_id')){
                $order_id = $request->order_id;
            }

            $warehouse = $this->warehouse_m->with(['wh_items'])->where('id',$warehouse_id)->first();
            if($warehouse != null){
                $warehouse_items = $warehouse->wh_items;

                if($request->has('order_id')){
                    $order = $this->_m->with(['customer','order_items'])->find($order_id);
                    $order_items = $order->order_items;

                    $products = $this->product_m->get();
                    $arr_products_out_order = $products->whereNotIn('id',$order_items->pluck('product_id'))->keyBy('id')->toArray();
                    $arr_products_in_order = $products->whereIn('id',$order_items->pluck('product_id'))->keyBy('id')->toArray();
                    $arr_order_items = $order_items->keyBy('product_id')->toArray();
                    $new_arr_products_in_order = [];
                    foreach($arr_products_in_order as $key => $value){
                        Arr::set($value, 'price', $arr_order_items[$key]['price']);
                        Arr::set($value, 'discount', $arr_order_items[$key]['discount']);
                        $new_arr_products_in_order[$key] = $value;
                    }
                    $products = collect(Arr::collapse([ $new_arr_products_in_order,$arr_products_out_order]))->keyBy('id')->toArray();

                    $warehouse_items = $warehouse_items->keyBy('product_id')->toArray();
                    foreach ($warehouse_items as $key => $value){
                        $value = Arr::add($value,'product',$products[$key]);
                        $warehouse_items[$key] = $value;
                    }
                }else{
                    $warehouse_items = $warehouse_items->load('product')->toArray();
                }

                if(count($warehouse_items) > 0){
                    return Response::json(['success'=>true,'message'=>'have products','wh_items'=>$warehouse_items]);
                }else{
                    return Response::json(['success'=>true,'message'=>'have not products']);              
                }
            }else{
                return false;
            }

        }

        return false;       
    }

    public function checkOrderWhouse(Request $request){
        if($request->ajax()){
            $warehouse_id = $request->warehouse_id;
            $order_id = $request->order_id;
            // arr sẩn phẩm và số lượng trong order
            $coll_ois = $this->oi_m->where('order_id',$order_id)->where('quantity','>',0)->pluck('quantity','product_id');
            $coll_ois_keys = $coll_ois->keys();
            $coll_ois_values = $coll_ois->values();
            // arr sản phẩm và số lượng tồn kho
            $coll_wh_items = $this->wh_items_m->where('warehouse_id',$warehouse_id)->pluck('quantity','product_id');
            $coll_wh_items_keys = $coll_wh_items->keys();
            $coll_wh_items_values = $coll_wh_items->values();

            $diff = $coll_ois_keys->diff($coll_wh_items_keys);

            if($coll_wh_items_keys->count() >= $coll_ois_keys->count()){
                if($diff->isEmpty()){
                    $new_coll_wh_items = $coll_wh_items->filter(function($value,$key) use ($coll_ois_keys){
                        return in_array($key, $coll_ois_keys->toArray());
                    });
                    $new_arr_wh_items = $new_coll_wh_items->toArray();

                    $arr_ois = $coll_ois->filter(function($value,$key){
                        return $value > 0;
                    })->toArray();

                    // dd($arr_ois,$new_arr_wh_items);

                    $status = 'true';

                    foreach ($arr_ois as $key => $value){
                        try{
                            $tempo = $new_arr_wh_items[$key];
                        }catch(Exception $e){
                            continue;
                        }

                        if($tempo < $value){
                            $status = 'false';
                            break;
                        }
                    }

                    if($status == "true"){
                        return Response::json(['success'=>true,'message'=>'this_warehouse_ok']);
                    }else{
                        return Response::json(['success'=>true,'message'=>'warehouse_not_enough_products']);
                    }
                    
                }else{
                    // dd(2);
                    return Response::json(['success'=>true,'message'=>'warehouse_not_enough_products']);
                }
            }else{
                // dd(1);
                return Response::json(['success'=>true,'message'=>'warehouse_not_enough_products']);
            }
        }

        return false;
    }

    public function customerEdit(Request $request){
        if($request->ajax()){
            $id = $request->id;
            $name = $request->name;
            $phone = $request->phone;
            $address = $request->address;
            $d_o_b = null;

            $rules = [
                'id' => ['exists:customers,id'],
                'phone' => ['required',new VietnamesePhone,'unique:customers,phone,'.$id.',id'],
                'name' => ['required','min:1','max:255'],
                'd_o_b' => ['nullable','date'],
                'address' => ['required','min:1','max:255'],
            ];

            $messages = [
                'id.exists' => 'ID khách hàng ko tồn tại',
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
                $errors = $validator->errors();
                return Response::json(['success'=>true,'message'=>'validate','errors'=>$errors]);
            }else{
                if($request->d_o_b != null && $request->d_o_b != ""){
                    $d_o_b = date('Y-m-d H:i:s',strtotime($request->d_o_b));
                }
                $data = [
                    'phone' => $phone,
                    'name' => $name,
                    'address' => $address,
                    'd_o_b' => $d_o_b,
                ];      
                $updated = $this->customer_m->where('id',$id)->update($data);

                if($updated){
                    return Response::json(['success'=>true,'message'=>'update success']);
                }
            }
        }

        return false;
    }

    public function orderChangeStatusAjax(Request $request){
        if($request->ajax()){
            $order_id = $request->order_id;
            $type = $request->type;

            $order = $this->_m->with(['order_items'])->find($order_id);
            if(!is_null($order)){
                $status = $order->status;
                if(in_array($type,['back','delivery','success','fail'])){
                    switch ($type) {
                        case 'back':
                            $data = $this->toBack($order,$status);
                            break;
                        case 'delivery':
                            $data = $this->toDelivery($order,$status);
                            break;
                        case 'success':
                            $data = $this->toSuccess($order,$status);
                            break;
                        case 'fail':
                            $data = $this->toFail($order,$status);
                            break;
                        default:
                            break;
                    }
                }else{
                    return Response::json(['success'=>true,'message'=>'type này không tồn order ko tồn tại !']);
                }
                $data['now'] = Carbon::now()->format('H:i d/m/Y');
                return Response::json($data);
            }else{
                return Response::json(['success'=>true,'message'=>'đơn hàng ko tồn tại !']);
            }
        }

        return false;
    }

    function toBack($order,$status){
        $updated = null;
        $data = $this->res_status_mess_default;
        $data['status'] = $status;

        if(in_array($status,[2,4,5,6])){// (2-5-6 : hủy-thành công-thất bại-đang giao)
            switch ($status) {
                case 6:
                    $order->status = 3;
                    break;
                case 4:
                    $order->status = 6;
                    $order->reason = null;
                    break;
                case 5:
                    $order->status = 6;
                    $order->reason = null;
                    break;
                case 2:
                    $order->status = 1;
                    break;
                default:
                    break;
            }
            $updated = $order->save();
            if($updated){
                if($status == 4){
                    $order_items = $order->order_items->pluck('quantity','product_id')->filter(function($value,$key){
                        return $value > 0;
                    })->toArray();
                    $wh_items = $this->warehouse_m->where('id',$order->warehouse_id)->first()->wh_items->pluck('quantity','product_id')->toArray();
                    // dd($order_items,$wh_items);
                    
                    // cộng trả lại số lượng đã trừ
                        foreach ($order_items as $product_id => $quantity){
                            // cộng lại số lượng
                            $wh_item = $this->wh_items_m->where('warehouse_id',$order->warehouse_id)->where('product_id',$product_id)->first();
                            $old_quantity = $wh_item->quantity;
                            $updated = $wh_item->increment('quantity',$quantity);
                        }

                    // xóa lịch sử
                    $this->wh_logs_m->where('reason',base64_encode($order->id))->delete();
                    //trừ vào tổng tiền (total_money)
                    if($order->customer){
                        $order->customer()->update(['total_money' => (int) $order->customer->total_money - (int) $order->price]);
                    }
                }

                $data['success'] = true;
                $data['message'] = 'backed';
            }
        }

        return $data;
    }

    function toDelivery($order,$status){
        $updated = null;
        $data = $this->res_status_mess_default;
        $data['status'] = $status;

        if($status == 3){// 3 : đã xác nhận đơn hàng
            $order->status = 6;
            $order->status_at = Carbon::now();
            $updated = $order->save();
            if($updated){
                $data['success'] = true;
                $data['message'] = 'delivered';
            }
        }

        return $data;
    }

    function toSuccess($order,$status){
        $updated = null;
        $data = $this->res_status_mess_default;
        $data['status'] = $status;
        $order_items = $order->order_items->pluck('quantity','product_id')->filter(function($value,$key){
            return $value > 0;
        })->toArray();
        $wh_items = $this->warehouse_m->where('id',$order->warehouse_id)->first()->wh_items->pluck('quantity','product_id')->toArray();

        // dd($order_items,count($order_items),$wh_items,count($wh_items));

        if($status == 6){// 6 : đang giao hàng
            $order->status = 4;
            $updated = $order->save();
            if($updated){
                // trừ sl trong kho và tạo log
                foreach ($order_items as $product_id => $quantity){
                    // TẠO LOG TRONG KHO HÀNG
                    $wh_item = $this->wh_items_m->where('warehouse_id',$order->warehouse_id)->where('product_id',$product_id)->first();
                    $old_quantity = $wh_item->quantity;
                    $updated = $wh_item->decrement('quantity',$quantity);
                    $data_log = [
                        'warehouse_item_id' => $wh_item->id,
                        'product_id' => $wh_item->product_id,
                        'quantity' => $quantity,
                        'old_quantity' => $old_quantity,
                        'reason' => base64_encode($order->id),
                        'action' => 3,
                    ];
                    $message = $this->wh_items_m->makeWarehouseLog($data_log);
                }
                //1 cộng vào tổng tiền (total_money)
                if($order->customer){
                    $order->customer()->update(['total_money' => (int) $order->customer->total_money + (int) $order->price]);
                }

                $data['success'] = true;
                $data['message'] = 'success';
            }
        }

        return $data;
    }

    function toFail($order,$status){
        $updated = null;
        $data = $this->res_status_mess_default;
        $data['status'] = $status;

        if($status == 6){// 6 : đang giao hàng
            $order->status = 5;
            $updated = $order->save();
            if($updated){
                $data['success'] = true;
                $data['message'] = 'fail';
            }
        }

        return $data;
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
