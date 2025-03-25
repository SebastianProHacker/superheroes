@php use App\Superheroe; @endphp
@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Listado de Superhéroes</h1>
    <a href="{{ route('superheroes.create') }}" class="btn btn-primary">Nuevo Superhéroe</a>
</div>

<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>Nombre Real</th>
            <th>Nombre de Héroe</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($superheroes as $superheroe)
            <tr>
                <td>{{ $superheroe->real_name }}</td>
                <td>{{ $superheroe->superhero_name }}</td>
                <td>
                    <img src="{{ asset('storage/' . $superheroe->photo_url) }}" class="img-thumbnail" style="max-height: 50px;">
                    <a href="{{ route('superheroes.show', $superheroe->id) }}" class="btn btn-sm btn-info">Ver</a>
                    <a href="{{ route('superheroes.edit', $superheroe->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('superheroes.destroy', $superheroe) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="mt-4">
    <a href="{{ route('superheroes.trashed') }}" class="btn btn-warning">
        Ver eliminados ({{ Superheroe::onlyTrashed()->count() }})
    </a>
</div>
@endsection