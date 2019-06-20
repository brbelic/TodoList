@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="col-8 offset-2 panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
        <form action="/task" method="POST" class="form-horizontal">
            @csrf

            <!-- Task Name -->
            <div class="row py-3 form-group">
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
        <div class="col-8 offset-2 pt-3 panel panel-default">
            <div class="col-6 offset-3 d-flex justify-content-center panel-heading">
                <h5>Current Tasks</h5>
            </div>

            <div class="panel-body">
                <div class="table table-striped task-table">

                    @foreach ($tasks as $task)
                        <div class="row d-flex align-items-center py-3 mb-3 bg-white">
                            <!-- Task Name -->
                            <div class="col-9 offset-1 table-text">

                                <form method="POST" action="/completed-task/{{ $task->id }}">
                                    @if ($task->completed)
                                        @method('DELETE')
                                    @endif

                                    @csrf

                                    <span class="{{ $task->completed ? 'line-through' : 'none-decoration' }}">
                                        {{ $task->name }}
                                    </span>

                                    <input type="checkbox" name="completed"  class="float-right align-middle"
                                        onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                                </form>

                            </div>

                           <!-- Delete Button -->
                            <div class="col-2">
                                <form action="/task/{{ $task->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        Delete Task
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row d-flex align-items-center justify-content-center">
                    <div>
                        {{ $tasks->links() }}
                    </div>
                </div>
                
            </div>
        </div>
    @endif
    
@endsection