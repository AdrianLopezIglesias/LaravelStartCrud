<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProfesionalRequest;
use App\Http\Requests\UpdateProfesionalRequest;
use App\Repositories\ProfesionalRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Profesional;

class ProfesionalController extends AppBaseController {
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
			case 'citas_index':
				$profesional = Profesional::with('citas')->find($request->profesional);
				$citas = $profesional->citas; 
				$profesional = $profesional->id;
				$access = $request->access;
				return view('citas.index', compact('access', 'citas', 'profesional'));
				break;

			default:
				# code...
				break;
		}
	}
	/** @var  ProfesionalRepository */
	private $profesionalRepository;

	public function __construct(ProfesionalRepository $profesionalRepo) {
		$this->profesionalRepository = $profesionalRepo;
	}

	/**
	 * Display a listing of the Profesional.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request) {
		$profesionals = $this->profesionalRepository->paginate(10);

		return view('profesionals.index')
			->with('profesionals', $profesionals);
	}

	/**
	 * Show the form for creating a new Profesional.
	 *
	 * @return Response
	 */
	public function create() {
		return view('profesionals.create');
	}

	/**
	 * Store a newly created Profesional in storage.
	 *
	 * @param CreateProfesionalRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateProfesionalRequest $request) {
		$input = $request->all();

		$profesional = $this->profesionalRepository->create($input);

		Flash::success('Profesional saved successfully.');

		return redirect(route('profesionals.index'));
	}

	/**
	 * Display the specified Profesional.
	 *
	 * @param int $id
	 *
	 * @return Response
	 */
	public function show($id) {
		$profesional = Profesional::with('tratamientos')->find($id);
		// dd($profesional->tratamientos);
		return view('profesionals.show', compact('profesional'));
		// $profesional = $this->profesionalRepository->find($id);

		if (empty($profesional)) {
			Flash::error('Profesional not found');

			return redirect(route('profesionals.index'));
		}
	}

	/**
	 * Show the form for editing the specified Profesional.
	 *
	 * @param int $id
	 *
	 * @return Response
	 */
	public function edit($id) {
		$profesional = $this->profesionalRepository->find($id);

		if (empty($profesional)) {
			Flash::error('Profesional not found');

			return redirect(route('profesionals.index'));
		}

		return view('profesionals.edit')->with('profesional', $profesional);
	}

	/**
	 * Update the specified Profesional in storage.
	 *
	 * @param int $id
	 * @param UpdateProfesionalRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateProfesionalRequest $request) {
		$profesional = $this->profesionalRepository->find($id);

		if (empty($profesional)) {
			Flash::error('Profesional not found');

			return redirect(route('profesionals.index'));
		}

		$profesional = $this->profesionalRepository->update($request->all(), $id);

		Flash::success('Profesional updated successfully.');

		return redirect(route('profesionals.index'));
	}

	/**
	 * Remove the specified Profesional from storage.
	 *
	 * @param int $id
	 *
	 * @throws \Exception
	 *
	 * @return Response
	 */
	public function destroy($id) {
		$profesional = $this->profesionalRepository->find($id);

		if (empty($profesional)) {
			Flash::error('Profesional not found');

			return redirect(route('profesionals.index'));
		}

		$this->profesionalRepository->delete($id);

		Flash::success('Profesional deleted successfully.');

		return redirect(route('profesionals.index'));
	}
}
