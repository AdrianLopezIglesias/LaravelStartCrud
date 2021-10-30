<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProfesionalHorarioRequest;
use App\Http\Requests\UpdateProfesionalHorarioRequest;
use App\Repositories\ProfesionalHorarioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\ProfesionalHorario;
use App\Models\Salon;

class ProfesionalHorarioController extends AppBaseController {
	public function render(Request $request) {
		switch ($request->view) {
			case 'ver':
				return view('contratacions.show', compact('contratacion'));
				# code...
				break;
			case 'new':
				$profesional = Profesional::find($request->profesional);
				$tratamientos = Tratamiento::all();
				$access = $request->access;
				return view('profesional_tratamientos.create', compact('profesional',  'tratamientos', 'access'));
				# code...
				break;
			case 'table':
				$profesionalTratamientos = ProfesionalTratamiento::with(['tratamientos', 'profesional'])->where('profesional_id', $request->profesional);
				$access = $request->access;
				return view('profesional_tratamientos.table', compact('access', 'profesionalTratamientos'));
				break;
			case 'index':
				$profesionalHorarios = ProfesionalHorario::with(['salon', 'profesional'])->where('profesional_id', $request->profesional)->paginate(10);
				$profesional = $request->profesional;
				$access = $request->access;
				return view('profesional_horarios.index', compact('access', 'profesionalHorarios', 'profesional'));
				break;

			default:
				# code...
				break;
		}
	}

	/** @var  ProfesionalHorarioRepository */
	private $profesionalHorarioRepository;

	public function __construct(ProfesionalHorarioRepository $profesionalHorarioRepo) {
		$this->profesionalHorarioRepository = $profesionalHorarioRepo;
	}

	/**
	 * Display a listing of the ProfesionalHorario.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request) {
		$profesionalHorarios = $this->profesionalHorarioRepository->paginate(10);

		return view('profesional_horarios.index')
			->with('profesionalHorarios', $profesionalHorarios);
	}

	/**
	 * Show the form for creating a new ProfesionalHorario.
	 *
	 * @return Response
	 */
	public function create() {
		return view('profesional_horarios.create');
	}

	/**
	 * Store a newly created ProfesionalHorario in storage.
	 *
	 * @param CreateProfesionalHorarioRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateProfesionalHorarioRequest $request) {
		$input = $request->all();

		$profesionalHorario = $this->profesionalHorarioRepository->create($input);

		Flash::success('Profesional Horario saved successfully.');

		return redirect(route('profesionalHorarios.index'));
	}

	/**
	 * Display the specified ProfesionalHorario.
	 *
	 * @param int $id
	 *
	 * @return Response
	 */
	public function show($id) {

		$profesionalHorario = $this->profesionalHorarioRepository->find($id);

		if (empty($profesionalHorario)) {
			Flash::error('Profesional Horario not found');

			return redirect(route('profesionalHorarios.index'));
		}

		return view('profesional_horarios.show')->with('profesionalHorario', $profesionalHorario);
	}

	/**
	 * Show the form for editing the specified ProfesionalHorario.
	 *
	 * @param int $id
	 *
	 * @return Response
	 */
	public function edit($id) {
		$profesionalHorario = ProfesionalHorario::find($id)->with(['salon', 'profesional']);
		$salones = Salon::all();
		$profesionalHorario = $this->profesionalHorarioRepository->find($id);

		if (empty($profesionalHorario)) {
			Flash::error('Profesional Horario not found');

			return redirect(route('profesionalHorarios.index'));
		}

		return view('profesional_horarios.edit', compact('profesionalHorario', 'salones'));
	}

	/**
	 * Update the specified ProfesionalHorario in storage.
	 *
	 * @param int $id
	 * @param UpdateProfesionalHorarioRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateProfesionalHorarioRequest $request) {
		$profesionalHorario = $this->profesionalHorarioRepository->find($id);

		if (empty($profesionalHorario)) {
			Flash::error('Profesional Horario not found');

			return redirect(route('profesionalHorarios.index'));
		}

		$profesionalHorario = $this->profesionalHorarioRepository->update($request->all(), $id);

		Flash::success('Profesional Horario updated successfully.');

		return redirect('/profesionals/' . $profesionalHorario->profesional_id);
	}

	/**
	 * Remove the specified ProfesionalHorario from storage.
	 *
	 * @param int $id
	 *
	 * @throws \Exception
	 *
	 * @return Response
	 */
	public function destroy($id) {
		$profesionalHorario = $this->profesionalHorarioRepository->find($id);

		if (empty($profesionalHorario)) {
			Flash::error('Profesional Horario not found');

			return redirect(route('profesionalHorarios.index'));
		}

		$this->profesionalHorarioRepository->delete($id);

		Flash::success('Profesional Horario deleted successfully.');

		return redirect(route('profesionalHorarios.index'));
	}
}
