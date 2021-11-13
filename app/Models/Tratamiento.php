<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tratamiento extends Model {
	use SoftDeletes;
	use HasFactory;
	public $table = 'tratamientos';

	protected $dates = ['deleted_at'];

	public function getReferenceValue() {
		return "{$this->nombre} ({$this->valor})";
	}

	public $fillable = [
		'nombre',
		'descripcion',
		'descripcion_corta',
		'area_id',
		'duracion',
		'sesiones',
		'valor',
		'activo',
	];

	protected $casts = [
		'id' => 'integer'
	];


	public static $rules = [
		'nombre' => 'required',
		'descripcion' => 'required',
		'descripcion_corta' => 'required',
		'area_id' => 'required',
		'sesiones' => 'required',
		'valor' => 'required',
		'activo' => 'required'
	];

	public function getDescAttribute() {
		return \Illuminate\Support\Str::limit($this->descripcion, 100, '...');
	}
	public function getDescCortAttribute() {
		return \Illuminate\Support\Str::limit($this->descripcion_corta, 100, '...');
	}
	public function area() {
		return $this->belongsTo('App\Models\Area', 'area_id');
	}
}
