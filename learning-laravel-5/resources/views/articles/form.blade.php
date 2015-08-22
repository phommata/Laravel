<div class="form-group">

    {!! Form::label('title', 'Title: ') !!}

    {!! Form::text('title', null, ['class' => 'form-control']) !!}

</div>


<div class="form-group">

    {!! Form::label('body', 'Body: ') !!}

    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}

</div>


<div class="form-group">

    {!! Form::label('published_at', 'Published On: ') !!}

    {!! Form::input('date', 'published_at', date('Y-m-d'), ['class' => 'form-control']) !!}

</div>


<div class="form-group">

    {!! Form::label('tags', 'Tags: ') !!}

    <!-- pass name for the select, the various options for the select,
        what should be treated as a selected value (can pass a string value, or an array -->
    {!! Form::select('tag_list[]', $tags, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}

</div>


<div class="form-group">

    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}

</div>

@section('footer')

    <script>

        $('#tag_list').select2({
            placeholder: 'Choose a tag',
            tags: true,
            ajax: {
                dataType: 'json', // return User::all()
                url: 'tags.json',
                processResults: function(data){
                    return { results: data }
                }
            }
        });

    </script>

@endsection