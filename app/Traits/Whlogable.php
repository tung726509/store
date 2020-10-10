<?php

namespace App\Traits;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\WarehouseLog;

trait Whlogable {

    public function makeWarehouseLog($data_log)
    {
        $message = '';

        $data['warehouse_item_id'] = $data_log['warehouse_item_id'];
        $data['product_id'] = $data_log['product_id'];
        $data['quantity'] = $data_log['quantity'];
        $data['old_quantity'] = $data_log['old_quantity'];
        $data['action'] = $data_log['action'];
        $data['reason'] = $data_log['reason'];
        $data['action_by'] = Auth::user()->id;
        $data['created_at'] = Carbon::now();

        $created = WarehouseLog::create($data);

        if($created){
            $message = 'tạo lịch sử thành công';
        }else{
            $message = 'tạo lịch sử thất bại';
        }

        return $message;
    }
}