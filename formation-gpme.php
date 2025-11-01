<?php
// On ouvre UN SEUL bloc PHP pour tout le code de configuration
define('PROJECT_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/esicim-project');

// On utilise la constante PROJECT_ROOT pour plus de fiabilité
require_once PROJECT_ROOT . '/config.php';

$GLOBALS['active_page'] = 'formations.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTS GPME - Gestion de la PME | ESICIM</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet" href="/esicim-project/assets/css/style.css">

    <style>
        :root {
            --primary-color: #f15a29; /* Orange */
            --secondary-color: #125195; /* Bleu */
            --background-color: #f8f9fa; /* Gris très clair */
            --text-color: #333;
            --light-text-color: #fff;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-color);
            background-color: #fff;
        }

        .sio-page-container { /* Le nom de la classe est conservé pour la structure */
            width: 100%;
            overflow-x: hidden;
        }

        .section-padding {
            padding: 60px 20px;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--secondary-color);
            position: relative;
        }

        .section-title::after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background-color: var(--primary-color);
            margin: 15px auto 0;
            border-radius: 2px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        /* --- Hero Header --- */
        .sio-hero {
            background-image: url('photos/header1.png'); /* Your header image */
            background-size: cover; /* Cover the entire area */
            background-position: center center; /* Center the image */
            background-repeat: no-repeat; /* Do not repeat the image */
            height: 550px; /* Default height for larger screens */
            width: 100%; /* Ensure it spans full width */
            padding: 0; /* Remove padding to allow full background image */
            display: flex; /* Still useful if you decide to add text overlay later */
            align-items: center;
            justify-content: center;
            color: var(--light-text-color); /* For any potential text overlays */
            overflow: hidden; /* Hide overflow if image is too big */
        }

        /* Media Queries for Responsive Header */
        @media (max-width: 1024px) { /* For tablets and smaller laptops */
            .sio-hero {
                height: 450px; /* Slightly shorter for medium screens */
            }
        }

        @media (max-width: 768px) { /* For tablets in portrait and larger phones */
            .sio-hero {
                height: 350px; /* Shorter for tablets */
                background-position: center center; /* Keep center position, or adjust if content is cut off */
            }
        }

        @media (max-width: 480px) { /* For mobile phones */
            .sio-hero {
                height: 250px; /* Even shorter for mobile */
                background-position: center center; /* Adjust if the main subject is at the top/bottom */
            }
        }

        /* --- Competences Attendues Box --- */
        .competences-box {
            background-color: var(--secondary-color);
            color: var(--light-text-color);
            padding: 30px;
            text-align: center;
        }
        .competences-box h3 { font-size: 1.5rem; margin-top:0; }
        .competences-box p { font-size: 1.1rem; max-width: 800px; margin: 15px auto 25px; }
        .btn-candidat {
            background-color: var(--primary-color);
            color: var(--light-text-color);
            padding: 12px 30px;
            text-decoration: none;
            font-weight: 700;
            border-radius: 50px;
            transition: background-color 0.3s ease;
        }
        .btn-candidat:hover { background-color: #e67e22; }

        .rentree-box {
            background-color: #fff;
            padding: 20px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            margin-top: -50px;
            position: relative;
            z-index: 2;
            display: inline-block;
            border-radius: 8px; /* Added for consistency */
        }
        .rentree-box p { margin:0; font-size: 1.2rem; color: var(--secondary-color); font-weight: 600; }
        .rentree-box span { color: var(--primary-color); font-weight: 700; font-size: 1.5rem; }

        /* --- Info Grid --- */
        .info-grid-sio {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }
        .info-card {
            background-color: var(--background-color);
            padding: 25px;
            border-radius: 8px;
            border-left: 5px solid var(--primary-color);
            text-align: center; /* Center content including image */
        }
        /* New style for info card images */
        .info-card-icon {
            width: 60px; /* Adjust size as needed */
            height: 60px; /* Adjust size as needed */
            margin: 0 auto 15px auto; /* Center image and add bottom margin */
            display: block; /* Ensure it takes its own line */
        }
        .info-card h4 { font-size: 1.1rem; color: var(--secondary-color); margin: 0 0 10px; }
        .info-card p, .info-card ul { margin: 0; padding:0; list-style-position: inside; }
        .info-card ul { list-style: none; } /* Remove default list style */
        .info-card ul li { margin-bottom: 5px; }

        /* --- Two Column Section --- */
        .two-column-section { display: flex; gap: 40px; align-items: center; }
        .two-column-section .text-content { flex: 1; }
        .two-column-section .image-content { flex: 1; max-width: 500px; }
        .two-column-section img { width: 100%; border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .two-column-section.image-left { flex-direction: row-reverse; }
        @media (max-width: 992px) {
            .two-column-section, .two-column-section.image-left { flex-direction: column; }
        }

        .list-styled { list-style: none; padding-left: 0; }
        .list-styled li { padding-left: 25px; position: relative; margin-bottom: 12px; font-size: 1.05rem; }
        .list-styled li::before { content: '\f058'; font-family: 'Font Awesome 6 Free'; font-weight: 900; color: var(--primary-color); position: absolute; left: 0; top: 2px; }

        /* --- Diplome & Validation Section --- */
        .dark-section { background-color: var(--secondary-color); color: var(--light-text-color); }
        .dark-section .section-title { color: var(--light-text-color); }

        .diplome-validation-grid { display: grid; grid-template-columns: 1fr 1.5fr; gap: 40px; align-items: center; }
        @media (max-width: 992px) { .diplome-validation-grid { grid-template-columns: 1fr; } }

        .diplome-card, .validation-card { padding: 30px; border-radius: 10px; }
        .diplome-card { text-align: center; }
        .rncp-cert-tag {
            background-color: var(--primary-color);
            color: var(--secondary-color);
            padding: 10px 15px;
            border-radius: 5px;
            font-weight: 700;
            display: inline-block;
            margin: 10px 0;
            border: none;
        }

        /* --- Programme Section --- */
        .programme-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; }
        .programme-col h4 { color: var(--primary-color); border-bottom: 2px solid var(--secondary-color); padding-bottom: 10px; margin-bottom: 15px; }

        /* --- Admission Section --- */
        .admission-steps-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; text-align: center; }
        .step-card img { height: 80px; width: auto; margin-bottom: 15px; }
        .step-card h4 { font-size: 1.2rem; color: var(--secondary-color); }

        /* --- Dispositifs & Form --- */
        .dispositifs-section { background-color: var(--background-color); }
        .form-section { background-color: var(--secondary-color); color: var(--light-text-color); }
        .form-section .section-title { color: var(--light-text-color); }
        .form-container { max-width: 700px; margin: 0 auto; }
        .form-container input, .form-container textarea { width: 100%; padding: 12px; margin-bottom: 15px; border-radius: 5px; border: 1px solid #ccc; }
        .form-container button { width: 100%; padding: 15px; } /* Uses .btn-candidat style */
        .privacy-text { font-size: 0.8rem; text-align: center; margin-top: 15px; opacity: 0.8; }
    </style>
</head>
<body>

<?php include PROJECT_ROOT . '/nav.php'; ?>

<div class="sio-page-container">

    <header class="sio-hero">
    </header>

    <section class="competences-box">
        <div class="container">
            <h3>COMPETENCES ATTENDUES</h3>
            <p>Le BTS GPME inclut un intérêt marqué pour le management, la gestion des entreprises et leur environnement économique et juridique. Les candidats doivent maîtriser la communication écrite et orale, disposer de compétences relationnelles adaptées à la gestion d’une PME, et être capables de traiter des données de gestion grâce à des compétences techniques et calculatoires. Enfin, ils doivent démontrer une capacité à évoluer dans des environnements numériques.</p>
            <a href="#form-inscription" class="btn-candidat">Je candidate</a>
        </div>
    </section>
    <div style="text-align:center;">
        <div class="rentree-box">
            <p>Prochaine Rentrée : <span>14 Octobre 2024</span></p>
        </div>
    </div>


    <section class="section-padding">
        <div class="container">
            <div class="info-grid-sio">
                <div class="info-card">
                    <img src="photos/grp.png" alt="Icone Public Concerné" class="info-card-icon">
                    <h4>PUBLIC CONCERNÉ</h4>
                    <ul>
                        <li>Post-BAC niveau 4</li>
                        <li>Futurs bacheliers toutes séries.</li>
                    </ul>
                </div>
                <div class="info-card">
                    <img src="photos/form.png" alt="Icone Candidature" class="info-card-icon">
                    <h4>CANDIDATURE & ADMISSION</h4>
                    <ul>
                        <li>Pré-inscriptions sur notre site</li>
                        <li>Étude du dossier</li>
                        <li>Entretien de motivation</li>
                        <li>Test technique</li>
                    </ul>
                </div>
                <div class="info-card">
                    <img src="photos/time.png" alt="Icone Durée Formation" class="info-card-icon">
                    <h4>DURÉ​E DE FORMATION</h4>
                    <ul>
                        <li>24 mois</li>
                        <li>Bac +2</li>
                    </ul>
                </div>
                <div class="info-card">
                    <img src="photos/tech.png" alt="Icone Rythme Initiale" class="info-card-icon">
                    <h4>RYTHME DE FORMATION</h4>
                    <p><strong>Initiale :</strong></p>
                    <ul>
                        <li>Formation initial</li>
                        <li>Stage en entreprise</li>
                    </ul>
                </div>
                <div class="info-card">
                    <img src="photos/hat.png" alt="Icone Rythme Alternance" class="info-card-icon">
                    <h4>RYTHME DE FORMATION</h4>
                    <p><strong>Alternance :</strong></p>
                    <ul>
                        <li>3 semaines en entreprise</li>
                        <li>1 semaine en formation</li>
                    </ul>
                </div>
                <div class="info-card">
                    <img src="photos/bluhat.png" alt="Icone Diplôme Visé" class="info-card-icon">
                    <h4>DIPLÔME VISÉ</h4>
                    <ul>
                        <li>Bac+2</li>
                        <li>Titre enregistré au RNCP</li>
                        <li>Niveau 5</li>
                        <li>Titre certié par l’État</li>
                    </ul>
                </div>
                <div class="info-card">
                    <img src="photos/prof.png" alt="Icone Modalités" class="info-card-icon">
                    <h4>MODALITÉS DE DÉROULEMENT :</h4>
                    <ul>
                        <li>Formation 100% en présentiel</li>
                    </ul>
                </div>
                <div class="info-card">
                    <img src="photos/AND.png" alt="Icone Accessibilité PSH" class="info-card-icon">
                    <h4>ACCESSIBILITÉ PSH</h4>
                    <p>(Personne en Situation de Handicap nous contacter)</p>
                </div>
                <div class="info-card">
                    <img src="photos/bag.png" alt="Icone Rentrée Scolaire" class="info-card-icon">
                    <h4>RENTREE SCOLAIRE</h4>
                    <p><strong>Initiale :</strong> Octobre & Janvier</p>
                    <p><strong>Alternance :</strong> Tous les 3 mois</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding" style="background-color: var(--background-color);">
        <div class="container">
            <div class="two-column-section">
                <div class="text-content">
                    <h2 class="section-title" style="text-align:left; margin-bottom: 20px;">PRESENTATION</h2>
                    <p>Le BTS GPME est un diplôme d’Etat de niveau 5 - BAC+2, délivré par le Ministère de l’Enseignement Supérieur de la recherche et de l'innovation. Ce diplôme forme des professionnels polyvalents capables de gérer efficacement les différentes fonctions d’une PME. Les titulaires de ce BTS sont aptes à gérer les ressources humaines, notamment en supervisant la paie, les contrats, et en renforçant la cohésion d'équipe. Ils participent activement au développement commercial de l’entreprise, en contribuant à la digitalisation des processus et à l’élaboration de stratégies de communication, y compris en anglais des affaires. Leur maîtrise des outils de gestion leur permet également de prendre en charge les relations clients et fournisseurs, ainsi que les aspects administratifs et comptables. Enfin, ils développent des compétences essentielles en analyse des risques financiers et juridiques, contribuant ainsi à la sécurité et à la croissance durable des PME. Grâce à ces compétences, les diplômés du BTS GPME sont en mesure de soutenir le bon fonctionnement et le développement stratégique des petites et moyennes entreprises.</p>
                    <br>
                    <h4>OBJECTIFS DE LA FORMATION</h4>
                    <ul class="list-styled">
                        <li>Former des professionnels polyvalents capables de gérer les multiples fonctions d’une PME.</li>
                        <li>Renforcer les compétences en gestion administrative, commerciale, et financière, tout en intégrant les outils numériques.</li>
                        <li>Encourager l’initiative et l’autonomie pour permettre aux diplômés de jouer un rôle clé dans la stratégie des PME.</li>
                        <li>Développer une compréhension approfondie des enjeux liés à la transformation digitale des entreprises et des processus de gestion modernes.</li>
                    </ul>
                </div>
                <div class="image-content">
                    <img src="photos/formateur.jpg" alt="Image de présentation">
                </div>
            </div>
        </div>
    </section>

<section class="section-padding dark-section">
    <div class="container">
        <div class="diplome-validation-grid">
            <div class="diplome-card">
                <h2 class="section-title" style="text-align:center; margin-bottom: 20px;">LE DIPLÔME</h2>
                <p>Cette formation vous permet d’obtenir :</p>
                <div class="rncp-cert-tag">LA CERTIFICATION RNCP31678</div>
                <img src="photos/SITE-ESICIM-59.png" alt="Image Diplôme 1" class="card-content-image">
                <h4>BAC+2 BTS GPME EN 2 ANS</h4>
                <p>GESTION DE LA PME</p>
                <img src="photos/SITE-ESICIM-60.png" alt="Image Diplôme 2" class="card-content-image">
                <p>TITRE ENREGISTRÉ AU RNCP NIVEAU 5</p>
            </div>
            <div class="validation-card">
                <h2 class="section-title" style="text-align:left; margin-bottom: 20px;">MODALITÉ DE VALIDATION</h2>
                <p>La validation de la formation se fait par l’acquisition de l’ensemble des compétences techniques et relationnelles visées par la certification. Elles sont organisées en 6 blocs de compétences :</p>
                <ul class="list-styled">
                    <li><b>BC01 :</b> Gérer la relation avec les clients et les fournisseurs de la PME</li>
                    <li><b>BC02 :</b> Participer à la gestion des risques de la PME</li>
                    <li><b>BC03 :</b> Gérer le personnel et contribuer à la gestion des ressources humaines de la PME</li>
                    <li><b>BC04 :</b> Soutenir le fonctionnement et le développement de la PME</li>
                    <li><b>BC06 :</b> Culture économique, juridique et managériale</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<style>
    .card-content-image {
        max-width: 150px; /* Ajustez la taille maximale de l'image */
        height: auto;
        display: block; /* Pour que l'image prenne sa propre ligne */
        margin: 20px auto; /* Centre l'image et ajoute de l'espace vertical */
        border-radius: 8px; /* Bords arrondis pour l'esthétique */
        box-shadow: 0 4px 10px rgba(0,0,0,0.1); /* Ombre légère */
    }
</style>
    <section class="section-padding">
        <div class="container">
             <div class="two-column-section image-left" style="margin-bottom: 60px;">
                <div class="text-content">
                    <h2 class="section-title" style="text-align:left; margin-bottom: 20px;">DÉBOUCHÉS & MÉTIERS</h2>
                    <ul class="list-styled">
                        <li>Assistant commercial</li>
                        <li>Assistant de direction</li>
                        <li>Assistant en gestion administrative</li>
                        <li>Assistant en ressources humaines</li>
                        <li>Assistant comptable</li>
                        <li>Secrétaire (direction, bureautique…)</li>
                        <li>Assistant de gestion en PME</li>
                        <li>Collaborateur du dirigeant PME</li>
                    </ul>
                </div>
                <div class="image-content">
                    <img src="photos/metier.png" alt="Professionnel de la gestion PME">
                </div>
            </div>

            <h2 class="section-title">PROGRAMME</h2>
            <div class="programme-grid">
                <div class="programme-col">
                    <h4>1ÈRE & 2ÈME ANNÉE : MATIERES ENSEIGNEES</h4>
                    <ul class="list-styled">
                        <li><strong>Gérer la relation avec les clients et les fournisseurs de la PME</strong></li>
                        <li>Rechercher des clients et traiter les demandes</li>
                        <li>Informer, conseiller, et traiter les réclamations</li>
                        <li>Rechercher et sélectionner les fournisseurs</li>
                        <li>Assurer le suivi comptable des opérations commerciales</li>
                        <li><strong>Participer à la gestion des risques de la PME</strong></li>
                        <li>Conduire une veille et identifier les risques</li>
                        <li>Suivre les risques financiers et la trésorerie</li>
                        <li>Mettre en place une démarche qualité</li>
                        <li><strong>Gérer le personnel et contribuer à la GRH</strong></li>
                        <li>Gestion administrative et cohésion interne</li>
                        <li>Préparer les éléments de la paie</li>
                    </ul>
                </div>
                <div class="programme-col">
                    <h4>Matières transversales et générales</h4>
                    <ul class="list-styled">
                        <li><strong>Soutenir le fonctionnement et le développement de la PME</strong></li>
                        <li>Améliorer le système d’information et les processus</li>
                        <li>Participer au développement commercial et à la fidélisation</li>
                        <li>Accompagner le plan de communication</li>
                        <li>Analyser l’activité et la performance</li>
                        <li><strong>Culture Générale et Expression</strong></li>
                        <li>Synthèse, écriture, analyse et communication orale.</li>
                        <li><strong>Langues Vivantes (Anglais)</strong></li>
                        <li>Anglais des affaires, éthique et culture.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding" style="background-color: var(--background-color);">
        <div class="container">
            <h2 class="section-title">VOS AVANTAGES</h2>
            <center><img src="photos/Capture1.png" alt=""></center>
            <div class="two-column-section">
                <div class="text-content">
                    <ul class="list-styled">
                        <li><strong>Accompagnement sur mesure du projet d’études</strong></li>
                        <li><strong>Formation de qualité effectuée par des experts</strong></li>
                        <li><strong>Mise en relation avec des entreprises d’accueil</strong></li>
                        <li><strong>Ressources électroniques et matérielles de qualité</strong></li>
                    </ul>
                </div>
                <div class="image-content">
                    <img src="photos/Vos avantages en un clin d'œil.png" alt="Coaching recherche d'emploi">
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding">
        <div class="container">
            <h2 class="section-title">CANDIDATURE & ADMISSION</h2>
            <p style="text-align: center; margin-bottom: 30px;">
                BAC+2 BTS GPME EN 2 ANS<br>
                GESTION DE LA PME<br>
                TITRE ENREGISTRÉ AU RNCP NIVEAU 5
            </p>
            <div class="admission-steps-grid">
                <div class="step-card">
                    <img src="https://esicim-academy.fr/public/assets/wp-content/uploads/2024/09/SITE-ESICIM-74-100x100.png" alt="Icone formulaire">
                    <h4>1. COMPLÉTER NOTRE FORMULAIRE DE PRÉ-INSCRIPTION :</h4>
                    <p>Envoyez votre candidature en ligne ! Un responsable des admissions vous contactera sous 48 heures pour fixer un rendez-vous. Préparez les documents suivants pour le dépôt de votre candidature.</p>
                </div>
                <div class="step-card">
                    <img src="https://esicim-academy.fr/public/assets/wp-content/uploads/2024/09/SITE-ESICIM-76-100x100.png" alt="Icone test">
                    <h4>2. SE PRÉPARER AU TEST DE COMPÉTENCES:</h4>
                    <p>Pour tous les nouveaux candidats, un test de compétences est requis. Ce test dure environ 30 minutes et aura lieu lors de votre journée d'entretien. Le résultat final n'impacte pas le processus d'admission mais sert à évaluer votre niveau.</p>
                </div>
                <div class="step-card">
                    <img src="https://esicim-academy.fr/public/assets/wp-content/uploads/2024/09/SITE-ESICIM-75-100x100.png" alt="Icone entretien">
                    <h4>3. ENTRETIEN DE MOTIVATION :</h4>
                    <p>Après le test de compétences, un entretien de motivation sera organisé pour mieux comprendre votre parcours, votre projet professionnel, et vos motivations.</p>
                </div>
                <div class="step-card">
                    <img src="https://esicim-academy.fr/public/assets/wp-content/uploads/2024/09/SITE-ESICIM-77-100x100.png" alt="Icone accompagnement">
                    <h4>4. ACCOMPAGNEMENT À LA RECHERCHE D'ENTREPRISE :</h4>
                    <p>À ESICIM ACADEMY, les responsables des relations entreprises recherchent des partenaires pour nos futurs étudiants. Nous proposons divers ateliers pour vous aider à trouver un contrat d'alternance.</p>
                </div>
            </div>
            <div style="text-align: center; margin-top: 30px;">
                <a href="#form-inscription" class="btn-candidat" style="background-color: var(--primary-color);">Remplir le formulaire de pré-inscription</a>
            </div>
        </div>
    </section>

    <div id="form-inscription">
       <section class="section-padding dispositifs-section">
    <div class="container">
        <h2 class="section-title">LES DISPOSITIFS</h2>
        <div class="info-grid-sio">
            <div class="info-card">
                <i class="fa-solid fa-circle-check info-card-icon" style="color: #28a745;"></i>
                <p>Contrat d’apprentissage</p>
            </div>
            <div class="info-card">
                <i class="fa-solid fa-circle-check info-card-icon" style="color: #28a745;"></i>
                <p>Contrat de professionnalisation</p>
            </div>
            <div class="info-card">
                <i class="fa-solid fa-circle-check info-card-icon" style="color: #28a745;"></i>
                <p>Formation continue ou initiale</p>
            </div>
            <div class="info-card">
                <i class="fa-solid fa-circle-check info-card-icon" style="color: #28a745;"></i>
                <p>Dispositif pôle emploi</p>
            </div>
        </div>
        <div style="text-align: center; margin-top: 30px;">
            <a href="#" class="btn-candidat" style="background-color: var(--secondary-color);"><i class="fa-solid fa-download"></i> Télécharger la fiche de la formation</a>
        </div>
    </div>
</section>


        <section class="section-padding form-section">
            <div class="container form-container">
                <h2 class="section-title">Pour toute demande d’inscription :</h2>
                <form action="#" method="POST">
                    <input type="text" name="nom" placeholder="Ligne de texte" required>
                    <input type="email" name="email" placeholder="E-mail *" required>
                    <textarea name="message" rows="5" placeholder="Ligne de texte"></textarea>
                    <button type="submit" class="btn-candidat">Envoyer</button>
                    <p class="privacy-text">* En vous inscrivant à nos programmes, vous acceptez qu’ESICIM ACADEMY collecte et utilise vos données pour vous envoyer des communications électroniques. Vous avez la possibilité de vous désabonner à tout moment. Pour plus de détails, consultez notre politique de confidentialité.</p>
                </form>
            </div>
        </section>
    </div>

</div>

<?php include PROJECT_ROOT . '/footer.php'; ?>

</body>
</html>