<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Rules\VietnamesePhone;
use Illuminate\Support\Arr;
use Response;
use Illuminate\Validation\Rule;
use Image;
use File;

use App\Option;

class OptionController extends Controller
{
	function __construct()
	{
		$this->_m = new Option();
		// discount sinh nhật mặc định
		$this->bd_discount_default_key = 0; 
		$this->bd_discount_default_value = 0;
		// freeship mặc định
		$this->fs_discount_default_key = 0;
		$this->fs_discount_default_value = 0;
		// transfer mặc định
		$this->tf_discount_default_key = 0;
		$this->tf_discount_default_value = 0;
	}

	public function getBanner(){
		$big_b_i = null;
		$med_b_i = null;
		$small_b_i = null;
		$dataImageOption = $this->_m->getImageOption();
		$big_b_i = $dataImageOption['big_b_i'];
		$med_b_i = $dataImageOption['med_b_i'];
		$small_b_i = $dataImageOption['small_b_i'];
		// dd($med_b_i['name']);

		return view('admin.option.banner',compact('arr_options','big_b_i','med_b_i','small_b_i'));
	}

	public function banner(Request $request){
		$rules = [];
        $messages = [];

        if($request->has('bbi_save')){
            $rules = [
                'bbi_text_1' => ['nullable','max:15'],
                'bbi_text_2' => ['nullable','max:15'],
                'bbi_text_3' => ['nullable','max:20'],
                'bbi_text_4' => ['nullable','max:20'],
                'big_banner' => ['nullable','mimes:jpeg,jpg,png,gif','max:1024'],
            ];

            $messages = [
                'bbi_text_1.max' => 'Tối đa 15 kí tự !',
                'bbi_text_2.max' => 'Tối đa 15 kí tự !',
                'bbi_text_3.max' => 'Tối đa 20 kí tự !',
                'bbi_text_4.max' => 'Tối đa 20 kí tự !',
                'big_banner.required' => 'Vui lòng chọn file ảnh .',
                'big_banner.mimes' => 'Chỉ chấp nhận định dạng (jpeg,jpg,png,gif)',
                'big_banner.max' => 'Kích thước tối đa là 1MB .',
            ];
        }

        if($request->has('mbi_save')){
            $rules = [
                'mbi_text_1' => ['nullable','max:15'],
                'mbi_text_2' => ['nullable','max:15'],
                'mbi_text_3' => ['nullable','max:20'],
                'med_banner' => ['nullable','mimes:jpeg,jpg,png,gif','max:1024'],
            ];

            $messages = [
                'mbi_text_1.max' => 'Tối đa 15 kí tự !',
                'mbi_text_2.max' => 'Tối đa 15 kí tự !',
                'mbi_text_3.max' => 'Tối đa 20 kí tự !',
                'med_banner.required' => 'Vui lòng chọn file ảnh .',
                'med_banner.mimes' => 'Chỉ chấp nhận định dạng (jpeg,jpg,png,gif)',
                'med_banner.max' => 'Kích thước tối đa là 1MB .',
            ];
        }

        if($request->has('sbi_save')){
            $rules = [
                'sbi_text_1' => ['nullable','max:15'],
                'sbi_text_2' => ['nullable','max:50'],
                'sbi_text_3' => ['nullable','max:20'],
                'small_banner' => ['nullable','mimes:jpeg,jpg,png,gif','max:1024'],
            ];

            $messages = [
                'sbi_text_1.max' => 'Tối đa 15 kí tự !',
                'sbi_text_2.max' => 'Tối đa 50 kí tự !',
                'sbi_text_3.max' => 'Tối đa 20 kí tự !',
                'small_banner.required' => 'Vui lòng chọn file ảnh .',
                'small_banner.mimes' => 'Chỉ chấp nhận định dạng (jpeg,jpg,png,gif)',
                'small_banner.max' => 'Kích thước tối đa là 1MB .',
            ];
        }

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }else{
        	$content = [];
        	$text = ['1' => '','2' => '','3' => '','4' => '',];
        	$dataImageOption = $this->_m->getImageOption();
        	$arr_img_name = [];
            $updated = null;
            $form_id = null;

            // big_banner
            if($request->has('bbi_save')){
            	$arr_img_name = $dataImageOption['big_b_i']['name'];
                $text['1'] = $request->input('bbi_text_1');
                $text['2'] = $request->input('bbi_text_2');
                $text['3'] = $request->input('bbi_text_3');
                $text['4'] = $request->input('bbi_text_4');
                $content['name'] = $arr_img_name;
                $content['text'] = $text;

                if($request->hasFile('big_banner')){
                    $info_return = $this->_m->saveBannerReturnInfo('homepage/images/',$request->file('big_banner'),1000,300);

                    array_push($arr_img_name,$info_return['name']);

                    $content['name'] = $arr_img_name;
                }

                $form_id = 'b_b_i';
            }

            // med_banner
            if($request->has('mbi_save')){
            	$arr_img_name = $dataImageOption['med_b_i']['name'];
                $text['1'] = $request->input('mbi_text_1');
                $text['2'] = $request->input('mbi_text_2');
                $text['3'] = $request->input('mbi_text_3');
                $text['4'] = $request->input('mbi_text_4');
                $content['name'] = $arr_img_name;
                $content['text'] = $text;

                if($request->hasFile('med_banner')){
                    $info_return = $this->_m->saveBannerReturnInfo('homepage/images/',$request->file('med_banner'),1000,300);
                    $arr_img_name = [$info_return['name']];
                    $content['name'] = $arr_img_name;
                }

                $form_id = 'm_b_i';
            }

            // small_banner
            if($request->has('sbi_save')){
            	$arr_img_name = $dataImageOption['small_b_i']['name'];
                $text['1'] = $request->input('sbi_text_1');
                $text['2'] = $request->input('sbi_text_2');
                $text['3'] = $request->input('sbi_text_3');
                $text['4'] = $request->input('sbi_text_4');
                $content['name'] = $arr_img_name;
                $content['text'] = $text;

                if($request->hasFile('small_banner')){
                    $info_return = $this->_m->saveBannerReturnInfo('homepage/images/',$request->file('small_banner'),1000,300);

                    $arr_img_name = [$info_return['name']];

                    $content['name'] = $arr_img_name;
                }

                $form_id = 's_b_i';
            }

            $updated = $this->_m->where('slug',$form_id)->update(['content' => $content]);

            if($updated){
                $url = url()->current();
                return redirect($url)->with('success','Cập nhật thành công !');
            }else{
                return back()->withInput()->with('fail','Lỗi hệ thống , vui lòng thử lại sau !');
            }
        }
	}

	public function getIncentive(){
		$options = $this->_m->get()->keyBy('slug');
		$arr_options = $options->toArray();
		$bd_discount = null;
		$fs_discount = null;
		$tf_discount = null;
		$bd_check = '';
      	$bd_val = 0;
      	$fs_check = '';
      	$fs_val = 0;
      	$tf_check = '';
      	$tf_val = 0;

      	$product_id = null;

		// giảm giá sinh nhật
		if(Arr::has($arr_options,'use_birth_discount')){
			$data = json_decode($arr_options['use_birth_discount']['content'],true);
			if($data['key'] == 0){
          		$bd_check = '';
        	}else if($data['key'] == 1){
          		$bd_check = 'checked';
        	}
        	$bd_val = $data['value'];
		}

		// freeship cho đơn hàng
		if(Arr::has($arr_options,'use_free_ship')){
			$data = json_decode($arr_options['use_free_ship']['content'],true);
			if($data['key'] == 0){
          		$fs_check = '';
        	}else if($data['key'] == 1){
          		$fs_check = 'checked';
        	}
        	$fs_val = $data['value'];
		}

		// chuyển khoản giảm xx%
		if(Arr::has($arr_options,'use_transfer_discount')){
			$data = json_decode($arr_options['use_transfer_discount']['content'],true);
			if($data['key'] == 0){
          		$tf_check = '';
        	}else if($data['key'] == 1){
          		$tf_check = 'checked';
        	}
        	$tf_val = $data['value'];
		}

		return view('admin.option.incentive',compact('arr_options','bd_check','bd_val','fs_check','fs_val','tf_check','tf_val'));
	}

	public function bdfsSaveValAjax(Request $request) {	
		if($request->ajax()){
			$rules =  [];
			$messages =  [];
			$req = $request->all();
			$type = $req['type'];
			$slug = '';

			// input sinh nhật
			if($type == "save_bd_discount"){
				$rules = [
					'value' => ['required','int','min:0','max:99'],
				];
				$messages = [
					'value.required' => 'Không được để trống !',
					'value.int' => 'Phải là số nguyên !',
					'value.min' => 'Nhỏ nhất là 0% !',
					'value.max' => 'Lớn nhất là 99% !',
				];
			}

			// input freeship và input chuyển khoản
			if($type == "save_fs_discount" || $type == "save_tf_discount"){
				$rules = [
					'value' => ['required','int','min:0','max:100000000'],
				];
				$messages = [
					'value.required' => 'Không được để trống !',
					'value.int' => 'Phải là số nguyên !',
					'value.min' => 'Nhỏ nhất là 0 !',
					'value.max' => 'Lớn nhất là 100000000 !',
				];
			}

			// bật tắt
			if($type == "bd_check_btn" || $type == "fs_check_btn" || $type == "tf_check_btn"){
				$rules = [
					'value' => ['required',Rule::in(['0','1'])],
				];
				$messages = [
					'value.required' => 'Không được để trống !',
				];
			}

			$validator = Validator::make($request->all(),$rules,$messages);

			if($validator->fails()){
				return Response::json(['success'=>true,'message'=>'validate fail','errors'=>$validator->errors()]);
			}else{
				// dd($request->all());
				$options = $this->_m->get();
            	$data_bd = json_decode($options->where('slug','use_birth_discount')->pluck('content')[0],true);
            	$data_fs = json_decode($options->where('slug','use_free_ship')->pluck('content')[0],true);
            	$data_tf = json_decode($options->where('slug','use_transfer_discount')->pluck('content')[0],true);

            	if($type == "save_bd_discount"){
            		$data_bd['value'] = (int) $request->value;
            		$data = json_encode($data_bd);
            		$slug = 'use_birth_discount';
            	}

            	if($type == "bd_check_btn"){
            		$data_bd['key'] = (int) $request->value;
            		$data = json_encode($data_bd);
            		$slug = 'use_birth_discount';
            	}

            	if($type == "save_fs_discount"){
            		$data_fs['value'] = (int) $request->value;
            		$data = json_encode($data_fs);
            		$slug = 'use_free_ship';
            	}

            	if($type == "fs_check_btn"){
            		$data_fs['key'] = (int) $request->value;
            		$data = json_encode($data_fs);
            		$slug = 'use_free_ship';
            	}

            	if($type == "save_tf_discount"){
            		$data_tf['value'] = (int) $request->value;
            		$data = json_encode($data_tf);
            		$slug = 'use_transfer_discount';
            	}

            	if($type == "tf_check_btn"){
            		$data_tf['key'] = (int) $request->value;
            		$data = json_encode($data_tf);
            		$slug = 'use_transfer_discount';
            	}

            	$updated = $this->_m->where('slug',$slug)->update(['content'=>$data]);

            	if($updated){
            		return Response::json(['success'=>true,'message'=>'update success']);
            	}else{
            		return false;
            	}
			}	
		}

		return false;
	}

    public function getAboutUs(){
        $data = $this->_m->getOption();

        return view('admin.option.aboutus',compact('data'));
    }

    public function aboutUs(Request $request){
        $rules = [
            'company_email' => ['nullable','email','max:70'],
            'company_facebook' => ['nullable','url','max:255'],
            'company_instagram' => ['nullable','url','max:255'],
            'company_twitter' => ['nullable','url','max:255'],
            'company_opentime' => ['nullable','max:255'],
        ];

        $messages = [
            'company_email.email' => 'Email không đúng định dạng !',
            'company_email.max' => 'Tối đa 70 kí tự !',
            'company_facebook.url' => 'Link không đúng định dạng !',
            'company_facebook.max' => 'Tối đa 255 kí tự !',
            'company_instagram.url' => 'Link không đúng định dạng !',
            'company_instagram.max' => 'Tối đa 255 kí tự !',
            'company_twitter.url' => 'Link không đúng định dạng !',
            'company_twitter.max' => 'Tối đa 255 kí tự !',
            'company_opentime.max' => 'Tối đa 255 kí tự !',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }else{
            $com_email = $request->company_email;
            $com_phone = $request->company_phone;
            $com_address = $request->company_address;
            $fb = $request->company_facebook;
            $ins = $request->company_instagram;
            $twt = $request->company_twitter;
            $open_time = $request->company_opentime;

            $this->_m->where('slug','fb')->update(['content'=>$fb]);
            $this->_m->where('slug','ins')->update(['content'=>$ins]);
            $this->_m->where('slug','twt')->update(['content'=>$twt]);
            $this->_m->where('slug','com_phone')->update(['content'=>$com_phone]);
            $this->_m->where('slug','com_address')->update(['content'=>$com_address]);
            $this->_m->where('slug','com_email')->update(['content'=>$com_email]);
            $this->_m->where('slug','open_time')->update(['content'=>$open_time]);

            return back()->with('success','Cập nhật thành công !');
        }
    }

    public function getRole()
    {
        return view('admin.option.index');
    }
}

