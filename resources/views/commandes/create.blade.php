<form action="{{ route('commandes.store') }}" method="POST">
    @csrf
    <label for="client_id">Client:</label>
    <select name="client_id" id="client_id">
        @foreach($clients as $client)
            <option value="{{ $client->id }}">{{ $client->nom }} {{ $client->prenom }}</option>
        @endforeach
    </select>
    @error('client_id')
        <div class="error">{{ $message }}</div>
    @enderror
    <label for="date">Date:</label>
    <input type="date" name="date" required>
    @error('date')
        <div class="error">{{ $message }}</div>
    @enderror
    <button type="submit">Créer</button>
</form>
