@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')
    <div style="display:none">
    {!! redirect('http://www.sanclemente.cl:891/sysworkflow/es/neoclassic/login/login')!!}
    </div>
		<div align="center">{!!HTML::image("images/load/default.gif")!!}
			Redireccionando, por favor espere...
		</div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
$( document ).ready(function() {
	$('#form[BSUBMIT]').click();
});
//aun no implementado
</script>
@endpush