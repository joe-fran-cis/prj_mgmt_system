<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;

class TaskController extends Controller
{
	public function index($projectId)
	{
		$tasks = Task::where('project_id', $projectId)->get();
		return view('tasks.index', compact('tasks', 'projectId'));
	}
	public function list()
    {
        // Retrieve tasks and render the tasks list view
        //$tasks = Task::all();
		//$tasks = Task::with('project')
        //->join('projects', 'tasks.project_id', '=', 'projects.id')
        //->orderBy('projects.name') // Order by project name
        //->get();
		//dd($tasks);
		
		$tasks = Task::select('tasks.*', 'projects.name as project_name')
		->join('projects', 'tasks.project_id', '=', 'projects.id')
		->orderBy('projects.name') // Order by project name
		->get();

		return view('tasks.list', compact('tasks'));
    }
	public function report()
	{
		$projects = Project::with('tasks')->get();
		return view('tasks.report', compact('projects'));
	}
}
