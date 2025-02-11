@if($age > 18)
    <p>Bienvenue sur mon site web, {{ $nom }}</p>
@else
    <p style="color: brown">Vérifiez votre âge</p>
@endif

@foreach($items as $item)
    <table style="border: 3px solid black; margin-bottom: 20px; width: 100%;">
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Filière</th>
        </tr>
        <tr>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['prenom'] }}</td>
            <td>{{ $item['filier'] }}</td>
        </tr>
    </table>
@endforeach
