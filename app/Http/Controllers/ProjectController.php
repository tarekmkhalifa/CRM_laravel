<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\ProjectStoreRequest;
use App\Http\Requests\Admin\ProjectUpdateRequest;
use App\Models\Client;
use App\Models\Project;
use App\Models\User;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderByDesc('id')->paginate(8);
        return view('Admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $users = User::select('id', 'name')->get();
        $clients = Client::select('id', 'name')->get();
        return view('Admin.projects.create', compact('users', 'clients'));
    }

    public function store(ProjectStoreRequest $request)
    {
        // request validation ==> ProjectStoreRequest

        // prepare data
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_name,
            'client_id' => $request->client_name,
            'deadline' => $request->deadline
        ];

        // insert data into db
        Project::create($data);
        $msg = "Project added successfully";
        return redirect()->back()->with('success', $msg);
    }

    public function edit(Project $project)
    {
        $users = User::select('id', 'name')->get();
        $clients = Client::select('id', 'name')->get();
        return view('Admin.projects.edit', compact('project', 'users', 'clients'));
    }

    public function update(Project $project, ProjectUpdateRequest $request)
    {
        // request validation ==> ProjectUpdateRequest

        // prepare data
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_name,
            'client_id' => $request->client_name,
            'status' => $request->status,
            'deadline' => $request->deadline
        ];

        // insert data into db
        $project->update($data);
        $msg = "Project updated successfully";
        return redirect()->back()->with('success', $msg);
    
    }

    public function destroy(Project $project)
    {
        $project->tasks()->delete();
        $project->delete();
        $msg = "Project deleted successfully";
        return redirect()->back()->with('success', $msg);
    }

    public function done(Project $project)
    {
        $project->status = 'Done';
        $project->save();
        return back();
    }
}
