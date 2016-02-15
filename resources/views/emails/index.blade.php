@extends('layouts.app')
@section('content')
<!-- Content -->
<div class="container">
        {!! Breadcrumbs::render('emails')!!}
        <h1>Buzón de Entrada</h1><hr>
   
    @include('flash::message')
    <div class="row">
      <div class="col-sm-3">  
        @include('emails.sidebar')
      </div>   
        <div class="col-sm-9">          
            @include('emails.table')
        </div>
    </div>
</div>
@endsection


