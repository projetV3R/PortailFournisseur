<!-- Mettre l'entete des emails @ a la place des balises parents -->

<!DOCTYPE html>
<html>
<head>
    <title>Confirmation de votre inscription</title>
</head>
<body>
    <h1>Bonjour {{ $supplier->nom_entreprise }},</h1>

    <p>Merci d'avoir soumis votre demande d'inscription en tant que fournisseur sur notre plateforme. Nous apprécions l'intérêt que vous portez à {{ config('app.name') }}.</p>

    <p>Nous avons bien reçu votre demande et notre équipe est en train de la vérifier pour s'assurer que toutes les informations sont correctes et complètes. Le processus de vérification prend généralement entre 3 à 5 jours ouvrables. Nous vous tiendrons informé dès que votre compte sera activé.</p>

    <p>Si vous avez des questions, n'hésitez pas à nous contacter.</p>

    <p>Merci encore de votre confiance et au plaisir de collaborer avec vous.</p>

    <p>Cordialement,<br>
    L'équipe {{ config('app.name') }}</p>
</body>
</html>
