<?php

if (! function_exists('modifierVnd')) {
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

if (! function_exists('convertDateMonth')) {
    function convertDateMonth($value) {
        $day = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value)->day;
        $month = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value)->month;
        $year = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value)->year;
        return $day.' Tháng '.$month.', '.$year;
    }
}
