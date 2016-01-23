<style type="text/css">
	@media screen and (min-width: 675px) {
    #myModal .modal-dialog  {width:670px;}

}
</style>
<!-- Titulo Field -->

<!-- Contenido Field -->
<div class="form-group">
  	{!! HTML::image($notice->imagen)!!}
</div>
<div class="form-group text-justify" >
    {!! Form::label('contenido', 'Contenido:') !!}
    <p>{!! $notice->contenido !!}</p>
</div>



