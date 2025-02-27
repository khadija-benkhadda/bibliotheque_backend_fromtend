<form action="{{ route('produits.store') }}" method="POST" id="formcreate" enctype="multipart/form-data">
    @csrf
    <label>New Product </label>

    <label for="image">image :</label>
    <input id= "image" name ="image" type="file">


    <button type="submit">Créer</button>
</form>




