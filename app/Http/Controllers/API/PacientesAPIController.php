<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePacientesAPIRequest;
use App\Http\Requests\API\UpdatePacientesAPIRequest;
use App\Models\Paciente;
use App\Repositories\PacienteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

class PacientesAPIController extends AppBaseController {
	private $pacientesRepository;

	public function __construct(PacienteRepository $pacientesRepo) {
		$this->pacientesRepository = $pacientesRepo;
	}

	public function index(Request $request) {
		$nombre = !empty($request->nombre) ? $request->nombre : false;
		$dni = !empty($request->dni) ? $request->dni : false;
		$telefono = !empty($request->telefono) ? $request->telefono : false;

		$pacientes = Paciente::with(['datospersonales', 'contrataciones', 'citas', 'tratamientos'])
			->when($nombre, function ($query, $nombre) {
				return $query->where('nombre', 'like', '%' . $nombre . '%');
			})
			->when($dni, function ($query, $dni) {
				return $query->whereHas('datospersonales', function ($q) use ($dni) {
					$q->where('dni', 'like', '%' . $dni . '%');
				});
			})
			->when($telefono, function ($query, $telefono) {
				return $query->whereHas('datospersonales', function ($q) use ($telefono) {
					$q->where(function ($query) use ($telefono) {
						$query->where('telefono_principal', 'like', '%' . $telefono . '%')
							->orWhere('telefono_emergencias', 'like', '%' . $telefono . '%');
					});
				});
			})
			->orderBy('id', 'desc')
			->paginate(15);
		return $this->sendResponse($pacientes, 'Pacientes retrieved successfully');
	}


	public function store(Request $request) {
		$input = $request->all();
		$paciente = Paciente::create($input);

		$paciente->datospersonales()->create([
			'dni' => $input['datospersonales']['dni'],
			'fecha_nacimiento' => $input['datospersonales']['fecha_nacimiento'],
			'domicilio' => $input['datospersonales']['domicilio'],
			'telefono_principal' => $input['datospersonales']['telefono_principal'],
			'telefono_emergencias' => $input['datospersonales']['telefono_emergencias'],
			'genero' => $input['datospersonales']['genero']
		]);


		return $this->sendResponse($paciente->toArray(), 'Paciente created successfully');
	}

	public function show($id) {
		$pacientes = Paciente::with(['datospersonales', 'contrataciones', 'citas', 'tratamientos'])->find($id);

		if (empty($pacientes)) {
			return $this->sendError('Pacientes not found');
		}

		return $this->sendResponse($pacientes->toArray(), 'Pacientes retrieved successfully');
	}

	public function update($id, Request $request) {
		$input = $request->all();
		$paciente = Paciente::with('datospersonales')->find($id);


		if (empty($paciente)) {
			return $this->sendError('Pacientes not found');
		}
		$paciente->update($input);
		$paciente->datospersonales()->update([
			'dni' => $input['datospersonales']['dni'],
			'fecha_nacimiento' => $input['datospersonales']['fecha_nacimiento'],
			'domicilio' => $input['datospersonales']['domicilio'],
			'telefono_principal' => $input['datospersonales']['telefono_principal'],
			'telefono_emergencias' => $input['datospersonales']['telefono_emergencias'],
			'genero' => $input['datospersonales']['genero']
		]);


		return $this->sendResponse($paciente->toArray(), 'Pacientes updated successfully');
	}

	/**
	 * Remove the specified Pacientes from storage.
	 * DELETE /pacientes/{id}
	 *
	 * @param int $id
	 *
	 * @throws \Exception
	 *
	 * @return Response
	 */
	public function destroy($id) {
		/** @var Pacientes $pacientes */
		$pacientes = $this->pacientesRepository->find($id);

		if (empty($pacientes)) {
			return $this->sendError('Pacientes not found');
		}

		$pacientes->delete();

		return $this->sendSuccess('Pacientes deleted successfully');
	}
}
