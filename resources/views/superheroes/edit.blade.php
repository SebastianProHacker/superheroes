@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Editar Superhéroe</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('superheroes.update', $superheroe->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="real_name" class="form-label">Nombre Real:</label>
                <input type="text" class="form-control" id="real_name" name="real_name" value="{{ $superheroe->real_name }}" required>
            </div>
            
            <div class="mb-3">
                <label for="superhero_name" class="form-label">Nombre de Héroe:</label>
                <input type="text" class="form-control" id="superhero_name" name="superhero_name" value="{{ $superheroe->superhero_name }}" required>
            </div>
            
            @if($superheroe->photo_url)
            <div class="mb-3">
                <label class="form-label">Foto actual:</label>
                <img src="{{ asset('storage/' . $superheroe->photo_url) }}" class="img-thumbnail" style="max-height: 200px;">
            </div>
            @endif
            
            <div class="mb-3">
                <label for="additional_info" class="form-label">Información Adicional:</label>
                <textarea class="form-control" id="additional_info" name="additional_info" rows="4" required>{{ $superheroe->additional_info }}</textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('superheroes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection