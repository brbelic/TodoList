<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class CompletedTaskController extends Controller
{
    //
    public function store(Task $task)
    {
        // check if the authenticated user can complete the task
        $this->authorize('update', $task);
        
        // mark the task as complete and save it
        $task->completed = true;
        $task->save();
        
        return back();
    }
    
    public function destroy(Task $task)
    {
        // check if the authenticated user can complete the task
        $this->authorize('update', $task);
        
        // mark the task as uncomplete and save it
        $task->completed = false;
        $task->save();
        
        return back();
    }
}
