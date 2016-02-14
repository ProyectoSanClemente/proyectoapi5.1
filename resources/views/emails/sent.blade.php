@extends('layouts.app')
@section('content')
<!-- Content -->
<div class="container">
        {!! Breadcrumbs::render('sents')!!}
        <h1>Correos Enviados</h1><hr>
   
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


