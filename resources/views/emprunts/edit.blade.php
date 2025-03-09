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
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
        }

        .title {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
            font-size: 2rem;
            font-weight: 600;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #2c3e50;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            background-color: #fff;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #3498db;
            outline: none;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
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
    </style>

    <div class="container">
        <h1 class="title">Modifier un Emprunt</h1>

        <form action="{{ route('emprunts.update', $emprunt->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="livre_id">Livre</label>
                <select name="livre_id" id="livre_id">
                    @foreach($livres as $livre)
                        <option value="{{ $livre->id }}" {{ $livre->id == $emprunt->livre_id ? 'selected' : '' }}>{{ $livre->titre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="date_emprunt">Date d'emprunt</label>
                <input type="date" name="date_emprunt" id="date_emprunt" value="{{ $emprunt->date_emprunt }}">
            </div>

            <div class="form-group">
                <label for="date_retour">Date de retour</label>
                <input type="date" name="date_retour" id="date_retour" value="{{ $emprunt->date_retour }}">
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection
