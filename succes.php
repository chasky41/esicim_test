<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidature Envoyée !</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="css/style.css"> 
    
    <style>
        /* Variables de couleur de la marque */
        :root {
            --brand-blue: #125195;
            --brand-orange: #f15a29;
            --success-green: #20bf6b;
        }

        /* --- Mise en page Sticky Footer --- */
        html, body {
            height: 100%;
            margin: 0;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        main {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
            background-color: #f8f9fa;
        }

        /* --- Style de la boîte de succès --- */
        .success-box {
            text-align: center;
            background-color: #ffffff;
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            border-top: 5px solid var(--brand-blue);
            max-width: 600px;
            /* Animation d'apparition */
            opacity: 0;
            transform: scale(0.95) translateY(20px);
            animation: fadeInBox 0.6s 0.2s ease-out forwards;
        }

        /* --- Icône de succès animée --- */
        .success-icon {
            animation: popIn 0.8s 0.5s cubic-bezier(0.68, -0.55, 0.27, 1.55) forwards;
        }
        .success-icon .fa-check-circle {
            font-size: 80px;
            color: var(--success-green);
            background: radial-gradient(circle, #ffffff 60%, transparent 65%);
        }

        /* --- Titre et Texte --- */
        .success-box h1 {
            font-size: 2.5rem;
            color: var(--brand-blue);
            margin: 20px 0 15px;
            font-weight: 700;
        }

        .success-box p {
            font-size: 1.1rem;
            color: #576574;
            margin-bottom: 30px;
            line-height: 1.7;
        }
        
        /* Animation des lettres de "Félicitations" */
        #congrats-text .letter {
            display: inline-block;
            opacity: 0;
            transform: translateY(20px);
            animation: letterFadeIn 0.5s ease-out forwards;
        }

        /* --- Bouton "Retour à l'accueil" --- */
        .btn-home {
            display: inline-block;
            padding: 12px 30px;
            border-radius: 50px;
            color: #ffffff;
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
            background-color: var(--brand-blue);
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(18, 81, 149, 0.3);
        }
        .btn-home:hover {
            background-color: var(--brand-orange);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(241, 90, 41, 0.4);
            color: #ffffff;
        }

        /* --- Keyframes pour les animations --- */
        @keyframes fadeInBox {
            to { opacity: 1; transform: scale(1) translateY(0); }
        }
        @keyframes popIn {
            0% { transform: scale(0); }
            70% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        @keyframes letterFadeIn {
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
    
</head>
<body>

<?php 
// Le menu de navigation est inclus ici
include __DIR__ . '/nav.php'; 
?>

<main>
    <div class="success-box">
        <div class="success-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <h1>Candidature envoyée !</h1>
        <p id="congrats-text">
            Félicitations ! Votre candidature a bien été envoyée. 
            L'équipe Esicim Academy vous contactera prochainement.
        </p>
        <a href="index.php" class="btn-home">Retourner à l'accueil</a>
    </div>
</main>

<?php 
// Le pied de page, totalement indépendant
include __DIR__ . '/footer.php'; 
?>

<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        // --- 1. Animation des lettres de "Félicitations !" ---
        const congratsText = document.getElementById('congrats-text');
        const text = congratsText.innerText;
        congratsText.innerHTML = ''; // On vide le paragraphe
        
        // On recrée le texte avec chaque lettre dans un <span> pour l'animer
        text.split('').forEach((char, index) => {
            const letterSpan = document.createElement('span');
            letterSpan.className = 'letter';
            letterSpan.textContent = char === ' ' ? '\u00A0' : char; // Gère les espaces
            letterSpan.style.animationDelay = `${index * 0.03}s`; // Délai pour chaque lettre
            congratsText.appendChild(letterSpan);
        });

        // --- 2. Lancement des confettis ---
        // On attend la fin de l'animation de la boîte pour plus d'impact
        setTimeout(() => {
            confetti({
                particleCount: 150, // Nombre de confettis
                spread: 90,        // Angle de dispersion
                origin: { y: 0.6 },  // D'où partent les confettis (un peu au-dessus du milieu)
                // Couleurs de votre école !
                colors: ['#125195', '#f15a29', '#ffffff'] 
            });
        }, 800); // 800ms = 0.8s

    });
</script>

</body>
</html>