<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProfesionalAPIRequest;
use App\Http\Requests\API\UpdateProfesionalAPIRequest;
use App\Models\Profesional;
use App\Repositories\ProfesionalRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ProfesionalController
 * @package App\Http\Controllers\API
 */

class ProfesionalAPIController extends AppBaseController
{
    /** @var  ProfesionalRepository */
    private $profesionalRepository;

    public function __construct(ProfesionalRepository $profesionalRepo)
    {
        $this->profesionalRepository = $profesionalRepo;
    }

    /**
     * Display a listing of the Profesional.
     * GET|HEAD /profesionals
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $profesionals = $this->profesionalRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($profesionals->toArray(), 'Profesionals retrieved successfully');
    }

    /**
     * Store a newly created Profesional in storage.
     * POST /profesionals
     *
     * @param CreateProfesionalAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProfesionalAPIRequest $request)
    {
        $input = $request->all();

        $profesional = $this->profesionalRepository->create($input);

        return $this->sendResponse($profesional->toArray(), 'Profesional saved successfully');
    }

    /**
     * Display the specified Profesional.
     * GET|HEAD /profesionals/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Profesional $profesional */
        $profesional = $this->profesionalRepository->find($id);

        if (empty($profesional)) {
            return $this->sendError('Profesional not found');
        }

        return $this->sendResponse($profesional->toArray(), 'Profesional retrieved successfully');
    }

    /**
     * Update the specified Profesional in storage.
     * PUT/PATCH /profesionals/{id}
     *
     * @param int $id
     * @param UpdateProfesionalAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProfesionalAPIRequest $request)
    {
        $input = $request->all();

        /** @var Profesional $profesional */
        $profesional = $this->profesionalRepository->find($id);

        if (empty($profesional)) {
            return $this->sendError('Profesional not found');
        }

        $profesional = $this->profesionalRepository->update($input, $id);

        return $this->sendResponse($profesional->toArray(), 'Profesional updated successfully');
    }

    /**
     * Remove the specified Profesional from storage.
     * DELETE /profesionals/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Profesional $profesional */
        $profesional = $this->profesionalRepository->find($id);

        if (empty($profesional)) {
            return $this->sendError('Profesional not found');
        }

        $profesional->delete();

        return $this->sendSuccess('Profesional deleted successfully');
    }
}
