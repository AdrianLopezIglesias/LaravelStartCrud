<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMensajeAPIRequest;
use App\Http\Requests\API\UpdateMensajeAPIRequest;
use App\Models\Mensaje;
use App\Repositories\MensajeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MensajeController
 * @package App\Http\Controllers\API
 */

class MensajeAPIController extends AppBaseController
{
    /** @var  MensajeRepository */
    private $mensajeRepository;

    public function __construct(MensajeRepository $mensajeRepo)
    {
        $this->mensajeRepository = $mensajeRepo;
    }

    /**
     * Display a listing of the Mensaje.
     * GET|HEAD /mensajes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $mensajes = $this->mensajeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($mensajes->toArray(), 'Mensajes retrieved successfully');
    }

    /**
     * Store a newly created Mensaje in storage.
     * POST /mensajes
     *
     * @param CreateMensajeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMensajeAPIRequest $request)
    {
        $input = $request->all();

        $mensaje = $this->mensajeRepository->create($input);

        return $this->sendResponse($mensaje->toArray(), 'Mensaje saved successfully');
    }

    /**
     * Display the specified Mensaje.
     * GET|HEAD /mensajes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Mensaje $mensaje */
        $mensaje = $this->mensajeRepository->find($id);

        if (empty($mensaje)) {
            return $this->sendError('Mensaje not found');
        }

        return $this->sendResponse($mensaje->toArray(), 'Mensaje retrieved successfully');
    }

    /**
     * Update the specified Mensaje in storage.
     * PUT/PATCH /mensajes/{id}
     *
     * @param int $id
     * @param UpdateMensajeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMensajeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Mensaje $mensaje */
        $mensaje = $this->mensajeRepository->find($id);

        if (empty($mensaje)) {
            return $this->sendError('Mensaje not found');
        }

        $mensaje = $this->mensajeRepository->update($input, $id);

        return $this->sendResponse($mensaje->toArray(), 'Mensaje updated successfully');
    }

    /**
     * Remove the specified Mensaje from storage.
     * DELETE /mensajes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Mensaje $mensaje */
        $mensaje = $this->mensajeRepository->find($id);

        if (empty($mensaje)) {
            return $this->sendError('Mensaje not found');
        }

        $mensaje->delete();

        return $this->sendSuccess('Mensaje deleted successfully');
    }
}
