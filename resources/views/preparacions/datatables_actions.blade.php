<a href="{{ route('preparacions.show', $id) }}" data-toggle="tooltip" title="Ver" class='btn btn-default btn-sm'>
    <i class="fa fa-eye"></i>
</a>

<a href="{{ route('preparacions.edit', $id) }}" data-toggle="tooltip" title="Editar" class='btn btn-outline-info btn-sm'>
    <i class="fa fa-edit"></i>
</a>

<a href="{{ route('preparaciones.imprimir', ['tamanio' => 5,'preparacion' => $id]) }}" data-toggle="tooltip" title="Imprimir 10x5" class='btn btn-outline-info btn-sm'>
    <i class="fa fa-print"></i>
</a>

<a href="{{ route('preparaciones.imprimir', ['tamanio' => 10,'preparacion' => $id]) }}" data-toggle="tooltip" title="Imprimir 10x10" class='btn btn-outline-info btn-sm'>
    <i class="fa fa-print fa-2x"></i>
</a>

<a href="#" onclick="deleteItemDt(this)" data-id="{{$id}}" data-toggle="tooltip" title="Eliminar" class='btn btn-outline-danger btn-sm'>
    <i class="fa fa-trash-alt"></i>
</a>



<form action="{{ route('preparacions.destroy', $id)}}" method="POST" id="delete-form{{$id}}">
    @method('DELETE')
    @csrf
</form>
