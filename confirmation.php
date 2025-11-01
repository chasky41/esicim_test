<?php
$status = isset($_GET['status']) ? $_GET['status'] : 'error';
$message = isset($_GET['message']) ? urldecode($_GET['message']) : 'Une erreur est survenue.';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation - ESICIM</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-900 to-gray-900 text-gray-200 font-sans">
    <div class="container mx-auto p-6 max-w-4xl">
        <div class="text-center mb-8">
            <div class="logo bg-blue-600 text-white text-3xl font-bold py-3 px-6 rounded-full shadow-lg">ESICIM</div>
        </div>
        <div class="bg-white bg-opacity-10 backdrop-blur-lg p-8 rounded-2xl shadow-2xl">
            <h2 class="text-2xl font-bold mb-6 text-orange-400">
                <?php echo $status === 'success' ? 'Inscription réussie' : 'Erreur'; ?>
            </h2>
            <p><?php echo htmlspecialchars($message); ?></p>
            <a href="inscription.php" class="mt-6 inline-block bg-blue-600 text-white px-6 py-3 rounded-full hover:bg-blue-500">Retour au formulaire</a>
        </div>
    </div>
</body>
</html>