<?php

namespace App\Http\Controllers\Adm;

use App\DataTables\Adm\TextoDataTable;
use App\Http\Requests\Adm;
use App\Http\Requests\Adm\CreateTextoRequest;
use App\Http\Requests\Adm\UpdateTextoRequest;
use App\Repositories\Adm\TextoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class TextoController extends AppBaseController
{
    /** @var  TextoRepository */
    private $textoRepository;

    public function __construct(TextoRepository $textoRepo)
    {
        $this->textoRepository = $textoRepo;
    }

    /**
     * Display a listing of the Texto.
     *
     * @param TextoDataTable $textoDataTable
     * @return Response
     */
    public function index(TextoDataTable $textoDataTable)
    {
        return $textoDataTable->render('adm.textos.index');
    }

    /**
     * Show the form for creating a new Texto.
     *
     * @return Response
     */
    public function create()
    {
        return view('adm.textos.create');
    }

    /**
     * Store a newly created Texto in storage.
     *
     * @param CreateTextoRequest $request
     *
     * @return Response
     */
    public function store(CreateTextoRequest $request)
    {
        $input = $request->all();

        $texto = $this->textoRepository->create($input);

        Flash::success('Texto saved successfully.');

        return redirect(route('adm.textos.index'));
    }

    /**
     * Display the specified Texto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $texto = $this->textoRepository->find($id);

        if (empty($texto)) {
            Flash::error('Texto not found');

            return redirect(route('adm.textos.index'));
        }

        return view('adm.textos.show')->with('texto', $texto);
    }

    /**
     * Show the form for editing the specified Texto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $texto = $this->textoRepository->find($id);

        if (empty($texto)) {
            Flash::error('Texto not found');

            return redirect(route('adm.textos.index'));
        }

        return view('adm.textos.edit')->with('texto', $texto);
    }

    /**
     * Update the specified Texto in storage.
     *
     * @param  int              $id
     * @param UpdateTextoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTextoRequest $request)
    {
        $texto = $this->textoRepository->find($id);

        if (empty($texto)) {
            Flash::error('Texto not found');

            return redirect(route('adm.textos.index'));
        }

        $texto = $this->textoRepository->update($request->all(), $id);

        Flash::success('Texto updated successfully.');

        return redirect(route('adm.textos.index'));
    }

    /**
     * Remove the specified Texto from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $texto = $this->textoRepository->find($id);

        if (empty($texto)) {
            Flash::error('Texto not found');

            return redirect(route('adm.textos.index'));
        }

        $this->textoRepository->delete($id);

        Flash::success('Texto deleted successfully.');

        return redirect(route('adm.textos.index'));
    }
}
