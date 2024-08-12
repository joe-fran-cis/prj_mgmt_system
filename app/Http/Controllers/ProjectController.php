<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class ProjectController extends Controller
{
    // app/Http/Controllers/ProjectController.php

    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function list()
    {
        $projects = Project::all();
        return view('projects.list', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'project_name' => 'required|max:255',
            'task_name' => [
                'required',
                Rule::unique('tasks', 'name')->where(function ($query) use ($request) {
                    return $query->where('project_id', $request->input('project_id'));
                }),
            ],
            'hours' => 'required|numeric',
            'date' => 'required|date',
            'description' => 'nullable',
        ];

        $request->validate($rules);

        $existingProject = Project::where('name', $request->input('project_name'))->first();

        if ($existingProject) {
            $projectId = $existingProject->id;
        } else {
            $project = new Project();
            $project->name = $request->input('project_name');
            $project->save();

            $projectId = $project->id;
        }

        $existingTask = Task::where('project_id', $projectId)
            ->where('name', $request->input('task_name'))
            ->first();

        if ($existingTask) {
            return redirect()->back()->with('error', 'Task name already exists for this project.');
        }

        // Save to tasks table
        $task = new Task();
        $task->project_id = $projectId;
        $task->name = $request->input('task_name');
        $task->hours = $request->input('hours');
        $task->date = $request->input('date');
        $task->description = $request->input('description');
        $task->save();

        return redirect()->route('projects.index');
    }
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:0,1',
        ]);

        $project = Project::findOrFail($id);
        $project->status = (int) $request->input('status');
        $project->save();

        return redirect()->back()->with('success', 'Project status updated successfully.');
    }
}
