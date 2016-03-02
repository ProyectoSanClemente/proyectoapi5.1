@extends('layouts.app')
@section('content')

{{-- Inputs de info --}}
{!! Form::hidden('user1_id', Auth::user()->id, ['id'=>'user1_id']) !!}
{!! Form::hidden('user1_accountname', Auth::user()->accountname, ['id'=>'user1_accountname']) !!}
{!! Form::hidden('user2_id', '', ['id'=>'user2_id']) !!}
{!! Form::hidden('user2_accountname', '', ['id'=>'user2_accountname']) !!}
{!! Form::hidden('conversation_id', '', ['id'=>'conversation_id']) !!}
{!! Form::hidden('conversation2_id', '', ['id'=>'conversation2_id']) !!}

<div class="container">
    <div class="row">
    {!! Breadcrumbs::render('chat') !!}
        <div class="col-md-12">
            <!-- Users list starts here -->
            <div class="col-md-4">
                <!-- Begin Portlet PORTLET-->
                <div id='tabs'>
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
                                        <input id="search-user" class="form-control" type="text" value="">
                                        <ol id="users-list" class="list-group" style="list-style-type: none">
                                            @foreach ($users as $user)
                                                <li><a href="#" class="user-selected" data-user2_id="{{$user->id}}" data-user2_accountname="{{ $user->accountname}}">
                                                    <div class="form-group col-md-12">
                                                        <div class="col-md-3">
                                                            <img class="img-circle crop-chat" src="{{ $user->imagen}}">
                                                        </div>
                                                        <div class="col-md-9">
                                                            {{ $user->accountname }}
                                                        </div>
                                                    </div>
                                                </a></li>
                                            @endforeach
                                        </ol>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
            <!-- End of users list -->
            <!-- Begin conversation here -->
            <div class="col-md-8 well well-white">
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
                            <input type="text" class="text-message form-control">  
                            <span class="input-group-btn">
                                {!!  Form::button('Enviar', ['class'=>"btn btn-success form-control send-button",'style'=>'margin-bottom:44px;color:#fff']) !!}
                            </span>
                        </div>
                    </div>
                    
                </div>

            </div>
            <!-- End of conversation here -->
        </div>
    </div>
</div>

<script>
    $('.text-message').emojiarea({wysiwyg: false}); 

    var $wysiwyg = $('.emojis-wysiwyg').emojiarea({wysiwyg: true});
    var $wysiwyg_value = $('#emojis-wysiwyg-value');
    
    $wysiwyg.on('change', function() {
        $wysiwyg_value.text($(this).val());
        $('.text-message').focus();
    });
    $wysiwyg.trigger('change');
</script>

<script type="text/javascript">
    $('#users-list').liveFilter('#search-user', 'li', {
        filterChildSelector: 'a'
    });
</script>


@endsection

@push('scripts')
    {!! HTML::script('js/chat/chat.js') !!}
    {!! HTML::script('js/chat/jquery.slimscroll.min.js') !!}
    {!! HTML::script('js/chat/jquery.formatDateTime.min.js') !!}
    
    {!! HTML::script('js/emoticons/emojiarea/jquery.emojiarea.js')!!}
    {!! HTML::script('images/emoticons/emojis.js')!!}
    {!! HTML::script('js/jquery-live.Filter.js')!!}


@endpush

@push('styles')
    {!! HTML::style('css/chat.css')!!}
    <style type="text/css">
        .scroll-conversations { height: 450px !important; }
        .scroll-users { height: 450px !important; }
        .slimScrollDiv { height: 450px !important; }
        .scroll-conversation { height: 350px !important; }   
    </style>
    {!! HTML::style('css/emoticons/jquery.emojiarea.css') !!}    
@endpush

