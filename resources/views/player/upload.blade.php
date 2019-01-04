<article>

    {!! Form::open(array('url' => 'home','method' => 'post','files' => true,'class' => 'formUpload')) !!}

    @include('partials.errorUpload');

    <div class="form-group">
        {!! Form::label('Mp3') !!}
        {!! Form::file('song', null) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Compress mp3?') !!}
        {!! Form::checkbox('compress', null) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Select album for save') !!}
        {!! Form::select('album', array('L' => 'Large', 'S' => 'Small')) !!}
    </div>

    <div class="form-group">
        {!! Form::button('Save new song!',['type'=>'submit']) !!}
    </div>
    {!! Form::close() !!}
    </div>

</article>
