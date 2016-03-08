{!! Form::hidden('id_repositorio',$repositorio->id) !!}
<!-- Nombre documento Field -->
<div class="form-group col-sm-8 col-sm-offset-2">
    {!! Form::label('nombre', 'Nombre Documento:') !!}
	{!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

 <!-- Tipo Select -->
<div class="form-group col-sm-8 col-sm-offset-2">                           
    {!! Form::label('tipo', 'Tipo:',['class'=>"col-md-4 control-label"]) !!}
    <div class="col-md-6">
        {!!Form::select('tipo', ['documento' => 'Documento','enlace' => 'Enlace'],null,['class'=>'form-control','id'=>'tipo']);!!}           
    </div>
</div>

<!-- Documento Field -->
<div class="form-group col-sm-8 col-sm-offset-2 documento"> 
   {!! Form::label('documento', 'Documento:',['class'=>'col-md-4 control-label']) !!}
	<div class="form-group ">                            
        <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-primary btn-file">
                    Subir Documento&hellip; 
                    {!! Form::file('documento') !!}
                </span>
            </span>
            <input type="text" class="form-control" readonly>
        </div>							
	</div>
</div>

<!-- Enlace Field -->
<div class="form-group col-sm-8 col-sm-offset-2 enlace" style="display: none">
    {!! Form::label('enlace', 'Enlace:') !!}
    {!! Form::text('enlace', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>

@push('styles')
    {!! HTML::style('css/file-input.css')!!}
@endpush
@push('scripts')
{!! HTML::script('js/file-input.js')!!}
    <script type="text/javascript">
        $(document).ready(function(){          
            if($('#tipo').val()=='documento'){
                $('.documento').show();
                $('.enlace').hide();
            }
            if($('#tipo').val()=='enlace'){
                $('.enlace').show();
                $('.documento').hide();
            }

            $('#tipo').on('change',function(){
                if(this.value=='documento'){
                    $('.documento').show();
                    $('.enlace').hide();
                }
                if(this.value=='enlace'){
                    $('.enlace').show();
                    $('.documento').hide();
                }
            });
        });        
    
    </script>
@endpush