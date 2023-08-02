@extends('layouts.app')
@section('content')
<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <h5>Formulario de Creación de User</h5>
        <a href="{{route('users.index')}}" class="btn btn-secondary ms-auto">Volver</a>
    </div>
    <div class="card-body">
        @include('users.partials.form')
    </div>
    <div class="card-footer">
        <button class="btn btn-primary" form="create">
            Crear
        </button>
    </div>
</div>
@endsection