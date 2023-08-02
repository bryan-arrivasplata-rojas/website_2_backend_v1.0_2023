<table class="table-livewire table table-striped" style="width:100%">
    <thead>
        <tr>
            <th hidden>IDUser</th>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Numero</th>
            <th>Cumpleaños</th>
            <th>Email</th>
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
                    <td hidden>{{ $resp->idUser}}</td>
                    <td class="identificador">{{ $resp->idProfile }}</td>
                    <td>{{ $resp->name_profile}}</td>
                    <td>{{ $resp->description_profile}}</td>
                    <td>{{ $resp->number}}</td>
                    <td>{{ $resp->birthday}}</td>
                    <td>{{ $resp->user->email ?? 'Profile no disponible'}}</td>
                    <td>
                        <a href="{{route('profiles.edit',$resp->idProfile)}}" class="btn btn-primary">Editar</a>
                        @if(Session::has('hidden'))
                            <a class='btn btn-danger' type='submit' form="delete_{{$resp->idProfile}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')">Borrar</a>
                            <form action="{{route('profiles.destroy',$resp->idProfile)}}" method="POST" id="delete_{{$resp->idProfile}}" enctype="multipart/form-data" hidden>
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
            <th hidden>IDUser</th>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Numero</th>
            <th>Cumpleaños</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </tfoot>
</table>