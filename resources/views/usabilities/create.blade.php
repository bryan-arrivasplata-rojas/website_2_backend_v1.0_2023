@extends('layouts.app')
@section('content')
<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <h5>Formulario de Creación de Usability</h5>
        <a href="{{route('usabilities.index')}}" class="btn btn-secondary ms-auto">Volver</a>
    </div>
    <div class="card-body">
        <form action ="{{route('usabilities.store')}}" method ="POST" enctype="multipart/form-data" id="create">
            @csrf
            @include('usabilities.partials.form')
        </form>
    </div>
    <div class="card-footer">
        <button class="btn btn-primary" form="create">
            Crear
        </button>
    </div>
</div>
@endsection