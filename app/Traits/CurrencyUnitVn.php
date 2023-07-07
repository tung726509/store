<?php

namespace App\Traits;

trait CurrencyUnitVn {

    function modifierVnd($number, $symbol='đ') {
        while (true) {
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1.$2', $number);
        if ($replaced != $number) {
        $number = $replaced;
        } else {
        break;
        }
        }
        if(!empty($symbol)) $number .= $symbol;
        return $number;
    }
}