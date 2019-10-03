<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//pull in task
use App\Task;

//pull in project
use App\Project;

class ProjectTasksController extends Controller
{

    public function store(Project $project)
    {
        $attributes = request()->validate(['description'=>'required|min:3|max:300']);
        //add task to project
        //make method to add task, use it on $project->
        //provide description of task
        //go to project model and add addTask() method
        $project->addTask($attributes);

        return back();
    }

    public function destroy(Project $project)
    {
        $attributes = request()->validate(['description'=>'required|min:3|max:300']);
        
         $project->deleteTask($attributes);

        // return redirect('/projects');
    }

   
}
