<style type="text/css">
@media screen and (min-width: 675px) {
         .modal-dialog  {width:673px;}

}
</style>

<hr>
@foreach($notices->chunk(2) as $variable)
    <div class="row">
        @foreach($variable as $notice)
 <!-- Projects Row -->
            <div class="col-md-6 portfolio-item">
                <a>
                    {!! HTML::image($notice->imagen,null,array('width' => 400, 'height' => 300,'class' => 'img-responsive', 'data-toggle'=>'modal','data-target'=>'#myModal'))!!}
                </a>
                <h3>
                    <a href="#" data-toggle="modal" data-target="#myModal{{$notice->id}}">{!! $notice->titulo !!}</a>
                </h3>
                <p class="col-md-9 portfolio-item text-justify">                 
                    @if (strlen($notice->contenido) > 180)
                        {!! substr($notice->contenido, 0, 180)."...";!!}
                    @else
                        {!! $notice->contenido !!}
                    
                    @endif
                        <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#myModal{{$notice->id}}">Leer más <span class="glyphicon glyphicon-chevron-right"></span></a>
                
                </p>

                <p><a href="{!! route('noticias.edit', [$notice->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('noticias.delete', [$notice->id]) !!}" onclick="return confirm('Are you sure wants to delete this Notice?')"><i class="glyphicon glyphicon-remove"></i></a>
                @include('noticias.show')</p>
            </div>

        @endforeach           <!-- /.row -->
    </div><hr>
@endforeach