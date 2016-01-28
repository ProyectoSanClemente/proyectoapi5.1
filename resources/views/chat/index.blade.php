@extends('layouts.app')
@section('content')

<div id="load">Please wait ...</div>
<audio id="notif_audio"><source src="{!! asset('sounds/notify.ogg') !!}" type="audio/ogg"><source src="{!! asset('sounds/notify.mp3') !!}" type="audio/mpeg"><source src="{!! asset('sounds/notify.wav') !!}" type="audio/wav"></audio>
  

<div class="container">
  <div id="new-message-notif"></div>
    <div class="row">
      @include('chat.table')
    </div>
</div>

@endsection