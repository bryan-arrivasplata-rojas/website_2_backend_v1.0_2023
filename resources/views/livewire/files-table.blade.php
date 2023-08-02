<div class="container-fluid container-tabla">
    <div class="form-floating mb-3">
        <select id="idUsability" class="selected form-select" name="idUsability" wire:change="filterByUsability($event.target.value)" required>
            <option value="-1">Seleccionar el Uso</option>
            @foreach ($usabilities as $value)
                <option value="{{ $value->idUsability }}">
                    {{$value->name_usability}}
                </option>
            @endforeach
        </select>
        <label for="idUsability" class="form-label">Seleccionar</label>
    </div>
    <div class="form-floating mb-3">
        <select id="idType" class="selected form-select" name="idType" wire:change="filterByType($event.target.value)" required>
            <option value="-1">Seleccionar el Tipo</option>
            @foreach ($types as $value)
                <option value="{{ $value->idType }}">
                    {{$value->name_type}}
                </option>
            @endforeach
        </select>
        <label for="idType" class="form-label">Seleccionar</label>
    </div>
    <table class="table-livewire table table-striped" style="width:100%">
        <thead>
            <tr>
                <th hidden>IDUser</th>
                <th hidden>IDUsability</th>
                <th hidden>IDType</th>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>URL de la Imagen</th>
                <th>URL del Video</th>
                <th>URL a Visitar</th>
                <th>URL del Documento</th>
                <th>URL de Descarga</th>
                <th>URL del Repositorio</th>
                <th>URL de Icono</th>
                <th>Lenguajes</th>
                <th>Nivel</th>
                <th>Posicion</th>
                <th>Created At</th>
                <th>Uso</th>
                <th>Tipo</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if ($loading)
                <!-- Mostrar mensaje de carga mientras se cargan los datos -->
                <tr>
                    <td colspan="14" class="text-center">Cargando...</td>
                </tr>
            @elseif (empty($response))
                <!-- Mostrar mensaje de "no hay datos" si la respuesta está vacía -->
                <tr>
                    <td colspan="14" class="text-center">No hay datos disponibles.</td>
                </tr>
            @else
                <!-- Mostrar los datos de la tabla -->
                @foreach ($response as $resp)
                    <tr>
                        <td hidden>{{ $resp->idUser}}</td>
                        <td hidden>{{ $resp->idUsability}}</td>
                        <td hidden>{{ $resp->idType}}</td>
                        <td class="identificador">{{ $resp->idFile }}</td>
                        <td>{{ $resp->name_file}}</td>
                        <td>{{ $resp->description_file}}</td>
                        <td>{{ $resp->url_image ?? 'File image no disponible'}}</td>
                        <td>{{ $resp->url_video ?? 'File video no disponible'}}</td>
                        <td>{{ $resp->url_visit ?? 'File visit no disponible'}}</td>
                        <td>{{ $resp->url_document ?? 'File document no disponible'}}</td>
                        <td>{{ $resp->url_download ?? 'File download no disponible'}}</td>
                        <td>{{ $resp->url_repository ?? 'File respository no disponible'}}</td>
                        <td>{{ $resp->url_icon ?? 'File icon no disponible'}}</td>
                        <td>{{ $resp->language ?? 'Languages no disponible'}}</td>
                        <td>{{ $resp->nivel ?? 'Nivel no disponible'}}</td>
                        <td>{{ $resp->position_file}}</td>
                        <td>{{ $resp->created_at}}</td>
                        <td>{{ $resp->usability->name_usability ?? 'File no disponible'}}</td>
                        <td>{{ $resp->type->name_type ?? 'File no disponible'}}</td>
                        <td>{{ $resp->user->email ?? 'File no disponible'}}</td>
                        <td>
                            <a href="{{route('files.edit',$resp->idFile)}}" class="btn btn-primary">Editar</a>
                            <button class='btn btn-danger' type='submit' form="delete_{{$resp->idFile}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')">Borrar</button>
                            <form action="{{route('files.destroy',$resp->idFile)}}" method="POST" id="delete_{{$resp->idFile}}" enctype="multipart/form-data" hidden>
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
                <th hidden>IDUser</th>
                <th hidden>IDUsability</th>
                <th hidden>IDType</th>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>URL de la Imagen</th>
                <th>URL del Video</th>
                <th>URL a Visitar</th>
                <th>URL del Documento</th>
                <th>URL de Descarga</th>
                <th>URL del Repositorio</th>
                <th>URL de Icono</th>
                <th>Lenguajes</th>
                <th>Nivel</th>
                <th>Posicion</th>
                <th>Created At</th>
                <th>Uso</th>
                <th>Tipo</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>
</div>