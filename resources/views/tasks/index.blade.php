<!-- resources/views/tasks/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tasks for Project {{ $projectId }}</h2>

        <ul class="list-group">
            @forelse($tasks as $task)
                <li class="list-group-item">
                    {{ $task->name }} - {{ $task->hours }} hours - {{ $task->date }} - {{ $task->description }}
                </li>
            @empty
                <li class="list-group-item">No tasks available for this project.</li>
            @endforelse
        </ul>
    </div>
@endsection
