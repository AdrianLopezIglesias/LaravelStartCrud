<?php

namespace App\Http\Controllers;

use App\DataTables\CitaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCitaRequest;
use App\Http\Requests\UpdateCitaRequest;
use App\Repositories\CitaRepository;
use Flash;
use Illuminate\Http\Request;

use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Cita;

class CitaController extends AppBaseController
{
	
    /** @var  CitaRepository */
    private $citaRepository;

    public function __construct(CitaRepository $citaRepo)
    {
        $this->citaRepository = $citaRepo;
    }

    /**
     * Display a listing of the Cita.
     *
     * @param CitaDataTable $citaDataTable
     * @return Response
     */
    public function index(){
				$access = "general";
        $citas = Cita::orderBy('dia')->with('tratamiento')->get();
        return view('citas.index', compact('citas', 'access'));
        // return $citaDataTable->render('citas.index');
    }

    /**
     * Show the form for creating a new Cita.
     *
     * @return Response
     */
    public function create()
    {
        return view('citas.create');
    }

    /**
     * Store a newly created Cita in storage.
     *
     * @param CreateCitaRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $cita = $this->citaRepository->create($input);

        Flash::success('Cita saved successfully.');

        return redirect(route('citas.index'));
    }

    /**
     * Display the specified Cita.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cita = $this->citaRepository->find($id);
				$access = "general";

        if (empty($cita)) {
            Flash::error('Cita not found');

            return redirect(route('citas.index'));
        }

        return view('citas.show', compact('cita', 'access'));
    }

    /**
     * Show the form for editing the specified Cita.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cita = $this->citaRepository->find($id);

        if (empty($cita)) {
            Flash::error('Cita not found');

            return redirect(route('citas.index'));
        }

        return view('citas.edit')->with('cita', $cita);
    }

    /**
     * Update the specified Cita in storage.
     *
     * @param  int              $id
     * @param UpdateCitaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCitaRequest $request)
    {
        $cita = $this->citaRepository->find($id);

        if (empty($cita)) {
            Flash::error('Cita not found');

            return redirect(route('citas.index'));
        }

        $cita = $this->citaRepository->update($request->all(), $id);

        Flash::success('Cita updated successfully.');

        return redirect(route('citas.index'));
    }

    /**
     * Remove the specified Cita from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cita = $this->citaRepository->find($id);

        if (empty($cita)) {
            Flash::error('Cita not found');

            return redirect(route('citas.index'));
        }

        $this->citaRepository->delete($id);

        Flash::success('Cita deleted successfully.');

        return redirect(route('citas.index'));
    }
}
