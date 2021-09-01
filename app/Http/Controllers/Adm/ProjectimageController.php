<?php

namespace App\Http\Controllers\Adm;

use App\DataTables\Adm\ProjectimageDataTable;
use App\Http\Requests\Adm;
use App\Http\Requests\Adm\CreateProjectimageRequest;
use App\Http\Requests\Adm\UpdateProjectimageRequest;
use App\Repositories\Adm\ProjectimageRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Adm\Texto;
use App\Models\Adm\ProjectImage;


class ProjectimageController extends AppBaseController
{
    /** @var  ProjectimageRepository */
    private $projectimageRepository;

    public function __construct(ProjectimageRepository $projectimageRepo)
    {
        $this->projectimageRepository = $projectimageRepo;
    }

    /**
     * Display a listing of the Projectimage.
     *
     * @param ProjectimageDataTable $projectimageDataTable
     * @return Response
     */
    public function index(ProjectimageDataTable $projectimageDataTable)
    {
        return $projectimageDataTable->render('adm.projectimages.index');
    }

    /**
     * Show the form for creating a new Projectimage.
     *
     * @return Response
     */
    public function create()
    {
        return view('adm.projectimages.create');
    }   

    /**
     * Store a newly created Projectimage in storage.
     *
     * @param CreateProjectimageRequest $request
     *
     * @return Response
     */
    public function store(CreateProjectimageRequest $request)
    {
        $input = $request->all();

        // $projectimage = $this->projectimageRepository->create($input);


        $imagePath = $request->file('mainiimage')->store('uploads', ['disk' => 'public']);

        $projectimage = new ProjectImage();
        $projectimage->url = $request->file('mainiimage')->store('uploads', 'public');
        $projectimage->project_id = $request->project_id; 
        $projectimage->save();

        $texto = new Texto;
        $texto->value = "projectimage" . $projectimage->id . ".title";
        $texto->en = $request->titleen;
        $texto->es = $request->titlees;
        $texto->save();

        $texto = new Texto;
        $texto->value = "projectimage" . $projectimage->id . ".description";
        $texto->en = $request->descriptionen;
        $texto->es = $request->descriptiones;
        $texto->save();


        Flash::success('Projectimage saved successfully.');

        return redirect(route('adm.projectimages.index'));
    }

    /**
     * Display the specified Projectimage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $projectimage = $this->projectimageRepository->find($id);

        if (empty($projectimage)) {
            Flash::error('Projectimage not found');

            return redirect(route('adm.projectimages.index'));
        }

        return view('adm.projectimages.show')->with('projectimage', $projectimage);
    }

    /**
     * Show the form for editing the specified Projectimage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $projectimage = $this->projectimageRepository->find($id);

        if (empty($projectimage)) {
            Flash::error('Projectimage not found');

            return redirect(route('adm.projectimages.index'));
        }

        return view('adm.projectimages.edit')->with('projectimage', $projectimage);
    }

    /**
     * Update the specified Projectimage in storage.
     *
     * @param  int              $id
     * @param UpdateProjectimageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProjectimageRequest $request)
    {
        $projectimage = $this->projectimageRepository->find($id);

        if (empty($projectimage)) {
            Flash::error('Projectimage not found');

            return redirect(route('adm.projectimages.index'));
        }
        $texto = Texto::where('value', 'projectimage' . $id . '.title')->first();
        $texto->value = "project" . $projectimage->id . ".title";
        $texto->en = $request->titleen;
        $texto->es = $request->titlees;
        $texto->save();

        $texto = Texto::where('value', 'projectimage' . $id . '.description')->first();
        $texto->value = "projectimage" . $projectimage->id . ".description";
        $texto->en = $request->descriptionen;
        $texto->es = $request->descriptiones;
        $texto->save();

        if ($request->file('mainiimage')) {
            $projectimage->mainimage = $request->file('mainiimage')->store('uploads', 'public');
        }
        $projectimage->url = $request->file('mainiimage')->store('uploads', 'public');
        $projectimage->project_id = $request->project_id;
        $projectimage->save();


        Flash::success('Projectimage updated successfully.');

        return redirect(route('adm.projectimages.index'));
    }

    /**
     * Remove the specified Projectimage from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $projectimage = $this->projectimageRepository->find($id);

        if (empty($projectimage)) {
            Flash::error('Projectimage not found');

            return redirect(route('adm.projectimages.index'));
        }

        $this->projectimageRepository->delete($id);

        Flash::success('Projectimage deleted successfully.');

        return redirect(route('adm.projectimages.index'));
    }
}
