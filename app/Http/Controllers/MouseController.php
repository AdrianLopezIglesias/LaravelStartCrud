<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMouseRequest;
use App\Http\Requests\UpdateMouseRequest;
use App\Repositories\MouseRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MouseController extends AppBaseController
{
    /** @var  MouseRepository */
    private $mouseRepository;

    public function __construct(MouseRepository $mouseRepo)
    {
        $this->mouseRepository = $mouseRepo;
    }

    /**
     * Display a listing of the Mouse.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $mice = $this->mouseRepository->paginate(10);

        return view('mice.index')
            ->with('mice', $mice);
    }

    /**
     * Show the form for creating a new Mouse.
     *
     * @return Response
     */
    public function create()
    {
        return view('mice.create');
    }

    /**
     * Store a newly created Mouse in storage.
     *
     * @param CreateMouseRequest $request
     *
     * @return Response
     */
    public function store(CreateMouseRequest $request)
    {
        $input = $request->all();

        $mouse = $this->mouseRepository->create($input);

        Flash::success('Mouse saved successfully.');

        return redirect(route('mice.index'));
    }

    /**
     * Display the specified Mouse.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $mouse = $this->mouseRepository->find($id);

        if (empty($mouse)) {
            Flash::error('Mouse not found');

            return redirect(route('mice.index'));
        }

        return view('mice.show')->with('mouse', $mouse);
    }

    /**
     * Show the form for editing the specified Mouse.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $mouse = $this->mouseRepository->find($id);

        if (empty($mouse)) {
            Flash::error('Mouse not found');

            return redirect(route('mice.index'));
        }

        return view('mice.edit')->with('mouse', $mouse);
    }

    /**
     * Update the specified Mouse in storage.
     *
     * @param int $id
     * @param UpdateMouseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMouseRequest $request)
    {
        $mouse = $this->mouseRepository->find($id);

        if (empty($mouse)) {
            Flash::error('Mouse not found');

            return redirect(route('mice.index'));
        }

        $mouse = $this->mouseRepository->update($request->all(), $id);

        Flash::success('Mouse updated successfully.');

        return redirect(route('mice.index'));
    }

    /**
     * Remove the specified Mouse from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $mouse = $this->mouseRepository->find($id);

        if (empty($mouse)) {
            Flash::error('Mouse not found');

            return redirect(route('mice.index'));
        }

        $this->mouseRepository->delete($id);

        Flash::success('Mouse deleted successfully.');

        return redirect(route('mice.index'));
    }
}
