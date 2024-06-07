<!DOCTYPE html>
<html>
<head>
    <title>Création de compte étudiant</title>
    <!-- Intégration de Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Ajoutez votre CSS personnalisé ici si nécessaire */
        .text-container {
            border: 1px solid #ced4da; /* Ajout de la bordure avec une couleur grise */
            padding: 20px; /* Ajout d'un espacement intérieur pour le contenu */
            border-radius: 10px; /* Ajout d'une bordure arrondie */
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <img src="{{ asset('assets/images/doc-thumb-2.jpg') }}" alt="Logo" class="img-fluid mx-auto d-block">
            <div class="text-container mt-4"> <!-- Ajout de la classe text-container pour le contenu avec bordure -->
                <h1>Bonjour</h1>
                <p>Votre profil a été créé avec succès sur la plateforme de gestion des étudiants.</p>
                <p>Vous êtes bien inscrit sur la liste des étudiants.</p>
                <p class="mt-4">Merci d'utiliser nos services !</p>
            </div>
        </div>
    </div>
</div>

<!-- Intégration de Bootstrap JS (si nécessaire) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
