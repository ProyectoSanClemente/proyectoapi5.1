<span class="notifications-{{ $user->id}}"></span>
<a href="javascript:void(0);" class="user-selected" data-user-id="{{ $user->id}}" data-token="{{csrf_token()}}" data-user-url="listamensajes">
    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3">
                        <!-- User image here (use the "crop-chat" class into the "img" tag) -->
                        <img src="{{ $user->imagen}}" class="crop-chat"/>
                    </div>
                    <div class="col-md-9" id="nombre-{{$user->id}}">
                        <!-- Username here -->
                        {{ $user->accountname }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</a>