<div class="form-floating mb-3">
    <input type="text" id="name_upload" class="form-control" name="name_upload" value="{{(isset($response))?$response->name_upload: old('name_upload')}}" placeholder="Escribir el nombre" maxlength="255" required autofocus>
    <label for="name_upload">Nombre</label>
</div>
<div class="form-floating mb-3">
    <select id="idExtension" class="selected form-select" name="idExtension" required>
        <option value="">Seleccionar idExtension</option>
        @foreach ($extensions as $value)
            <option value="{{ $value->idExtension }}"{{ (isset($response) && $response->idExtension == $value->idExtension) || old('idExtension') == $value->idExtension ? 'selected' : '' }}>
                {{ $value->idExtension }}: {{$value->name_extension}}
            </option>
        @endforeach
    </select>
    <label for="idExtension" class="form-label">Seleccionar idExtension</label>
</div>
<div class="form-floating mb-3">
    <input type="file" class="form-control file-input" id="file_upload" name="file_upload" multiple>
    <label for="file_upload">Subir archivo</label>
</div>