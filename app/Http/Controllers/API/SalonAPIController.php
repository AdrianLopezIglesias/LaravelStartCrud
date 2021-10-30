<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSalonAPIRequest;
use App\Http\Requests\API\UpdateSalonAPIRequest;
use App\Models\Salon;
use App\Repositories\SalonRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SalonController
 * @package App\Http\Controllers\API
 */

class SalonAPIController extends AppBaseController
{
    /** @var  SalonRepository */
    private $salonRepository;

    public function __construct(SalonRepository $salonRepo)
    {
        $this->salonRepository = $salonRepo;
    }

    /**
     * Display a listing of the Salon.
     * GET|HEAD /salons
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $salons = $this->salonRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($salons->toArray(), 'Salons retrieved successfully');
    }

    /**
     * Store a newly created Salon in storage.
     * POST /salons
     *
     * @param CreateSalonAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSalonAPIRequest $request)
    {
        $input = $request->all();

        $salon = $this->salonRepository->create($input);

        return $this->sendResponse($salon->toArray(), 'Salon saved successfully');
    }

    /**
     * Display the specified Salon.
     * GET|HEAD /salons/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Salon $salon */
        $salon = $this->salonRepository->find($id);

        if (empty($salon)) {
            return $this->sendError('Salon not found');
        }

        return $this->sendResponse($salon->toArray(), 'Salon retrieved successfully');
    }

    /**
     * Update the specified Salon in storage.
     * PUT/PATCH /salons/{id}
     *
     * @param int $id
     * @param UpdateSalonAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSalonAPIRequest $request)
    {
        $input = $request->all();

        /** @var Salon $salon */
        $salon = $this->salonRepository->find($id);

        if (empty($salon)) {
            return $this->sendError('Salon not found');
        }

        $salon = $this->salonRepository->update($input, $id);

        return $this->sendResponse($salon->toArray(), 'Salon updated successfully');
    }

    /**
     * Remove the specified Salon from storage.
     * DELETE /salons/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Salon $salon */
        $salon = $this->salonRepository->find($id);

        if (empty($salon)) {
            return $this->sendError('Salon not found');
        }

        $salon->delete();

        return $this->sendSuccess('Salon deleted successfully');
    }
}
