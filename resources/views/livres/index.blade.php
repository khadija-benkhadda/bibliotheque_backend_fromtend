@extends('layouts.app')

@section('content')
<div class="books-container">
    <div class="header-section">
        <h2 class="page-title">📚 Liste des Livres</h2>
        <a href="{{ route('livres.create') }}" class="add-button">+ Ajouter un Livre</a>
    </div>

    <div class="books-list">
        <div class="table-header">
            <div class="header-item">Titre</div>
            <div class="header-item">Auteur</div>
            <div class="header-item actions">Actions</div>
        </div>

        @foreach($livres as $livre)
        <div class="book-row">
            <div class="book-item">
                <span class="mobile-label"></span>
                {{ $livre->titre }}
            </div>
            <div class="book-item">
                <span class="mobile-label"></span>
                {{ $livre->auteur->nom }} {{ $livre->auteur->prenom }}
            </div>
            <div class="book-item actions">
                <div class="action-buttons">
                    <a href="{{ route('livres.edit', $livre->id) }}" class="edit-btn">
                        ✏️ Modifier
                    </a>
                    <form action="{{ route('livres.destroy', $livre->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn" onclick="return confirm('Êtes-vous sûr ?')">
                            🗑️ Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="pagination-container">
        {{ $livres->links() }}
    </div>
</div>

<style>
    /* Styles généraux */
    .books-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem 1rem;
    }

    .header-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .page-title {
        font-size: 2rem;
        color: #2c3e50;
        margin: 0;
    }

    /* Tableau stylisé */
    .books-list {
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .table-header {
        display: grid;
        grid-template-columns: 2fr 2fr 1fr;
        background-color: #3498db;
        color: white;
        padding: 1rem;
        font-weight: 600;
    }

    .book-row {
        display: grid;
        grid-template-columns: 2fr 2fr 1fr;
        padding: 1rem;
        border-bottom: 1px solid #eee;
        transition: all 0.3s ease;
    }

    .book-row:hover {
        background-color: #f8f9fa;
        transform: translateX(5px);
    }

    .book-item {
        padding: 0.5rem;
        display: flex;
        align-items: center;
    }

    /* Boutons */
    .add-button {
        background: #3498db;
        color: white;
        padding: 0.8rem 1.5rem;
        border-radius: 5px;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .add-button:hover {
        background: #2980b9;
        transform: translateY(-2px);
    }

    .action-buttons {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
    }

    .edit-btn {
        background: #27ae60;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 5px;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .delete-btn {
        background: #e74c3c;
        color: white;
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .edit-btn:hover, .delete-btn:hover {
        opacity: 0.9;
        transform: translateY(-2px);
    }

    /* Pagination */
    .pagination-container {
        margin-top: 2rem;
        display: flex;
        justify-content: center;
    }

    .pagination-container nav {
        display: flex;
        gap: 0.5rem;
    }

    .pagination-container .page-item {
        list-style: none;
    }

    .pagination-container .page-link {
        padding: 0.5rem 1rem;
        border-radius: 5px;
        background: #3498db;
        color: white;
        text-decoration: none;
    }

    .pagination-container .page-item.active .page-link {
        background: #2c3e50;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .table-header {
            display: none;
        }

        .book-row {
            grid-template-columns: 1fr;
            padding: 1.5rem;
            gap: 1rem;
            border-bottom: 2px solid #eee;
        }

        .mobile-label {
            display: inline-block;
            font-weight: 600;
            margin-right: 0.5rem;
            color: #3498db;
        }

        .action-buttons {
            justify-content: center;
        }

        .header-section {
            flex-direction: column;
            gap: 1rem;
            text-align: center;
        }
    }
</style>
@endsection
