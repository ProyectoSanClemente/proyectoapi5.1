@extends('layouts.app')

@section('content')
<div class="container">
	{!! Breadcrumbs::render('help') !!}
	<embed src="manual.pdf" width="100%" height="500px">
</div>
@endsection