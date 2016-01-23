@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')
        <div class="row">
            <h1 class="pull-left">Sistemas</h1>
            @if(Auth::user()->rol=='admin')
                <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('sistemas.create') !!}">Add New</a>
            @endif
        </div>
        <hr>
        <div class="row">
            @if($sistemas->isEmpty())
                <div class="well text-center">No Sistemas found.</div>
            @else
                @include('sistemas.table')
            @endif
        </div>


    </div>
@endsection
