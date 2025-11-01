<?php
// On ouvre UN SEUL bloc PHP pour tout le code de configuration
define('PROJECT_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/esicim-project');

// On utilise la constante PROJECT_ROOT pour plus de fiabilité
require_once PROJECT_ROOT . '/config.php';

// Le nom de la page active peut être mis à jour si besoin, par exemple 'tssr.php'
$GLOBALS['active_page'] = 'formations.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAC+2 TP TSSR - Technicien Supérieur Systèmes et Réseaux | ESICIM</title>

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

        .sio-page-container {
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

        /* --- MODIFICATION HEADER --- */
        .sio-hero {
            background-image: url('photos/header1.png'); /* Vous pouvez changer cette image */
            background-size: cover;
            background-position: center center;
            height: 550px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: flex-end; /* Aligne le groupe d'actions à droite */
            padding: 0 60px; 
            overflow: hidden;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 25px; 
            margin-top: 430px;
            margin-right: 50px;
        }

        @media (max-width: 768px) {
            .sio-hero {
                height: 350px;
                justify-content: center; /* Centre le groupe sur mobile */
            }
            .header-actions {
                flex-direction: column; /* Met les éléments l'un sur l'autre */
            }
        }

        @media (max-width: 480px) {
            .sio-hero {
                height: 250px;
            }
        }
        
        .btn-candidat {
            background-color: var(--primary-color);
            color: var(--light-text-color);
            padding: 12px 30px;
            text-decoration: none;
            font-weight: 700;
            border-radius: 50px;
            transition: background-color 0.3s ease;
            flex-shrink: 0; /* Empêche le bouton de rétrécir */
        }
        .btn-candidat:hover { background-color: #e67e22; }

        .rentree-box {
            background-color: rgba(255, 255, 255, 0.9); /* Fond légèrement transparent pour mieux s'intégrer */
            padding: 15px 25px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        .rentree-box p { margin:0; font-size: 1.1rem; color: var(--secondary-color); font-weight: 600; }
        .rentree-box span { color: var(--primary-color); font-weight: 700; font-size: 1.3rem; }

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
            border-left: 3px solid var(--primary-color);
            text-align: center;
        }
        .info-card-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 15px auto;
            display: block;
        }
        .info-card h4 { font-size: 1.1rem; color: var(--secondary-color); margin: 0 0 10px; }
        .info-card p, .info-card ul { margin: 0; padding:0; list-style-position: inside; }
        .info-card ul { list-style: none; }
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

        /* --- Programme Grid --- */
        .programme-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; }
        .programme-col h4 { color: var(--primary-color); border-bottom: 2px solid var(--secondary-color); padding-bottom: 10px; margin-bottom: 15px; }

        /* --- Dispositifs, Form, etc --- */
        .dispositifs-section { background-color: var(--background-color); }
        .form-section { background-color: var(--secondary-color); color: var(--light-text-color); }
        .form-section .section-title { color: var(--light-text-color); }
        .form-container { max-width: 700px; margin: 0 auto; }
        .form-container input, .form-container textarea { width: 100%; padding: 12px; margin-bottom: 15px; border-radius: 5px; border: 1px solid #ccc; }
        .form-container button { width: 100%; padding: 15px; }
        .privacy-text { font-size: 0.8rem; text-align: center; margin-top: 15px; opacity: 0.8; }
    </style>
</head>
<body>

<?php include PROJECT_ROOT . '/nav.php'; ?>

<div class="sio-page-container">

    <header class="sio-hero">
        <div class="header-actions">
            <div class="rentree-box">
                <p>Rentrées : <span>Octobre & Janvier</span></p>
            </div>
            <a href="#form-inscription" class="btn-candidat">Je candidate</a>
        </div>
    </header>

    <section class="section-padding">
        <div class="container">
             <div class="info-grid-sio">
                <div class="info-card">
                    <img src="photos/grp.png" alt="Icone Compétences" class="info-card-icon">
                    <h4>COMPÉTENCES ATTENDUES</h4>
                    <ul>
                        <li>Sens du contact et de l’écoute</li>
                        <li>Bonne gestion du stress</li>
                        <li>Capacité d’adaptation</li>
                        <li>Capacités organisationnelles</li>
                    </ul>
                </div>
                <div class="info-card">
                    <img src="photos/form.png" alt="Icone Prérequis" class="info-card-icon">
                    <h4>PRÉREQUIS</h4>
                     <ul>
                        <li>Post BAC niveau 4</li>
                        <li>Candidature</li>
                        <li>Tarif de formations</li>
                    </ul>
                </div>
                <div class="info-card">
                    <img src="photos/time.png" alt="Icone Durée" class="info-card-icon">
                    <h4>DURÉE DE FORMATION</h4>
                    <ul>
                        <li>24 mois</li>
                        <li>Bac +2</li>
                    </ul>
                </div>
                <div class="info-card">
                    <img src="photos/tech.png" alt="Icone Rythme Initiale" class="info-card-icon">
                    <h4>RYTHME DE FORMATION (INITIALE)</h4>
                    <p><strong>Au choix :</strong></p>
                    <ul>
                        <li>1 semaine en formation</li>
                        <li>Stage en entreprise</li>
                        <li>OU 2 jours école / 3 jours stage</li>
                    </ul>
                </div>
                <div class="info-card">
                    <img src="photos/hat.png" alt="Icone Rythme Alternance" class="info-card-icon">
                    <h4>RYTHME DE FORMATION (ALTERNANCE)</h4>
                    <ul>
                        <li>3 semaines en entreprise</li>
                        <li>1 semaine en formation</li>
                    </ul>
                </div>
                <div class="info-card">
                    <img src="photos/bluhat.png" alt="Icone Poursuite d'études" class="info-card-icon">
                    <h4>POURSUITE D’ÉTUDES</h4>
                    <ul>
                        <li>Bac+2</li>
                        <li>Titre enregistré au RNCP Niveau 5</li>
                        <li>Titre certifié par l’État</li>
                    </ul>
                </div>
                <div class="info-card">
                    <img src="photos/bag.png" alt="Icone Rentrée Scolaire" class="info-card-icon">
                    <h4>RENTRÉE SCOLAIRE</h4>
                    <p><strong>Initiale :</strong> Octobre & Janvier</p>
                    <p><strong>Alternance :</strong> tous les 3 mois</p>
                </div>
                <div class="info-card">
                    <img src="photos/prof.png" alt="Icone Admission" class="info-card-icon">
                    <h4>CANDIDATURE & ADMISSION</h4>
                     <ul>
                        <li>Pré-inscriptions sur notre site</li>
                        <li>Étude du dossier</li>
                        <li>Entretien de motivation</li>
                        <li>Test technique</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding" style="background-color: var(--background-color);">
        <div class="container">
            <div class="two-column-section"> 
                <div class="image-content">
                    <img src="photos/formateur.jpg" alt="Image de présentation">
                </div>
                <div class="text-content">
                    <h2 class="section-title" style="text-align:left; margin-bottom: 20px;">PRESENTATION</h2>
                    <p>Le BTS TSSR vise l’acquisition d’excellentes compétences techniques dans le domaine des applications informatiques, des systèmes et des réseaux ainsi que la maîtrise de la relation de services. Le diplômé du BTS SIO est formé à la mise en place de services informatiques en tant que salarié au sein des organisations soit en tant que consultant IT d’une ESN (Entreprise de services du numérique), d’une société éditrice de logiciels ou d’une société de conseils. Cette formation de niveau Bac+2 s’adresse aux personnes souhaitant se former aux métiers de développeur, permettant ainsi d’intégrer la vie active par la suite ou de continuer des études dans le domaine de l’informatique. Le BTS SIO option SLAM permet à son titulaire de concevoir des programmes destinés à la gestion d’une organisation, le choix des solutions techniques, la réalisation des applications logicielles, leur mise en place, et l’assistance apportée aux utilisateurs. L’étudiant participera à la conception, au développement, ainsi qu'au déploiement et à la maintenance des composants logiciels d'une solution applicative.</p>
                    <br>
                    <h4>OBJECTIFS DE LA FORMATION</h4>
                    <ul class="list-styled">
                        <li>Participer à la production et à la fourniture de services informatiques Mettre en place un système informatique élaboré.</li>
                        <li>Installer, maintenir et gérer la maintenance des équipements et des réseaux informatiques.</li>
                        <li>Concevoir, développer, paramétrer et maintenir des applications.</li>
                        <li>Le BTS SIO vise l’acquisition d’excellentes compétences techniques dans le domaine des applications informatiques, des systèmes et des réseauxainsi que la maîtrise de la relation de services.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding">
        <div class="container">
             <div class="two-column-section image-left" style="margin-bottom: 60px;">
                <div class="text-content">
                    <h2 class="section-title" style="text-align:left; margin-bottom: 20px;">DÉBOUCHÉS & MÉTIERS</h2>
                    <ul class="list-styled">
                        <li>Concepteur développeur</li>
                        <li>Développeur / Développeuse web</li>
                        <li>Développeur / Développeuse web mobile</li>
                        <li>Développeur / Développeuse application mobile</li>
                        <li>Analyste programmeur</li>
                        <li>Webmaster / intégrateur web</li>
                        <li>Technicien d’études informatiques.</li>
                    </ul>
                </div>
                <div class="image-content">
                    <img src="photos/metier.png" alt="Professionnel de l'informatique">
                </div>
            </div>

            <h2 class="section-title">PROGRAMME</h2>
            <div class="programme-grid">
                <div class="programme-col">
                    <h4>SLAM: Solutions Logicielles et Applications Métiers</h4>
                    <ul class="list-styled">
                        <li>Conception et développement d’applications</li>
                        <li>Concevoir et développer une solution applicative</li>
                        <li>Assurer la maintenance corrective ou évolutive d’une solution applicative</li>
                        <li>Gérer les données</li>
                        <li>Cybersécurité des services informatiques</li>
                        <li>Protéger les données à caractère personnel</li>
                        <li>Préserver l’identité numérique de l’organisation</li>
                        <li>Sécuriser les équipements et les usages des utilisateurs</li>
                        <li>Garantir la disponibilité, l’intégrité et la confidentialité des services</li>
                        <li>Assurer la cybersécurité d’une solution applicative et de son développement</li>
                    </ul>
                </div>
                <div class="programme-col">
                    <h4>Matières communes</h4>
                    <ul class="list-styled">
                        <li>Enseignement commun matériel et logiciel</li>
                        <li>Projets personnalisés encadrés</li>
                        <li>Mathématiques</li>
                        <li>Algorithmique appliquée</li>
                        <li>Analyse économique, managériale et juridique des services informatiques</li>
                        <li>Expression et communication en langue anglaise</li>
                        <li>Culture générale et expression</li>
                        <li>Ateliers de professionnalisation</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding" style="background-color: var(--background-color);">
        <div class="container">
            <h2 class="section-title">VOS AVANTAGES</h2>
            <div class="two-column-section">
                <div class="text-content">
                    <ul class="list-styled">
                        <li><strong>Accompagnement sur mesure</strong></li>
                        <li><strong>Formation de qualité effectuée par des experts</strong></li>
                        <li><strong>Mise en relation avec des entreprises d’accueil</strong></li>
                        <li><strong>Ressources électroniques et matérielles de qualité</strong></li>
                    </ul>
                </div>
                <div class="image-content">
                    <img src="photos/Vos avantages en un clin d'œil.png" alt="Avantages de la formation">
                </div>
            </div>
        </div>
    </section>

    <div id="form-inscription">
        <section class="section-padding dispositifs-section">
            <div class="container">
                <h2 class="section-title">LES DISPOSITIFS</h2>
                <div class="info-grid-sio">
                    <div class="info-card">
                        <i class="fa-solid fa-circle-check info-card-icon" style="color: #28a745; font-size: 40px;"></i>
                        <p>Formation initiale ou continue</p>
                    </div>
                    <div class="info-card">
                        <i class="fa-solid fa-circle-check info-card-icon" style="color: #28a745; font-size: 40px;"></i>
                        <p>Contrat d’apprentissage</p>
                    </div>
                    <div class="info-card">
                        <i class="fa-solid fa-circle-check info-card-icon" style="color: #28a745; font-size: 40px;"></i>
                        <p>Contrat de professionnalisation</p>
                    </div>
                    <div class="info-card">
                        <i class="fa-solid fa-circle-check info-card-icon" style="color: #28a745; font-size: 40px;"></i>
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
                    <input type="text" name="nom_prenom" placeholder="Ligne de texte (Nom & Prénom)" required>
                    <input type="email" name="email" placeholder="E-mail *" required>
                    <textarea name="message" rows="5" placeholder="Ligne de texte (Votre message)"></textarea>
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