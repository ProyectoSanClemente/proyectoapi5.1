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
        <ul class="list-inline list-unstyled">
    			<li><span><i class="glyphicon glyphicon-calendar"></i> {!!$posteo->created_at->diffForHumans()!!} </span></li>
          <li>|</li>
            <span><class="text-right">Escrito por :{!!$posteo->Usuario->nombre.' '.$posteo->Usuario->apellido!!}</span>
          <li>|</li>
          <span><a class="btn btn-primary glyphicon glyphicon-comment comentar" id="comentar" data-post-id="{!! $posteo->id!!}" data-toggle="modal" href='#modal-comentario' ></a></span>
  		  </ul>
      </div>
    </div>
  </div>
@endforeach
</div>