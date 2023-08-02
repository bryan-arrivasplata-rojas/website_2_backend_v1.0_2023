<form class="form-floating formulario" method="POST" action="{{ route('login') }}">
    @csrf
    <h1>Iniciar Sesión</h1>
    <div class="form-floating mb-3">
        <input type="email" id="email" class="form-control" name="email" required autofocus placeholder="name@example.com">
        <label for="email">Correo Electrónico</label>
    </div>
    <div class="form-floating">
        <input type="password" id="password" class="form-control" name="password" required autocomplete="off" placeholder="Password">
        <label for="password">Contraseña</label>
    </div>
    @if(session('response'))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            {{ session('response') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="d-grid gap-2 form-group mt-3">
        <button class="btn btn-primary" type="submit">Iniciar Sesión</button>
    </div>
</form>
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script src="{{asset('js/login.js')}}" type="text/javascript"></script> w