@extends('layouts.app')
@push('scripts')
    {!! HTML::style('css/chat.css')!!}
    {!! HTML::script('js/chat/chat.js') !!}
    {!! HTML::script('js/chat/jquery.slimscroll.min.js') !!}
    {!! HTML::script('js/chat/jquery.formatDateTime.min.js') !!}

    <style type="text/css">
        .scroll-users { height: 450px !important; }
        .scroll-bottom { height: 450px !important; }
        .slimScrollDiv { height: 450px !important; }
    </style>
@endpush

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- Users list starts here -->
            <div class="col-md-4">
                <!-- Begin Portlet PORTLET-->
                <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption">
                            Usuarios
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="scroller scroll-users" style="height:500px">
                            <!-- First iteration for active users, and the last for inactive users -->
                            @foreach ($users as $user)
                            {!! Form::open(['class'=>'form-horizontal form-bordered user-list'])!!}
                                @include('conversation.fields-user')
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
            <div class="col-md-8 well well-grey" style="height:500px">
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
                        <div class="scroller scroll-bottom" style="height:350px !important;">

                        <div class="div_conversation" data-base-url="{{ URL::to('/') }}"></div>
                            aaaa
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="input-group">
                            <input type="text" class="form-control text-message form-control">
                            <span class="input-group-btn">
                                <input type="hidden" name="to" value="0">
                                <button type="button" class="btn btn-primary form-control send-button" data-to="0" data-url-send-message="enviarmensaje"> Ok </button>
                            </span>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End of conversation here -->
        </div>
    </div>
@endsection