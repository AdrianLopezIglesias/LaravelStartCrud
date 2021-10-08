<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePacientesRequest;
use App\Http\Requests\UpdatePacientesRequest;
use App\Repositories\PacientesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PacientesController extends AppBaseController
{
    /** @var  PacientesRepository */
    private $pacientesRepository;

    public function __construct(PacientesRepository $pacientesRepo)
    {
        $this->pacientesRepository = $pacientesRepo;
    }

    /**
     * Display a listing of the Pacientes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $pacientes = $this->pacientesRepository->paginate(10);

        return view('pacientes.index')
            ->with('pacientes', $pacientes);
    }

    /**
     * Show the form for creating a new Pacientes.
     *
     * @return Response
     */
    public function create()
    {
        return view('pacientes.create');
    }

    /**
     * Store a newly created Pacientes in storage.
     *
     * @param CreatePacientesRequest $request
     *
     * @return Response
     */
    public function store(CreatePacientesRequest $request)
    {
        $input = $request->all();

        $pacientes = $this->pacientesRepository->create($input);

        Flash::success('Pacientes saved successfully.');

        return redirect(route('pacientes.index'));
    }

    /**
     * Display the specified Pacientes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pacientes = $this->pacientesRepository->find($id);

        if (empty($pacientes)) {
            Flash::error('Pacientes not found');

            return redirect(route('pacientes.index'));
        }

        return view('pacientes.show')->with('pacientes', $pacientes);
    }

    /**
     * Show the form for editing the specified Pacientes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pacientes = $this->pacientesRepository->find($id);

        if (empty($pacientes)) {
            Flash::error('Pacientes not found');

            return redirect(route('pacientes.index'));
        }

        return view('pacientes.edit')->with('pacientes', $pacientes);
    }

    /**
     * Update the specified Pacientes in storage.
     *
     * @param int $id
     * @param UpdatePacientesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePacientesRequest $request)
    {
        $pacientes = $this->pacientesRepository->find($id);

        if (empty($pacientes)) {
            Flash::error('Pacientes not found');

            return redirect(route('pacientes.index'));
        }

        $pacientes = $this->pacientesRepository->update($request->all(), $id);

        Flash::success('Pacientes updated successfully.');

        return redirect(route('pacientes.index'));
    }

    /**
     * Remove the specified Pacientes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pacientes = $this->pacientesRepository->find($id);

        if (empty($pacientes)) {
            Flash::error('Pacientes not found');

            return redirect(route('pacientes.index'));
        }

        $this->pacientesRepository->delete($id);

        Flash::success('Pacientes deleted successfully.');

        return redirect(route('pacientes.index'));
    }
}
