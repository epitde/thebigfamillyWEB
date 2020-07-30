<?php

namespace App\Traits;

use Carbon\Carbon;

trait DatesTrait
{
    //get 12 months
    public function getMonths()
    {
        return [
            1 => "January",
            2 => "February",
            3 => "March",
            4 => "April",
            5 => "May",
            6 => "June",
            7 => "July",
            8 => "August",
            9 => "September",
            10 => "October",
            11 => "November",
            12 => "December",
        ];
    }

    //get past years
    public function getPastYears($limit = 60, $last = null)
    {
        if (!$last) {
            $last = Carbon::now()->format("Y") * 1;
        }
        $years = [];
        for ($i = $last; $i > $last - $limit; $i--) {
            $years[$i] = $i;
        }
        return $years;
    }

    //get days per month
    public function getDays()
    {
        $days = [];
        for ($i = 1; $i < 31; $i++) {
            $days[$i] = $i;
        }
        return $days;
    }
}
