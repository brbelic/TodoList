<?php

namespace App\Http\Controllers;

use App\Task;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{
    protected $tasks;
    
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');
        $this->tasks = $tasks;
    }
    
    public function index(Request $request)
    {
        return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
    }
    
    
    public function store(Request $request)
        {
            $validator = \Validator::make($request->all(), [
                'name' => 'required|max:255',
            ]);

            if ($validator->fails())
            {
                return response()->json(['errors'=>$validator->errors()->all()]);
            }
        
            $task = $request->user()->tasks()->create([
                'name' => $request->name,
            ]);
        
            return $task;
        }
    
    public function destroy(Request $request, Task $task)
    {
        $this->authorize('update', $task);
        
        $task->delete();
        
        return response ()->json ();
    }
}
