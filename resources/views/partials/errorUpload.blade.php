@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
@else
    <p>{{session()->has('message') ? session('message') : 'UPLOAD MP3 SECTION'}}</p>
@endif
