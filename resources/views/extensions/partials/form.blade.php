<div class="form-floating mb-3">
    <input type="text" id="name_extension" class="form-control" name="name_extension" value="{{(isset($response))?$response->name_extension: old('name_extension')}}" placeholder="Escribir el nombre" maxlength="50" required autofocus>
    <label for="name_extension">Nombre</label>
</div>