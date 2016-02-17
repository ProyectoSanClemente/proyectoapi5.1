<div class="contenedor" id="muro">
@foreach($posteos as $posteo)

  <div class="well">
    <div class="media">
    	<a class="pull-left" href="#">
  		<img  class="img-circle special-img" width="25px" src="{!!$posteo->Usuario->imagen!!}">
  		</a>
  		<div class="media-body">
  		<h4 class="media-heading">{!! $posteo->titulo !!}</h4><hr>
        <p>{!!$posteo->contenido!!}</p>
        <ul class="list-inline list-unstyled">
  			<li><span><i class="glyphicon glyphicon-calendar"></i> {!!$posteo->created_at->diffForHumans()!!} </span></li>
          <li>|</li>
          <span><i class="glyphicon glyphicon-comment"></i> 2 comments</span>
          <li>|</li>
          <span><class="text-right">Escrito por :{!!$posteo->Usuario->displayname!!}</span>
  		  </ul>
      </div>
    </div>
  </div>
@endforeach
</div>