<article>

    {{ Form::open(array('url' => 'home','method' => 'post','files' => true,'class' => 'formUpload')) }}

    @include('partials.errorUpload');

    <div class="form-group">
        {{ Form::label('Mp3') }}
        {{ Form::file('song', array('type' => 'file','accept' => 'audio/*,.mp3,.wav' , 'max' => '8191' )) }}
    </div>

    <div class="form-group">
        {{ Form::label('Compress mp3?') }}
        {{ Form::checkbox('compress','Ano') }}
    </div>    <div class="form-group">
        {{ Form::label('Convert to mp3?') }}
        {{ Form::checkbox('convert','Wav to MP3') }}
    </div>

    <div class="form-group">
        {{ Form::label('Select album for save') }}
        {{ Form::select('album', array('L' => 'Large', 'S' => 'Small', 'Other' => 'Other')) }}
    </div>

    <div class="form-group">
        {{ Form::button('Save new song!',['type'=>'submit']) }}
    </div>
    {{ Form::close() }}
    </div>

</article>
