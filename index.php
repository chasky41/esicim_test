<?php
require_once __DIR__.'/config.php';
$GLOBALS['active_page'] = 'index.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESICIM Academy - L'excellence académique</title>
    
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        :root {
            --primary-color: #1a4b8c;
            --secondary-color: #003366;
            --accent-color: #f8b400;
            --light-color: #f8f9fa;
            --dark-color: #212529;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }
        
        /* Loader Overlay */
        .loader-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--primary-color);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            transition: opacity 1s ease-out;
        }
        
        .loader {
            width: 80px;
            height: 80px;
            border: 8px solid rgba(255,255,255,0.3);
            border-radius: 50%;
            border-top-color: var(--accent-color);
            animation: spin 1.5s linear infinite;
            margin-bottom: 20px;
        }
        
        .loader-text {
            color: white;
            font-size: 1.5rem;
            font-weight: 300;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        /* Hero Section Cinématique */
        .cinematic-hero {
            height: 100vh;
            position: relative;
            overflow: hidden;
            color: white;
        }
        
        .hero-slideshow {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }
        
        .hero-slide {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 1.5s ease-in-out;
            background-size: cover;
            background-position: center;
        }
        
        .hero-slide.active {
            opacity: 1;
        }
        
        .hero-slide::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 51, 102, 0.6);
        }
        
        .hero-content {
            position: relative;
            z-index: 1;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding-top: 80px;
        }
        
        .dynamic-title {
            font-size: 4.5rem;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            text-shadow: 0 5px 15px rgba(0,0,0,0.3);
            opacity: 0;
            transform: translateY(30px);
        }
        
        .title-word {
            display: inline-block;
            overflow: hidden;
            line-height: 1.2;
        }
        
        .title-char {
            display: inline-block;
            transform: translateY(100%);
            opacity: 0;
        }
        
        .hero-subtitle {
            font-size: 1.8rem;
            font-weight: 300;
            max-width: 700px;
            margin: 0 auto 3rem;
            opacity: 0;
            transform: translateY(30px);
        }
        
        .hero-btn {
            padding: 1rem 2.5rem;
            font-size: 1.2rem;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            transform: scale(0.9);
            opacity: 0;
        }
        
        .hero-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 15px 40px rgba(0,0,0,0.4);
        }
        
        /* Animation des mots clés */
        @keyframes slideInWords {
            0% { transform: translateY(100%); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }
        
        /* Effet de particules */
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            pointer-events: none;
        }
        
        .particle {
            position: absolute;
            background: rgba(255,255,255,0.8);
            border-radius: 50%;
            animation: float linear infinite;
        }
        
        @keyframes float {
            0% { transform: translateY(0) translateX(0); opacity: 1; }
            100% { transform: translateY(-100vh) translateX(100px); opacity: 0; }
        }
        
        /* About Section */
        .about-section {
            padding: 6rem 0;
            background-color: var(--light-color);
        }
        
        .about-img {
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
            transform: perspective(1000px) rotateY(-10deg);
            transition: all 0.5s ease;
        }
        
        .about-img:hover {
            transform: perspective(1000px) rotateY(0deg);
        }
        
        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            position: relative;
            display: inline-block;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 4px;
            background: var(--accent-color);
            border-radius: 2px;
        }
        
        /* Programs Section */
        .programs-section {
            padding: 6rem 0;
            background: url('https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center/cover;
            background-attachment: fixed;
            position: relative;
            color: white;
        }
        
        .programs-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 51, 102, 0.9);
            z-index: 0;
        }

        
      /*
Style de base pour toutes les cartes de programme.
Ajoute un effet de transition pour le survol.
*/
 .program-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 15px;
            padding: 2.5rem 1.5rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
            color: #ffffff; /* Assure que tout le texte par défaut est blanc */
        }

        .program-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.25);
        }
        
        .program-card.card-info {
            background: linear-gradient(145deg, #0d47a1, #1976d2);
        }

        .program-card.card-commerce {
            background: linear-gradient(145deg, #f39c12, #f8b400);
        }

        .program-card.card-reconversion {
            background: linear-gradient(145deg, #1b5e20, #388e3c);
        }

        .program-title {
            color: #ffffff; /* Force le titre en blanc */
        }
        
        .program-icon {
            font-size: 3rem;
            margin-bottom: 1.5rem;
        }

        /*
        =================================================
        ==>     LA CORRECTION EST ICI     <==
        =================================================
        */
        .program-card .program-icon i {
            color: #ffffff; /* Force la couleur des icônes en blanc */
        }
        
        .program-card .btn-outline-light {
            color: #ffffff;
            border-color: #ffffff;
        }

        .program-card .btn-outline-light:hover {
            background-color: #ffffff;
            /* Le JS ou d'autres règles gèrent le changement de couleur du texte au survol */
        }
        
        .program-card.card-info .btn-outline-light:hover {
            color: #0d47a1;
        }
        .program-card.card-commerce .btn-outline-light:hover {
            color: #f39c12;
        }
        .program-card.card-reconversion .btn-outline-light:hover {
            color: #1b5e20;
        }

/*
   4. STYLE AU SURVOL (HOVER) POUR UNE MEILLEURE INTERACTION.
   Le fond du bouton devient blanc et le texte prend la couleur du pôle.
*/
.program-card.card-info .btn-outline-light:hover {
    background-color: #ffffff !important;
    color: #0d47a1 !important; /* Texte devient bleu */
}

.program-card.card-commerce .btn-outline-light:hover {
    background-color: #ffffff !important;
    color: #f39c12 !important; /* Texte devient orange */
}

.program-card.card-reconversion .btn-outline-light:hover {
    background-color: #ffffff !important;
    color: #1b5e20 !important; /* Texte devient vert */
}
        .program-icon {
            font-size: 3rem;
            color: var(--accent-color);
            margin-bottom: 1.5rem;
        }
        
        .program-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        /*
  Cible les boutons "En savoir plus" dans les cartes avec images (BAC+2, etc.)
*/
.program-card .btn-outline-light {
    color: #FF6347;        /* Texte en orange */
    border-color: #FF6347; /* Bordure en orange */
}

/*
  Effet au survol : le fond devient orange et le texte blanc pour un meilleur impact.
*/
.program-card .btn-outline-light:hover {
    background-color: #FF6347;
    color: #ffffff;
}
       


/* --- La Toile de Fond : Le Blanc est le nouveau Luxe --- */
.features-section {
    background-color: #ffffff; /* Le fond blanc, comme demandé */
    padding: 80px 0;
}


/* --- Le Titre : La Déclaration d'Intention --- */
.program-heading {
    color: #1d1d1f; /* Un noir profond, plus doux que le noir pur */
    position: relative;
    display: inline-block;
    padding-bottom: 15px;
}

/* Le trait décoratif, maintenant avec VOTRE orange */
.program-heading::after {
    content: '';
    position: absolute;
    display: block;
    left: 50%;
    bottom: 0;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
    background-color: #FF6347; /* << LA COULEUR SIGNATURE */
    border-radius: 2px;
}

.features-section .lead.text-muted {
    color: #6c757d; /* Un gris neutre pour le sous-titre */
}


/* --- La Carte : Précise, Professionnelle, Parfaite --- */
.feature-box {
    background-color: #ffffff;
    border: 1px solid #eaeaea; /* Une bordure très légère pour la définition */
    border-radius: 12px;
    padding: 30px;
    text-align: center;
    height: 100%;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05); /* Une ombre subtile et moderne */
    transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
}

.feature-box:hover {
    transform: translateY(-10px);
    border-color: #FF6347; /* La bordure s'active en orange au survol */
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.1);
}


/* --- L'Icône : L'Éclat de Génie --- */
.feature-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 65px;
    height: 65px;
    margin-bottom: 25px;
    background-color: #FF6347; /* << L'ORANGE EN VEDETTE */
    color: #ffffff; /* L'icône elle-même en blanc pour un contraste parfait */
    font-size: 28px;
    border-radius: 50%;
}


/* --- Le Texte de la carte : Lisibilité Optimale --- */
.feature-box h4 {
    color: #1d1d1f;
    font-weight: 600;
    margin-bottom: 10px;
}

.feature-box p {
    color: #6c757d;
    font-size: 0.95rem;
    margin-bottom: 20px;
}


/* --- Le Lien : La Touche Finale --- */
.feature-box .btn-link {
    color: #FF6347; /* << L'ORANGE POUR L'ACTION */
    text-decoration: none;
    font-weight: 700;
    transition: color 0.3s ease;
}

.feature-box .btn-link .fas {
    transition: transform 0.3s ease;
}

.feature-box:hover .btn-link .fas {
    transform: translateX(4px); /* La flèche avance subtilement */
}












        /* Partners Section */
        .partners-section {
            padding: 4rem 0;
            background-color: var(--light-color);
        }
        
       .partner-logo {
    filter: none; /* Affiche les logos directement en couleur */
    opacity: 1;   /* Met l'opacité à 100% par défaut */
    transition: all 0.3s ease; /* Cette ligne est maintenant optionnelle */
}
        
        .partner-logo:hover {
            filter: grayscale(0%);
            opacity: 1;
        }
        
        /* Contact Section */
        .contact-section {
            padding: 6rem 0;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
        }
        
        .contact-form {
            background: white;
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }
        
        .form-control {
            height: 50px;
            border-radius: 10px;
            border: 1px solid #ddd;
            padding-left: 20px;
        }
        
        textarea.form-control {
            height: auto;
            padding-top: 15px;
        }
        
        .submit-btn {
            background: var(--accent-color);
            color: white;
            font-weight: 600;
            padding: 0.8rem 2rem;
            border-radius: 50px;
            border: none;
            transition: all 0.3s ease;
        }
        
        .submit-btn:hover {
            background: #e0a800;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        
        /* Floating Animation */
        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }
        
        .floating-img {
            animation: floating 3s ease-in-out infinite;
        }
        
        /* Pulse Animation */
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .pulse:hover {
            animation: pulse 1s infinite;
        }
        
        /* Défilement des mots clés */
        .changing-words-container {
            position: absolute;
            bottom: 100px;
            width: 100%;
            text-align: center;
            z-index: 2;
        }
        
        .changing-words {
            font-size: 1.5rem;
            color: white;
            font-weight: 300;
        }
        
        .changing-words .word {
            position: absolute;
            left: 0;
            right: 0;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }
        
        .changing-words .word.active {
            opacity: 1;
        }

        /* --- Couleurs spécifiques pour les cartes de programme --- */

/* La couleur par défaut est déjà le bleu via --primary-color, mais on la force pour être clair */
.card-info .program-icon {
    color: #3498db; /* Un bleu clair et tech */
}

/* Orange pour le pôle commerce */
.card-commerce .program-icon {
    color: #f39c12; /* Un orange/or qui correspond à votre --accent-color */
}

/* Vert pour le pôle reconversion */
.card-reconversion .program-icon {
    color: #2ecc71; /* Un vert dynamique et positif */
}

/* Ajustement pour que le checkmark dans la liste prenne aussi la couleur */
.program-card .program-list .fa-check-circle {
    color: currentColor; /* Hérite de la couleur du texte */
}

.card-info {
    --card-color: #3498db;
}
.card-commerce {
    --card-color: #f39c12;
}
.card-reconversion {
    --card-color: #2ecc71;
}

/* Optionnel : ajoute une bordure colorée au survol */
.program-card:hover {
    border-color: var(--card-color, rgba(255,255,255,0.2));
}

.program-card .program-list .fa-check-circle {
    color: var(--card-color, var(--accent-color));
}


/* --- Importation de la police (optionnel mais recommandé) --- */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;900&display=swap');

/* --- Variable de couleur principale --- */
:root {
    --main-accent-color: #FF6347; /* << VOTRE COULEUR ORANGE ICI */
}

/* --- Conteneur principal du Header --- */
.main-header {
    position: relative;
    height: 100vh;
    width: 100%;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-family: 'Poppins', sans-serif;
}

/* --- Diaporama --- */
.header-slideshow .slide {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    opacity: 0;
    transform: scale(1.1); /* Zoom de départ un peu plus prononcé */
    transition: opacity 1.5s ease-in-out, transform 8s linear;
}

.header-slideshow .slide.active {
    opacity: 1;
    transform: scale(1);
}

/* --- Superposition sombre pour la lisibilité --- */
.header-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 1;
}

/* --- Contenu (titre, sous-titre, boutons) --- */
.header-content {
    position: relative;
    z-index: 2;
    padding: 20px;
}

.header-title {
    font-size: clamp(2.5rem, 6vw, 5rem);
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: 2px;
    text-shadow: 3px 3px 10px rgba(0, 0, 0, 0.6);
}

/* Utilisation de la variable de couleur orange */
.header-title .highlight-text {
    color: var(--main-accent-color);
}

.header-subtitle {
    font-size: clamp(1rem, 2vw, 1.3rem);
    max-width: 600px;
    margin: 1rem auto 0;
    font-weight: 400;
    text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
}

/* --- Style des boutons d'action (CTA) --- */
.cta-button {
    display: inline-block;
    padding: 12px 28px;
    border-radius: 50px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin: 10px;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

/* Bouton principal avec la couleur orange */
.cta-button-primary {
    background-color: var(--main-accent-color);
    color: #fff;
    border-color: var(--main-accent-color);
}

.cta-button-primary:hover {
    background-color: #fff;
    color: var(--main-accent-color);
    transform: translateY(-3px);
}

.cta-button-secondary {
    background-color: transparent;
    color: #fff;
    border-color: #fff;
}

.cta-button-secondary:hover {
    background-color: #fff;
    color: #222;
    transform: translateY(-3px);
}

/* --- Mots-clés en bas de page --- */
.keywords-ticker {
    position: absolute;
    bottom: 30px;
    width: 100%;
    text-align: center;
    z-index: 2;
    font-weight: 700;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.8);
    height: 2em;
}

.keywords-ticker .keyword {
    position: absolute;
    left: 50%;
    transform: translateX(-50%) translateY(30px);
    opacity: 0;
    transition: opacity 0.5s ease, transform 0.5s ease;
}

.keywords-ticker .keyword.active {
    opacity: 1;
    transform: translateX(-50%) translateY(0);
}

.intro-fond-blanc {
    background-color: #ffffff; /* Fond blanc */
    padding: 4rem 0; /* Ajoute de l'espace en haut et en bas */
    border-radius: 10px; /* Coins légèrement arrondis (optionnel) */
    margin-bottom: 3rem; /* Espace avec la section suivante */
}

/* On change la couleur du titre pour un noir soutenu */
.intro-fond-blanc .section-title {
    color: #212529; 
}

/* On change la couleur du paragraphe pour un gris foncé */
.intro-fond-blanc .lead {
    color: #6c757d;
}

#programmes.programs-section::before {
    display: none !important;
}
.program-heading {
    color: #FF6347; /* Votre couleur orange */
    font-weight: 700;
    position: relative; /* Indispensable pour positionner le trait */
    display: inline-block; /* Permet au trait de ne pas prendre toute la largeur */
    padding-bottom: 15px; /* Crée un espace pour le trait */
}

/* La ligne bleue décorative */
.program-heading::after {
    content: ''; /* Obligatoire pour un pseudo-élément */
    position: absolute;
    display: block;
    
    /* Positionnement du trait */
    left: 50%; /* Centre le point de départ */
    bottom: 0;
    transform: translateX(-50%); /* Ajuste pour un centrage parfait */

    /* Apparence du trait */
    width: 80px;  /* Largeur du trait */
    height: 4px;  /* Épaisseur du trait */
    background-color: #007bff; /* La couleur bleue demandée */
    border-radius: 2px; /* Coins du trait légèrement arrondis */
}

/* --- Section principale --- */
.program-details-section {
    padding: 80px 0;
    background-color: #f8f9fa; /* Fond gris très clair */
}

/* --- Bloc de programme (conteneur flex) --- */
.program-block {
    display: flex;
    align-items: center;
    margin-bottom: 100px;
}

/* --- Wrapper pour l'image et ses bordures décoratives --- */
.program-image-wrapper {
    position: relative;
    flex: 0 0 55%; /* L'image prend 55% de la largeur */
}

.program-image-wrapper img {
    width: 100%;
    border-radius: 8px;
    display: block;
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
}

/* --- Bordures décoratives orange --- */
.program-image-wrapper::before,
.program-image-wrapper::after {
    content: '';
    position: absolute;
    background-color: #FF6347; /* Votre couleur orange */
    z-index: 1;
}

/* Bordures pour le premier bloc (haut et gauche) */
.program-block:not(.program-block-reverse) .program-image-wrapper::before {
    top: -15px;
    left: -15px;
    width: 60%;
    height: 10px;
}

.program-block:not(.program-block-reverse) .program-image-wrapper::after {
    top: -15px;
    left: -15px;
    width: 10px;
    height: 60%;
}

/* --- Boîte de contenu textuel --- */
.program-content-box {
    flex: 0 0 50%; /* Le texte prend 50% de la largeur */
    background-color: #ffffff;
    padding: 40px;
    border-radius: 8px;
    box-shadow: 0 10px 35px rgba(0, 0, 0, 0.08);
    z-index: 2; /* Pour passer au-dessus des bordures de l'image */
    margin-left: -80px; /* Chevauchement sur l'image */
}

.program-title {
    font-weight: 700;
    color: #212529;
    margin-bottom: 20px;
}

/* --- Liste des formations --- */
.program-list {
    list-style: none;
    padding-left: 0;
    margin-bottom: 25px;
}

.program-list li {
    color: #6c757d;
    margin-bottom: 12px;
    display: flex;
    align-items: flex-start;
}

.program-list li::before {
    content: '-';
    color: #FF6347;
    font-weight: 700;
    margin-right: 10px;
    line-height: 1.5;
}

/* --- Bouton personnalisé --- */
.btn-custom {
    background-color: #FF6347;
    color: #ffffff;
    padding: 12px 25px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    display: inline-block;
    transition: background-color 0.3s ease;
}

.btn-custom:hover {
    background-color: #e65a40; /* Orange un peu plus foncé au survol */
    color: #ffffff;
}

.btn-custom .fas {
    margin-left: 8px;
}


/* --- Styles pour le bloc inversé (Image à droite) --- */
.program-block-reverse {
    flex-direction: row-reverse;
}

/* Le chevauchement se fait dans l'autre sens */
.program-block-reverse .program-content-box {
    margin-left: 0;
    margin-right: -80px;
}

/* Bordures pour le bloc inversé (bas et droite) */
.program-block-reverse .program-image-wrapper::before {
    bottom: -15px;
    right: -15px;
    width: 60%;
    height: 10px;
}

.program-block-reverse .program-image-wrapper::after {
    bottom: -15px;
    right: -15px;
    width: 10px;
    height: 60%;
}


/* --- Adaptation pour les écrans mobiles --- */
@media (max-width: 992px) {
    .program-block {
        flex-direction: column;
        margin-bottom: 60px;
    }

    .program-block-reverse {
        flex-direction: column;
    }

    .program-content-box,
    .program-block-reverse .program-content-box {
        margin: -50px 20px 0 20px; /* Le chevauchement se fait verticalement */
    }

    .program-image-wrapper {
        width: 100%;
        padding: 0 20px;
    }
}
    </style>
</head>
<body>

<!-- Loader -->
<div class="loader-overlay">
    <div class="loader"></div>
    <div class="loader-text">ESICIM Academy</div>
</div>

<?php include __DIR__.'/nav.php'; ?>

<!-- Hero Section Cinématique -->
<header class="main-header">
    
    <div class="header-slideshow">
        <div class="slide active" style="background-image: url('https://images.pexels.com/photos/3184418/pexels-photo-3184418.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2');"></div>
        <div class="slide" style="background-image: url('https://images.pexels.com/photos/1181244/pexels-photo-1181244.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2');"></div>
        <div class="slide" style="background-image: url('https://images.pexels.com/photos/5905709/pexels-photo-5905709.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2');"></div>
    </div>
    
    <div class="header-overlay"></div>
    
    <div class="header-content">
        <div class="container text-center">
            <h1 class="header-title">
                <span>Formez-vous à l'</span>
                <span class="highlight-text">Excellence</span>
            </h1>
            <p class="header-subtitle">
                ESICIM Academy vous propulse vers les métiers d'avenir avec des formations d'exception.
            </p>
            <div class="mt-4">
                <a href="#programmes" class="cta-button cta-button-primary">
                    <i class="fas fa-graduation-cap me-2"></i> Nos Formations
                </a>
                <a href="demande-info.php" class="cta-button cta-button-secondary">
                    <i class="fas fa-phone me-2"></i> Nous Contacter
                </a>
            </div>
        </div>
    </div>

    <div class="keywords-ticker">
        <span class="keyword active">Innovation</span>
        <span class="keyword">Expertise</span>
        <span class="keyword">Réussite</span>
        <span class="keyword">Avenir</span>
    </div>

</header>
<!-- About Section -->
<section class="about-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                <img src="https://esicim-academy.fr/public/assets/wp-content/uploads/2024/08/Untitled-5-03.png" size="30px" alt="À propos ESICIM" class=" about-img">
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <h2 class="program-heading">À PROPOS DE NOUS </h2>
                <p class="lead mb-4">ESICIM ACADEMY a pour ambition de vous faire parvenir au sommet !</p>
                <ol class="custom-list mb-4">
                    <li class="mb-3">ESICIM ACADEMY : école supérieure d'ingénierie, de commerce, d'informatique et de management.</li>
                    <li class="mb-3">Des formations de qualité : Diplôme BAC +3 et BAC +5</li>
                    <li class="mb-3">Plongez dans un environnement stimulant : jeune, moderne et axé sur votre réussite.</li>
                </ol>
                <a href="academy.php" class="btn btn-primary btn-lg pulse">
                    <i class="fas fa-book-open me-2"></i>Lire plus
                </a>
            </div>
        </div>
    </div>
</section>

<section id="programmes" class="programs-section" style="background: #fff; color: var(--main-accent-color);">
    <div class="container position-relative">
    <div class="container position-relative intro-fond-blanc">
    <div class="text-center mb-5" data-aos="fade-down" style="background: #fff; color: var(--main-accent-color);">
        
       <h2 class="program-heading">NOS PROGRAMMES</h2>
        <p class="lead">Découvrez des formations d'excellence pour chaque projet de carrière.</p>
        
    </div>
 </div>
        
      <style>
    /* Style de base pour les boutons des pôles */
    .program-card .btn-outline-light {
        color: white;
        border: 2px solid white;
        font-weight: 600;
        transition: all 0.3s ease-in-out;
    }

    /* Style au survol pour un meilleur effet visuel */
    .program-card .btn-outline-light:hover {
        background-color: white;
        transform: scale(1.05);
    }

    /* Couleur du texte au survol, assortie à chaque carte */
    .card-info .btn-outline-light:hover {
        color: #1976d2; /* Bleu du pôle informatique */
    }
    .card-commerce .btn-outline-light:hover {
        color: #f39c12; /* Orange du pôle commerce */
    }
    .card-reconversion .btn-outline-light:hover {
        color: #1b5e20; /* Vert du pôle reconversion */
    }
</style>

<div class="row justify-content-center gy-4">
    <div class="col-lg-4 col-md-6" data-aos="fade-up">
        <div class="program-card card-info">
            <div class="program-icon">
                <i class="fas fa-laptop-code"></i>
            </div>
            <h3 class="program-title" style="color: white">Pôle Informatique</h3>
            <a href="formations.php" class="btn btn-outline-light mt-3 pulse">
                En savoir plus <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
    
    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="program-card card-commerce">
            <div class="program-icon">
                <i class="fas fa-chart-line"></i>
            </div>
            <h3 class="program-title" style="color: white;">Pôle Commerce</h3>
            <a href="formations.php" class="btn btn-outline-light mt-3 pulse">
                En savoir plus <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="program-card card-reconversion">
            <div class="program-icon">
                <i class="fas fa-people-arrows"></i>
            </div>
            <h3 class="program-title" style="color: white ">Pôle Reconversion</h3>
            <a href="tisr.php" class="btn btn-outline-light mt-3 pulse">
                En savoir plus <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</div><style>
    /* Style de base pour les boutons des niveaux */
    .program-card.text-center .btn {
        background-color: #FF6347; /* Couleur orange (Tomato) */
        border-color: #FF6347;
        color: white;
        font-weight: 600;
        transition: all 0.3s ease-in-out;
    }

    /* Effet au survol pour un meilleur impact visuel */
    .program-card.text-center .btn:hover {
        background-color: white;
        color: #FF6347; /* Le texte devient orange */
        transform: scale(1.05);
    }
</style>

<div class="row mt-5">
    <div class="col-md-4" data-aos="fade-up">
        <div class="program-card text-center">
            <img src="https://esicim-academy.fr/public/assets/wp-content/uploads/2024/08/images-site-esicim-ssss-18-30-480x352.webp" alt="BAC+2" class="img-fluid mb-3" style="max-height: 200%;">
            <h3 class="program-title">Niveau BAC+2</h3>
            <a href="Niveau BAC+2" class="btn btn-outline-light mt-3 pulse">
                En savoir plus <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
        <div class="program-card text-center">
            <img src="https://esicim-academy.fr/public/assets/wp-content/uploads/2024/08/images-site-esicim-ssss-06-scaled-480x352.webp" alt="BAC+3" class="img-fluid mb-3" style="max-height: 200%;">
            <h3 class="program-title">Niveau BAC+3</h3>
            <a href="formations.php" class="btn btn-outline-light mt-3 pulse">
                En savoir plus <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
        <div class="program-card text-center">
            <img src="https://esicim-academy.fr/public/assets/wp-content/uploads/2024/08/images-site-esicim-18-scaled-480x352.webp" alt="BAC+5" class="img-fluid mb-3" style="max-height: 200%;">
            <h3 class="program-title">Niveau BAC+5</h3>
            <a href="formations.php" class="btn btn-outline-light mt-3 pulse">
                En savoir plus <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</div>
</section>
<style>
</style>

<section class="program-details-section">
  <div class="container">

    <div class="program-block">
      <div class="program-image-wrapper">
        <img src="https://images.pexels.com/photos/3184418/pexels-photo-3184418.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Équipe travaillant sur un ordinateur">
      </div>
      <div class="program-content-box">
        <h3 class="program-title">Pôle informatique :</h3>
        <ul class="program-list">
          <li>BTS Technicien supérieur systèmes et réseaux</li>
          <li>BTS Service informatiques aux organisations (Développement)</li>
          <li>BACHELOR Administrateur d'infrastructures sécurisées</li>
          <li>BACHELOR Concepteur développeur d'application</li>
        </ul>
        <a href="formations.php" class="btn-custom">En savoir plus <i class="fas fa-arrow-right"></i></a>
      </div>
    </div>

    <div class="program-block program-block-reverse">
      <div class="program-image-wrapper">
        <img src="https://images.pexels.com/photos/3760067/pexels-photo-3760067.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Femme d'affaires lisant un livre">
      </div>
      <div class="program-content-box">
        <h3 class="program-title">Pôle commerce :</h3>
        <ul class="program-list">
          <li>BTS Négociation et digitalisation de la relation client</li>
          <li>BTS Management commercial opérationnel</li>
          <li>BTS Gestion des petites et moyennes entreprises</li>
          <li>BACHELOR Responsable développement commercial</li>
        </ul>
        <a href="formations.php" class="btn-custom">En savoir plus <i class="fas fa-arrow-right"></i></a>
      </div>
    </div>

  </div>
</section>

<!-- Features Section -->
<section class="features-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-down">
            <h2 class="program-heading">LES POINTS FORTS DE l'ESICIM</h2>
            <p class="lead text-muted">Découvrez ce qui fait notre différence</p>
        </div>
        
        <div class="row">
            <div class="col-md-4" data-aos="fade-up">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <h4>Enseignement en présentiel</h4>
                    <p>Un suivi personnalisé avec nos formateurs experts</p>
                    <a href="#" class="btn btn-link">Lire plus <i class="fas fa-arrow-right ms-1"></i></a>
                </div>
            </div>
            
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <h4>Formations certifiées</h4>
                    <p>Reconnues par l'État et le monde professionnel</p>
                    <a href="#" class="btn btn-link">Lire plus <i class="fas fa-arrow-right ms-1"></i></a>
                </div>
            </div>
            
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h4>Accompagnement personnalisé</h4>
                    <p>Un suivi individuel pour votre réussite</p>
                    <a href="#" class="btn btn-link">Lire plus <i class="fas fa-arrow-right ms-1"></i></a>
                </div>
            </div>
            
            <div class="col-md-4" data-aos="fade-up">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fas fa-network-wired"></i>
                    </div>
                    <h4>Réseau de partenaires</h4>
                    <p>Des opportunités avec nos entreprises partenaires</p>
                    <a href="#" class="btn btn-link">Lire plus <i class="fas fa-arrow-right ms-1"></i></a>
                </div>
            </div>
            
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>Pédagogie de qualité</h4>
                    <p>Méthodes innovantes et formateurs experts</p>
                    <a href="#" class="btn btn-link">Lire plus <i class="fas fa-arrow-right ms-1"></i></a>
                </div>
            </div>
            
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fas fa-sync-alt"></i>
                    </div>
                    <h4>Amélioration continue</h4>
                    <p>Des programmes constamment actualisés</p>
                    <a href="#" class="btn btn-link">Lire plus <i class="fas fa-arrow-right ms-1"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Partners Section -->
<section class="partners-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-down">
            <h2 class="program-heading">NOS PARTENAIRES PARTENAIRES</h2>
            <p class="lead text-muted">Ils nous font confiance</p>
        </div>
        
        <div class="row align-items-center justify-content-center">
            <div class="col-6 col-md-3 mb-4" data-aos="zoom-in">
                <img src="photos/SITE ESICIM s-13.png" alt="Partenaire" class="img-fluid partner-logo">
            </div>
            <div class="col-6 col-md-3 mb-4" data-aos="zoom-in">
                <img src="photos/SITE ESICIM s-14.png" alt="Partenaire" class="img-fluid partner-logo">
            </div>
            <div class="col-6 col-md-3 mb-4" data-aos="zoom-in">
                <img src="photos/SITE ESICIM s-16.png" alt="Partenaire" class="img-fluid partner-logo">
            </div>
            <div class="col-6 col-md-3 mb-4" data-aos="zoom-in">
                <img src="photos/SITE ESICIM s-17.png" alt="Partenaire" class="img-fluid partner-logo">
            </div>
            <div class="col-6 col-md-3 mb-4" data-aos="zoom-in">
                <img src="photos/SITE ESICIM s-18.png" alt="Partenaire" class="img-fluid partner-logo">
            </div>
            <div class="col-6 col-md-3 mb-4" data-aos="zoom-in">
                <img src="photos/SITE ESICIM s-19.png" alt="Partenaire" class="img-fluid partner-logo">
            </div>
            <div class="col-6 col-md-3 mb-4" data-aos="zoom-in">
                <img src="photos/SITE ESICIM s-20.png" alt="Partenaire" class="img-fluid partner-logo">
            </div>
        
        
        </div>
    </div>
 </section>

<!-- Contact Section -->
<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                <h2 class="text-white mb-4">Inscrivez-vous et rejoignez notre école supérieure à Méru</h2>
                <form class="contact-form" data-aos="zoom-in">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" placeholder="Nom" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" placeholder="Prénom" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Adresse mail" required>
                    </div>
                    <div class="mb-3">
                        <input type="tel" class="form-control" placeholder="Numéro de téléphone" required>
                    </div>
                    <div class="mb-3">
                        <select class="form-control" required>
                            <option value="" disabled selected>Pays</option>
                            <option>France</option>
                            <option>Autre</option>
                        </select>
                    </div>
                    <button type="submit" class="btn submit-btn w-100 pulse">
                        <i class="fas fa-p7
                        aper-plane me-2"></i>Je m'inscris
                    </button>
                </form>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <h3 class="text-white mb-4">Pour toute demande d'inscription :</h3>
                <form class="contact-form" data-aos="zoom-in" data-aos-delay="200">
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Nom" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="E-mail *" required>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" rows="5" placeholder="Votre demande" required></textarea>
                    </div>
                    <button type="submit" class="btn submit-btn w-100 pulse">
                        <i class="fas fa-envelope me-2"></i>Envoyer
                    </button>
                    <p class="text-muted mt-3 small">* En vous inscrivant à nos programmes, vous acceptez qu'ESICIM ACADEMY collecte et utilise vos données pour vous envoyer des communications électroniques. Vous avez la possibilité de vous désabonner à tout moment. Pour plus de détails, consultez notre politique de confidentialité.</p>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__.'/footer.php'; ?>


<!-- Scripts JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
<script>
    // Loader
    window.addEventListener('load', function() {
        setTimeout(function() {
            gsap.to(".loader-overlay", {
                opacity: 0,
                duration: 1,
                ease: "power2.out",
                onComplete: function() {
                    document.querySelector('.loader-overlay').style.display = 'none';
                    initHeroAnimations();
                }
            });
        }, 2000);
    });
    
    // Slideshow Hero
    let currentSlide = 0;
    const slides = document.querySelectorAll('.hero-slide');
    
    function changeSlide() {
        slides[currentSlide].classList.remove('active');
        currentSlide = (currentSlide + 1) % slides.length;
        slides[currentSlide].classList.add('active');
    }
    
    setInterval(changeSlide, 5000);
    
    // Mots clés défilants
    const words = document.querySelectorAll('.changing-words .word');
    let currentWord = 0;
    
    function rotateWords() {
        const activeWord = document.querySelector('.word.active');
        activeWord.classList.remove('active');
        
        currentWord = (currentWord + 1) % words.length;
        words[currentWord].classList.add('active');
    }
    
    setInterval(rotateWords, 2000);
    
    // Animation des particules
    function createParticles() {
        const particlesContainer = document.getElementById('particles-js');
        const particleCount = 50;
        
        for (let i = 0; i < particleCount; i++) {
            const particle = document.createElement('div');
            particle.classList.add('particle');
            
            // Position aléatoire
            const posX = Math.random() * 100;
            const posY = Math.random() * 100 + 100;
            
            // Taille aléatoire
            const size = Math.random() * 5 + 2;
            
            // Durée d'animation aléatoire
            const duration = Math.random() * 15 + 10;
            
            // Délai aléatoire
            const delay = Math.random() * 5;
            
            particle.style.left = `${posX}%`;
            particle.style.top = `${posY}%`;
            particle.style.width = `${size}px`;
            particle.style.height = `${size}px`;
            particle.style.animationDuration = `${duration}s`;
            particle.style.animationDelay = `${delay}s`;
            
            particlesContainer.appendChild(particle);
        }
    }
    
    // Animation du titre dynamique
    function animateTitle() {
        const titleWords = document.querySelectorAll('.title-word');
        const chars = [];
        
        titleWords.forEach((word, wordIndex) => {
            const wordChars = word.textContent.split('');
            word.innerHTML = '';
            
            wordChars.forEach((char, charIndex) => {
                const span = document.createElement('span');
                span.classList.add('title-char');
                span.textContent = char;
                word.appendChild(span);
                
                chars.push({
                    element: span,
                    delay: wordIndex * 0.1 + charIndex * 0.05
                });
            });
        });
        
        chars.forEach(char => {
            gsap.to(char.element, {
                y: 0,
                opacity: 1,
                duration: 0.8,
                delay: char.delay,
                ease: "back.out(1.7)"
            });
        });
    }
    
    // Animation du sous-titre et des boutons
    function animateHeroContent() {
        gsap.to("#hero-subtitle", {
            y: 0,
            opacity: 1,
            duration: 1,
            delay: 0.8,
            ease: "power3.out"
        });
        
        gsap.to("#hero-btn-1", {
            scale: 1,
            opacity: 1,
            duration: 0.8,
            delay: 1.2,
            ease: "back.out(2)"
        });
        
        gsap.to("#hero-btn-2", {
            scale: 1,
            opacity: 1,
            duration: 0.8,
            delay: 1.4,
            ease: "back.out(2)"
        });
    }
    
    // Initialisation des animations hero
    function initHeroAnimations() {
        createParticles();
        animateTitle();
        animateHeroContent();
    }
    
    // Initialisation AOS
    AOS.init({
        duration: 1000,
        once: true,
        offset: 100
    });
    
    // Effet de parallaxe sur l'image hero
    window.addEventListener('scroll', function() {
        const scrollPosition = window.pageYOffset;
        const heroImg = document.querySelector('.floating-img');
        if (heroImg) {
            heroImg.style.transform = `translateY(${scrollPosition * 0.2}px)`;
        }
    });
</script>

<script>

document.addEventListener('DOMContentLoaded', function() {

    // --- Gestion du diaporama ---
    const slides = document.querySelectorAll('.header-slideshow .slide');
    let currentSlide = 0;

    function nextSlide() {
        slides[currentSlide].classList.remove('active');
        currentSlide = (currentSlide + 1) % slides.length;
        slides[currentSlide].classList.add('active');
    }

    // Change de slide toutes les 5 secondes (5000 ms)
    setInterval(nextSlide, 5000);


    // --- Gestion des mots-clés ---
    const keywords = document.querySelectorAll('.keywords-ticker .keyword');
    let currentKeyword = 0;

    function nextKeyword() {
        keywords[currentKeyword].classList.remove('active');
        currentKeyword = (currentKeyword + 1) % keywords.length;
        keywords[currentKeyword].classList.add('active');
    }

    // Change de mot-clé toutes les 2.5 secondes (2500 ms)
    setInterval(nextKeyword, 2500);

});
</script>
</body>
</html>