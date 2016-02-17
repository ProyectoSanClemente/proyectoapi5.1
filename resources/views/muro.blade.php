@foreach($posteos as $posteo)
<div class="well">
  <div class="media">
  	<a class="pull-left" href="#">
		<img class="media-object" src="http://placekitten.com/150/150">
		</a>
		<div class="media-body" id="muro">
		<h4 class="media-heading">{!! $posteo->titulo !!}</h4>
      <p class="text-right">{!!$posteo->id_usuario!!}</p>
      <p>{!!$posteo->contenido!!}</p>
      <ul class="list-inline list-unstyled">
			<li><span><i class="glyphicon glyphicon-calendar"></i> {!!$posteo->created_at!!} </span></li>
        <li>|</li>
        <span><i class="glyphicon glyphicon-comment"></i> 2 comments</span>
        <li>|</li>
		</ul>
   </div>
</div>
</div>
@endforeach