@extends('layout')

@section('content')
    <h1>Edit Project</h1>

    <form method='POST' action='/projects/{{$project->id}}'>
    <!-- Browsers don't yet understand PATCH and DELETE request types for your forms. 
    To get around this limitation: method_field("PATCH") & csrf_field() -->
    @method('PATCH')
    @csrf
        <section class="field">

            <label for="title" class="label">Title</label>
            
            <section class="control">

                <input type="text" class="input" name='title' placeholder='title' value='{{$project->title}}'>
        
            </section>

        </section>

        <section class="field">

            <label for="description" class="label">Description</label>

            <section class="control">
            
                <textarea name="description" id="" cols="30" rows="10" class="textarea" >{{$project->description}}</textarea>
        
            </section>
    
        </section>

        <section class="field">
            <section class="control">
            
                <button type="submit" class='button is-link'>Update Project</button>

            </section>

        </section>

    </form>

    <!-- <form method='POST' action="/projects/{{$project->id}}">
    @method('DELETE')
    @csrf
    <section class="field">
            <section class="control">
                <button type="submit" class="button is-link">Delete Project</button>
            </section>
        </section>
    </form> -->
@endsection
