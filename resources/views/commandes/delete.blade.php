@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Confirmer la suppression</h2>
    <p>Êtes-vous sûr de vouloir supprimer cette commande ?</p>

    <form action="{{ route('commandes.destroy', $commande->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Oui, supprimer</button>
        <a href="{{ route('commandes.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
