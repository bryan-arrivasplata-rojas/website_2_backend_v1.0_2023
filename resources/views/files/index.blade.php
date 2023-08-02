@extends('layouts.app')
@section('content')
<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <h5>File</h5>
        <a href="{{route('files.create')}}" class="btn btn-success ms-auto" >Agregar</a>
    </div>
    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{Session::get('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{Session::get('error')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    
    @livewire('files-table')
</div>
@endsection
<script src="{{asset('js/table.js')}}" type="text/javascript"></script>