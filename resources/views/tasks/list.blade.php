@extends('layouts.app')

@section('content')
<div class="container mt-5 border p-4">
    <h2 class="mb-4" style="color: #007BFF;">Tasks List</h2>

    @if(count($tasks) > 0)
    <div class="table-responsive">
        <table class="table table-bordered table-sm">
            <thead>
                <tr style="color: #ab5297;">
                    <th scope="col">#</th>
                    <th scope="col">Project Name</th>
                    <th scope="col">Task Name</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $index => $task)
                <tr style="background-color: {{ $index % 2 == 0 ? '#b5e7e9' : '#ffffff' }};">
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $task->project->name }}</td>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->status == 1 ? 'Active' : 'Inactive' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p>No tasks available.</p>
    @endif
</div>
@endsection