@extends('layouts.app')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- Inputs de info --}}
{!! Form::hidden('user1_id', Auth::user()->id, ['id'=>'user1_id']) !!}
{!! Form::hidden('accountname', Auth::user()->accountname, ['id'=>'user1_accountname']) !!}
{!! Form::hidden('conversation_id', '', ['id'=>'conversation_id']) !!}
{!! Form::hidden('conversation2_id', '', ['id'=>'conversation2_id']) !!} 

<audio id="notif_audio"><source src="{!! asset('sounds/notify.mp3') !!}" type="audio/mpeg"></audio>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- Users list starts here -->
            <div class="col-md-4">
                <!-- Begin Portlet PORTLET-->
                <div>
                    <!-- Nav tabs -->                  
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#conversations" aria-controls="conversations" role="tab" data-toggle="tab">Conversaciones</a></li>
                        <li role="presentation"><a href="#users" aria-controls="users" role="tab" data-toggle="tab">Usuarios</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="conversations">
                            <div class="portlet">                    
                                  <div class="portlet-body form">
                                    <div class="scroller scroll-conversations">
                                        <!--  Listado de conversaciones activas-->
                                    </div>
                                </div>
                            </div>
                         <!-- End Portlet PORTLET-->
                        </div>
                        <div role="tabpanel" class="tab-pane" id="users">
                            <div class="portlet">                    
                                <div class="portlet-body form">                   
                                    <div class="scroller scroll-users">
                                        <!--  Listado de conversaciones activas-->
                                        @foreach ($users as $user)
                                            {!! Form::open(['class'=>'form-horizontal'])!!}
                                                <a href="#" class="user-selected" data-user2_id="{{$user->id}}" data-user2_accountname="{{ $user->accountname}}">
                                                    <div class="form-group col-md-12">
                                                        <div class="col-md-3">
                                                            <img class="img-circle crop-chat" src="{{ $user->imagen}}">
                                                        </div>
                                                        <div class="col-md-9">
                                                            {{ $user->accountname }}
                                                        </div>
                                                    </div>
                                                </a>
                                            {!! Form::close()!!}
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
            <!-- End of users list -->

            <!-- Begin conversation here -->
            <div class="col-md-8 well well-white" style="height:500px">
                <div class="portlet gren">
                    <div class="portlet-title">
                        <div class="caption">
                            <p class="user_conversation_title">
                                <!-- Isert here a title to the conversation area -->
                                Selecciona a un Usuario para conversar
                            </p>
                        </div>
                    </div>
                    <div class="portlet-body portlet-conversation" style="height:350px">
                        <div class="scroller scroll-conversation" style="height:350px !important;">
                            
                                {{-- Aqui mensajes--}}
                                <div class="div_conversation">
                                      
                            
                            </div>
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
        .scroll-conversations { height: 450px !important; }
        .scroll-users { height: 450px !important; }
        .slimScrollDiv { height: 450px !important; }
        .scroll-conversation { height: 350px !important; }   
    </style>
@endpush

