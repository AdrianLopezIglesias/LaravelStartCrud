<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateClienteAPIRequest;
use App\Http\Requests\API\UpdateClienteAPIRequest;
use App\Models\Cliente;
use App\Repositories\ClienteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ClienteController
 * @package App\Http\Controllers\API
 */

class ClienteAPIController extends AppBaseController
{
    /** @var  ClienteRepository */
    private $clienteRepository;

    public function __construct(ClienteRepository $clienteRepo)
    {
        $this->clienteRepository = $clienteRepo;
    }

    /**
     * Display a listing of the Cliente.
     * GET|HEAD /clientes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $clientes = $this->clienteRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($clientes->toArray(), 'Clientes retrieved successfully');
    }

    /**
     * Store a newly created Cliente in storage.
     * POST /clientes
     *
     * @param CreateClienteAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateClienteAPIRequest $request)
    {
        $input = $request->all();

        $cliente = $this->clienteRepository->create($input);

        return $this->sendResponse($cliente->toArray(), 'Cliente saved successfully');
    }

    /**
     * Display the specified Cliente.
     * GET|HEAD /clientes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Cliente $cliente */
        $cliente = $this->clienteRepository->find($id);

        if (empty($cliente)) {
            return $this->sendError('Cliente not found');
        }

        return $this->sendResponse($cliente->toArray(), 'Cliente retrieved successfully');
    }

    /**
     * Update the specified Cliente in storage.
     * PUT/PATCH /clientes/{id}
     *
     * @param int $id
     * @param UpdateClienteAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClienteAPIRequest $request)
    {
        $input = $request->all();

        /** @var Cliente $cliente */
        $cliente = $this->clienteRepository->find($id);

        if (empty($cliente)) {
            return $this->sendError('Cliente not found');
        }

        $cliente = $this->clienteRepository->update($input, $id);

        return $this->sendResponse($cliente->toArray(), 'Cliente updated successfully');
    }

    /**
     * Remove the specified Cliente from storage.
     * DELETE /clientes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Cliente $cliente */
        $cliente = $this->clienteRepository->find($id);

        if (empty($cliente)) {
            return $this->sendError('Cliente not found');
        }

        $cliente->delete();

        return $this->sendSuccess('Cliente deleted successfully');
    }
}
