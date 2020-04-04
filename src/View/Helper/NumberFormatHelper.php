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

    public function progress($status, $priority)
    {
        $color = '';
        $size = '0';
        if($status > 1 && strtolower($priority) == 'high')
        {
            $color = 'bg-danger';
            $size = '100';
        }elseif($status > 2){
            $color = 'bg-warning';
            $size = '75';
        }elseif($status > 0){
            $color = 'bg-success';
            $size = '25';
        }

        return "<div class=\"progress progress-md mb-2   px-0 col-sm-6\">
            <div class=\"progress-bar $color\" role=\"progressbar\" style=\"width:
            100%\" aria-valuenow=\"$size\" aria-valuemin=\"0\" aria-valuemax=\"100\"></div>
        </div>";
    }

    public function progress2($size)
    {
        return "<div class=\"progress progress-md mb-2  \">
            <div class=\"progress-bar\" role=\"progressbar\" style=\"width:
            $size%\" aria-valuenow=\"$size\" aria-valuemin=\"0\" aria-valuemax=\"100\"></div>
        </div>";
    }

    public function progress3($status, $subStatus)
    {
        $color = 'bg-light';
        $size = '100';
        $status = strtolower($status);
        $subStatus = strtolower($subStatus);
        if($status == 'active' && $subStatus == 'on track')
        {
            $color = 'bg-success';
        }else if($status == 'active' && $subStatus == 'major concern'){
            $color = 'bg-danger';
        }else if($status == 'active' && $subStatus == 'limited concern'){
            $color = 'bg-warning';
        }else if($status == 'active' && $subStatus == 'on hold'){
            $color = 'bg-dark';
        }else if($status == 'completed'){
            $color = 'bg-primary';
        }
        return "<div class=\"progress progress-md mb-2 px-0 col-sm-6\">
            <div class=\"progress-bar $color\" role=\"progressbar\" style=\"width:
            $size%\" aria-valuenow=\"$size\" aria-valuemin=\"0\" aria-valuemax=\"100\"></div>
        </div>";
    }
}