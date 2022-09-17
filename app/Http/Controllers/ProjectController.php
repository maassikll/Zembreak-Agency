<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Project;
use App\Http\Resources\ProjectResource;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = ProjectResource::collection(Project::all());
        return response()->json([
            'status' => true,
            'message' => 'Projects Table',
            'projects' => $projects,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        try {
            $validateData = $request->validated();
            $project = Project::create($validateData);
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Project Stored Successfuly',
                    'project' => $project,
                ], 200);
        } 
        catch (Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th ->getMessage(),
             ],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, $id)
    {
        try {
            $project = Project::find($id);
            $validateData = $request->validated();
            $project->update($validateData);
            return response()->json([
                'status' => true,
                'message' => 'Project Updated Successfuly',
                'project' => $project,
            ], 200);
        } 
        catch (Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th -> getMessage(),
            ],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $project = Project::destroy($id);
            return response()->json([
                'status' => true,
                'message' => 'Project Deleted Successfuly',
                'project' => $project
            ], 200);
        } 
        catch (Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th -> getMessage(),
            ],500);
        }

    }

        /**
     *Search the infos resource from storage.
     * @param  str $infos
     * @return \Illuminate\Http\Response
     */
    public function search($infos)
    {
        $project = Project::where('infos','like','%'.$infos.'%')->get();
        return response()->json($project, 200);
    }
}
