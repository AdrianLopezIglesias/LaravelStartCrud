<?php

namespace App\Http\Controllers\Adm;

use App\DataTables\Adm\TecnologiaDataTable;
use App\Http\Requests\Adm;
use App\Http\Requests\Adm\CreateTecnologiaRequest;
use App\Http\Requests\Adm\UpdateTecnologiaRequest;
use App\Repositories\Adm\TecnologiaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class TecnologiaController extends AppBaseController
{
    /** @var  TecnologiaRepository */
    private $tecnologiaRepository;

    public function __construct(TecnologiaRepository $tecnologiaRepo)
    {
        $this->tecnologiaRepository = $tecnologiaRepo;
    }

    /**
     * Display a listing of the Tecnologia.
     *
     * @param TecnologiaDataTable $tecnologiaDataTable
     * @return Response
     */
    public function index(TecnologiaDataTable $tecnologiaDataTable)
    {
        return $tecnologiaDataTable->render('adm.tecnologias.index');
    }

    /**
     * Show the form for creating a new Tecnologia.
     *
     * @return Response
     */
    public function create()
    {
        return view('adm.tecnologias.create');
    }

    /**
     * Store a newly created Tecnologia in storage.
     *
     * @param CreateTecnologiaRequest $request
     *
     * @return Response
     */
    public function store(CreateTecnologiaRequest $request)
    {
        $input = $request->all();

        $tecnologia = $this->tecnologiaRepository->create($input);

        Flash::success('Tecnologia saved successfully.');

        return redirect(route('adm.tecnologias.index'));
    }

    /**
     * Display the specified Tecnologia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tecnologia = $this->tecnologiaRepository->find($id);

        if (empty($tecnologia)) {
            Flash::error('Tecnologia not found');

            return redirect(route('adm.tecnologias.index'));
        }

        return view('adm.tecnologias.show')->with('tecnologia', $tecnologia);
    }

    /**
     * Show the form for editing the specified Tecnologia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tecnologia = $this->tecnologiaRepository->find($id);

        if (empty($tecnologia)) {
            Flash::error('Tecnologia not found');

            return redirect(route('adm.tecnologias.index'));
        }

        return view('adm.tecnologias.edit')->with('tecnologia', $tecnologia);
    }

    /**
     * Update the specified Tecnologia in storage.
     *
     * @param  int              $id
     * @param UpdateTecnologiaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTecnologiaRequest $request)
    {
        $tecnologia = $this->tecnologiaRepository->find($id);

        if (empty($tecnologia)) {
            Flash::error('Tecnologia not found');

            return redirect(route('adm.tecnologias.index'));
        }

        $tecnologia = $this->tecnologiaRepository->update($request->all(), $id);

        Flash::success('Tecnologia updated successfully.');

        return redirect(route('adm.tecnologias.index'));
    }

    /**
     * Remove the specified Tecnologia from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tecnologia = $this->tecnologiaRepository->find($id);

        if (empty($tecnologia)) {
            Flash::error('Tecnologia not found');

            return redirect(route('adm.tecnologias.index'));
        }

        $this->tecnologiaRepository->delete($id);

        Flash::success('Tecnologia deleted successfully.');

        return redirect(route('adm.tecnologias.index'));
    }
}
