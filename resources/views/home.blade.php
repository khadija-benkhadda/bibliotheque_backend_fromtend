@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
<style>
    /* Thème principal */
    .home-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
        background: #f5f3e7;
        min-height: calc(100vh - 200px);
    }

    /* En-tête */
    .welcome-header {
        text-align: center;
        margin-bottom: 3rem;
        padding: 3rem 2rem;
        background: linear-gradient(135deg, #2d545e 0%, #1a3a43 100%);
        border-radius: 10px;
        color: #f5f3e7;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        border: 2px solid #c19a6b;
        position: relative;
        overflow: hidden;
    }

    .welcome-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml;utf8,<svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><text x="50%" y="50%" font-family="\'Cormorant Garamond\', serif" font-size="20" fill="%23c19a6b22" text-anchor="middle" dominant-baseline="middle">📖</text></svg>');
        opacity: 0.1;
    }

    .welcome-title {
        font-family: 'Cormorant Garamond', serif;
        font-size: 2.8rem;
        margin-bottom: 0.5rem;
        font-weight: 600;
        letter-spacing: 0.5px;
        position: relative;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }

    .welcome-subtitle {
        font-size: 1.3rem;
        opacity: 0.9;
        color: #c19a6b;
        font-style: italic;
    }

    /* Cartes d'action */
    .quick-actions {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
    }

    .action-card {
        background: #fffcf5;
        border-radius: 8px;
        padding: 1.5rem;
        transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        text-decoration: none;
        color: #2d545e;
        border-left: 5px solid #c19a6b;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.08);
        position: relative;
        overflow: hidden;
    }

    .action-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: 0.5s;
    }

    .action-card:hover {
        transform: translateY(-5px) rotateZ(1deg);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12);
        border-left-color: #2d545e;
    }

    .action-card:hover::before {
        left: 100%;
    }

    .action-card h3 {
        font-family: 'Cormorant Garamond', serif;
        font-size: 1.8rem;
        margin-bottom: 1rem;
        color: #2d545e;
        display: flex;
        align-items: center;
        gap: 0.8rem;
    }

    .action-card p {
        color: #6d7d8b;
        line-height: 1.6;
        font-size: 1rem;
        padding-left: 1.5rem;
        border-left: 2px solid #e0dcd3;
        margin-left: 1rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .home-container {
            padding: 1.5rem;
        }

        .welcome-title {
            font-size: 2.2rem;
        }

        .welcome-subtitle {
            font-size: 1.1rem;
        }

        .action-card h3 {
            font-size: 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .welcome-header {
            padding: 2rem 1rem;
        }

        .action-card {
            padding: 1.2rem;
        }
    }
</style>

<div class="home-container">
    <div class="welcome-header">
        <h1 class="welcome-title">Bienvenue, {{ Auth::user()->email }} !</h1>
        <p class="welcome-subtitle">Votre portail de gestion bibliothécaire</p>
    </div>

    <div class="dashboard-overview">
        <div class="quick-actions">
            <a href="{{ route('livres.index') }}" class="action-card">
                <h3>📖 Collection Littéraire</h3>
                <p>Explorez notre catalogue complet d'ouvrages</p>
            </a>

            <a href="{{ route('auteurs.index') }}" class="action-card">
                <h3>✒️ Répertoire des Auteurs</h3>
                <p>Découvrez les écrivains et leurs œuvres</p>
            </a>

            <a href="{{ route('emprunts.index') }}" class="action-card">
                <h3>📅 Gestion des Prêts</h3>
                <p>Suivi des emprunts et retours</p>
            </a>
        </div>
    </div>
</div>
@endsection
