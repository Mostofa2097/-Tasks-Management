<?php

namespace App\Http\Controllers;

use App\Enums\StatusType;
use App\Models\catagory;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class taskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["tasks"]=Task::where('created_by',Auth::id())->get();
       return view('tasks.index',$data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catagory_list = catagory::where('created_by',Auth::id())->get();
        $status_list = StatusType::asSelectArray();
        return view("tasks.create",compact("catagory_list","status_list"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new task();
        $task->title= $request->title;
        $task->description= $request->description;
        $task->catagory_id= $request->catagory_id;
        $task->status= $request->status;
        $task->deadline= $request->deadline;
        //$task->created_by = Auth::id();
        $task->owner()->associate(Auth::user());
        $task->save();

        return redirect("/tasks");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::where('created_by',Auth::id())->find($id);
        if(!$task){
           return redirect("/tasks");
        }
        return view("tasks.edit",compact("task"));
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $task =  Task::where('created_by',Auth::id())->find($id);
        if($task){
            $task->title= $request->title;
            $task->description= $request->description;
            $task->catagory_id= $request->catagory_id;
            $task->status= $request->status;
            $task->deadline= $request->deadline;
            //$task->created_by = Auth::id();
            $task->owner()->associate(Auth::user());
            $task->save();
    
            return redirect("/tasks");

        }
        return redirect("/tasks");
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::where('created_by',Auth::id())->find($id);
        if($task){
          $task->delete();
        }
        return redirect("/tasks");
    }
}
