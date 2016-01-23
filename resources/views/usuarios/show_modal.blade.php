<div class="modal fade" id="showModal{{$usuario->id}}" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Datos de Usuario</h4>
            </div>
            <div class="modal-body">
	            <div class="row">
		            <div class="col-md-6">
		                @include('usuarios.show_fields')
		            </div>
		            <div class="col-md-6">
		                
		                {{HTML::image($usuario->imagen,null,array('class'=>'avatar img-circle img-thumbnail'))}}

		            </div>
	            </div>
	            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>