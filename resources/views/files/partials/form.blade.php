<div class="form-floating mb-3">
    <input type="text" id="name_file" class="form-control" name="name_file" value="{{(isset($response))?$response->name_file: old('name_file')}}" placeholder="Escribir el nombre" maxlength="255" required autofocus>
    <label for="name_file">Nombre</label>
</div>
<div class="form-floating mb-3">
    <input type="text" id="description_file" class="form-control" name="description_file" value="{{(isset($response))?$response->description_file: old('description_file')}}" placeholder="Escribir la descripción" maxlength="500" required>
    <label for="description_file">Descripción</label>
</div>
<div class="form-floating mb-3">
    <input type="text" id="url_image" class="form-control" name="url_image" value="{{(isset($response))?$response->url_image: old('url_image')}}" placeholder="Escribir el Url de la Imagen" maxlength="255">
    <label for="url_image">URL de la Imagen</label>
</div>
<div class="form-floating mb-3">
    <input type="text" id="url_video" class="form-control" name="url_video" value="{{(isset($response))?$response->url_video: old('url_video')}}" placeholder="Escribir el Url del Video" maxlength="255">
    <label for="url_video">URL del Video</label>
</div>
<div class="form-floating mb-3">
    <input type="text" id="url_visit" class="form-control" name="url_visit" value="{{(isset($response))?$response->url_visit: old('url_visit')}}" placeholder="Escribir el Url del Sitio a Visitar" maxlength="255">
    <label for="url_visit">URL del lugar a Visitar</label>
</div>
<div class="form-floating mb-3">
    <input type="text" id="url_document" class="form-control" name="url_document" value="{{(isset($response))?$response->url_document: old('url_document')}}" placeholder="Escribir el Url del Documento" maxlength="255">
    <label for="url_document">URL del documento</label>
</div>
<div class="form-floating mb-3">
    <input type="text" id="url_download" class="form-control" name="url_download" value="{{(isset($response))?$response->url_download: old('url_download')}}" placeholder="Escribir el Url de la Descarga" maxlength="255">
    <label for="url_download">URL de la descarga</label>
</div>
<div class="form-floating mb-3">
    <input type="text" id="url_repository" class="form-control" name="url_repository" value="{{(isset($response))?$response->url_repository: old('url_repository')}}" placeholder="Escribir el Url del Repositorio" maxlength="255">
    <label for="url_repository">URL del repositorio</label>
</div>
<div class="form-floating mb-3">
    <input type="text" id="url_icon" class="form-control" name="url_icon" value="{{(isset($response))?$response->url_icon: old('url_icon')}}" placeholder="Escribir la Url de Icono" maxlength="255">
    <label for="url_icon">URL del icono</label>
</div>
<div class="form-floating mb-3">
    <input type="text" id="language" class="form-control" name="language" value="{{(isset($response))?$response->language: old('language')}}" placeholder="Escribir los lenguajes" maxlength="255">
    <label for="language">Lenguajes</label>
</div>
<div class="form-floating mb-3">
    <input type="number" id="nivel" class="form-control" name="nivel" value="{{(isset($response))?$response->nivel: old('nivel')}}" placeholder="Escribir el Nivel" oninput="javascript: if (this.value > 100) this.value = 100;">
    <label for="nivel">Nivel</label>
</div>
<div class="form-floating mb-3">
    <input type="number" id="position_file" class="form-control" name="position_file" value="{{(isset($response))?$response->position_file: old('position_file')}}" placeholder="Escribir la posición" oninput="javascript: if (this.value > 99) this.value = 99;">
    <label for="position_file">Posición</label>
</div>
<div class="form-floating mb-3">
    <select id="idUsability" class="selected form-select" name="idUsability" required>
        <option value="">Seleccionar el Uso</option>
        @foreach ($usabilities as $value)
            <option value="{{ $value->idUsability }}"{{ (isset($response) && $response->idUsability == $value->idUsability) || old('idUsability') == $value->idUsability ? 'selected' : '' }}>
                {{ $value->idUsability }}: {{$value->name_usability}}
            </option>
        @endforeach
    </select>
    <label for="idUsability" class="form-label">Seleccionar</label>
</div>
<div class="form-floating mb-3">
    <select id="idType" class="selected form-select" name="idType" required>
        <option value="">Seleccionar el Tipo</option>
        @foreach ($types as $value)
            <option value="{{ $value->idType }}"{{ (isset($response) && $response->idType == $value->idType) || old('idType') == $value->idType ? 'selected' : '' }}>
                {{ $value->idType }}: {{$value->name_type}}
            </option>
        @endforeach
    </select>
    <label for="idType" class="form-label">Seleccionar</label>
</div>
<div class="form-floating mb-3">
    <select id="idUser" class="selected form-select" name="idUser" required>
        <option value="">Seleccionar el Usuario</option>
        @foreach ($users as $value)
            <option value="{{ $value->idUser }}"{{ (isset($response) && $response->idUser == $value->idUser) || old('idUser') == $value->idUser ? 'selected' : '' }}>
                {{ $value->idUser }}: {{$value->email}}
            </option>
        @endforeach
    </select>
    <label for="idUser" class="form-label">Seleccionar</label>
</div>