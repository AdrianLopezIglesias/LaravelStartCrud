<?php

namespace App\Http\Controllers\API\Adm;

use App\Http\Requests\API\Adm\CreateTecnologiaAPIRequest;
use App\Http\Requests\API\Adm\UpdateTecnologiaAPIRequest;
use App\Models\Adm\Tecnologia;
use App\Repositories\Adm\TecnologiaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TecnologiaController
 * @package App\Http\Controllers\API\Adm
 */

class TecnologiaAPIController extends AppBaseController
{
    /** @var  TecnologiaRepository */
    private $tecnologiaRepository;

    public function __construct(TecnologiaRepository $tecnologiaRepo)
    {
        $this->tecnologiaRepository = $tecnologiaRepo;
    }

    /**
     * Display a listing of the Tecnologia.
     * GET|HEAD /tecnologias
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tecnologias = $this->tecnologiaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
        $tec = [];
        foreach ($tecnologias as $t) {
            $tec[$t->id] = ['id' => $t->id, 'experiencia' => $t->experiencia, 'name' => $t->nombre, 'tipo' => $t->area];
        }
        return $tec;
        return $this->sendResponse($tecnologias->toArray(), 'Tecnologias retrieved successfully');
    }

    /**
     * Store a newly created Tecnologia in storage.
     * POST /tecnologias
     *
     * @param CreateTecnologiaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTecnologiaAPIRequest $request)
    {
        $input = $request->all();

        $tecnologia = $this->tecnologiaRepository->create($input);

        return $this->sendResponse($tecnologia->toArray(), 'Tecnologia saved successfully');
    }

    /**
     * Display the specified Tecnologia.
     * GET|HEAD /tecnologias/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Tecnologia $tecnologia */
        $tecnologia = $this->tecnologiaRepository->find($id);

        if (empty($tecnologia)) {
            return $this->sendError('Tecnologia not found');
        }

        return $this->sendResponse($tecnologia->toArray(), 'Tecnologia retrieved successfully');
    }

    /**
     * Update the specified Tecnologia in storage.
     * PUT/PATCH /tecnologias/{id}
     *
     * @param int $id
     * @param UpdateTecnologiaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTecnologiaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Tecnologia $tecnologia */
        $tecnologia = $this->tecnologiaRepository->find($id);

        if (empty($tecnologia)) {
            return $this->sendError('Tecnologia not found');
        }

        $tecnologia = $this->tecnologiaRepository->update($input, $id);

        return $this->sendResponse($tecnologia->toArray(), 'Tecnologia updated successfully');
    }

    /**
     * Remove the specified Tecnologia from storage.
     * DELETE /tecnologias/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Tecnologia $tecnologia */
        $tecnologia = $this->tecnologiaRepository->find($id);

        if (empty($tecnologia)) {
            return $this->sendError('Tecnologia not found');
        }

        $tecnologia->delete();

        return $this->sendSuccess('Tecnologia deleted successfully');
    }
}
