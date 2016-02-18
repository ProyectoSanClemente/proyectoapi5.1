@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')
    <iframe src="http://sanclemente.crecic.cl/login.php" width="100%" height="600px"></iframe>

</div>
@endsection

@push('scripts')
	<script type="text/javascript">
		$(document).ready(function(){
			$('#myframe').load(function(){
		        $('#myframe').contents().find('#TxtUser').val('usertest');
		        $('#myframe').contents().find('#TxtPass').val('passtest');
		    });
		});
	</script>
@endpush