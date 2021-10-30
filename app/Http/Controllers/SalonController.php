<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSalonRequest;
use App\Http\Requests\UpdateSalonRequest;
use App\Repositories\SalonRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Salon;
use App\Models\SalonHorario;
use App\Models\ProfesionalHorario;

class SalonController extends AppBaseController {
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

			case 'horarios_index':
				$salon = Salon::with('horarios')->find($request->salon);
				$salonHorarios = $salon->horarios;
				$salon = $salon->id;
				$access = $request->access;
				return view('salon_horarios.index', compact('access', 'salonHorarios', 'salon'));
				break;

			case 'profesionales_index':
				$salon = Salon::with('profesionales')->find($request->salon);

				$profesionals = $salon->profesionales->unique('id');

				$salon = $salon->id;
				$access = $request->access;

				return view('profesionals.table', compact('access', 'profesionals', 'salon'));
				break;

			case 'tratamientos_index':
				$salon = Salon::with('tratamientos')->find($request->salon);
				
				$tratamientos = $salon->tratamientos->unique('tratamiento_id');
				$tratamientos = $tratamientos->map(function ($item, $key) {
					return $item->tratamiento;
			});

				
				$salon = $salon->id;
				$access = $request->access;
				return view('tratamientos.table', compact('access', 'tratamientos'));
				break;


			case 'citas_index':
				$profesional = Profesional::with('citas')->find($request->profesional);
				$citas = $profesional->citas;
				$profesional = $profesional->id;
				$access = $request->access;
				return view('citas.index', compact('access', 'citas', 'profesional'));
				break;

			case 'salonHorario_editar':
				$salonHorario = SalonHorario::find($request->salonHorario);
				$access = $request->access;
				return view('salon_horarios.edit', compact('access', 'salonHorario'));
				break;

			default:
				# code...
				break;
		}
	}
	/** @var  SalonRepository */
	private $salonRepository;

	public function __construct(SalonRepository $salonRepo) {
		$this->salonRepository = $salonRepo;
	}

	/**
	 * Display a listing of the Salon.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request) {
		// $salons = $this->salonRepository->paginate(10);
		$salons = Salon::with('horarios')->paginate(10);
		return view('salons.index', compact('salons'));

		return view('salons.index')
			->with('salons', $salons);
	}

	/**
	 * Show the form for creating a new Salon.
	 *
	 * @return Response
	 */
	public function create() {
		return view('salons.create');
	}

	/**
	 * Store a newly created Salon in storage.
	 *
	 * @param CreateSalonRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateSalonRequest $request) {
		$input = $request->all();

		$salon = $this->salonRepository->create($input);

		Flash::success('Salon saved successfully.');

		return redirect(route('salons.index'));
	}

	/**
	 * Display the specified Salon.
	 *
	 * @param int $id
	 *
	 * @return Response
	 */
	public function show($id) {
		$salon = Salon::with('horarios')->find($id);
		return view('salons.show', compact('salon'));

		$salon = $this->salonRepository->find($id);

		if (empty($salon)) {
			Flash::error('Salon not found');

			return redirect(route('salons.index'));
		}

		return view('salons.show')->with('salon', $salon);
	}

	/**
	 * Show the form for editing the specified Salon.
	 *
	 * @param int $id
	 *
	 * @return Response
	 */
	public function edit($id) {
		$salon = $this->salonRepository->find($id);

		if (empty($salon)) {
			Flash::error('Salon not found');

			return redirect(route('salons.index'));
		}

		return view('salons.edit')->with('salon', $salon);
	}

	/**
	 * Update the specified Salon in storage.
	 *
	 * @param int $id
	 * @param UpdateSalonRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateSalonRequest $request) {
		$salon = $this->salonRepository->find($id);

		if (empty($salon)) {
			Flash::error('Salon not found');

			return redirect(route('salons.index'));
		}

		$salon = $this->salonRepository->update($request->all(), $id);

		Flash::success('Salon updated successfully.');

		return redirect(route('salons.index'));
	}

	/**
	 * Remove the specified Salon from storage.
	 *
	 * @param int $id
	 *
	 * @throws \Exception
	 *
	 * @return Response
	 */
	public function destroy($id) {
		$salon = $this->salonRepository->find($id);

		if (empty($salon)) {
			Flash::error('Salon not found');

			return redirect(route('salons.index'));
		}

		$this->salonRepository->delete($id);

		Flash::success('Salon deleted successfully.');

		return redirect(route('salons.index'));
	}
}
