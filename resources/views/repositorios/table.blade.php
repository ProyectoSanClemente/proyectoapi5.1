    @foreach($repositorios as $repositorio)
        
        <div class="col-sm-6">          
                <div class="well">
                @if(Auth::user()->rol=='admin')
                   <a href="{!! route('repositorios.delete',[$repositorio->id]) !!}"  onclick="return confirm('Desea eliminar este repositorio?')"><i class="glyphicon glyphicon-remove pull-right"></i></a>                    
                     <a href="{!! route('documentos.create',[$repositorio->id]) !!}"><i class="glyphicon glyphicon-plus pull-right"></i></a>
                       <a href="{!! route('repositorios.edit',[$repositorio->id]) !!}"><i class="glyphicon glyphicon-edit pull-right"></i></a>
                @endif
 
                       <h3>Titulo: {{$repositorio->nombre}}</h3>               
                <h5>Descrición: {{$repositorio->descripcion}}</h5><hr>
            
                <div class="list-group ">
                    
                    @foreach ($repositorio->Documentos as $documento)
                        <a href="#" class="list-group-item">          
                            <h4 class="list-group-item-heading">{{$documento->nombre}}

                            </h4>
                            <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                        </a>  
                    @endforeach
                   
                </div>  
            </div>
        </div>
            
    @endforeach


