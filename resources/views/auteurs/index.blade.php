@extends('layouts.app')

@section('content')
    <style>
        /* General Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            font-size: 16px;
        }

        .title {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 40px;
            font-size: 2.2rem;
            font-weight: 700;
        }

        /* Button Styles */
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: #3498db;
            color: white;
        }

        .btn-primary:hover {
            background-color: #2980b9;
        }

        .btn-warning {
            background-color: #f39c12;
            color: white;
        }

        .btn-warning:hover {
            background-color: #e67e22;
        }

        .btn-danger {
            background-color: #e74c3c;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c0392b;
        }

        /* List Styles */
        .auteurs-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .auteurs-list li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .auteurs-list li:hover {
            background-color: #f1f1f1;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .auteurs-list li:last-child {
            margin-bottom: 0;
        }

        .auteurs-list .actions {
            display: flex;
            gap: 12px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .auteurs-list li {
                flex-direction: column;
                align-items: flex-start;
            }

            .auteurs-list .actions {
                flex-direction: column;
                gap: 8px;
            }
        }
    </style>

    <div class="container">
        <h1 class="title">Liste des Auteurs</h1>

        <div class="text-center mb-4">
            <a href="{{ route('auteurs.create') }}" class="btn btn-primary">Ajouter un Auteur</a>
        </div>

        <ul class="auteurs-list">
            @foreach ($auteurs as $auteur)
                <li>
                    <span><strong>{{ $auteur->nom }} {{ $auteur->prenom }}</strong></span>
                    <div class="actions">
                        <a href="{{ route('auteurs.edit', $auteur) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('auteurs.destroy', $auteur) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
