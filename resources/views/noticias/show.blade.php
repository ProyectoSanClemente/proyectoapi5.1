<div class="modal fade" id="myModal{{$notice->id}}" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{!!$notice->titulo!!}</h4>
            </div>
            <div class="modal-body">
	 			@include('noticias.show_fields')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
   	</div>
</div>