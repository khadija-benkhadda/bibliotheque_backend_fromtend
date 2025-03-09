@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Historique des modifications</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Livre</th>
                    <th>Utilisateur</th>
                    <th>Action</th>
                    <th>Détails</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($historiques as $historique)
                    <tr>
                        <td>{{ $historique->id }}</td>
                        <td>{{ $historique->livre->titre ?? 'Livre supprimé' }}</td>
                        <td>{{ $historique->user->email ?? 'Utilisateur inconnu' }}</td>
                        <td>{{ $historique->action }}</td>
                        <td>{{ json_encode($historique->details) }}</td>
                        <td>{{ $historique->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $historiques->links() }} {{-- Pagination --}}
    </div>
@endsection
