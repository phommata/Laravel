@extends('app')

@section('content')

<h1>About Me {{ $first }} {{ $last }}</h1> <!-- Unescaped data-->

<p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea eum eveniet exercitationem fugiat harum ipsa maxime nisi nobis perferendis quo recusandae, sit? Architecto commodi eaque, eos iure quidem sunt voluptates!
</p>

@stop