<table class="table-livewire table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Posición</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if ($loading)
            <!-- Mostrar mensaje de carga mientras se cargan los datos -->
            <tr>
                <td colspan="5" class="text-center">Cargando...</td>
            </tr>
        @elseif (empty($response))
            <!-- Mostrar mensaje de "no hay datos" si la respuesta está vacía -->
            <tr>
                <td colspan="5" class="text-center">No hay datos disponibles.</td>
            </tr>
        @else
            <!-- Mostrar los datos de la tabla -->
            @foreach ($response as $resp)
                <tr>
                    <td class="identificador">{{ $resp->idType }}</td>
                    <td>{{ $resp->name_type}}</td>
                    <td>{{ $resp->description_type}}</td>
                    <td>{{ $resp->position_type}}</td>
                    <td>
                        <a href="{{route('types.edit',$resp->idType)}}" class="btn btn-primary">Editar</a>
                        <button class='btn btn-danger' type='submit' form="delete_{{$resp->idType}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')">Borrar</button>
                        <form action="{{route('types.destroy',$resp->idType)}}" method="POST" id="delete_{{$resp->idType}}" enctype="multipart/form-data" hidden>
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Posición</th>
            <th>Actions</th>
        </tr>
    </tfoot>
</table>