@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="col-8 offset-2 panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
        <form action="/task" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="row form-group">
                <div class="col-9 offset-1">
                    <input type="text" name="name" id="task-name" class="form-control" placeholder="Enter your Task">
                </div>
                
                <!-- Add Task Button -->
                <div class="col-2">
                    <button type="submit" class="btn btn-primary">
                        Add Task
                    </button>
                </div>
            </div>
        </form>  
    </div>

    @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Tasks
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Task</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>

                                <td>
                                    <!-- TODO: Delete Button -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    
@endsection