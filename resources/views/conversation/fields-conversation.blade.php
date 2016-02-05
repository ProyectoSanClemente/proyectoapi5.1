
                            @foreach ($conversations as $conversation)
                                    {!! Form::open(['class'=>'form-horizontal form-bordered conversation-list'])!!}
                                         <a href="#" class="conversation-selected" data-user2_id='{{$conversation->user2_id}}' data-user2_accountname='{{$conversation->user2_accountname}}'>
    <div class="form-group row col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="row">                        
                    <div class="col-md-3">
                    <!-- User image here (use the "crop-chat" class into the "img" tag) -->
                    <img src="{{ $user->imagen}}" class="crop-chat"/>
                    </div>
                    <div class="col-md-9">
                        <div id="user2-{{$conversation->id}}">
                            <!-- Username here -->
                            {{ $conversation->user2_accountname }} 
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</a>

                                    {!! Form::close()!!}
                            @endforeach

