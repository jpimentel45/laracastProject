@extends('layout')

@section('content')
    <h1>Projects</h1>
    <section class="create">
        <a href='/projects/create'><button>Create New Project</button></a>
    </section>
    <section>
        <!-- <?php foreach($projects as $project) : ?>
            <li><?=$project;?></li>
        <?php endforeach; ?> -->
        <ul>
        @foreach($projects as $project)
        <a href='/projects/{{$project->id}}'>
            <h1><?=$project->title;?></h1>
        </a>
            <small>Created:<?=$project->created_at;?></small>
            <small>Updated:<?=$project->updated_at;?></small>
            <p><?=$project->description;?></p>
            <br>
            <a  href="/projects/{{$project->id}}/edit">
                <button>EDIT ME</button>
            </a>
            <form method='POST' action="/projects/{{$project->id}}">
            @method('DELETE')
            @csrf
                <section class="field">
                    <section class="control">
                        <button type="submit" class="button is-link">Delete Project</button>
                    </section>
                </section>
            </form>
        @endforeach
        </ul>
    </section>
@endsection