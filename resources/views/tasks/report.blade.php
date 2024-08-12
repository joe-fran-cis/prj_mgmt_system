<!-- resources/views/tasks/report.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-5 border p-4">
        <h2 style="color: #007BFF;">Report</h2>
        <table class="table table-bordered table-sm">
		        <div class="form-group">
            <label for="projectSearch">Search by Project:</label>
            <input type="text" class="form-control" id="projectSearch" placeholder="Enter project name">
        </div>
            <thead>
                <tr style="color:#ab5297;">
                    <th>Sno</th>
                    <th>Name</th>
                    <th>Total Hours</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $index => $project)
                    <tr class="projectRow" style="background-color:#b5e7e9;">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->totalHours() }}</td>
                    </tr>
                    @foreach($project->tasks as $taskIndex => $task)
                        <tr class="subTaskRow project_{{ strtolower(str_replace(' ', '', $project->name)) }}">
                            <td></td>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->hours }}</td>
                        </tr>
                    @endforeach
                @empty
                    <tr>
                        <td colspan="3">No projects available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#projectSearch').on('input', function () {
                var project_name = $(this).val().toLowerCase().replace(/\s+/g, ''); // Remove spaces

                // Hide all rows initially
                //$('tbody tr').hide();
				
				$('.projectRow, .subTaskRow').hide();
				
				$('.projectRow').filter(function () {
                    return $(this).find('td:eq(1)').text().toLowerCase().replace(/\s+/g, '').indexOf(project_name) > -1;
                }).show();

                // Show project rows that match the search
                //$('tbody tr:has(td:contains("' + project_name + '"))').show();

                // Show and hide subtask rows based on the matching project name
                $('.subTaskRow').each(function () {
                    var mainProjectName = $(this).attr('class').match(/project_\S+/);
                    if (mainProjectName && mainProjectName[0].indexOf(project_name) > -1) {
                        $(this).show();
                    }
                });
            });
        });
    </script>
@endsection
