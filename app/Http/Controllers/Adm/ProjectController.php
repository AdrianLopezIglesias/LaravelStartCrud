<?php

namespace App\Http\Controllers\Adm;

use App\DataTables\Adm\ProjectDataTable;
use App\Http\Requests\Adm;
use App\Http\Requests\Adm\CreateProjectRequest;
use App\Http\Requests\Adm\UpdateProjectRequest;
use App\Repositories\Adm\ProjectRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ProjectController extends AppBaseController
{
    /** @var  ProjectRepository */
    private $projectRepository;

    public function __construct(ProjectRepository $projectRepo)
    {
        $this->projectRepository = $projectRepo;
    }

    /**
     * Display a listing of the Project.
     *
     * @param ProjectDataTable $projectDataTable
     * @return Response
     */
    public function index(ProjectDataTable $projectDataTable)
    {
        return $projectDataTable->render('adm.projects.index');
    }

    /**
     * Show the form for creating a new Project.
     *
     * @return Response
     */
    public function create()
    {
        return view('adm.projects.create');
    }

    /**
     * Store a newly created Project in storage.
     *
     * @param CreateProjectRequest $request
     *
     * @return Response
     */
    public function store(CreateProjectRequest $request)
    {
        $input = $request->all();

        $project = $this->projectRepository->create($input);

        Flash::success('Project saved successfully.');

        return redirect(route('adm.projects.index'));
    }

    /**
     * Display the specified Project.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $project = $this->projectRepository->find($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('adm.projects.index'));
        }

        return view('adm.projects.show')->with('project', $project);
    }

    /**
     * Show the form for editing the specified Project.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $project = $this->projectRepository->find($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('adm.projects.index'));
        }

        return view('adm.projects.edit')->with('project', $project);
    }

    /**
     * Update the specified Project in storage.
     *
     * @param  int              $id
     * @param UpdateProjectRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProjectRequest $request)
    {
        $project = $this->projectRepository->find($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('adm.projects.index'));
        }

        $project = $this->projectRepository->update($request->all(), $id);

        Flash::success('Project updated successfully.');

        return redirect(route('adm.projects.index'));
    }

    /**
     * Remove the specified Project from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $project = $this->projectRepository->find($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('adm.projects.index'));
        }

        $this->projectRepository->delete($id);

        Flash::success('Project deleted successfully.');

        return redirect(route('adm.projects.index'));
    }
}
