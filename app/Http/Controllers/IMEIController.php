<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIMEIRequest;
use App\Http\Requests\UpdateIMEIRequest;
use App\Repositories\IMEIRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class IMEIController extends AppBaseController
{
    /** @var  IMEIRepository */
    private $iMEIRepository;

    public function __construct(IMEIRepository $iMEIRepo)
    {
        $this->iMEIRepository = $iMEIRepo;
    }

    /**
     * Display a listing of the IMEI.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $iMEIS = $this->iMEIRepository->paginate(10);

        return view('i_m_e_i_s.index')
            ->with('iMEIS', $iMEIS);
    }

    /**
     * Show the form for creating a new IMEI.
     *
     * @return Response
     */
    public function create()
    {
        return view('i_m_e_i_s.create');
    }

    /**
     * Store a newly created IMEI in storage.
     *
     * @param CreateIMEIRequest $request
     *
     * @return Response
     */
    public function store(CreateIMEIRequest $request)
    {
        $input = $request->all();

        $iMEI = $this->iMEIRepository->create($input);

        Flash::success('I M E I saved successfully.');

        return redirect(route('iMEIS.index'));
    }

    /**
     * Display the specified IMEI.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $iMEI = $this->iMEIRepository->find($id);

        if (empty($iMEI)) {
            Flash::error('I M E I not found');

            return redirect(route('iMEIS.index'));
        }

        return view('i_m_e_i_s.show')->with('iMEI', $iMEI);
    }

    /**
     * Show the form for editing the specified IMEI.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $iMEI = $this->iMEIRepository->find($id);

        if (empty($iMEI)) {
            Flash::error('I M E I not found');

            return redirect(route('iMEIS.index'));
        }

        return view('i_m_e_i_s.edit')->with('iMEI', $iMEI);
    }

    /**
     * Update the specified IMEI in storage.
     *
     * @param int $id
     * @param UpdateIMEIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIMEIRequest $request)
    {
        $iMEI = $this->iMEIRepository->find($id);

        if (empty($iMEI)) {
            Flash::error('I M E I not found');

            return redirect(route('iMEIS.index'));
        }

        $iMEI = $this->iMEIRepository->update($request->all(), $id);

        Flash::success('I M E I updated successfully.');

        return redirect(route('iMEIS.index'));
    }

    /**
     * Remove the specified IMEI from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $iMEI = $this->iMEIRepository->find($id);

        if (empty($iMEI)) {
            Flash::error('I M E I not found');

            return redirect(route('iMEIS.index'));
        }

        $this->iMEIRepository->delete($id);

        Flash::success('I M E I deleted successfully.');

        return redirect(route('iMEIS.index'));
    }
}
