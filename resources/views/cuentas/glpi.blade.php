@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')
    <div style="display:none">
    {!! redirect('https://10.128.2.16/glpi/index.php')!!}
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