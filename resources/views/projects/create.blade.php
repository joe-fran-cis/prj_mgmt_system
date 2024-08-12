<!-- resources/views/projects/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Project and Task</h2>
		
		@if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('projects.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="project_name">Project Name:</label>
                <input type="text" name="project_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="task_name">Task Name:</label>
                <input type="text" name="task_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="hours">Hours:</label>
                <input type="number" name="hours" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" name="date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" rows="3" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Create Project and Task</button>
        </form>
    </div>
@endsection
