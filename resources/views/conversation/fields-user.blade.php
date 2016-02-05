<li>
    <a href="#" class="user-selected" data-user2_id="{{$user->id}}" data-user2_accountname="{{ $user->accountname}}">
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3">
                            <!-- User image here (use the "crop-chat" class into the "img" tag) -->
                            <img src="{{ $user->imagen}}" class="crop-chat"/>
                        </div>
                        <div class="col-md-9">
                            <!-- Username here -->
                            {{ $user->accountname }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
</li>