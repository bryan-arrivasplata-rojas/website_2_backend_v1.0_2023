<div class="form-floating mb-3">
    <input type="text" id="name_usability" class="form-control" name="name_usability" value="{{(isset($response))?$response->name_usability: old('name_usability')}}" placeholder="Escribir el nombre" maxlength="255" required autofocus>
    <label for="name_usability">Nombre</label>
</div>
<div class="form-floating mb-3">
    <input type="text" id="description_usability" class="form-control" name="description_usability" value="{{(isset($response))?$response->description_usability: old('description_usability')}}" placeholder="Escribir la descripción" maxlength="255" required>
    <label for="description_usability">Descripción</label>
</div>
<div class="form-floating mb-3">
    <input type="number" id="position_usability" class="form-control" name="position_usability" value="{{(isset($response))?$response->position_usability: old('position_usability')}}" placeholder="Escribir la posición" oninput="javascript: if (this.value > 99) this.value = 99;">
    <label for="position_usability">Position</label>
</div>