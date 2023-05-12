<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $clients = Client::count();
        $projects = Project::where('status', 'pending')->count();
        $tasks_pend = Task::where('status', 'pending')->count();
        $tasks_compl = Task::where('status', 'Done')->count();
        return view('Admin.index', compact('clients', 'projects', 'tasks_pend', 'tasks_compl'));
    }
}