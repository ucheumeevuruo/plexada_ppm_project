<?php
namespace App\View\Helper;

use Cake\View\Helper;

class IndicatorHelper extends Helper
{
    public function status($status)
    {
        $status = strtolower($status);

        if ($status == 'open')
            return 'border-left-success';
        elseif ($status == 'not-started')
            return 'border-left-light';
        elseif ($status == 'closed')
            return 'border-left-danger';
        elseif ($status == 'on-hold')
            return 'border-left-primary';
    }
}