@extends('layouts.app')

@section('content')
<div class="container">
	{!! Breadcrumb::render('sistemasshow')!!}
	@include('sistemas.show_fields')
</div>
@endsection
