<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTecladosAPIRequest;
use App\Http\Requests\API\UpdateTecladosAPIRequest;
use App\Models\Teclados;
use App\Repositories\TecladosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TecladosController
 * @package App\Http\Controllers\API
 */

class TecladosAPIController extends AppBaseController
{
    /** @var  TecladosRepository */
    private $tecladosRepository;

    public function __construct(TecladosRepository $tecladosRepo)
    {
        $this->tecladosRepository = $tecladosRepo;
    }

    /**
     * Display a listing of the Teclados.
     * GET|HEAD /teclados
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $teclados = $this->tecladosRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($teclados->toArray(), 'Teclados retrieved successfully');
    }

    /**
     * Store a newly created Teclados in storage.
     * POST /teclados
     *
     * @param CreateTecladosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTecladosAPIRequest $request)
    {
        $input = $request->all();

        $teclados = $this->tecladosRepository->create($input);

        return $this->sendResponse($teclados->toArray(), 'Teclados saved successfully');
    }

    /**
     * Display the specified Teclados.
     * GET|HEAD /teclados/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Teclados $teclados */
        $teclados = $this->tecladosRepository->find($id);

        if (empty($teclados)) {
            return $this->sendError('Teclados not found');
        }

        return $this->sendResponse($teclados->toArray(), 'Teclados retrieved successfully');
    }

    /**
     * Update the specified Teclados in storage.
     * PUT/PATCH /teclados/{id}
     *
     * @param int $id
     * @param UpdateTecladosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTecladosAPIRequest $request)
    {
        $input = $request->all();

        /** @var Teclados $teclados */
        $teclados = $this->tecladosRepository->find($id);

        if (empty($teclados)) {
            return $this->sendError('Teclados not found');
        }

        $teclados = $this->tecladosRepository->update($input, $id);

        return $this->sendResponse($teclados->toArray(), 'Teclados updated successfully');
    }

    /**
     * Remove the specified Teclados from storage.
     * DELETE /teclados/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Teclados $teclados */
        $teclados = $this->tecladosRepository->find($id);

        if (empty($teclados)) {
            return $this->sendError('Teclados not found');
        }

        $teclados->delete();

        return $this->sendSuccess('Teclados deleted successfully');
    }
}
