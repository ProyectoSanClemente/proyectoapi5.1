@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Noticias</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('noticias.create') !!}">Añadir Noticia</a>
        </div>
        <hr>
        <div class="row">
            @if($notices->isEmpty())
                <div class="well text-center">Noticias no Encontradas</div>
            @else
                @include('noticias.table')
            @endif
        </div>
        
        @include('common.paginate', ['records' => $notices])

        <div class="row row-centered col-lg-6">      
            <h2>Noticias RSS</h2>
           @foreach ($feed->get_items() as $item)
        <div class="item">
          <h2><a href="{{ $item->get_permalink() }}">{{ $item->get_title() }}</a></h2>
          <p>{{ $item->get_description() }}</p>
          <p><small>Posted on {{ $item->get_date('j F Y | g:i a') }}</small></p>
        </div>
      @endforeach

        </div>
        

    </div>
@endsection
