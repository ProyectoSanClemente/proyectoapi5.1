<table id="anexos" class="table">
    <thead>
        <th>Nombre Anexo</th>
        <th>Numero</th>
    <th width="50px">Acciones</th>
    </thead>
    <tbody>    
    @foreach($anexos as $anexo)
        <tr id="{{$anexo->id}}">
            <td>{!! $anexo->nombre!!}</td>
            <td>{!! $anexo->numero!!}</td>
            <td>
                <a href="{!! route('anexos.edit', [$anexo->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('anexos.delete', [$anexo->id]) !!}" onclick="return confirm('Estás seguro que deseas eliminar este anexo?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@push('styles')
    {!! HTML::style('css/jquery.dataTables.css')!!}
    {!! HTML::style('js/jQuery-contextMenu/jquery.contextMenu.css')!!}
@endpush

@push('scripts')
{!! HTML::script('js/jquery.dataTables.js') !!}
<script type="text/javascript">
    $(document).ready(function() {
        $('#anexos').DataTable();
    });
</script>

<!-- Incluir  Css contextMenu-->
{!! HTML::script('js/jQuery-contextMenu/jquery.contextMenu.js')!!}
<!-- Jquery menu contextual -->
<script type="text/javascript">
    $(function(){
    $('#anexos').contextMenu({
        selector: 'tr',
        items: {
            "edit": {name: "Editar", icon: "edit",callback: function(){
                    var id=$(this).attr('id');
                    url="{{ route('anexos.edit', $anexo->id) }}"
                    var url = url.replace("{{$anexo->id}}",id);
                    window.location.href = url;            
                }
            },
            "delete": {name: "Eliminar", icon: "fa-trash",callback: function(){
                    var answer=confirm('Estas seguro que deseas eliminar este anexo?');
                    if(answer){
                        var id=$(this).attr('id');
                        url="{{ route('anexos.delete', $anexo->id) }}"
                        var url = url.replace("{{$anexo->id}}",id);
                        window.location.href = url;        
                    }
                }
            },
        }
    });
});
</script>
@endpush