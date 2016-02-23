	@include('common.errors')
<style type="text/css">
    @media screen {
    .modal-dialog  {width:1200px;}

}
</style>
<div class="modal fade" id="modal-comentario" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content" style="color:black">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Comentarios</h4>
			</div>
			<div class="modal-body">
				<div class="container" style="width:100%">
				@foreach($comentarios as $comentario)
				{!!$comentario['id_post']!!}
                    <div class="panel-body" style="height:400px">
						<div class="row">
							<div class="col-sm-1">
								<div class="thumbnail">
									<img class="img-responsive user-photo" src="{!!$comentario->Usuario->imagen!!}">
								</div><!-- /thumbnail -->
							</div><!-- /col-sm-1 -->
							<div class="col-sm-11">
								<div class="panel panel-default">
								     
									<div class="panel-heading">
										<strong>{!!$comentario->Usuario->nombre.' '.$comentario->Usuario->apellido!!}</strong> <span class="text-muted">{!!$comentario->created_at->diffForHumans()!!}</span>
									</div>
									<div class="panel-body">
										{!!$comentario->contenido!!}
									</div><!-- /panel-body -->
								</div><!-- /panel panel-default -->
							</div><!-- /col-sm-5 -->
						</div><!-- /row -->
					</div>
	        	@endforeach
	        	@include('comentarios.fields')
				</div>
			</div>
		</div>
	</div>
</div>

