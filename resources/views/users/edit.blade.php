@extends('layouts.app')
@section('content')
<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <h5>Formulario para Editar User</h5>
        <a href="{{route('users.index')}}" class="btn btn-secondary ms-auto" >Volver</a>
    </div>
    <div class="card-body">
        <form class="form-floating" action ="{{route('users.update',$id)}}" method ="POST" enctype="multipart/form-data" id="create">
            @method('PUT')
            @csrf
            @include('users.partials.form')
        </form>
    </div>
    <div class="card-footer">
        <button class="btn btn-primary" form="create">
            Editar
        </button>
    </div>
</div>
@endsection