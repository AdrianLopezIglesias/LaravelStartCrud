<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInstalacionRequest;
use App\Http\Requests\UpdateInstalacionRequest;
use App\Repositories\InstalacionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class InstalacionController extends AppBaseController
{
    /** @var  InstalacionRepository */
    private $instalacionRepository;

    public function __construct(InstalacionRepository $instalacionRepo)
    {
        $this->instalacionRepository = $instalacionRepo;
    }

    /**
     * Display a listing of the Instalacion.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $instalacions = $this->instalacionRepository->paginate(10);

        return view('instalacions.index')
            ->with('instalacions', $instalacions);
    }

    /**
     * Show the form for creating a new Instalacion.
     *
     * @return Response
     */
    public function create()
    {
        return view('instalacions.create');
    }

    /**
     * Store a newly created Instalacion in storage.
     *
     * @param CreateInstalacionRequest $request
     *
     * @return Response
     */
    public function store(CreateInstalacionRequest $request)
    {
        $input = $request->all();

        $instalacion = $this->instalacionRepository->create($input);

        Flash::success('Instalacion saved successfully.');

        return redirect(route('instalacions.index'));
    }

    /**
     * Display the specified Instalacion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $instalacion = $this->instalacionRepository->find($id);

        if (empty($instalacion)) {
            Flash::error('Instalacion not found');

            return redirect(route('instalacions.index'));
        }

        return view('instalacions.show')->with('instalacion', $instalacion);
    }

    /**
     * Show the form for editing the specified Instalacion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $instalacion = $this->instalacionRepository->find($id);

        if (empty($instalacion)) {
            Flash::error('Instalacion not found');

            return redirect(route('instalacions.index'));
        }

        return view('instalacions.edit')->with('instalacion', $instalacion);
    }

    /**
     * Update the specified Instalacion in storage.
     *
     * @param int $id
     * @param UpdateInstalacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInstalacionRequest $request)
    {
        $instalacion = $this->instalacionRepository->find($id);

        if (empty($instalacion)) {
            Flash::error('Instalacion not found');

            return redirect(route('instalacions.index'));
        }

        $instalacion = $this->instalacionRepository->update($request->all(), $id);

        Flash::success('Instalacion updated successfully.');

        return redirect(route('instalacions.index'));
    }

    /**
     * Remove the specified Instalacion from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $instalacion = $this->instalacionRepository->find($id);

        if (empty($instalacion)) {
            Flash::error('Instalacion not found');

            return redirect(route('instalacions.index'));
        }

        $this->instalacionRepository->delete($id);

        Flash::success('Instalacion deleted successfully.');

        return redirect(route('instalacions.index'));
    }
}
