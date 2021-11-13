<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateareaAPIRequest;
use App\Http\Requests\API\UpdateareaAPIRequest;
use App\Models\area;
use App\Repositories\areaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class areaController
 * @package App\Http\Controllers\API
 */

class areaAPIController extends AppBaseController
{
    /** @var  areaRepository */
    private $areaRepository;

    public function __construct(areaRepository $areaRepo)
    {
        $this->areaRepository = $areaRepo;
    }

    /**
     * Display a listing of the area.
     * GET|HEAD /areas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $areas = $this->areaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($areas->toArray(), 'Areas retrieved successfully');
    }

    /**
     * Store a newly created area in storage.
     * POST /areas
     *
     * @param CreateareaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateareaAPIRequest $request)
    {
        $input = $request->all();

        $area = $this->areaRepository->create($input);

        return $this->sendResponse($area->toArray(), 'Area saved successfully');
    }

    /**
     * Display the specified area.
     * GET|HEAD /areas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var area $area */
        $area = $this->areaRepository->find($id);

        if (empty($area)) {
            return $this->sendError('Area not found');
        }

        return $this->sendResponse($area->toArray(), 'Area retrieved successfully');
    }

    /**
     * Update the specified area in storage.
     * PUT/PATCH /areas/{id}
     *
     * @param int $id
     * @param UpdateareaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateareaAPIRequest $request)
    {
        $input = $request->all();

        /** @var area $area */
        $area = $this->areaRepository->find($id);

        if (empty($area)) {
            return $this->sendError('Area not found');
        }

        $area = $this->areaRepository->update($input, $id);

        return $this->sendResponse($area->toArray(), 'area updated successfully');
    }

    /**
     * Remove the specified area from storage.
     * DELETE /areas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var area $area */
        $area = $this->areaRepository->find($id);

        if (empty($area)) {
            return $this->sendError('Area not found');
        }

        $area->delete();

        return $this->sendSuccess('Area deleted successfully');
    }
}
