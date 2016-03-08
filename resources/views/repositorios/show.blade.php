@extends('layouts.app')

@section('content')
<div class="container">
	{!! Breadcrumb::render('sistemasshow')!!}
	@include('anexo.show_fields')
</div>
@endsection
