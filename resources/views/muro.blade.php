<div class="contenedor" id="muro">
@foreach($posteos as $posteo)

  <div class="well">
    <div class="media">
    	<a class="pull-left" href="#showModal{!!$posteo->Usuario->id!!}" data-toggle="modal" data-toggle="modal">
  		<img  class="img-circle special-img" width="25px" src="{!!$posteo->Usuario->imagen!!}">
  		</a>
        <div class="media-body">
        <h4 class="media-heading">{!! $posteo->titulo !!}
      @if(Auth::id()==$posteo->id_usuario)
      <a href="{!! route('posts.delete', [$posteo->id]) !!}" onclick="return confirm('Estas seguro que deseas eliminar este mensaje?')"><i class="glyphicon glyphicon-remove pull-right"></i></a>
      @endif</h4>
      <hr>
        <p>{!!$posteo->contenido!!}</p>

        <div class="foto" id="foto">
          @if (!empty($posteo->imagen)) 
                  <hr>
            {!! HTML::image($posteo->imagen)!!}
          @endif
          @if (!empty($posteo->archivo))
          <hr>Archivos Adjuntos : 
          <a href="{{URL::to($posteo->archivo)}}" target="_blank" download="{!!basename($posteo->archivo)!!}">{!!basename($posteo->archivo)!!}</a>
          @endif
                  <hr>
        </div>
        <ul class="list-inline list-unstyled">
    			<li><span><i class="glyphicon glyphicon-calendar"></i> {!!$posteo->created_at->diffForHumans()!!} </span></li>
          <li>|</li>
            <span><class="text-right">Escrito por :  {!!$posteo->Usuario->nombre.' '.$posteo->Usuario->apellido!!}</span>

          <li>|</li> 
          <a class="pull-right" id="comentar" data-post-id="{!! $posteo->id!!}" data-toggle="modal" href='#modal-comentario'><span class="btn btn-primary"><i class=" glyphicon glyphicon-comment comentar"></i> {!!$posteo->Comentarios->count()!!} Comentarios</span></a>
  		  </ul>
      </div>
    </div>
  </div>
@endforeach
</div>
