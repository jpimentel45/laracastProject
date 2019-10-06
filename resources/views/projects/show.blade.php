@extends('layout')

@section('content')
<section class='mainContainer'>
    <main>
        <h1>{{$project->title}}</h1>
        <!-- Using echo instead so it can display with html tags instead of having the tags as plain text -->
        <!-- <p>{{$project->description}}</p> -->
        <p><?=$project->description?></p>
        @can('update', $project)
        <a  href="/projects/{{$project->id}}/edit">
            <button>EDIT ME</button>
        </a>
        @endcan
    </main>
    <hr>
<br>
    <!-- Add a new task -->
    <section>
        <form method='POST' action='/projects/{{$project->id}}/tasks'>
        
        @csrf
            <label for="label" for='description'>
                <p>New Task</p>
            </label>
            <section class="control">
                <input type="text" class="input" name='description' placeholder='New Task' required>
            </section>
            <section class="control">
                <button type="submit" class="button is-link">
                    <p>Add Task</p>
                </button>
            </section>

            @include('errors')

        </form>
    </section>
    </section>
    <hr>
<br>
    @if($project->tasks->count())
        <section>
            <h3>Tasks for Project:</h3>
            <ol>
            @foreach($project->tasks as $task)
                <li>
                    <!-- 
                    PATCH /projects/id/tasks/id
                    PATCH /tasks/id  
                    -->
                    <form method='POST' action='/completedTasks/{{$task->id}}'>
                        @if($task->completed)
                            @method('DELETE')
                        @endif
                        @csrf
                        <label for="completed" class="checkbox {{$task->completed ? 'is-complete' : ''}}">
                            <input type="checkbox" name="completed" onChange='this.form.submit()' {{$task->completed ? 'checked' : ''}}>
                            {{$task->description}}
                        </label>
                    </form>
                </li>
            @endforeach
            </ol>
        </section>
    @endif
    <hr>
<br>

@endsection