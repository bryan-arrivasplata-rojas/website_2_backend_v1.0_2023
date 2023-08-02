<table class="table-livewire table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Password</th>
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
                    <td class="identificador">{{ $resp->idUser }}</td>
                    <td>{{ $resp->profile->name_profile ?? 'Nombre no disponible' }}</td>
                    <td>{{ $resp->email }}</td>
                    <td>{{ $resp->password }}</td>
                    <td>
                        <a href="{{route('users.edit',$resp->idUser)}}" class="btn btn-primary">Editar</a>
                        @if(Session::has('hidden'))
                            <a class='btn btn-danger' type='submit' form="delete_{{$resp->idUser}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')">Borrar</a>
                            <form action="{{route('users.destroy',$resp->idUser)}}" method="POST" id="delete_{{$resp->idUser}}" enctype="multipart/form-data" hidden>
                                @csrf
                                @method('DELETE')
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Password</th>
            <th>Actions</th>
        </tr>
    </tfoot>
</table>