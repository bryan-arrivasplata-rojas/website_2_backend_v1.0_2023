<div class="form-floating mb-3">
    <input type="text" id="name_type" class="form-control" name="name_type" value="{{(isset($response))?$response->name_type: old('name_type')}}" placeholder="Escribir el nombre" maxlength="255" required autofocus>
    <label for="name_type">Nombre</label>
</div>
<div class="form-floating mb-3">
    <input type="text" id="description_type" class="form-control" name="description_type" value="{{(isset($response))?$response->description_type: old('description_type')}}" placeholder="Escribir la descripción" maxlength="255" required>
    <label for="description_type">Descripción</label>
</div>
<div class="form-floating mb-3">
    <input type="number" id="position_type" class="form-control" name="position_type" value="{{(isset($response))?$response->position_type: old('position_type')}}" placeholder="Escribir la posición" oninput="javascript: if (this.value > 99) this.value = 99;">
    <label for="position_type">Position</label>
</div