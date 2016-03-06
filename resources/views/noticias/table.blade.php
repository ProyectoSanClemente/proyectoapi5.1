<style type="text/css">
@media screen and (min-width: 675px) {
         .modal-dialog  {width:673px;}

}
</style>

@foreach($notices->chunk(2) as $variable)
    <div class="row">
        @foreach($variable as $notice)
 <!-- Projects Row -->
        <div class="col-md-6 portfolio-item">
            <div class="panel panel-danger" >
                  <div class="panel-heading clearfix">                    
                    <h4 class="panel-title pull-left">{!!$notice->titulo!!}</h4>
                    <div class="btn-group pull-right">
                        <button class="btn btn-danger glyphicon glyphicon-menu-hamburger" type="button" data-toggle="collapse" href="#collpase-{!!$notice->id!!}"></button>
                    </div>
                </div>
                <div id="collpase-{!!$notice->id!!}" class="panel-collapse collapse in">
                    <div class="panel-body"  style="height:auto">
                            <p align="right">
                            <a href="{!! route('noticias.edit', [$notice->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                            <a href="{!! route('noticias.delete', [$notice->id]) !!}" onclick="return confirm('Are you sure wants to delete this Notice?')"><i class="glyphicon glyphicon-remove"></i></a>

                            @include('noticias.show')
                            </p>
                        @if (!empty($notice->imagen))
                            <div align="center"> 
                                {!! HTML::image($notice->imagen,null,array('width' => 400, 'height' => 300,'class' => 'img-responsive', 'data-toggle'=>'modal','data-target'=>'#myModal'))!!}
                            </div>
                        <hr>
                        @endif
                        <p class="col-md-9 portfolio-item text-justify">                 
                            @if (strlen($notice->contenido) > 180)
                                {!! substr($notice->contenido, 0, 180)."...";!!}
                            @else
                                {!! $notice->contenido !!}
                            
                            @endif
                            <div>
                                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#myModal{{$notice->id}}">Leer más <span class="glyphicon glyphicon-chevron-right"></span></a>
                            </div>
                        </p>
                    </div>
                    <div align="right" style="margin-right: 20px">Publicada: {{$notice->updated_at}}</div>
                </div>
            </div>
        </div>
        @endforeach           <!-- /.row -->
    </div><hr>
@endforeach