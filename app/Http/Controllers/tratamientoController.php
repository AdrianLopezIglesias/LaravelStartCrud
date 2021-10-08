<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTratamientoRequest;
use App\Http\Requests\UpdateTratamientoRequest;
use App\Repositories\TratamientoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TratamientoController extends AppBaseController
{
    /** @var  TratamientoRepository */
    private $tratamientoRepository;

    public function __construct(TratamientoRepository $tratamientoRepo)
    {
        $this->tratamientoRepository = $tratamientoRepo;
    }

    /**
     * Display a listing of the Tratamiento.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tratamientos = $this->tratamientoRepository->paginate(10);

        return view('tratamientos.index')
            ->with('tratamientos', $tratamientos);
    }

    /**
     * Show the form for creating a new Tratamiento.
     *
     * @return Response
     */
    public function create()
    {
        return view('tratamientos.create');
    }

    /**
     * Store a newly created Tratamiento in storage.
     *
     * @param CreateTratamientoRequest $request
     *
     * @return Response
     */
    public function store(CreateTratamientoRequest $request)
    {
        $input = $request->all();

        $tratamiento = $this->tratamientoRepository->create($input);

        Flash::success('Tratamiento saved successfully.');

        return redirect(route('tratamientos.index'));
    }

    /**
     * Display the specified Tratamiento.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tratamiento = $this->tratamientoRepository->find($id)->with('pro');

        if (empty($tratamiento)) {
            Flash::error('Tratamiento not found');

            return redirect(route('tratamientos.index'));
        }

        return view('tratamientos.show')->with('tratamiento', $tratamiento);
    }

    /**
     * Show the form for editing the specified Tratamiento.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tratamiento = $this->tratamientoRepository->find($id);

        if (empty($tratamiento)) {
            Flash::error('Tratamiento not found');

            return redirect(route('tratamientos.index'));
        }

        return view('tratamientos.edit')->with('tratamiento', $tratamiento);
    }

    /**
     * Update the specified Tratamiento in storage.
     *
     * @param int $id
     * @param UpdateTratamientoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTratamientoRequest $request)
    {
        $tratamiento = $this->tratamientoRepository->find($id);

        if (empty($tratamiento)) {
            Flash::error('Tratamiento not found');

            return redirect(route('tratamientos.index'));
        }

        $tratamiento = $this->tratamientoRepository->update($request->all(), $id);

        Flash::success('Tratamiento updated successfully.');

        return redirect(route('tratamientos.index'));
    }

    /**
     * Remove the specified Tratamiento from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tratamiento = $this->tratamientoRepository->find($id);

        if (empty($tratamiento)) {
            Flash::error('Tratamiento not found');

            return redirect(route('tratamientos.index'));
        }

        $this->tratamientoRepository->delete($id);

        Flash::success('Tratamiento deleted successfully.');

        return redirect(route('tratamientos.index'));
    }
}
