@extends('app')

@section('content')

    <h1>Write a new article</h1>

    <hr>

    {!! Form::open(['url' => 'articles']) !!}

        <div class="form-group">

            {!! Form::label('title', 'Title: ') !!}

            {!! Form::text('title', null, ['class' => 'form-control']) !!}

        </div>

        <!-- Body Form Input -->

        <div class="form-group">

            {!! Form::label('body', 'Body: ') !!}

            {!! Form::textarea('body', null, ['class' => 'form-control']) !!}

        </div>

        <!-- Published_at Form Input -->

        <div class="form-group">

            {!! Form::label('published_at', 'Published On: ') !!}

            {!! Form::input('date', 'published_at', null, ['class' => 'form-control']) !!}

        </div>

        <!-- Add Article Form Input -->

        <div class="form-group">

            {!! Form::submit('Add Article', ['class' => 'btn btn-primary form-control']) !!}

        </div>

    {!! Form::close() !!}

@stop