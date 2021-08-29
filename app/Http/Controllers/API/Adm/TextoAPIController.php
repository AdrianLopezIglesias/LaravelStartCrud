<?php

namespace App\Http\Controllers\API\Adm;

use App\Http\Requests\API\Adm\CreateTextoAPIRequest;
use App\Http\Requests\API\Adm\UpdateTextoAPIRequest;
use App\Models\Adm\Texto;
use App\Repositories\Adm\TextoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TextoController
 * @package App\Http\Controllers\API\Adm
 */

class TextoAPIController extends AppBaseController
{
    /** @var  TextoRepository */
    private $textoRepository;

    public function __construct(TextoRepository $textoRepo)
    {
        $this->textoRepository = $textoRepo;
    }

    /**
     * Display a listing of the Texto.
     * GET|HEAD /textos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $textos = $this->textoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
        $es = [];
        foreach ($textos as $t){
            $es[$t->value] = $t->es;
        }
        $en = [];
        foreach ($textos as $t) {
            $en[$t->value] = $t->en;
        }
        return ['es'=> $es, 'en'=>$en];
        return $this->sendResponse($textos->toArray(), 'Textos retrieved successfully');
    }

    /**
     * Store a newly created Texto in storage.
     * POST /textos
     *
     * @param CreateTextoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTextoAPIRequest $request)
    {
        $input = $request->all();

        $texto = $this->textoRepository->create($input);

        return $this->sendResponse($texto->toArray(), 'Texto saved successfully');
    }

    /**
     * Display the specified Texto.
     * GET|HEAD /textos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Texto $texto */
        $texto = $this->textoRepository->find($id);

        if (empty($texto)) {
            return $this->sendError('Texto not found');
        }

        return $this->sendResponse($texto->toArray(), 'Texto retrieved successfully');
    }

    /**
     * Update the specified Texto in storage.
     * PUT/PATCH /textos/{id}
     *
     * @param int $id
     * @param UpdateTextoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTextoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Texto $texto */
        $texto = $this->textoRepository->find($id);

        if (empty($texto)) {
            return $this->sendError('Texto not found');
        }

        $texto = $this->textoRepository->update($input, $id);

        return $this->sendResponse($texto->toArray(), 'Texto updated successfully');
    }

    /**
     * Remove the specified Texto from storage.
     * DELETE /textos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Texto $texto */
        $texto = $this->textoRepository->find($id);

        if (empty($texto)) {
            return $this->sendError('Texto not found');
        }

        $texto->delete();

        return $this->sendSuccess('Texto deleted successfully');
    }
}
