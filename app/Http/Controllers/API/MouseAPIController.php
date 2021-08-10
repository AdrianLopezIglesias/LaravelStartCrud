<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMouseAPIRequest;
use App\Http\Requests\API\UpdateMouseAPIRequest;
use App\Models\Mouse;
use App\Repositories\MouseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MouseController
 * @package App\Http\Controllers\API
 */

class MouseAPIController extends AppBaseController
{
    /** @var  MouseRepository */
    private $mouseRepository;

    public function __construct(MouseRepository $mouseRepo)
    {
        $this->mouseRepository = $mouseRepo;
    }

    /**
     * Display a listing of the Mouse.
     * GET|HEAD /mice
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $mice = $this->mouseRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($mice->toArray(), 'Mice retrieved successfully');
    }

    /**
     * Store a newly created Mouse in storage.
     * POST /mice
     *
     * @param CreateMouseAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMouseAPIRequest $request)
    {
        $input = $request->all();

        $mouse = $this->mouseRepository->create($input);

        return $this->sendResponse($mouse->toArray(), 'Mouse saved successfully');
    }

    /**
     * Display the specified Mouse.
     * GET|HEAD /mice/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Mouse $mouse */
        $mouse = $this->mouseRepository->find($id);

        if (empty($mouse)) {
            return $this->sendError('Mouse not found');
        }

        return $this->sendResponse($mouse->toArray(), 'Mouse retrieved successfully');
    }

    /**
     * Update the specified Mouse in storage.
     * PUT/PATCH /mice/{id}
     *
     * @param int $id
     * @param UpdateMouseAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMouseAPIRequest $request)
    {
        $input = $request->all();

        /** @var Mouse $mouse */
        $mouse = $this->mouseRepository->find($id);

        if (empty($mouse)) {
            return $this->sendError('Mouse not found');
        }

        $mouse = $this->mouseRepository->update($input, $id);

        return $this->sendResponse($mouse->toArray(), 'Mouse updated successfully');
    }

    /**
     * Remove the specified Mouse from storage.
     * DELETE /mice/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Mouse $mouse */
        $mouse = $this->mouseRepository->find($id);

        if (empty($mouse)) {
            return $this->sendError('Mouse not found');
        }

        $mouse->delete();

        return $this->sendSuccess('Mouse deleted successfully');
    }
}
