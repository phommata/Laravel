@extends('app')

@section('content')

<h1>About</h1>

@if (count($people))

    <h3>People I Like:</h3>

    <ul>

        @foreach ($people as $person)

            <li>{{ $person }}</li>

        @endforeach

    </ul>

@endif

<p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea eum eveniet exercitationem fugiat harum ipsa maxime nisi nobis perferendis quo recusandae, sit? Architecto commodi eaque, eos iure quidem sunt voluptates!
</p>

@stop