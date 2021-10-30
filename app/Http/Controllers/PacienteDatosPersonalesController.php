<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePacienteDatosPersonalesRequest;
use App\Http\Requests\UpdatePacienteDatosPersonalesRequest;
use App\Repositories\PacienteDatosPersonalesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PacienteDatosPersonalesController extends AppBaseController
{
    private $pacienteDatosPersonalesRepository;

    public function __construct(PacienteDatosPersonalesRepository $pacienteDatosPersonalesRepo)
    {
        $this->pacienteDatosPersonalesRepository = $pacienteDatosPersonalesRepo;
    }

    public function index(Request $request)
    {
        $pacienteDatosPersonales = $this->pacienteDatosPersonalesRepository->paginate(10);

        return view('paciente_datos_personales.index')
            ->with('pacienteDatosPersonales', $pacienteDatosPersonales);
    }

    public function create()
    {
        return view('paciente_datos_personales.create');
    }

    public function store(CreatePacienteDatosPersonalesRequest $request)
    {
        $input = $request->all();

        $pacienteDatosPersonales = $this->pacienteDatosPersonalesRepository->create($input);

        Flash::success('Paciente Datos Personales saved successfully.');

        return redirect(route('pacienteDatosPersonales.index'));
    }

 
    public function show($id)
    {
        $pacienteDatosPersonales = $this->pacienteDatosPersonalesRepository->find($id);

        if (empty($pacienteDatosPersonales)) {
            Flash::error('Paciente Datos Personales not found');

            return redirect(route('pacienteDatosPersonales.index'));
        }

        return view('paciente_datos_personales.show')->with('pacienteDatosPersonales', $pacienteDatosPersonales);
    }

    public function edit($id)
    {
        $pacienteDatosPersonales = $this->pacienteDatosPersonalesRepository->find($id);

        if (empty($pacienteDatosPersonales)) {
            Flash::error('Paciente Datos Personales not found');

            return redirect(route('pacienteDatosPersonales.index'));
        }

        return view('paciente_datos_personales.edit')->with('pacienteDatosPersonales', $pacienteDatosPersonales);
    }

    public function update($id, UpdatePacienteDatosPersonalesRequest $request)
    {
        $pacienteDatosPersonales = $this->pacienteDatosPersonalesRepository->find($id);

        if (empty($pacienteDatosPersonales)) {
            Flash::error('Paciente Datos Personales not found');

            return redirect(route('pacienteDatosPersonales.index'));
        }

        $pacienteDatosPersonales = $this->pacienteDatosPersonalesRepository->update($request->all(), $id);

        Flash::success('Paciente Datos Personales updated successfully.');

        return redirect(route('pacienteDatosPersonales.index'));
    }

    public function destroy($id)
    {
        $pacienteDatosPersonales = $this->pacienteDatosPersonalesRepository->find($id);

        if (empty($pacienteDatosPersonales)) {
            Flash::error('Paciente Datos Personales not found');

            return redirect(route('pacienteDatosPersonales.index'));
        }

        $this->pacienteDatosPersonalesRepository->delete($id);

        Flash::success('Paciente Datos Personales deleted successfully.');

        return redirect(route('pacienteDatosPersonales.index'));
    }
}
