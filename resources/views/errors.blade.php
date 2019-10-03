
            @if ($errors->any())
        <section class="notification isDanger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>        
        </section>
        @endif