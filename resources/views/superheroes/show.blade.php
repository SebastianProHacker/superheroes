@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Detalles del Superhéroe</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="{{ $superheroe->photo_url }}" alt="Foto" class="img-fluid rounded mb-3" style="max-height: 300px;">
            </div>
            <div class="col-md-8">
                <h3 class="mb-3">{{ $superheroe->superhero_name }}</h3>
                <p><strong>Nombre Real:</strong> {{ $superheroe->real_name }}</p>
                <p><strong>Información Adicional:</strong></p>
                <p>{{ $superheroe->additional_info }}</p>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a href="{{ route('superheroes.edit', $superheroe) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('superheroes.index') }}" class="btn btn-secondary">Volver</a>
    </div>
</div>
@endsection