	@include('common.errors')
<div class="modal fade" id="modal-id" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content" style="color:black">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Post!</h4>
			</div>
			<div class="modal-body">
				<div class="container" style="width:100%">
				    {!! Form::open(['route' => 'posts.store','files'=> true]) !!}
		        		@include('posts.fields')
		        	    {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>

