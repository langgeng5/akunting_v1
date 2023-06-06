<?php

use Carbon\Carbon;

/**
 * Write code on Method
 *
 * @return response()
 */
if (!function_exists('convertRupiah')) {
    function convertRupiah($number)
    {
        return "Rp " . number_format($number, 2, ',', '.');
    }
}
