@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="col-8 offset-2 panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
        <div class="alert alert-danger" style="display:none"></div>

        <!-- New Task Form -->
        <!--<form action="/task" method="POST" class="form-horizontal">   MAKNUTO + BTN-ADD -->
        <form>
            <!--!!!!!!  maknut csrf !!!!!! -->
            
            <!-- Task Name -->
       <!--     <div class="row py-3 form-group">
                <div class="addTaskName col-9 offset-1">
                    <input type="text" name="name" id="task-name" class="form-control" placeholder="Enter your Task">
                </div>
                
                <!-- Add Task Button -->
         <!--       <div class="col-2">
                    <button type="submit" class="btn btn-add btn-primary shadow-sm">
                        Add Task
                    </button>
                </div>
            </div>
        </form>  
    </div> -->

    
        <div class="col-8 offset-2 pt-3 panel panel-default" id="tasks-list">
           <div class="col-6 offset-3 d-flex justify-content-center panel-heading">
                <h3>Admin Panel</h3>
            </div>
            <div class="col-6 offset-3 d-flex justify-content-center panel-heading">
                <h5>Users</h5>
            </div>
            <hr>
            <div class="panel-body">
                <div class="table table-striped task-table" id="task-table">

                    @foreach ($users as $user)
                        <div id="{{ $user->id }}" class="row d-flex align-items-center py-3 mb-3 bg-white rounded shadow-sm">
                            <!-- Task Name -->
                            <div class="col-10 offset-1 row table-text align-items-center">
                                    
                                <div class="userName col-3">
                                    {{ $user->name }}
                                </div>
                                <div class="userEmail col-4">
                                    {{ $user->email }}
                                </div>
                                <div class="userCreatedAt col-4">
                                    {{ $user->created_at }}
                                </div>
                                <div class="col-1">
                                    <form action="/admin/user/{{ $user->id }}" method="POST">

                                        @method('DELETE')
                                        @csrf
                                        
                                        <button type="submit" class="btn  shadow-sm" value="{{ $user->id }}">
                                           <!--<input class="task-id" hidden value=" {{ $user->id }} ">-->
                                            <i class="fa fa-trash-o" style="font-size:18px;color:red"></i>
                                        </button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="row d-flex align-items-center justify-content-center">
                        <div>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    
    
@endsection