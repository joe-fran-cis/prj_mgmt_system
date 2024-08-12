@extends('layouts.app')

@section('content')
    <div class="container mt-5 border p-4" style="background-color: #F8F9FA;">
        <h2 style="color: #007BFF;">Projects List</h2>
        
        @if(count($projects) > 0)
            <table class="table table-striped table-sm" style="background-color: #ffffff;">
                <thead>
                    <tr style="color:#ab5297;">
                        <th scope="col">#</th>
                        <th scope="col">Project Name</th>
                        <th scope="col">Task Name</th>
                        <th scope="col">Hours</th>
                        <th scope="col">Date</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                @php $rowCount = 1; @endphp
                    @foreach($projects as $index => $project)
                        @if($project->tasks->isNotEmpty())
                            @foreach($project->tasks as $task)
                                <tr>
                                    <th scope="row">{{ $rowCount++ }}</th>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $task->name }}</td>
                                    <td>{{ $task->hours }}</td>
                                    <td>{{ $task->date }}</td>
                                    <td>{{ $task->description ?: 'N/A' }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $project->name }}</td>
                                <td colspan="4">N/A</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        @else
            <p style="color: #007BFF;">No projects available.</p>
        @endif
    </div>

    <div class="container mt-5 border p-4" style="background-color: #F8F9FA;">
        <h2 class="mb-4" style="text-align:center;color: #007BFF;">Create Project and Task</h2>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('projects.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="project_name" style="color: #ab5297;">Project Name:</label>
                <input type="text" name="project_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="task_name" style="color: #ab5297;">Task Name:</label>
                <input type="text" name="task_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="hours" style="color: #ab5297;">Hours:</label>
                <input type="number" name="hours" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="date" style="color: #ab5297;">Date:</label>
                <input type="date" name="date" class="form-control datepicker" required>
            </div>

            <div class="form-group">
                <label for="description" style="color: #ab5297;">Description:</label>
                <textarea name="description" rows="3" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary" style="background-color: #ab5297;">Save</button>
        </form>
    </div>
@endsection
