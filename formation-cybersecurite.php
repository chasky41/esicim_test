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
    <title>Mastère ESI - Cybersécurité | ESICIM</title>

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
        .section-padding { padding: 60px 20px; }
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
        .container { max-width: 1200px; margin: 0 auto; padding: 0 15px; }
        
        /* --- HEADER --- */
        .sio-hero {
            background-image: url('photos/cybersecurite-header.jpg');
            background-size: cover;
            background-position: center center;
            height: 550px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: flex-end;
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
                justify-content: center;
            }
            .header-actions {
                flex-direction: column;
                margin: auto;
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
            flex-shrink: 0;
        }
        .btn-candidat:hover { background-color: #e67e22; }

        .rentree-box {
            background-color: rgba(255, 255, 255, 0.9);
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
        .two-column-section {
            display: flex;
            gap: 40px;
            align-items: center;
        }
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
        .diplome-validation-grid { display: grid; grid-template-columns: 1fr 1.5fr; gap: 40px; align-items: center; }
        @media (max-width: 992px) { .diplome-validation-grid { grid-template-columns: 1fr; } }

        .diplome-card, .validation-card { padding: 30px; border-radius: 10px; }
        .diplome-card { text-align: center; }
        .rncp-cert-tag {
            background-color: var(--primary-color);
            color: var(--light-text-color);
            padding: 10px 15px;
            border-radius: 5px;
            font-weight: 700;
            display: inline-block;
            margin: 10px 0;
            border: none;
        }
        .card-content-image {
            max-width: 150px;
            height: auto;
            display: block;
            margin: 20px auto;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        /* --- AUTRES --- */
        .programme-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; }
        .programme-col h4 { color: var(--primary-color); border-bottom: 2px solid var(--secondary-color); padding-bottom: 10px; margin-bottom: 15px; }

        .admission-steps-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; text-align: center; }
        .step-card img { height: 80px; width: auto; margin-bottom: 15px; }
        .step-card h4 { font-size: 1.2rem; color: var(--secondary-color); }

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
                <p>Prochaine Rentrée : <span>Octobre 2025</span></p>
            </div>
            <a href="inscription.php" class="btn-candidat">Je candidate</a>
        </div>
    </header>

    <section class="section-padding">
        <div class="container">
            <div class="info-grid-sio">
                 <div class="info-card">
                    <img src="photos/grp.png" alt="Icone Public Concerné" class="info-card-icon">
                    <h4>PUBLIC CONCERNÉ</h4>
                    <ul>
                        <li>Post-Bac niveau 4</li>
                        <li>Intégration possible en Post Bac +1</li>
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
                    <h4>RYTHME DE FORMATION</h4>
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
                        <li>1 semaine en formation</li>
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
                        <li>Titre enregistré au RNCP Niveau 5</li>
                        <li>Titre certifié par l’État</li>
                    </ul>
                </div>
                <div class="info-card">
                    <img src="photos/prof.png" alt="Icone Modalités" class="info-card-icon">
                    <h4>MODALITÉS DE DÉROULEMENT</h4>
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
                    <p><strong>Alternance :</strong> tous les 3 mois</p>
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
                    <p>Face à la multiplication et à la complexité des cybermenaces, le Mastère ESI - Cybersécurité forme des experts de haut niveau capables de protéger les systèmes d'information. Ce programme intensif vous apprend à détecter les menaces, auditer les vulnérabilités, définir des politiques de sécurité robustes et répondre efficacement aux incidents. Vous deviendrez un acteur clé de la stratégie de défense des entreprises, essentiel à la protection de leurs données et de leur réputation.</p>
                    <br>
                    <h4>OBJECTIFS DE LA FORMATION</h4>
                    <ul class="list-styled">
                        <li>Maîtriser les techniques d'audit et de tests d'intrusion (pentesting)</li>
                        <li>Déployer et administrer des architectures de sécurité complexes (Firewall, SIEM, EDR)</li>
                        <li>Piloter la gestion de crise et la réponse aux incidents de sécurité</li>
                        <li>Élaborer des politiques de sécurité (PSSI) et assurer la gouvernance des risques</li>
                        <li>Garantir la conformité réglementaire (RGPD, NIS2, etc.)</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding"> 
        <div class="container">
            <div class="diplome-validation-grid">
                <div class="diplome-card">
                    <h2 class="section-title" style="text-align:center; margin-bottom: 20px;">LE DIPLÔME</h2>
                    <p>Cette formation vous permet d’obtenir :</p>
                    <div class="rncp-cert-tag">LA CERTIFICATION RNCP38627</div> 
                    <img src="photos/SITE-ESICIM-59.png" alt="Image Diplôme 1" class="card-content-image">
                    <h4>BAC+5 MASTÈRE ESI CYBERSÉCURITÉ</h4>
                    <p>Expert en Cybersécurité et Sûreté des SI</p>
                    <img src="photos/SITE-ESICIM-60.png" alt="Image Diplôme 2" class="card-content-image">
                    <p>TITRE ENREGISTRÉ AU RNCP NIVEAU 7</p>
                </div>
                <div class="validation-card">
                    <h2 class="section-title" style="text-align:left; margin-bottom: 20px;">MODALITÉ DE VALIDATION</h2>
                    <p>La validation de la formation se fait par l’acquisition de l’ensemble des compétences techniques et stratégiques visées par la certification. Elles sont organisées en 5 blocs de compétences :</p>
                    <ul class="list-styled">
                        <li><b>BC01 :</b> Gouvernance, Risque et Conformité (GRC)</li>
                        <li><b>BC02 :</b> Sécurité Défensive et Opérationnelle (Blue Team)</li>
                        <li><b>BC03 :</b> Sécurité Offensive et Audit Technique (Red Team)</li>
                        <li><b>BC04 :</b> Gestion et Réponse aux Incidents de Sécurité</li>
                        <li><b>BC05 :</b> Management de la Sécurité et Gestion de Projet</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding">
        <div class="container">
            <div class="two-column-section image-left" style="margin-bottom: 60px;">
                <div class="text-content">
                    <h2 class="section-title" style="text-align:left; margin-bottom: 20px;">LES MÉTIERS</h2>
                    <ul class="list-styled">
                        <li>Analyste en cybersécurité (SOC)</li>
                        <li>Pentester / Auditeur en sécurité</li>
                        <li>Consultant / Consultante en cybersécurité</li>
                        <li>Responsable de la Sécurité des SI (RSSI)</li>
                        <li>Architecte Sécurité</li>
                        <li>Spécialiste en réponse aux incidents (CERT/CSIRT)</li>
                    </ul>
                </div>
                <div class="image-content">
               <img src="photos/metier.png" alt="Développeur au travail">
                </div>
            </div>

            <h2 class="section-title">PROGRAMME</h2>
            <div class="programme-grid">
                <div class="programme-col">
                    <h4>Spécialité Cybersécurité</h4>
                    <ul class="list-styled">
                        <li>Cryptographie et PKI</li>
                        <li>Sécurité des réseaux et systèmes</li>
                        <li>Analyse de malwares et retro-ingénierie</li>
                        <li>Investigation numérique (Forensics)</li>
                        <li>Tests d'intrusion (Web, Infra, Mobile)</li>
                        <li>Sécurité du Cloud (AWS, Azure)</li>
                        <li>Gouvernance et normes (ISO 2700x)</li>
                        <li>Gestion des identités et des accès (IAM)</li>
                    </ul>
                </div>
                <div class="programme-col">
                    <h4>Tronc Commun</h4>
                    <ul class="list-styled">
                        <li>Gestion de projet (Agile, Scrum)</li>
                        <li>Droit de l'informatique et RGPD</li>
                        <li>Communication et management</li>
                        <li>Anglais technique</li>
                        <li>Veille technologique</li>
                        <li>Ateliers de professionnalisation</li>
                        <li>Projet de fin d'études</li>
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
                        <li><strong>Accompagnement sur mesure :</strong></li>
                        <li><strong>Formation de qualité effectuée par des experts :</strong></li>
                        <li><strong>Mise en relation avec des entreprises d’accueil :</strong></li>
                        <li><strong>Ressources électroniques et matérielles de qualité :</strong></li>
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
                BAC+5 MASTÈRE ESI - CYBERSÉCURITÉ<br>
                Titre d'Expert en Cybersécurité et Sûreté des SI<br>
                TITRE ENREGISTRÉ AU RNCP NIVEAU 7
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
                    <p>À ESIGM ACADEMY, les responsables des relations entreprises recherchent des partenaires pour nos futurs étudiants. Nous proposons divers ateliers pour vous aider à trouver un contrat d'alternance.</p>
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
                    <input type="text" name="nom" placeholder="Nom & Prénom *" required>
                    <input type="email" name="email" placeholder="E-mail *" required>
                    <textarea name="message" rows="5" placeholder="Votre message..."></textarea>
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