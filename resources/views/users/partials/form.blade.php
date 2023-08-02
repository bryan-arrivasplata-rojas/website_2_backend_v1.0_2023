
<div class="form-floating mb-3">
    <input type="email" id="email" class="form-control" name="email" value="{{(isset($response))?$response->email: old('email')}}" placeholder="Escribir el email" maxlength="255" required autofocus>
    <label for="email">Correo Electrónico</label>
</div>
<div class="form-floating">
    <input type="password" id="password" class="form-control" name="password" value="{{(isset($response))?$response->password: old('password')}}" placeholder="Escribir el password" maxlength="255" required autocomplete="off">
    <label for="password">Contraseña</label>
</div>