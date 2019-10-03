@extends('layout')

@section('content')
    <h1>Create New Project</h1>

    <form method='POST' action='/projects'>
    @csrf
        <section>
            <input type='text' name='title' placeholder='Project Title' class="input {{$errors->has('title') ? 'isDanger' : ''}}" required value="{{old('title')}}">
        </section>
        <section>
            <textarea name="description" id="" cols="30" rows="10" placeholder='Project Description' class="textarea {{$errors->has('description') ? 'isDanger' : ''}}"required>
            {{old('description')}}
            </textarea>
        </section>
        <section>
            <button type='submit'>Create Project</button>
        </section>
        
        @include('errors')
        
    </form>
@endsection