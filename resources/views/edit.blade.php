<h1>Modifier Stagiaire numéro: {{$stagiaire['id']}}</h1>
<form action="{{
route('stagiaires.update',$stagiaire['id']) }}"
method="POST">
@method("PUT")
@csrf
Nom Stagiaire :<input type="text" name="nom"
value="{{$stagiaire['nom']}}"><br><br>
Prénom Stagiaire :<input type="text" name="prenom"
value="{{$stagiaire['prenom']}}"><br><br>
Age Stagiaire :<input type="text" name="age"
value="{{$stagiaire['age']}}"><br><br>
<button type="submit">Modifier</button>
</form>