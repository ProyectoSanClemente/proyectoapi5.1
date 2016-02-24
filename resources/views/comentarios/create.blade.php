	@include('common.errors')
<style type="text/css">
    @media screen and (min-width: 675px) {
    .modal-dialog  {width:670px;}

}
</style>
<div class="modal fade" id="modal-comentario" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content" style="color:black">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Comentarios {!!Form::button('', ['class' => 'btn btn-primary glyphicon glyphicon-chevron-down goto-anchor-top col-sm-offset-8']) !!}</h4>
			</div>
			<div class="modal-body">
				<div class="container" style="width:100%">
					<div class="comentarios">
					</div>
					@include('comentarios.fields')
				</div>
			</div>
		</div>
	</div>
</div>

