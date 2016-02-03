@if($conversation->user1==Auth::user()->accountname || $conversation->user2==Auth::user()->accountname)
<a href="#" class="conversation-selected" data-conversation-id="{{ $conversation->id}}">
    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                        
                    @if($conversation->user1==Auth::user()->accountname)
                        <div class="col-md-3">
                        <!-- User image here (use the "crop-chat" class into the "img" tag) -->
                        <img src="{{ $user->imagen}}" class="crop-chat"/>
                        </div>
                        <div class="col-md-9" id="user2-{{$conversation->id}}">
                            <!-- Username here -->
                            {{ $conversation->user2 }}
                        </div>
                    
                    @elseif($conversation->user2==Auth::user()->accountname)
                         <div class="col-md-3">
                        <!-- User image here (use the "crop-chat" class into the "img" tag) -->
                        <img src="{{ $user->imagen}}" class="crop-chat"/>
                        </div>
                        <div class="col-md-9" id="user2-{{$conversation->id}}">
                            <!-- Username here -->
                            {{ $conversation->user1 }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</a>
@endif
                    