<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- keep this line bellow if you haven't a X-CSRF-TOKEN meta tag yet -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- keep this style sheet in this page -->
        
		{!! HTML::style('chat/css/main.css')!!}
		{!! HTML::script('chat/js/chat.js')!!}
        {!! HTML::script('chat/js/jquery.slimscroll.min.js')!!}
		{!! HTML::script('chat/js/jquery.formatDateTime.min.js')!!}
        
        <style type="text/css">
        .scroll-users { height: 450px !important; }
        .scroll-bottom { height: 450px !important; }
        .slimScrollDiv { height: 450px !important; }
        </style>
        <title>Easychat</title>
    </head>
    <body class="skin-blue sidebar-mini">

        <div class="row">
            <div class="col-md-12">

                <!-- Users list starts here -->
                <div class="col-md-4">
                    <!-- Begin Portlet PORTLET-->
                    <div class="portlet">
                        <div class="portlet-title">
                            <div class="caption">
                                Users list
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="scroller scroll-users" style="height:500px">

                                <!-- First iteration for active users, and the last for inactive users -->
                                @foreach ($users as $user)
                                
                                <form role="form" class="form-horizontal form-bordered user-list" name="form-user-list-{{ $user->id }}">
                                    <span class="notifications-{{ $user->id }}"></span>
                                    <a href="javascript:void(0);" class="user-selected" data-user-id="{{ $user->id }}" data-user-url="">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <!-- User image here (use the "crop-chat" class into the "img" tag) -->
                                                            <img src="{{ $user->imagen }}" class="crop-chat"/>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <!-- Username here -->
                                                            {{ $user->accountname}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </form>
                                
                                @endforeach
                                <!-- End of iteration here -->

                            </div>
                        </div>
                    </div>
                    <!-- End Portlet PORTLET-->
                </div>
                <!-- End of users list -->

                <!-- Begin conversation here -->
                <div class="col-md-8 well well-grey" style="height:600px">
                    <div class="portlet gren">
                        <div class="portlet-title">
                            <div class="caption">
                                <p class="user_conversation_title">
                                    <!-- Isert here a title to the conversation area -->
                                    Select a user to chat
                                </p>
                            </div>
                        </div>
                        <div class="portlet-body portlet-conversation" style="height:450px">
                            <div class="scroller scroll-bottom" style="height:450px !important;">

                            <div class="div_conversation" data-base-url="{{ URL::to('/') }}"></div>
                                <!-- Conversation here -->
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="input-group">
                                <input type="text" class="form-control text-message form-control">
                                <span class="input-group-btn">
                                    <input type="hidden" name="to" value="0">
                                    <button type="button" class="btn btn-primary form-control send-button" data-to="0" data-url-send-message="send"> Ok </button>
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End of conversation here -->
                
				{{--
                <!-- data div -->
                <div class="only-links"
                    data-users-list="{{ URL::route('easychat.users.list', ['ajax', 0]) }}"
                    data-get-chat-news="{{ URL::route('easychat.check.messages') }}"
                    data-get-all-chat-news="{{ URL::route('easychat.check.allmessages') }}"
                    data-img-loading="{{ URL::asset('chat/img/loading.gif') }}"
                    data-img-loading-bar="{{ URL::asset('chat/img/loading-bar.gif') }}">
                </div>
				--}}	
            </div>
        </div>


    </body>
</html>
