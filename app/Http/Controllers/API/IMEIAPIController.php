<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateIMEIAPIRequest;
use App\Http\Requests\API\UpdateIMEIAPIRequest;
use App\Models\IMEI;
use App\Repositories\IMEIRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class IMEIController
 * @package App\Http\Controllers\API
 */

class IMEIAPIController extends AppBaseController
{
    /** @var  IMEIRepository */
    private $iMEIRepository;

    public function __construct(IMEIRepository $iMEIRepo)
    {
        $this->iMEIRepository = $iMEIRepo;
    }

    /**
     * Display a listing of the IMEI.
     * GET|HEAD /iMEIS
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $iMEIS = $this->iMEIRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($iMEIS->toArray(), 'I M E I S retrieved successfully');
    }

    /**
     * Store a newly created IMEI in storage.
     * POST /iMEIS
     *
     * @param CreateIMEIAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateIMEIAPIRequest $request)
    {
        $input = $request->all();

        $iMEI = $this->iMEIRepository->create($input);

        return $this->sendResponse($iMEI->toArray(), 'I M E I saved successfully');
    }

    /**
     * Display the specified IMEI.
     * GET|HEAD /iMEIS/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var IMEI $iMEI */
        $iMEI = $this->iMEIRepository->find($id);

        if (empty($iMEI)) {
            return $this->sendError('I M E I not found');
        }

        return $this->sendResponse($iMEI->toArray(), 'I M E I retrieved successfully');
    }

    /**
     * Update the specified IMEI in storage.
     * PUT/PATCH /iMEIS/{id}
     *
     * @param int $id
     * @param UpdateIMEIAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIMEIAPIRequest $request)
    {
        $input = $request->all();

        /** @var IMEI $iMEI */
        $iMEI = $this->iMEIRepository->find($id);

        if (empty($iMEI)) {
            return $this->sendError('I M E I not found');
        }

        $iMEI = $this->iMEIRepository->update($input, $id);

        return $this->sendResponse($iMEI->toArray(), 'IMEI updated successfully');
    }

    /**
     * Remove the specified IMEI from storage.
     * DELETE /iMEIS/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var IMEI $iMEI */
        $iMEI = $this->iMEIRepository->find($id);

        if (empty($iMEI)) {
            return $this->sendError('I M E I not found');
        }

        $iMEI->delete();

        return $this->sendSuccess('I M E I deleted successfully');
    }
}
