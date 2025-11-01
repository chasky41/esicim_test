<?php
// require_once __DIR__ . '/config.php'; 
$GLOBALS['active_page'] = 'admission.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procédures d'Inscription | ESICIM Academy</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;9.00&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    <style>
        :root {
            /* TA PALETTE DE COULEURS SIGNATURE */
            --primary-color: #125195; /* Ton Bleu */
            --accent-color: #f15a29;  /* Ton Orange */
            --secondary-color: #0a2c5c; /* Un bleu plus foncé pour les dégradés */
            --light-color: #f7f9fc;
            --text-dark: #212529;
            --text-light: #6c757d;
        }

        /* --- STYLES GLOBAUX --- */
        html { scroll-behavior: smooth; }
        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-dark);
            background-color: white;
            -webkit-font-smoothing: antialiased;
        }
        .section { padding: 6rem 0; position: relative; overflow: hidden; }
        .section-light { background-color: var(--light-color); }

        /* --- HEADER ANIMÉ CORRIGÉ --- */
        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .hero-section-special {
            padding: 8rem 0;
            background: linear-gradient(-45deg, var(--primary-color), var(--secondary-color), var(--accent-color), var(--primary-color));
            background-size: 400% 400%;
            animation: gradientAnimation 15s ease infinite;
            color: white;
            text-align: center;
            position: relative;
        }
        .hero-title { 
            font-size: clamp(2.2rem, 5vw, 3.5rem); /* Taille ajustée pour éviter les coupures */
            font-weight: 800; 
        }
        .hero-subtitle { font-size: 1.25rem; max-width: 700px; margin: 1.5rem auto 0; opacity: 0.9; }
        .wave-divider { position: absolute; bottom: -1px; left: 0; width: 100%; overflow: hidden; line-height: 0; }
        .wave-divider svg { position: relative; display: block; width: calc(100% + 1.3px); height: 100px; }
        .wave-divider .shape-fill { fill: var(--light-color); }

        /* --- TITRES DE SECTION --- */
        .section-title { font-size: 2.8rem; font-weight: 700; color: var(--secondary-color); margin-bottom: 1rem; }
        .section-subtitle { font-size: 1.1rem; color: var(--text-light); max-width: 600px; margin: 0 auto 4rem auto; }

        /* --- SYSTÈME D'ONGLETS --- */
        .nav-pills .nav-link { border-radius: 50px; font-weight: 600; padding: 0.8rem 2rem; color: var(--secondary-color); transition: all 0.3s ease; }
        .nav-pills .nav-link.active { background-color: var(--primary-color); color: white; box-shadow: 0 10px 20px rgba(18, 81, 149, 0.3); }
        .tab-content { padding-top: 4rem; }

        /* --- TIMELINE AVEC ICÔNES (MISE EN PAGE CORRIGÉE) --- */
        .timeline-special { position: relative; }
        .timeline-item-special {
            display: flex; /* Utilisation de Flexbox pour l'alignement */
            align-items: flex-start; /* Aligne les éléments en haut */
            position: relative;
            padding-left: 5rem; /* Espace pour l'icône et la ligne */
            margin-bottom: 3rem;
        }
        .timeline-item-special:not(:last-child)::before {
            content: '';
            position: absolute;
            left: 30px; /* Centré sur l'icône */
            top: 60px; /* Commence après l'icône */
            width: 3px;
            height: calc(100% - 30px);
            background-color: #e9ecef;
        }
        .timeline-icon-special {
            position: absolute;
            left: 0;
            top: 0;
            width: 60px;
            height: 60px;
            background-color: white;
            border: 3px solid var(--primary-color);
            border-radius: 50%;
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--primary-color);
            transition: all 0.3s ease;
            flex-shrink: 0; /* Empêche l'icône de rétrécir */
        }
        .timeline-item-special:hover .timeline-icon-special {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            color: white;
            transform: scale(1.1) rotate(10deg);
        }
        .timeline-item-special .card {
            width: 100%; /* La carte prend toute la largeur disponible */
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.07);
            transition: all 0.3s ease;
        }
        .timeline-item-special:hover .card { transform: translateY(-5px); box-shadow: 0 15px 40px rgba(0,0,0,0.1); }
        .timeline-item-special h4 { color: var(--primary-color); font-weight: 600; }
        
        /* Liste détaillée à l'intérieur des étapes */
        .step-details-list {
            list-style: none;
            padding-left: 0;
            margin-top: 1rem;
        }
        .step-details-list li {
            display: flex;
            align-items: flex-start;
            margin-bottom: 0.5rem;
            color: var(--text-light);
        }
        .step-details-list i {
            color: var(--accent-color);
            margin-right: 0.8rem;
            margin-top: 5px;
        }

        /* --- FORMULAIRE --- */
        .form-section { background-color: var(--light-color); }
        .input-group-icon { position: relative; }
        .input-group-icon .form-icon { position: absolute; left: 1.2rem; top: 50%; transform: translateY(-50%); color: var(--text-light); }
        .input-group-icon .form-control { padding-left: 3rem; }
        .form-control { border-radius: 8px; padding: 1rem; border: 1px solid #dee2e6; transition: all 0.2s ease-in-out; }
        .form-control:focus { box-shadow: 0 0 0 4px rgba(18, 81, 149, 0.15); border-color: var(--primary-color); }
        .submit-btn {
            background-image: linear-gradient(45deg, var(--accent-color) 0%, #ff7e5f 100%);
            color: white; font-weight: 600; padding: 1rem 2.5rem; border-radius: 50px; border: none; transition: all 0.3s ease;
        }
        .submit-btn:hover { transform: translateY(-3px); box-shadow: 0 10px 20px rgba(241, 90, 41, 0.4); }

    </style>
</head>
<body>

<?php include __DIR__.'/nav.php'; ?>

<section class="hero-section-special">
    <div class="container">
        <h1 class="hero-title animate__animated animate__fadeInDown">Procédures d'Inscription</h1>
        <p class="hero-subtitle animate__animated animate__fadeInUp animate__delay-1s">Votre parcours vers la réussite commence ici. Suivez le guide.</p>
    </div>
    <div class="wave-divider">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
        </svg>
    </div>
</section>

<section class="section section-light">
    <div class="container">
        <ul class="nav nav-pills mb-3 justify-content-center" id="admissionTabs" role="tablist" data-aos="fade-up">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#france-tab-pane">Admission France</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#international-tab-pane">Étudiants Étrangers</button>
            </li>
        </ul>

        <div class="tab-content" id="admissionTabsContent">
            <div class="tab-pane fade show active" id="france-tab-pane">
                <div class="timeline-special">
                    <div class="timeline-item-special" data-aos="fade-up">
                        <div class="timeline-icon-special"><i class="fa-solid fa-file-signature"></i></div>
                        <div class="card"><div class="card-body p-4">
                            <h4>1. Compléter le formulaire de pré-inscription</h4>
                            <p>Envoyez votre candidature en ligne ! Un responsable des admissions vous contactera sous 48h. Préparez les documents suivants :</p>
                            <ul class="step-details-list">
                                <li><i class="fa-solid fa-check"></i> Photographie d’identité & Pièce d’identité</li>
                                <li><i class="fa-solid fa-check"></i> Dernier diplôme et relevé de notes</li>
                                <li><i class="fa-solid fa-check"></i> Curriculum vitae & Portfolio</li>
                            </ul>
                        </div></div>
                    </div>
                    <div class="timeline-item-special" data-aos="fade-up">
                        <div class="timeline-icon-special"><i class="fa-solid fa-pen-ruler"></i></div>
                        <div class="card"><div class="card-body p-4">
                            <h4>2. Se préparer au test de compétences</h4>
                            <p>Un test de 30 minutes (non éliminatoire) est requis pour tous les nouveaux candidats. Il aura lieu lors de votre journée d’entretien et sert à évaluer votre niveau.</p>
                        </div></div>
                    </div>
                    <div class="timeline-item-special" data-aos="fade-up">
                        <div class="timeline-icon-special"><i class="fa-solid fa-comments"></i></div>
                        <div class="card"><div class="card-body p-4">
                            <h4>3. Entretien de motivation</h4>
                            <p>Après le test, un entretien sera organisé pour mieux comprendre votre parcours, votre projet professionnel, et vos motivations.</p>
                        </div></div>
                    </div>
                    <div class="timeline-item-special" data-aos="fade-up">
                        <div class="timeline-icon-special"><i class="fa-solid fa-handshake-angle"></i></div>
                        <div class="card"><div class="card-body p-4">
                            <h4>4. Accompagnement à la recherche d’entreprise</h4>
                            <p>Nous proposons divers ateliers pour vous aider à trouver un contrat d’alternance :</p>
                             <ul class="step-details-list">
                                <li><i class="fa-solid fa-check"></i> Rédaction de lettres de motivation et de CV</li>
                                <li><i class="fa-solid fa-check"></i> Simulation d’entretiens</li>
                                <li><i class="fa-solid fa-check"></i> Sessions de job dating</li>
                            </ul>
                        </div></div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="international-tab-pane">
                 <div class="timeline-special">
                    <div class="timeline-item-special" data-aos="fade-up"><div class="timeline-icon-special"><i class="fa-solid fa-earth-americas"></i></div><div class="card"><div class="card-body p-4"><h4>1. Dépôt de candidature</h4><p>Postulez en ligne sur notre site ou par mail. Joignez les pièces requises et vérifiez l’équivalence de vos diplômes.</p></div></div></div>
                    <div class="timeline-item-special" data-aos="fade-up"><div class="timeline-icon-special"><i class="fa-solid fa-folder-open"></i></div><div class="card"><div class="card-body p-4"><h4>2. Examen de votre dossier</h4><p>Notre équipe pédagogique étudie votre parcours, projet et motivation.</p></div></div></div>
                    <div class="timeline-item-special" data-aos="fade-up"><div class="timeline-icon-special"><i class="fa-solid fa-user-tie"></i></div><div class="card"><div class="card-body p-4"><h4>3. Entretien</h4><p>Un entretien (souvent en visio) est organisé pour discuter de votre projet et évaluer votre niveau de français.</p></div></div></div>
                    <div class="timeline-item-special" data-aos="fade-up"><div class="timeline-icon-special"><i class="fa-solid fa-stamp"></i></div><div class="card"><div class="card-body p-4"><h4>4. Validation de votre candidature</h4><p>Vous serez informé sous 5 jours. Un mail vous sera envoyé avec les documents nécessaires.</p></div></div></div>
                    <div class="timeline-item-special" data-aos="fade-up"><div class="timeline-icon-special"><i class="fa-solid fa-credit-card"></i></div><div class="card"><div class="card-body p-4"><h4>5. Règlement des frais</h4><p>Confirmez votre inscription par le règlement des frais de pré-inscription (550€) et de scolarité. Ces frais sont indispensables pour le visa.</p></div></div></div>
                    <div class="timeline-item-special" data-aos="fade-up"><div class="timeline-icon-special"><i class="fa-solid fa-passport"></i></div><div class="card"><div class="card-body p-4"><h4>6. Démarches spécifiques (Visa)</h4><p>Entamez les démarches pour obtenir un visa de long séjour. Un niveau de français B1 et une attestation ENIC-NARIC sont requis.</p></div></div></div>
                    <div class="timeline-item-special" data-aos="fade-up"><div class="timeline-icon-special"><i class="fa-solid fa-hands-helping"></i></div><div class="card"><div class="card-body p-4"><h4>7. Suivi et accompagnement</h4><p>Le passage par Campus France est obligatoire. Notre équipe vous assistera dans vos démarches.</p></div></div></div>
                    <div class="timeline-item-special" data-aos="fade-up"><div class="timeline-icon-special"><i class="fa-solid fa-plane-arrival"></i></div><div class="card"><div class="card-body p-4"><h4>8. Finalisation</h4><p>Après l’obtention de votre visa, nous vous aidons à finaliser votre installation en France.</p></div></div></div>
                    <div class="timeline-item-special" data-aos="fade-up"><div class="timeline-icon-special"><i class="fa-solid fa-calendar-check"></i></div><div class="card"><div class="card-body p-4"><h4>9. La rentrée approche</h4><p>Arrivez en France au moins 15 jours avant le début des cours pour vous installer et effectuer les formalités nécessaires.</p></div></div></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container" data-aos="fade-up">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="section-title">Pour toute demande d’inscription</h2>
                <p class="section-subtitle">Remplissez ce formulaire et un conseiller reviendra vers vous dans les plus brefs délais.</p>
                <form action="#" method="POST" class="mt-4">
                    <div class="row">
                        <div class="col-md-6 mb-3"><div class="input-group-icon"><i class="fa-solid fa-user form-icon"></i><input type="text" name="nom" class="form-control" placeholder="Nom & Prénom *" required></div></div>
                        <div class="col-md-6 mb-3"><div class="input-group-icon"><i class="fa-solid fa-envelope form-icon"></i><input type="email" name="email" class="form-control" placeholder="E-mail *" required></div></div>
                    </div>
                    <div class="mb-3"><div class="input-group-icon"><i class="fa-solid fa-pen-to-square form-icon" style="top: 1.5rem;"></i><textarea name="message" class="form-control" rows="5" placeholder="Votre message..."></textarea></div></div>
                    <button type="submit" class="btn submit-btn">Envoyer <i class="fa-solid fa-paper-plane ms-2"></i></button>
                    <p class="text-muted mt-3 small">* En vous inscrivant à nos programmes, vous acceptez qu’ESICIM ACADEMY collecte et utilise vos données pour vous envoyer des communications électroniques.</p>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__.'/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    // Initialisation AOS
    AOS.init({ duration: 800, once: true, offset: 50 });
</script>
</body>
</html>