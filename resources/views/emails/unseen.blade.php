@extends('layouts.app')
@section('content')
<!-- Content -->

<div class="container">
	<div class="row">
        <h1 class="pull-left">No vistos</h1>
    </div>
    @include('flash::message')
    <div class="row">
      <div class="col-lg-3">  
        @include('emails.sidebar')
      </div>   
        <div class="col-lg-9">          
            @include('emails.table')
        </div>
    </div>
</div>
@endsection

