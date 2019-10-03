@extends('layout')

@section('content')
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="/projects">Projects</a>
                </div>
        
                <section>
                    <h1>To Make Task Model with migration and Factory</h1>
                    <ol>
                        <li> php artisan make:model Task -m -f</li>
                        <li>Edit migrations to add any extra fields you need for database</li>
                        <li>php artisan migrate    to migrate to database</li>
                    </ol>
                    <hr>
                    <h1>Relate tasks model to projects</h1>
                    <ol>
                        <li>edit project model to include tasks</li>
                        <li>public function tasks()
                            {
                                return $this->hasMany(Task::class);
                            }
                        </li>
                        <li>php artisan migrate    to migrate to database</li>
                    </ol>
                </section>
            </div>
        </div>
@endsection