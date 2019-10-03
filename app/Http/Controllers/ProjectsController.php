<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;

use App\Project;
//use App\Services\Twitter;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        //$projects = auth()->user()->projects;
        //return $projects;

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    //public function show(Project $project, Twitter $twitter)
    public function show(Project $project)
    {  
        //grab something out of service container
        //$twitter = app('twitter');
        //dd($twitter);
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
       // $project = Project::findOrFail($id);
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        //dd(request()->all());
        //$project= Project::findOrFail($id);

        $project->update(request([
            'title', 'description'
            ]));

        // $project->title = request('title');

        // $project->description = request('description');

        // $project->save();

        return redirect('/projects');
    }

    public function destroy(Project $project)
    {
        
         $project->delete();

         return redirect('/projects');
    }

    public function store()
    {
        Project::create(request()->validate([
            'title' => ['required','min:3'],
            'description' => ['required', 'min:3']
        ]));
        //in order to use ::create
        //update your model: protected $fillable =[]
        //and add any value you're trying to save/pass to db
        //ex: protected $fillable = ['title','description'];
        //CAN ALSO USE: protected $guarded = []
        // guarded include only what you dont want protected
        // Project::create(request(['title','description']));
        // $project = new Project();

        // $project->title = request('title');
        
        // $project->description = request('description');

        // $project->save();

        return redirect('/projects');
    }
}
