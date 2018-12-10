<article>

    {!! Form::open(array('url' => 'home','method' => 'post','files' => true,'class' => 'formUpload')) !!}

    <p>UPLOAD MP3 SECTION</p>

    <div class="form-group">
        {!! Form::label('Product mp3') !!}
        {!! Form::file('image', null) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Select album for save') !!}
        {!! Form::select('size', array('L' => 'Large', 'S' => 'Small')) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Save new singl!') !!}
    </div>
    {!! Form::close() !!}
    </div>

</article>
