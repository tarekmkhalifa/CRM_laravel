<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\TaskStoreRequest;
use App\Http\Requests\Admin\TaskUpdateRequest;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderByDesc('id')->paginate(8);
        return view('Admin.tasks.index', compact('tasks'));
    }

    public function create()
    {
        $projects = Project::select('id', 'title')->get();
        return view('Admin.tasks.create', compact('projects'));
    }

    public function store(TaskStoreRequest $request)
    {
        // request validation ==> TaskStoreRequest

        // prepare data
        $data = [
            'title' => $request->title,
            'details' => $request->details,
            'project_id' => $request->project_name,
            'deadline' => $request->deadline
        ];

        // insert data into db
        Task::create($data);
        $msg = "Task added successfully";
        return redirect()->back()->with('success', $msg);
    }


    public function edit(Task $task)
    {
        $projects = Project::select('id', 'title')->get();
        return view('Admin.tasks.edit', compact('task', 'projects'));
    }

    public function update(Task $task, TaskUpdateRequest $request)
    {
        // request validation ==> TaskUpdateRequest

        // prepare data
        $data = [
            'title' => $request->title,
            'details' => $request->details,
            'project_id' => $request->project_name,
            'deadline' => $request->deadline,
            'status' => $request->status
        ];

        // insert data into db
        $task->update($data);
        $msg = "Task updated successfully";
        return redirect()->back()->with('success', $msg);
    }

    public function destroy(Task $task)
    {
        $task->delete();
        $msg = "Task deleted successfully";
        return redirect()->back()->with('success', $msg);
    }

    public function done(Task $task)
    {
        $task->status = 'Done';
        $task->save();
        return back();
    }

}
