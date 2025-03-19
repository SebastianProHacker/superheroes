@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Registrar Nuevo Superhéroe</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('superheroes.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="real_name" class="form-label">Nombre Real:</label>
                <input type="text" class="form-control" id="real_name" name="real_name" required>
            </div>
            
            <div class="mb-3">
                <label for="superhero_name" class="form-label">Nombre de Héroe:</label>
                <input type="text" class="form-control" id="superhero_name" name="superhero_name" required>
            </div>
            
            <div class="mb-3">
                <label for="photo_url" class="form-label">URL de la Foto:</label>
                <input type="url" class="form-control" id="photo_url" name="photo_url" required>
            </div>
            
            <div class="mb-3">
                <label for="additional_info" class="form-label">Información Adicional:</label>
                <textarea class="form-control" id="additional_info" name="additional_info" rows="4" required></textarea>
            </div>
            
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('superheroes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection