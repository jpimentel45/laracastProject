@extends('layout')

@section('content')
    <main>
        <h1>{{$project->title}}</h1>
        <p>{{$project->description}}</p>
        <a  href="/projects/{{$project->id}}/edit">
            <button>EDIT ME</button>
        </a>
    </main>
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
    <hr>
<br>
@endsection