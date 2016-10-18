<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Task;
use Auth;
use App\User;
use App\Repositories\TaskRepository;

class TasksController extends Controller
{
    protected $user;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');
        $this->tasks = $tasks;
    }
        
    public function index(Request $request)
    {
        $tasks = $this->tasks->forUser($request->user());
        $pname = $this->properName(Auth::user()->name);
        
        return view('tasks.index', compact('tasks', 'pname'));
    }
    
    
    public function properName($string)
    {
        return ucfirst(strtolower(substr($string, 0, strpos($string, ' '))));
    }
    
    public function store(Request $request)
    {   
        $this->validate($request, [
            'task_name' => 'required',
        ]);
        Task::create([
            'task_name' => $request->get('task_name'),
            'user_id' => Auth::user()->id,
            'done' => 0,
        ]);
        
        return redirect('tasks');
    }
    
    public function create()
    {
        return view('tasks.index');
    }
    
    public function show(Request $request, Task $task)
    {
        $task = Task::find($id);
        return view('tasks.show', compact('task'));
    }
    
    public function update(Request $request, Task $task)
    {
        if(isset($request['as'], $request['item'])) {
            $as   = $request['as'];
            $item = $request['item'];

            switch($as) {
                case 'done':
                    $task->update(['done' => 1]);     
                break;
                case 'undone':
                    $task->update(['done' => 0]);       
                break;
            }
        }
        
        return redirect('tasks');
    }
    
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('tasks');
    }
    
    public function edit()
    {
        return view('tasks');
    }
    
    
}
