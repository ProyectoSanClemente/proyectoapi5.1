@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Impresoras</h1>
        </div>
        <hr>
        <div class="row">
            @if($impresoras->isEmpty())
                <div class="well text-center">No Impresoras found.</div>
            @else
                @include('impresoras.table')
            @endif
        </div>
    </div>
@endsection
