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
        $thoughts = Pensamiento::orderBy('id', 'asc')->get();
        // $thoughts = $this->thoughtRepository->all(
        //     $request->except(['skip', 'limit']),
        //     $request->get('skip'),
        //     $request->get('limit'),
        // );
        $words = [];
        $tags = [];
        foreach ($thoughts as $thought) {
            $p = explode(" ", $thought->texto);
            foreach ($p as $word) {
                if (!in_array($word, $words)) {
                    array_push($words, $word);
                }
            }
            $e = $thought->tags;
            foreach ($thought->tags as $etiqueta) {
                if (!in_array($etiqueta, $tags)) {
                    array_push($tags, $etiqueta);
                }
            }
        }
        foreach ($thoughts as $thought) {
        }
        $response['thoughts']  = $thoughts;
        $response['tags'] = $tags;
        $response['words'] = $words;

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
        $input['tags'] = json_encode($request->tags);
        $pensamiento = Pensamiento::create($input);


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
            /** @var Pensamiento $pensamiento */
            $pensamiento = $this->pensamientoRepository->find($id);

            if (empty($pensamiento)) {
                return $this->sendError('Pensamiento not found');
            }
            $pensamiento->tags = json_encode($request->tags);
            $pensamiento->texto = $request->texto;
            $pensamiento->save();
            // $pensamiento = $this->pensamientoRepository->update($input, $id);

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
    public function destroy(UpdatePensamientoAPIRequest $request) {
        $input = $request->all();
        foreach ($input as $id) {
            /** @var Pensamiento $pensamiento */
            $pensamiento = $this->pensamientoRepository->find($id);

            if (empty($pensamiento)) {
                break;
            }
            $pensamiento->delete();
        }

        return $this->sendResponse($input, 'Pensamiento deleted successfully');
    }
    public function editSelected(Request $request) {
        $input = $request->all();
        foreach ($input as $thought) {
            $pensamiento = Pensamiento::find($thought['id']);
            $pensamiento->tags = json_encode($thought['tags']);
            $pensamiento->save();
        }

        return $this->sendResponse($input, 'Thoughts updated');
    }
}
