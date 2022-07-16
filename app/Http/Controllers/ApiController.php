<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
class ApiController extends Controller
{
    public function get()
    {
        $now = Carbon::now();
        $year_week = Carbon::now()->weekOfYear;
        $weekly_month = round($year_week/4);
        $week_day = Carbon::now()->dayOfWeek +1;
        return response()->json([
            'weekly_month' => $weekly_month,
            'weekly_month_current_week' => $year_week - $weekly_month*4,
            'week_day' => $week_day,
        ]);
    }
}
