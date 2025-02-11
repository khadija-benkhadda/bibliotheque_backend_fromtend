<h1>Fiche Stagiaire:</h1>
<form action="{{ route('stagiaires.store') }}"
method="POST">
@csrf
Nom Stagiaire :<input type="text" name="nom"><br><br>
Prénom Stagiaire :<input type="text"
name="prenom"><br><br>
Age Stagiaire :<input type="text" name="age"><br><br>
<button type="submit">Ajouter</button>
</form>