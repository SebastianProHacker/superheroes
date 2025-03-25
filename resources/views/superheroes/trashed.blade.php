@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Superhéroes Eliminados</h1>
    <a href="{{ route('superheroes.index') }}" class="btn btn-primary">Volver</a>
</div>

<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>Nombre Real</th>
            <th>Nombre de Héroe</th>
            <th>Eliminado el</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($superheroes as $superheroe)
            <tr>
                <td>{{ $superheroe->real_name }}</td>
                <td>{{ $superheroe->superhero_name }}</td>
                <td>{{ $superheroe->deleted_at->format('d/m/Y H:i') }}</td>
                <td>
                    <form action="{{ route('superheroes.restore', $superheroe->id) }}" method="POST" style="display:inline">
                        @csrf
                        <button type="submit" class="btn btn-success">Restaurar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection