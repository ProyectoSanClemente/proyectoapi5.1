
	@include('common.errors')
<div align="right">
	<a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Nuevo Post!</a>
</div>

<div class="modal fade" id="modal-id" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Post!</h4>
			</div>
			<div class="modal-body">
				<div class="container" style="width:100%" >
				{!! Form::open(['route' => 'posts.store','files'=> true]) !!}
	        		@include('posts.fields')
				{!! Form::close() !!}
				</div>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>

