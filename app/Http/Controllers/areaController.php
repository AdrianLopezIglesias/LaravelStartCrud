<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateareaRequest;
use App\Http\Requests\UpdateareaRequest;
use App\Repositories\areaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class areaController extends AppBaseController
{
    /** @var  areaRepository */
    private $areaRepository;

    public function __construct(areaRepository $areaRepo)
    {
        $this->areaRepository = $areaRepo;
    }

    /**
     * Display a listing of the area.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $areas = $this->areaRepository->paginate(10);

        return view('areas.index')
            ->with('areas', $areas);
    }

    /**
     * Show the form for creating a new area.
     *
     * @return Response
     */
    public function create()
    {
        return view('areas.create');
    }

    /**
     * Store a newly created area in storage.
     *
     * @param CreateareaRequest $request
     *
     * @return Response
     */
    public function store(CreateareaRequest $request)
    {
        $input = $request->all();

        $area = $this->areaRepository->create($input);

        Flash::success('Area saved successfully.');

        return redirect(route('areas.index'));
    }

    /**
     * Display the specified area.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $area = $this->areaRepository->find($id);

        if (empty($area)) {
            Flash::error('Area not found');

            return redirect(route('areas.index'));
        }

        return view('areas.show')->with('area', $area);
    }

    /**
     * Show the form for editing the specified area.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $area = $this->areaRepository->find($id);

        if (empty($area)) {
            Flash::error('Area not found');

            return redirect(route('areas.index'));
        }

        return view('areas.edit')->with('area', $area);
    }

    /**
     * Update the specified area in storage.
     *
     * @param int $id
     * @param UpdateareaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateareaRequest $request)
    {
        $area = $this->areaRepository->find($id);

        if (empty($area)) {
            Flash::error('Area not found');

            return redirect(route('areas.index'));
        }

        $area = $this->areaRepository->update($request->all(), $id);

        Flash::success('Area updated successfully.');

        return redirect(route('areas.index'));
    }

    /**
     * Remove the specified area from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $area = $this->areaRepository->find($id);

        if (empty($area)) {
            Flash::error('Area not found');

            return redirect(route('areas.index'));
        }

        $this->areaRepository->delete($id);

        Flash::success('Area deleted successfully.');

        return redirect(route('areas.index'));
    }
}
