<table class="table-livewire table table-striped" style="width:100%">
    <thead>
        <tr>
            <th hidden>IDExtension</th>
            <th>ID</th>
            <th>Nombre</th>
            <th>URL</th>
            <th>Created_at</th>
            <th>Extension</th>
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
                    <td hidden>{{ $resp->idExtension}}</td>
                    <td class="identificador">{{ $resp->idUpload }}</td>
                    <td>{{ $resp->name_upload}}</td>
                    <td>{{ $resp->url_upload}}</td>
                    <td>{{ $resp->created_at}}</td>
                    <td>{{ $resp->extension->name_extension ?? 'Extension no disponible'}}</td>
                    <td>
                        <a href="{{route('uploads.edit',$resp->idUpload)}}" class="btn btn-primary">Editar</a>
                        <button class='btn btn-danger' type='submit' form="delete_{{$resp->idUpload}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')">Borrar</button>
                        <form action="{{route('uploads.destroy',$resp->idUpload)}}" method="POST" id="delete_{{$resp->idUpload}}" enctype="multipart/form-data" hidden>
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
            <th hidden>IDExtension</th>
            <th>ID</th>
            <th>Nombre</th>
            <th>URL</th>
            <th>Created_at</th>
            <th>Extension</th>
            <th>Actions</th>
        </tr>
    </tfoot>
</table>