<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;

use App\Project;
use App\Mail\ProjectCreated;
//use App\Services\Twitter;

class ProjectsController extends Controller
{
    //require auth to creare Project
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }
    public function index()
    {
        // auth()->id();
        // auth()->user();
        // auth()->check();
        //$projects = Project::where('owner_id', auth()->id())->get();

        $projects = Project::all();
        // dump($projects);
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
        /* if($project->owner_id !== auth()->id()){
            abort(403);
            }
        abort_if($project->owner_id !== auth()->id(), 403);
        abort_unless(auth()->user()->owns($project), 403);
        */
        //$this->authorize('view', $project);
       /*
       helpful gate fasade: huge gate blocking entrance determine if allowed or denied
        if (\Gate::denies('update', $project)){
            abort(403)
        }
        abort_if(\Gate::denies('update', $project), 403);
        abort_unless(\Gate::allows('update', $project), 403);

       */
        //grab something out of service container
        //$twitter = app('twitter');
        //dd($twitter);
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $this->authorize('update', $project);

       // $project = Project::findOrFail($id);
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        //dd(request()->all());
        //$project= Project::findOrFail($id);
        $this->authorize('update', $project);

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
        $this->authorize('update', $project);
        
         $project->delete();

         return redirect('/projects');
    }

    public function store()
    {
        $attributes = (request()->validate([
            'title' => ['required','min:3'],
            'description' => ['required', 'min:3'],
            'owner_id' => [auth()->id()]
        ]));
        $attributes['owner_id'] = auth()->id();
        $project = Project::create($attributes);
        //in order to use ::create
        //and add any value you're trying to save/pass to db
        //ex: protected $fillable = ['title','description'];
        //CAN ALSO USE: protected $guarded = []
        // guarded include only what you dont want protected
        // Project::create(request(['title','description']));
        // $project = new Project();

        // $project->title = request('title');
        
        // $project->description = request('description');

        // $project->save();
            \Mail::to('jpimentel45@gmail.com')->send(
                new ProjectCreated($project)
            );
        return redirect('/projects');
    }
}
