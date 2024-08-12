<!-- resources/views/projects/list.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-5 border p-4" style="background-color: #F8F9FA;">
    <h2 class="mb-4" style="color: #007BFF;">Projects List</h2>

    @if(count($projects) > 0)
    <div class="table-responsive">
        <table class="table table-bordered table-sm" style="background-color: #ffffff;">
            <thead>
                <tr style="color:#ab5297;">
                    <th scope="col">Sl No.</th>
                    <th scope="col">Project Name</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $index => $project)
                <tr style="background-color: {{ $index % 2 == 0 ? '#b5e7e9' : '#ffffff' }};">
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->status == 1 ? 'Active' : 'Inactive' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p style="color: #007BFF;">No projects available.</p>
    @endif
</div>
@endsection