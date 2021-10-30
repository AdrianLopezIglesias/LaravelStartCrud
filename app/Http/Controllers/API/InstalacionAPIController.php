<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateInstalacionAPIRequest;
use App\Http\Requests\API\UpdateInstalacionAPIRequest;
use App\Models\Instalacion;
use App\Repositories\InstalacionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class InstalacionController
 * @package App\Http\Controllers\API
 */

class InstalacionAPIController extends AppBaseController
{
    /** @var  InstalacionRepository */
    private $instalacionRepository;

    public function __construct(InstalacionRepository $instalacionRepo)
    {
        $this->instalacionRepository = $instalacionRepo;
    }

    /**
     * Display a listing of the Instalacion.
     * GET|HEAD /instalacions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $instalacions = $this->instalacionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($instalacions->toArray(), 'Instalacions retrieved successfully');
    }

    /**
     * Store a newly created Instalacion in storage.
     * POST /instalacions
     *
     * @param CreateInstalacionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateInstalacionAPIRequest $request)
    {
        $input = $request->all();

        $instalacion = $this->instalacionRepository->create($input);

        return $this->sendResponse($instalacion->toArray(), 'Instalacion saved successfully');
    }

    /**
     * Display the specified Instalacion.
     * GET|HEAD /instalacions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Instalacion $instalacion */
        $instalacion = $this->instalacionRepository->find($id);

        if (empty($instalacion)) {
            return $this->sendError('Instalacion not found');
        }

        return $this->sendResponse($instalacion->toArray(), 'Instalacion retrieved successfully');
    }

    /**
     * Update the specified Instalacion in storage.
     * PUT/PATCH /instalacions/{id}
     *
     * @param int $id
     * @param UpdateInstalacionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInstalacionAPIRequest $request)
    {
        $input = $request->all();

        /** @var Instalacion $instalacion */
        $instalacion = $this->instalacionRepository->find($id);

        if (empty($instalacion)) {
            return $this->sendError('Instalacion not found');
        }

        $instalacion = $this->instalacionRepository->update($input, $id);

        return $this->sendResponse($instalacion->toArray(), 'Instalacion updated successfully');
    }

    /**
     * Remove the specified Instalacion from storage.
     * DELETE /instalacions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Instalacion $instalacion */
        $instalacion = $this->instalacionRepository->find($id);

        if (empty($instalacion)) {
            return $this->sendError('Instalacion not found');
        }

        $instalacion->delete();

        return $this->sendSuccess('Instalacion deleted successfully');
    }
}
