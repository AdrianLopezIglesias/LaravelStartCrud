<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePensamientoAPIRequest;
use App\Http\Requests\API\UpdatePensamientoAPIRequest;
use App\Models\Pensamiento;
use App\Repositories\PensamientoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PensamientoController
 * @package App\Http\Controllers\API
 */

class PensamientoAPIController extends AppBaseController {
    /** @var  PensamientoRepository */
    private $pensamientoRepository;

    public function __construct(PensamientoRepository $pensamientoRepo) {
        $this->pensamientoRepository = $pensamientoRepo;
    }

    /**
     * Display a listing of the Pensamiento.
     * GET|HEAD /pensamientos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $pensamientos = Pensamiento::orderBy('id', 'asc')->get();
        // $pensamientos = $this->pensamientoRepository->all(
        //     $request->except(['skip', 'limit']),
        //     $request->get('skip'),
        //     $request->get('limit'),
        // );
        $palabras = [];
        $etiquetas = [];
        foreach ($pensamientos as $pensamiento) {
            $p = explode(" ", $pensamiento->texto);
            foreach ($p as $palabra) {
                if (!in_array($palabra, $palabras)) {
                    array_push($palabras, $palabra);
                }
            }
            $e = $pensamiento->metadata;
            foreach ($pensamiento->metadata as $etiqueta) {
                if (!in_array($etiqueta, $etiquetas)) {
                    array_push($etiquetas, $etiqueta);
                }
            }
        }
        foreach ($pensamientos as $pensamiento) {
        }
        $response['pensamientos']  = $pensamientos;
        $response['etiquetas'] = $etiquetas;
        $response['palabras'] = $palabras;

        return response()->json($response);

        return $this->sendResponse($pensamientos->toArray(), 'Pensamientos retrieved successfully');
    }

    /**
     * Store a newly created Pensamiento in storage.
     * POST /pensamientos
     *
     * @param CreatePensamientoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePensamientoAPIRequest $request) {
        $input = $request->all();
        $input['metadata'] = json_encode($request->metadata);
        $pensamiento = $this->pensamientoRepository->create($input);


        return $this->sendResponse($pensamiento->toArray(), 'Pensamiento saved successfully');
    }

    /**
     * Display the specified Pensamiento.
     * GET|HEAD /pensamientos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id) {
        /** @var Pensamiento $pensamiento */
        $pensamiento = $this->pensamientoRepository->find($id);

        if (empty($pensamiento)) {
            return $this->sendError('Pensamiento not found');
        }


        return $this->sendResponse($pensamiento->toArray(), 'Pensamiento retrieved successfully');
    }

    /**
     * Update the specified Pensamiento in storage.
     * PUT/PATCH /pensamientos/{id}
     *
     * @param int $id
     * @param UpdatePensamientoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePensamientoAPIRequest $request) {
        try {

            $input = $request->all();
            dd($input);
            /** @var Pensamiento $pensamiento */
            $pensamiento = $this->pensamientoRepository->find($id);

            if (empty($pensamiento)) {
                return $this->sendError('Pensamiento not found');
            }

            $pensamiento = $this->pensamientoRepository->update($input, $id);

            return $this->sendResponse($pensamiento->toArray(), 'Pensamiento updated successfully');
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Remove the specified Pensamiento from storage.
     * DELETE /pensamientos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id) {
        /** @var Pensamiento $pensamiento */
        $pensamiento = $this->pensamientoRepository->find($id);

        if (empty($pensamiento)) {
            return $this->sendError('Pensamiento not found');
        }

        $pensamiento->delete();

        return $this->sendSuccess('Pensamiento deleted successfully');
    }
}
