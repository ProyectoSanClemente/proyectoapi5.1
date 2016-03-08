<div class="list-group">
    @if($repositorio->Documentos->isEmpty())
        <h3 style="color:red">Repositorio Sin Documentos</h3>
    @endif
    @foreach ($repositorio->Documentos as $documento)
         @if(Auth::user()->rol=='admin')
            <div align="right">                        
                <a href="{!! route('documentos.edit',[$documento->id]) !!}"class="btn btn-xs btn-warning">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                <a href="{!! route('documentos.delete',[$documento->id]) !!}"onclick="return confirm('Desea eliminar este documento?')" class="btn btn-xs btn-warning">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
            </div>
        @endif       
        @if($documento->documento=='')
        <a href="{{$documento->enlace}}" target="_blank" class="list-group-item">
            <span class="glyphicon glyphicon-globe fa-3x pull-left"></span>
            {{$documento->nombre}}
            <br>
            {{ $documento->enlace}}
        </a>
        @else
            <a href="{{$documento->documento}}" target="_blank" class="list-group-item"><span class="glyphicon glyphicon-file fa-3x pull-left"></span>
                {{$documento->nombre}}
                <br>
                {!!basename($documento->documento)!!}
            </a>
        @endif             
    @endforeach  
</div>