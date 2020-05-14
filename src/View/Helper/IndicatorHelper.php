<?php
namespace App\View\Helper;

use Cake\View\Helper;

class IndicatorHelper extends Helper
{
    public function status($status)
    {
        $status = strtolower($status);

        if ($status == 'closed')
            return 'border-left-success';
        elseif ($status == 'not-started')
            return 'border-left-warning';
        elseif ($status == 'open')
            return 'border-left-danger';
    }
}