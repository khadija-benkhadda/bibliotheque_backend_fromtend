<form action="{{ route('commandes.store') }}" method="POST">
    @csrf
    <label>Date:</label>
    <input type="date" name="date" required>
    <label>Client:</label>
    <select name="client_id">
        @foreach($clients as $client)
            <option value="{{ $client->id }}">{{ $client->nom }}</option>
        @endforeach
    </select>
    <button type="submit">Ajouter</button>
</form>
