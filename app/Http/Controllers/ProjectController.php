<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use DataTables;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Project::all();

        
        return view('projects.index', compact('data'));
    }

    public function datatables()
    {
        // $query = Project::select([
        //     'id',
        //     'user_id',
        //     'nama',
        //     'status'
        // ]);
         $query = Project::with('user')
         ->select([
            'project.id',
            'project.pengguna_id',
            'project.nama',
            'project.status'
        ]);

        return DataTables::of($query)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $select_users = User::select('id', 'name')->get();
        return view('projects.create', compact('select_users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'nama' => 'required|unique:projects,nama'
        ]);

        $data = $request->all();

        Project::create($data);

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $select_users = User::select('id', 'name')->get();
        return view('projects.edit', compact('select_users', 'project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'nama' => 'required|unique:projects,nama,' . $project->id
        ]);

        $data = $request->all();

        //$project = Project::where('id', $id)->where('status', 'active')->first();
        // $project = Project::find($id);

        $project->update($data);

        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index');
    }
}
