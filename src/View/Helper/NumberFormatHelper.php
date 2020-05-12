<?php
namespace App\View\Helper;

use Cake\View\Helper;

class NumberFormatHelper extends Helper
{

    public $helpers = ['Number'];

    const TRAILING_ZERO = 0;

    // Shortens a number and attaches K, M, B, etc. accordingly
    function format($number, $options = [], $divisors = null) {

        $divisor = 1;

        // Setup default $divisors if not provided
        if (!isset($divisors)) {
            $divisors = array(
                pow(1000, 0) => '', // 1000^0 == 1
                pow(1000, 1) => 'K', // Thousand
                pow(1000, 2) => 'M', // Million
                pow(1000, 3) => 'B', // Billion
                pow(1000, 4) => 'T', // Trillion
                pow(1000, 5) => 'Qa', // Quadrillion
                pow(1000, 6) => 'Qi', // Quintillion
            );
        }

        // Loop through each $divisor and find the
        // lowest amount that matches
        foreach ($divisors as $divisor => $shorthand) {
            if (abs($number) < ($divisor * 1000)) {
                // We found a match!
                break;
            }
        }

        // We found our match, or there were no matches.
        // Either way, use the last defined value for $divisor.
//        return TRAILING_ZERO + number_format($number / $divisor, $precision) . $shorthand;

        $number = $number / $divisor;

        if(isset($shorthand))
        {
            $options['after'] = $shorthand;
        }

        return $this->Number->format($number, $options);
    }
}