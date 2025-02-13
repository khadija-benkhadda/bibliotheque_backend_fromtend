@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier la commande</h2>
    <form action="{{ route('commandes.update', $commande->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="client_id">Client:</label>
        <select name="client_id">
            @foreach($clients as $client)
                <option value="{{ $client->id }}" {{ $client->id == $commande->client_id ? 'selected' : '' }}>
                    {{ $client->nom }} {{ $client->prenom }}
                </option>
            @endforeach
        </select>

        <label for="date">Date:</label>
        <input type="date" name="date" value="{{ $commande->date }}" required>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
