@extends('layouts.app')

@section('content')

    <div class="container">
        @include('flash::message')
        <div class="row">
            <h1 class="pull-left">Posts</h1>
            @if(Auth::user()->rol=='admin')
                <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('posts.create') !!}">Add New</a>
            @endif
        </div>
        <hr>
        <div class="row">
            @if($posts->isEmpty())
                <div class="well text-center">Posts no encontrados.</div>
            @else
                @include('posts.table')
            @endif
        </div>


    </div>
@endsection
