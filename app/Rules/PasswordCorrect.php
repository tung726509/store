<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Auth;

class PasswordCorrect implements Rule
{

    public function __construct()
    {
        //
    }
    
    public function passes($attribute, $value)
    {
        return \Hash::check($value, Auth::user()->password);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Mật khẩu của bạn không đúng.';
    }
}
