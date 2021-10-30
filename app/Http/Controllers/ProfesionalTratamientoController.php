<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProfesionalTratamientoRequest;
use App\Http\Requests\UpdateProfesionalTratamientoRequest;
use App\Repositories\ProfesionalTratamientoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\ProfesionalTratamiento;
use App\Models\Tratamiento;
use App\Models\Profesional;

class ProfesionalTratamientoController extends AppBaseController
{
	
	public function render (Request $request){
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
					$profesionalTratamientos = ProfesionalTratamiento::with(['tratamiento', 'profesional'])->where('profesional_id', $request->profesional)->paginate(10); 
					$profesional = $request->profesional; 
						$access = $request->access;
						return view('profesional_tratamientos.index', compact('access', 'profesionalTratamientos', 'profesional'));
						break;
				
				default:
						# code...
						break;
		}
}

    /** @var  ProfesionalTratamientoRepository */
    private $profesionalTratamientoRepository;

    public function __construct(ProfesionalTratamientoRepository $profesionalTratamientoRepo)
    {
        $this->profesionalTratamientoRepository = $profesionalTratamientoRepo;
    }

    /**
     * Display a listing of the ProfesionalTratamiento.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $profesionalTratamientos = $this->profesionalTratamientoRepository->paginate(10);

				$access = "general"; 
        return view('profesional_tratamientos.index', compact('profesionalTratamientos', 'access'));
    }

    /**
     * Show the form for creating a new ProfesionalTratamiento.
     *
     * @return Response
     */
    public function create()
    {
        return view('profesional_tratamientos.create');
    }

    /**
     * Store a newly created ProfesionalTratamiento in storage.
     *
     * @param CreateProfesionalTratamientoRequest $request
     *
     * @return Response
     */
    public function store(CreateProfesionalTratamientoRequest $request)
    {
        $input = $request->all();

        $profesionalTratamiento = $this->profesionalTratamientoRepository->create($input);

        Flash::success('Profesional Tratamiento saved successfully.');

        return redirect(route('profesionalTratamientos.index'));
    }

    /**
     * Display the specified ProfesionalTratamiento.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $profesionalTratamiento = $this->profesionalTratamientoRepository->find($id);

        if (empty($profesionalTratamiento)) {
            Flash::error('Profesional Tratamiento not found');

            return redirect(route('profesionalTratamientos.index'));
        }

        return view('profesional_tratamientos.show')->with('profesionalTratamiento', $profesionalTratamiento);
    }

    /**
     * Show the form for editing the specified ProfesionalTratamiento.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $profesionalTratamiento = $this->profesionalTratamientoRepository->find($id);

        if (empty($profesionalTratamiento)) {
            Flash::error('Profesional Tratamiento not found');

            return redirect(route('profesionalTratamientos.index'));
        }

        return view('profesional_tratamientos.edit')->with('profesionalTratamiento', $profesionalTratamiento);
    }

    /**
     * Update the specified ProfesionalTratamiento in storage.
     *
     * @param int $id
     * @param UpdateProfesionalTratamientoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProfesionalTratamientoRequest $request)
    {
        $profesionalTratamiento = $this->profesionalTratamientoRepository->find($id);

        if (empty($profesionalTratamiento)) {
            Flash::error('Profesional Tratamiento not found');

            return redirect(route('profesionalTratamientos.index'));
        }

        $profesionalTratamiento = $this->profesionalTratamientoRepository->update($request->all(), $id);

        Flash::success('Profesional Tratamiento updated successfully.');

        return redirect(route('profesionalTratamientos.index'));
    }

    /**
     * Remove the specified ProfesionalTratamiento from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $profesionalTratamiento = $this->profesionalTratamientoRepository->find($id);

        if (empty($profesionalTratamiento)) {
            Flash::error('Profesional Tratamiento not found');

            return redirect(route('profesionalTratamientos.index'));
        }

        $this->profesionalTratamientoRepository->delete($id);

        Flash::success('Profesional Tratamiento deleted successfully.');

        return redirect(route('profesionalTratamientos.index'));
    }
}
