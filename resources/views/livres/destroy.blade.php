<!-- resources/views/livres/destroy.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Supprimer le livre</h1>
        <p>Êtes-vous sûr de vouloir supprimer le livre "{{ $livre->titre }}" ?</p>

        <form action="{{ route('livres.destroy', $livre) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Oui, supprimer</button>
            <a href="{{ route('livres.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection
