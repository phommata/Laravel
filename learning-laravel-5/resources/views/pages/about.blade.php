@extends('app')

@section('content')

@if ($first == 'Andrew')

    <h1>Hi Andrew</h1>

@else

    <h1>Else</h1>

@endif

<h1>About Me {{ $first }} {{ $last }}</h1> <!-- Unescaped data-->

<p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea eum eveniet exercitationem fugiat harum ipsa maxime nisi nobis perferendis quo recusandae, sit? Architecto commodi eaque, eos iure quidem sunt voluptates!
</p>

@stop