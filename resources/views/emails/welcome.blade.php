<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compte créé avec succès</title>
</head>
<body>
    <h1>Compte créé avec succès</h1>
    <p>Bonjour {{ $details->first_name }},</p>
    <p>Votre compte a été créé avec succès.</p>
    <p>Vous pouvez vous connecter à l'application en utilisant votre addresse mail et le mot de passe que vous avez choisi.</p>
    <p>Si vous avez des questions, n'hésitez pas à nous contacter.</p>
    <p>Cordialement,</p>
    <p>L'équipe {{ config('app.name') }}</p>

</body>
</html>
