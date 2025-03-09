@extends('layouts.app')

@section('content')
    <style>
        /* General Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .title {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
            font-size: 2.2rem;
            font-weight: 700;
        }

        /* Search Form Styles */
        .search-form {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 30px;
        }

        .form-group {
            flex: 1;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            background-color: #fff;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: #3498db;
            outline: none;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }

        .btn-primary {
            background-color: #3498db;
            color: white;
        }

        .btn-primary:hover {
            background-color: #2980b9;
        }

        .btn-success {
            background-color: #2ecc71;
            color: white;
        }

        .btn-success:hover {
            background-color: #27ae60;
        }

        /* Add Button Styles */
        .add-button {
            margin-bottom: 30px;
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 12px 24px;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            font-weight: 600;
            border-radius: 8px;
        }

        .add-button:hover {
            background-color: #34495e;
        }

        /* Table Styles */
        .emprunts-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            background-color: #fff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .emprunts-table th, .emprunts-table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
            font-size: 14px;
        }

        .emprunts-table th {
            background-color: #2c3e50;
            color: white;
            font-weight: 600;
        }

        .emprunts-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .emprunts-table tr:hover {
            background-color: #f1f1f1;
        }

        /* Action Buttons Styles */
        .actions {
            display: flex;
            gap: 10px;
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
    </style>

    <div class="container">
        <h1 class="title">Liste des Emprunts</h1>

        <!-- Search Form -->
        <form method="GET" action="{{ route('emprunts.index') }}" class="search-form">
            <div class="form-group">
                <label for="start_date">Date de début</label>
                <input type="date" name="start_date" id="start_date" value="{{ request('start_date') }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="end_date">Date de fin</label>
                <input type="date" name="end_date" id="end_date" value="{{ request('end_date') }}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Filtrer</button>
        </form>

        <!-- Add New Borrow Button -->
        <a href="{{ route('emprunts.create') }}" class="btn btn-success add-button">Ajouter un emprunt</a>

        <!-- Emprunts Table -->
        <table class="emprunts-table">
            <thead>
                <tr>
                    <th>Livre</th>
                    <th>Auteur</th>
                    <th>Date d'emprunt</th>
                    <th>Date de retour</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($emprunts as $emprunt)
                    <tr>
                        <td>{{ $emprunt->livre ? $emprunt->livre->titre : 'Livre non trouvé' }}</td>
                        <td>{{ $emprunt->livre && $emprunt->livre->auteur ? $emprunt->livre->auteur->nom . ' ' . $emprunt->livre->auteur->prenom : 'Auteur non trouvé' }}</td>
                        <td>{{ $emprunt->date_emprunt }}</td>
                        <td>{{ $emprunt->date_retour ? $emprunt->date_retour : 'Non retourné' }}</td>
                        <td class="actions">
                            <a href="{{ route('emprunts.edit', $emprunt->id) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('emprunts.destroy', $emprunt->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
