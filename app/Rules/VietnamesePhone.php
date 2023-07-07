<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class VietnamesePhone implements Rule
{
    public function __construct()
    {
        
    }

    public function passes($attribute, $value)
    {
        $mobile_partern = '/^(\+84|84|0)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-9]|9[0-9])+[0-9]{7}$/';
        $phone_2_partern = '/^(\+84|84|0)2(4|8)+[0-9]{8}$/';
        $phone_3_partern = '/^(\+84|84|0)(20[3-9]|21[0-689]|22[0-25-9]|23[2-9]|25[124-9]|26[0-39]|27[0-7]|29[0-4679])+[0-9]{7}$/';

        $stripped_value = trim(preg_replace('/\s/', '', $value));

        if(preg_match($mobile_partern, $stripped_value) || preg_match($phone_2_partern, $stripped_value) || preg_match($phone_3_partern, $stripped_value)){
            return true;
        }else{
            return false;
        }
    }

    public function message()
    {
        return 'Số điện thoại không hợp lệ.';
    }
}
