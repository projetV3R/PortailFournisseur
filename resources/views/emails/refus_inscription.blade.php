<!-- Mettre l'entete des emails @ a la place des balises parents -->

<!DOCTYPE html>
<html>
<head>
    <title>Refus de votre demande d'inscription</title>
</head>
<body>
    <h1>Bonjour {{ $fournisseur->nom_entreprise }},</h1>

    <p>Nous regrettons de vous informer que votre demande d'inscription en tant que fournisseur sur notre plateforme a été refusée.</p>

    <p>Après une analyse approfondie de votre demande, nous avons déterminé qu'elle ne répondait pas actuellement aux critères requis pour être acceptée.</p>

    <p>Merci encore de l'intérêt que vous portez à {{ config('app.name') }}.</p>

    <p>Cordialement,<br>
    L'équipe {{ config('app.name') }}</p>
</body>
</html>