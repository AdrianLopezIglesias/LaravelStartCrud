<?php

namespace App\Helpers;


class TimeHelper{
	public static function lz($num){
		return (strlen($num) < 2) ? "0{$num}" : $num;
	}

	public static function getTime($num, $hora_start = 0){
		$num_hours = ($num*5)/60+$hora_start; //some float
		$hours = floor($num_hours);
		$mins = round(($num_hours - $hours) * 60);
		return TimeHelper::lz($hours) . ":" . TimeHelper::lz($mins);
	}
	public static function weekDay($num){
		$weekday = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'];
		return $weekday[$num-1];
	}

	public static function getTimeBlock($duracion = 5){
		$bloques = 12 * 24;
		$disponibilidad = [];
		for ($i = 0; $i < $bloques; $i++) {
			$disponibilidad[$i]['disponibilidad'] =  'free';
			$disponibilidad[$i]['cod_horario'] =  $i;
			$disponibilidad[$i]['hora_inicio'] =  TimeHelper::getTime($i);
			$disponibilidad[$i]['hora_fin'] =  TimeHelper::getTime($i + ($duracion)/5);
		}
		return $disponibilidad; 

	}

}