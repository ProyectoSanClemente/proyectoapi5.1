@extends('layouts.app')

@section('content')
<div class="container-fluid">
	{!! Breadcrumbs::render('help') !!}
	<embed src="manual.pdf" width="100%" height="600px">
</div>
@endsection