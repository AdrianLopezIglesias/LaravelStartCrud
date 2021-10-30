<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSalonHorarioRequest;
use App\Http\Requests\UpdateSalonHorarioRequest;
use App\Repositories\SalonHorarioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\SalonHorario;

class SalonHorarioController extends AppBaseController
{
    /** @var  SalonHorarioRepository */
    private $salonHorarioRepository;

    public function __construct(SalonHorarioRepository $salonHorarioRepo)
    {
        $this->salonHorarioRepository = $salonHorarioRepo;
    }

    /**
     * Display a listing of the SalonHorario.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $salonHorarios = $this->salonHorarioRepository->paginate(10);

        return view('salon_horarios.index')
            ->with('salonHorarios', $salonHorarios);
    }

    /**
     * Show the form for creating a new SalonHorario.
     *
     * @return Response
     */
    public function create()
    {
        return view('salon_horarios.create');
    }

    /**
     * Store a newly created SalonHorario in storage.
     *
     * @param CreateSalonHorarioRequest $request
     *
     * @return Response
     */
    public function store(CreateSalonHorarioRequest $request)
    {
        $input = $request->all();

        $salonHorario = $this->salonHorarioRepository->create($input);

        Flash::success('Salon Horario saved successfully.');

        return redirect(route('salonHorarios.index'));
    }

    /**
     * Display the specified SalonHorario.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
			$salonHorario = SalonHorario::find($id)->with('salon')->first();
			return view('salon_horarios.show', compact('salonHorario'));
        $salonHorario = $this->salonHorarioRepository->find($id);

        if (empty($salonHorario)) {
            Flash::error('Salon Horario not found');

            return redirect(route('salonHorarios.index'));
        }

        return view('salon_horarios.show')->with('salonHorario', $salonHorario);
    }

    /**
     * Show the form for editing the specified SalonHorario.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
			$salonHorario = SalonHorario::find($id)->with('salon')->first();
			return view('salon_horarios.edit', compact('salonHorario'));
        $salonHorario = $this->salonHorarioRepository->find($id);

        if (empty($salonHorario)) {
            Flash::error('Salon Horario not found');

            return redirect(route('salonHorarios.index'));
        }

        return view('salon_horarios.edit')->with('salonHorario', $salonHorario);
    }

    /**
     * Update the specified SalonHorario in storage.
     *
     * @param int $id
     * @param UpdateSalonHorarioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSalonHorarioRequest $request)
    {
        $salonHorario = $this->salonHorarioRepository->find($id);

        if (empty($salonHorario)) {
            Flash::error('Salon Horario not found');

            return redirect(route('salonHorarios.index'));
        }

        $salonHorario = $this->salonHorarioRepository->update($request->all(), $id);

        Flash::success('Salon Horario updated successfully.');
        return redirect()->back();

    }

    /**
     * Remove the specified SalonHorario from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $salonHorario = $this->salonHorarioRepository->find($id);

        if (empty($salonHorario)) {
            Flash::error('Salon Horario not found');

            return redirect(route('salonHorarios.index'));
        }

        $this->salonHorarioRepository->delete($id);

        Flash::success('Salon Horario deleted successfully.');

        return redirect(route('salonHorarios.index'));
    }
}
