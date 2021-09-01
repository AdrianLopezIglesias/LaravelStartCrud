<?php

namespace App\Http\Controllers\API\Adm;

use App\Http\Requests\API\Adm\CreateProjectimageAPIRequest;
use App\Http\Requests\API\Adm\UpdateProjectimageAPIRequest;
use App\Models\Adm\Projectimage;
use App\Repositories\Adm\ProjectimageRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ProjectimageController
 * @package App\Http\Controllers\API\Adm
 */

class ProjectimageAPIController extends AppBaseController
{
    /** @var  ProjectimageRepository */
    private $projectimageRepository;

    public function __construct(ProjectimageRepository $projectimageRepo)
    {
        $this->projectimageRepository = $projectimageRepo;
    }

    /**
     * Display a listing of the Projectimage.
     * GET|HEAD /projectimages
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $projectimages = $this->projectimageRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($projectimages->toArray(), 'Projectimages retrieved successfully');
    }

    /**
     * Store a newly created Projectimage in storage.
     * POST /projectimages
     *
     * @param CreateProjectimageAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProjectimageAPIRequest $request)
    {
        $input = $request->all();

        $projectimage = $this->projectimageRepository->create($input);

        return $this->sendResponse($projectimage->toArray(), 'Projectimage saved successfully');
    }

    /**
     * Display the specified Projectimage.
     * GET|HEAD /projectimages/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Projectimage $projectimage */
        $projectimage = $this->projectimageRepository->find($id);

        if (empty($projectimage)) {
            return $this->sendError('Projectimage not found');
        }

        return $this->sendResponse($projectimage->toArray(), 'Projectimage retrieved successfully');
    }

    /**
     * Update the specified Projectimage in storage.
     * PUT/PATCH /projectimages/{id}
     *
     * @param int $id
     * @param UpdateProjectimageAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProjectimageAPIRequest $request)
    {
        $input = $request->all();

        /** @var Projectimage $projectimage */
        $projectimage = $this->projectimageRepository->find($id);

        if (empty($projectimage)) {
            return $this->sendError('Projectimage not found');
        }

        $projectimage = $this->projectimageRepository->update($input, $id);

        return $this->sendResponse($projectimage->toArray(), 'Projectimage updated successfully');
    }

    /**
     * Remove the specified Projectimage from storage.
     * DELETE /projectimages/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Projectimage $projectimage */
        $projectimage = $this->projectimageRepository->find($id);

        if (empty($projectimage)) {
            return $this->sendError('Projectimage not found');
        }

        $projectimage->delete();

        return $this->sendSuccess('Projectimage deleted successfully');
    }
}
