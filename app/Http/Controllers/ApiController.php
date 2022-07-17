<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function get()
    {
        $now = Carbon::now();
        $year_week = Carbon::now()->weekOfYear;
        $weekly_month = round($year_week/4)+1;
        $week_day = Carbon::now()->dayOfWeek +1;
        $fecha = [
            'lunarMonth' => $weekly_month,
            'lunarMonthWeek' => $year_week - $weekly_month*4 + 5,
            'weekDay' => ($week_day),
        ];

        $finanzas = [
            'uva' => $this->getUVA(),
            'blue' => $this->getBlue(),
        ];
        $finanzas['blue/uva'] = round($finanzas['blue'] / $finanzas['uva'], 2);

        $resultado = [
            'fecha' => $fecha,
            'finanzas' => $finanzas,
        ];
        return response()->json($resultado);
    }

    private function weekday_name($day){
        $weekdays = [
            '1' => 'dom',
            '2' => 'lun',
            '3' => 'mar',
            '4' => 'miés',
            '5' => 'jue',
            '6' => 'vie',
            '7' => 'sáb'
        ];
        return $weekdays[$day]; 
    }

    private function getUVA(){
        $url = 'https://api.estadisticasbcra.com/uva';
        $response = Http::withToken('eyJhbGciOiJIUzUxMiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE2ODk1NTYwNTMsInR5cGUiOiJleHRlcm5hbCIsInVzZXIiOiJhZHJpYW5sb3BlemlnbGVzaWFzMUBnbWFpbC5jb20ifQ.LEfbTTtLZpcT5ALqGp9WlONcAhhaV9zVBr3kFo9EN14mMtNo4CcMuum59sJjxstYrbZ3HESFe9p_Cgq5U4SRrA')->get($url)->json();
        return end($response)['v'];
    }

    private function getBlue(){
        $url = 'https://api.bluelytics.com.ar/v2/latest';
        $response = Http::get($url)->json();
        return ($response)['blue']['value_avg'];
    }
}
