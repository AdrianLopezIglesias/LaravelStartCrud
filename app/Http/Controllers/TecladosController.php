<?php

namespace App\Http\Controllers;

use App\DataTables\TecladosDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTecladosRequest;
use App\Http\Requests\UpdateTecladosRequest;
use App\Repositories\TecladosRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class TecladosController extends AppBaseController
{
    /** @var  TecladosRepository */
    private $tecladosRepository;

    public function __construct(TecladosRepository $tecladosRepo)
    {
        $this->tecladosRepository = $tecladosRepo;
    }

    /**
     * Display a listing of the Teclados.
     *
     * @param TecladosDataTable $tecladosDataTable
     * @return Response
     */
    public function index(TecladosDataTable $tecladosDataTable)
    {
        return $tecladosDataTable->render('teclados.index');
    }

    /**
     * Show the form for creating a new Teclados.
     *
     * @return Response
     */
    public function create()
    {
        return view('teclados.create');
    }

    /**
     * Store a newly created Teclados in storage.
     *
     * @param CreateTecladosRequest $request
     *
     * @return Response
     */
    public function store(CreateTecladosRequest $request)
    {
        $input = $request->all();

        $teclados = $this->tecladosRepository->create($input);

        Flash::success('Teclados saved successfully.');

        return redirect(route('teclados.index'));
    }

    /**
     * Display the specified Teclados.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $teclados = $this->tecladosRepository->find($id);

        if (empty($teclados)) {
            Flash::error('Teclados not found');

            return redirect(route('teclados.index'));
        }

        return view('teclados.show')->with('teclados', $teclados);
    }

    /**
     * Show the form for editing the specified Teclados.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $teclados = $this->tecladosRepository->find($id);

        if (empty($teclados)) {
            Flash::error('Teclados not found');

            return redirect(route('teclados.index'));
        }

        return view('teclados.edit')->with('teclados', $teclados);
    }

    /**
     * Update the specified Teclados in storage.
     *
     * @param  int              $id
     * @param UpdateTecladosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTecladosRequest $request)
    {
        $teclados = $this->tecladosRepository->find($id);

        if (empty($teclados)) {
            Flash::error('Teclados not found');

            return redirect(route('teclados.index'));
        }

        $teclados = $this->tecladosRepository->update($request->all(), $id);

        Flash::success('Teclados updated successfully.');

        return redirect(route('teclados.index'));
    }

    /**
     * Remove the specified Teclados from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $teclados = $this->tecladosRepository->find($id);

        if (empty($teclados)) {
            Flash::error('Teclados not found');

            return redirect(route('teclados.index'));
        }

        $this->tecladosRepository->delete($id);

        Flash::success('Teclados deleted successfully.');

        return redirect(route('teclados.index'));
    }
}
