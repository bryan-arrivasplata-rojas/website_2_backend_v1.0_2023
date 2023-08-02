<div class="form-floating mb-3">
    <input type="text" id="name_profile" class="form-control" name="name_profile" value="{{(isset($response))?$response->name_profile: old('name_profile')}}" placeholder="Escribir el nombre" maxlength="255" required autofocus>
    <label for="name_profile">Nombre</label>
</div>
<div class="form-floating mb-3">
    <input type="text" id="description_profile" class="form-control" name="description_profile" value="{{(isset($response))?$response->description_profile: old('description_profile')}}" placeholder="Escribir la descripción" maxlength="500" required>
    <label for="description_profile">Descripción</label>
</div>
<div class="form-floating mb-3">
    <input type="text" id="number" class="form-control" name="number" value="{{(isset($response))?$response->number: old('number')}}" placeholder="Escribir el número de celular" maxlength="255" required>
    <label for="number">Número</label>
</div>
<div class="form-floating mb-3">
    <input type="text" id="birthday" class="form-control" name="birthday" value="{{(isset($response))?$response->birthday: old('birthday')}}" placeholder="Escribir la fecha de cumpleaños" maxlength="100" required>
    <label for="birthday">Cumpleaños</label>
</div>
<div class="form-floating mb-3">
    <select id="idUser" class="selected form-select" name="idUser" required>
        <option value="">Seleccionar idUser</option>
        @foreach ($users as $value)
            <option value="{{ $value->idUser }}"{{ (isset($response) && $response->idUser == $value->idUser) || old('idUser') == $value->idUser ? 'selected' : '' }}>
                {{ $value->idUser }}: {{$value->email}}
            </option>
        @endforeach
    </select>
    <label for="idUser" class="form-label">Seleccionar idUser</label>
</div>