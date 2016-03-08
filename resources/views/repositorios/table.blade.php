@foreach($repositorios as $repositorio)   
        
    <div class="panel-group col-sm-6">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">
                    <a data-toggle="collapse" href="#collapse-{{$repositorio->id}}">Repositorio: {{$repositorio->nombre}}</a>
                     <a class="btn btn-sm btn-primary glyphicon glyphicon-chevron-down pull-right" data-toggle="collapse" href="#collapse-{{$repositorio->id}}"></a>
                </div>              
            </div>
            <div id="collapse-{{$repositorio->id}}" class="panel-collapse collapse">
                @if(Auth::user()->rol=='admin')
                    <div align="right">
                        <a href="{!! route('documentos.create',[$repositorio->id]) !!}" class="btn btn-xs btn-warning">
                            <span class="glyphicon glyphicon-plus"></span>
                        </a>                        
                        <a href="{!! route('repositorios.edit',[$repositorio->id]) !!}"class="btn btn-xs btn-warning">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                        <a href="{!! route('repositorios.delete',[$repositorio->id]) !!}"onclick="return confirm('Desea eliminar este repositorio?')" class="btn btn-xs btn-warning">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </div>
                @endif
                <h2>Descripción: {{$repositorio->descripcion}}</h2>             
                @include('documentos.list-items')
                <div aling="right" class="panel-footer">Ultima Actualización: {{$repositorio->updated_at}}
                </div>
            </div>
        </div>
    </div>
@endforeach   