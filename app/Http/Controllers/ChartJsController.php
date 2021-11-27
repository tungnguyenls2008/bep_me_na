<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartJsController extends Controller
{
    public function orders(){
        $date_range=$this->getDatesFromRange(date('Y-m-d',strtotime('-30 days')),date('Y-m-d'),time());

        return view('charts.order-chart')->with('date_range',json_encode($date_range));

    }
    function getDatesFromRange($start, $end, $format='Y-m-d'): array
    {
        return array_map(function($timestamp) use($format) {
            return date($format, $timestamp);
        },
            range(strtotime($start) + ($start < $end ? 4000 : 8000), strtotime($end) + ($start < $end ? 8000 : 4000), 86400));
    }
}
