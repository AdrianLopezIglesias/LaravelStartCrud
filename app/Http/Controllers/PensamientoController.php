<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePensamientoRequest;
use App\Http\Requests\UpdatePensamientoRequest;
use App\Repositories\PensamientoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PensamientoController extends AppBaseController
{
    /** @var  PensamientoRepository */
    private $pensamientoRepository;

    public function __construct(PensamientoRepository $pensamientoRepo)
    {
        $this->pensamientoRepository = $pensamientoRepo;
    }

    /**
     * Display a listing of the Pensamiento.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $pensamientos = $this->pensamientoRepository->paginate(10);

        return view('pensamientos.index')
            ->with('pensamientos', $pensamientos);
    }

    /**
     * Show the form for creating a new Pensamiento.
     *
     * @return Response
     */
    public function create()
    {
        return view('pensamientos.create');
    }

    /**
     * Store a newly created Pensamiento in storage.
     *
     * @param CreatePensamientoRequest $request
     *
     * @return Response
     */
    public function store(CreatePensamientoRequest $request)
    {
        $input = $request->all();

        $pensamiento = $this->pensamientoRepository->create($input);

        Flash::success('Pensamiento saved successfully.');

        return redirect(route('pensamientos.index'));
    }

    /**
     * Display the specified Pensamiento.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pensamiento = $this->pensamientoRepository->find($id);

        if (empty($pensamiento)) {
            Flash::error('Pensamiento not found');

            return redirect(route('pensamientos.index'));
        }

        return view('pensamientos.show')->with('pensamiento', $pensamiento);
    }

    /**
     * Show the form for editing the specified Pensamiento.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pensamiento = $this->pensamientoRepository->find($id);

        if (empty($pensamiento)) {
            Flash::error('Pensamiento not found');

            return redirect(route('pensamientos.index'));
        }

        return view('pensamientos.edit')->with('pensamiento', $pensamiento);
    }

    /**
     * Update the specified Pensamiento in storage.
     *
     * @param int $id
     * @param UpdatePensamientoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePensamientoRequest $request)
    {
        $pensamiento = $this->pensamientoRepository->find($id);

        if (empty($pensamiento)) {
            Flash::error('Pensamiento not found');

            return redirect(route('pensamientos.index'));
        }

        $pensamiento = $this->pensamientoRepository->update($request->all(), $id);

        Flash::success('Pensamiento updated successfully.');

        return redirect(route('pensamientos.index'));
    }

    /**
     * Remove the specified Pensamiento from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pensamiento = $this->pensamientoRepository->find($id);

        if (empty($pensamiento)) {
            Flash::error('Pensamiento not found');

            return redirect(route('pensamientos.index'));
        }

        $this->pensamientoRepository->delete($id);

        Flash::success('Pensamiento deleted successfully.');

        return redirect(route('pensamientos.index'));
    }
}
