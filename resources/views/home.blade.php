@extends('layouts.app')

@section('content')
<section>
    @include('player.playList')
</section>
<section>
    @include('player.player')
    @include('player.upload')
</section>
<footer>
    footer
</footer>
@endsection
