@extends('layouts.app')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<audio id="notif_audio"><source src="{!! asset('sounds/notify.ogg') !!}" type="audio/ogg"><source src="{!! asset('sounds/notify.mp3') !!}" type="audio/mpeg"><source src="{!! asset('sounds/notify.wav') !!}" type="audio/wav"></audio>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- Users list starts here -->
            <div class="col-md-4">
                <!-- Begin Portlet PORTLET-->
                <div class="portlet">                    
                    <div class="col-lg-12">
                    <h3 class="bold">Lista usuarios</h3>
                        <div class="btn-group">
                            {!! Form::hidden('accountname', Auth::user()->accountname, ['id'=>'accountname']) !!} 
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Crear Conversación<span class="caret"></span></button>
                            <ul class="dropdown-menu scrollable-menu" role="menu">
                                @foreach ($users as $user)
                                    {!! Form::open(['class'=>'form-horizontal form-bordered user-list'])!!}
                                        @include('conversation.fields-user')
                                    {!! Form::close()!!}
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="portlet-title">
                        <div class="caption">
                            Conversaciones Activas {{count($conversations)}}                            
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="scroller scroll-users" style="height:500px">
                            <!-- First iteration for active users, and the last for inactive users -->
                            @foreach ($conversations as $conversation)
                            {!! Form::open(['class'=>'form-horizontal form-bordered conversation-list'])!!}
                                @include('conversation.fields-conversation')
                            {!! Form::close()!!}
                            @endforeach
                            <!-- End of iteration here -->
                        </div>
                    </div>

                </div>
                <!-- End Portlet PORTLET-->
            </div>
            <!-- End of users list -->

            <!-- Begin conversation here -->
            <div class="col-md-8 well well-grey" style="height:550px">
                <div class="portlet gren">
                    <div class="portlet-title">
                        <div class="caption">
                            <p class="user_conversation_title">
                                <!-- Isert here a title to the conversation area -->
                                Selecciona a un Usuario para conversar
                            </p>
                        </div>
                    </div>
                    <div class="portlet-body portlet-conversation" style="height:400px">
                        <div class="scroller scroll-bottom" style="height:400px !important;">

                        <div class="div_conversation" data-base-url="{{ URL::to('/') }}"></div>
                           
                           {!! Form::hidden('conversation_id', '', ['id'=>'conversation_id']) !!}                 
                        
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="input-group">
                            <input type="text" class="form-control text-message form-control">
                            <span class="input-group-btn">
                                {!!  Form::button('Enviar', ['class'=>"btn btn-primary form-control send-button"]) !!}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of conversation here -->
        </div>
    </div>
@endsection

@push('scripts')
</style>
    {!! HTML::script('js/chat/chat.js') !!}
    {!! HTML::script('js/chat/jquery.slimscroll.min.js') !!}
    {!! HTML::script('js/chat/jquery.formatDateTime.min.js') !!}
    {!! HTML::style('css/chat.css')!!}
    <style type="text/css">
        .scroll-users { height: 400px !important; }
        .scroll-bottom { height: 400px !important; }
        .slimScrollDiv { height: 400px !important; }
    </style>
@endpush