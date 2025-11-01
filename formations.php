<?php
require_once __DIR__.'/config.php';
$GLOBALS['active_page'] = 'formations.php';

// 1. J'ai ajouté une clé 'image' à chaque formation dans le tableau
$formations_reconversion = [
    [
        'pdf' => "BAC_02_Initiale_TP Conseiller Commercial.pdf",
        'titre' => "Technicien d'assistance en informatique TAI",
        'image' => "image4.webp"
    ],
    [
        'pdf' => "B1_03_ALT_TP Négociateur Technico-Commercial.pdf",
        'titre' => "Négociateur Technico-Commercial",
        'image' => "image4.webp"
    ],
    [
        'pdf' => "BAC_01_ALT_TP Secrétaire assistant(e) Administrative.pdf",
        'titre' => "Secrétaire assistant(e) Administrative",
        'image' => "image4.webp"
    ],
    [
        'pdf' => "BAC_02_ALT_TP Conseiller Commercial.pdf",
        'titre' => "Conseiller Commercial",
       'image' => "image4.webp"
    ],
    [
        'pdf' => "B1_02_ALT_TP Technicien Supérieur Systèmes et Réseaux - TSSR.pdf",
        'titre' => "Technicien Supérieur Systèmes et Réseaux - TSSR",
        'image' => "image4.webp"
    ],
    [
        'pdf' => "B1_01_ALT_TP Développeur Web et Web Mobile Développeur Web Full Stack - TWFT.pdf",
        'titre' => "Développeur Web et Web Mobile Full Stack",
        'image' => "image4.webp"
    ]
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Formations - ESICIM Academy</title>
    
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
            color: #333;
        }
        
        /* Hero Section */
        .formations-hero {
            height: 60vh;
            background: linear-gradient(rgba(0, 51, 102, 0.8), rgba(0, 51, 102, 0.8)), 
                        url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center/cover;
            color: white;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        
        .formations-hero::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: linear-gradient(to top, var(--light-color), transparent);
            z-index: 1;
        }
        
        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.2;
            text-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }
        
        /* Programs Section */
        .programs-section {
            padding: 6rem 0;
            background: var(--light-color);
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
        
        .program-tabs {
            border-bottom: 2px solid #dee2e6;
            margin-bottom: 3rem;
        }
        
        .program-tabs .nav-link {
            color: var(--dark-color);
            font-weight: 600;
            border: none;
            padding: 1rem 2rem;
            position: relative;
        }
        
        .program-tabs .nav-link.active {
            color: var(--primary-color);
            background: transparent;
        }
        
        .program-tabs .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--accent-color);
        }
        
        .program-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.4s ease;
            margin-bottom: 2rem;
            height: 100%;
        }
        
        .program-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
        }
        
        .program-img {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }
        
        .program-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--accent-color);
            color: white;
            padding: 0.3rem 1rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.9rem;
        }
        
        .program-content {
            padding: 2rem;
        }
        
        .program-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }
        
        .program-duration {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            color: var(--secondary-color);
        }
        
        .program-duration i {
            margin-right: 0.5rem;
            color: var(--accent-color);
        }
        
        /* Conversion Section */
        .conversion-section {
            padding: 6rem 0;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }
        
        .conversion-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center/cover;
            opacity: 0.1;
            z-index: 0;
        }
        
        .conversion-card {
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(255,255,255,0.2);
            transition: all 0.4s ease;
            height: 100%;
        }
        
        .conversion-card:hover {
            transform: translateY(-10px);
            background: rgba(255,255,255,0.15);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }
        
        .conversion-icon {
            font-size: 2.5rem;
            color: var(--accent-color);
            margin-bottom: 1.5rem;
        }
        
        /* Contact Section */
        .contact-section {
            padding: 6rem 0;
        }
        
        .contact-form {
            background: white;
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
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
        
        /* Custom List */
        .custom-list {
            list-style-type: none;
            padding-left: 0;
        }
        
        .custom-list li {
            position: relative;
            padding-left: 2rem;
            margin-bottom: 0.5rem;
        }
        
        .custom-list li::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0.7rem;
            width: 10px;
            height: 10px;
            background: var(--accent-color);
            border-radius: 50%;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
        }

        /* ---- Section Globale ---- */
        .career-change-section {
            background-color: #f8f9fa; /* Un blanc cassé très léger pour un peu de douceur */
            padding: 60px 0;
            font-family: 'Arial', sans-serif;
        }
        /* ---- En-tête de la section ---- */
        .section-header h2 {
            color: #2c3e50; /* Couleur sombre principale */
            font-weight: 700;
        }
        .section-header .lead {
            color: #7f8c8d; /* Couleur de texte secondaire plus douce */
            font-size: 1.1rem;
        }
        /* ---- Cartes de présentation ---- */
        .feature-card {
            background-color: #ffffff; /* Fond blanc pur pour les cartes */
            border: 1px solid #ecf0f1; /* Bordure très légère */
            border-radius: 8px; /* Bords arrondis */
            padding: 30px;
            height: 100%; /* Assure que les cartes sur une même ligne ont la même hauteur */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05); /* Ombre discrète */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-5px); /* Léger effet au survol */
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }
        .feature-card h3 {
            color: #34495e;
            margin-top: 20px;
            margin-bottom: 15px;
            font-weight: 600;
        }
        .feature-card p {
            color: #555;
            line-height: 1.6;
        }
        /* ---- Icônes dans les cartes ---- */
        .card-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            background-color: #3498db; /* Couleur d'accentuation pour l'icône */
            color: #ffffff;
            border-radius: 50%; /* Cercle parfait */
            font-size: 24px;
        }
        /* ---- Liste des programmes ---- */
        .program-list {
            list-style: none; /* Supprime les puces par défaut */
            padding-left: 0;
            color: #555;
        }
        .program-list li {
            padding-left: 25px;
            position: relative;
            margin-bottom: 12px;
        }
        .program-list li::before {
            content: '✓'; /* Utilise un checkmark comme puce */
            position: absolute;
            left: 0;
            top: 0;
            color: #2ecc71; /* Couleur verte pour la puce */
            font-weight: bold;
        }
        /* ---- Bouton personnalisé ---- */
        .btn-custom {
            display: inline-block;
            background-color: #3498db; /* Même couleur que l'icône pour la cohérence */
            color: #ffffff;
            padding: 12px 25px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 15px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #2980b9; /* Couleur plus foncée au survol */
            color: #ffffff;
            transform: translateY(-2px);
        }
        /* ---- Classes utilitaires de Bootstrap (si besoin) ---- */
        .mb-4 { margin-bottom: 1.5rem !important; }
        .mb-5 { margin-bottom: 3rem !important; }
        .mt-3 { margin-top: 1rem !important; }
        .me-2 { margin-right: 0.5rem !important; }
        .text-center { text-align: center !important; }
        .row { display: flex; flex-wrap: wrap; margin-right: -15px; margin-left: -15px; }
        .col-lg-6 { position: relative; width: 100%; padding-right: 15px; padding-left: 15px; }
        @media (min-width: 992px) {
            .col-lg-6 { flex: 0 0 50%; max-width: 50%; }
        }
        .container { width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto; }
        @media (min-width: 576px) { .container { max-width: 540px; } }
        @media (min-width: 768px) { .container { max-width: 720px; } }
        @media (min-width: 992px) { .container { max-width: 960px; } }
        @media (min-width: 1200px) { .container { max-width: 1140px; } }
    </style>
</head>
<body>

<?php include __DIR__.'/nav.php'; ?>

<section class="formations-hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="hero-title animate__animated animate__fadeInDown">Nos formations</h1>
                <p class="lead animate__animated animate__fadeInDown animate__delay-1s">Découvrez nos programmes spécialement conçus pour vous aider à atteindre vos objectifs et réaliser vos ambitions.</p>
            </div>
        </div>
    </div>
</section>

<section class="programs-section">
    <div class="container">
        <ul class="nav program-tabs" id="programTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="informatique-tab" data-bs-toggle="tab" data-bs-target="#informatique" type="button" role="tab" aria-controls="informatique" aria-selected="true">
                    <i class="fas fa-laptop-code me-2"></i>Pôle Informatique
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="commerce-tab" data-bs-toggle="tab" data-bs-target="#commerce" type="button" role="tab" aria-controls="commerce" aria-selected="false">
                    <i class="fas fa-chart-line me-2"></i>Pôle Commerce
                </button>
            </li>
            
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="reconversion-tab" data-bs-toggle="tab" data-bs-target="#reconversion" type="button" role="tab" aria-controls="reconversion" aria-selected="false">
                    <i class="fas fa-people-arrows me-2"></i>Pôle Reconversion Pro
                </button>
            </li>
            </ul>
        
        <div class="tab-content" id="programTabsContent">
            <div class="tab-pane fade show active" id="informatique" role="tabpanel" aria-labelledby="informatique-tab">
                <div class="row">
                    <div class="col-md-6 col-lg-4" data-aos="fade-up">
                        <div class="program-card">
                            <div class="position-relative">
                                <img src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Technicien supérieur systèmes et réseaux" class="program-img">
                                <div class="program-badge">BAC+2</div>
                            </div>
                            <div class="program-content">
                                <h3 class="program-title">BTS TP - Technicien supérieur systèmes et réseaux</h3>
                                <div class="program-duration">
                                    <i class="fas fa-clock"></i> 2 ans
                                </div>
                                <p>Formation complète pour devenir expert en installation, maintenance et sécurisation des infrastructures réseaux.</p>
                                <a href="bts-tech-sup-res.php" class="btn btn-outline-primary mt-3 pulse">
                                    En savoir plus <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="program-card">
                            <div class="position-relative">
                                <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="BTS SIO SLAM" class="program-img">
                                <div class="program-badge">BAC+2</div>
                            </div>
                            <div class="program-content">
                                <h3 class="program-title">BTS SIO SLAM - Développement</h3>
                                <div class="program-duration">
                                    <i class="fas fa-clock"></i> 2 ans
                                </div>
                                <p>Maîtrisez les langages de programmation et le développement d'applications pour les organisations.</p>
                                <a href="formation-sio.php" class="btn btn-outline-primary mt-3 pulse">
                                    En savoir plus <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="program-card">
                            <div class="position-relative">
                                <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Bachelor AIS" class="program-img">
                                <div class="program-badge">BAC+3</div>
                            </div>
                            <div class="program-content">
                                <h3 class="program-title">Bachelor AIS - Administrateur d'infrastructures sécurisées</h3>
                                <div class="program-duration">
                                    <i class="fas fa-clock"></i> 3 ans
                                </div>
                                <p>Devenez expert en sécurité des systèmes d'information et gestion des infrastructures réseaux.</p>
                                <a href="bachelor-ais.php" class="btn btn-outline-primary mt-3 pulse">
                                    En savoir plus <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                           <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="program-card">
                            <div class="position-relative">
                                <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Bachelor AIS" class="program-img">
                                <div class="program-badge">BAC+3</div>
                            </div>
                            <div class="program-content">
                                <h3 class="program-title">Licence AIS - Administrateur d'infrastructures sécurisées</h3>
                                <div class="program-duration">
                                    <i class="fas fa-clock"></i>  1 ans
                                </div>
                                <p>Devenez expert en sécurité des systèmes d'information et gestion des infrastructures réseaux.</p>
                                <a href="bachelor-ais.php" class="btn btn-outline-primary mt-3 pulse">
                                    En savoir plus <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col-md-6 col-lg-4" data-aos="fade-up">
                        <div class="program-card">
                            <div class="position-relative">
                                <img src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Bachelor CDA" class="program-img">
                                <div class="program-badge">BAC+3</div>
                            </div>
                            <div class="program-content">
                                <h3 class="program-title">Bachelor CDA - Concepteur développeur d'application</h3>
                                <div class="program-duration">
                                    <i class="fas fa-clock"></i> 3 ans
                                </div>
                                <p>Formation complète en conception et développement d'applications web et mobiles.</p>
                                <a href="bachelor-cda.php" class="btn btn-outline-primary mt-3 pulse">
                                    En savoir plus <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                     <div class="col-md-6 col-lg-4" data-aos="fade-up">
                        <div class="program-card">
                            <div class="position-relative">
                                <img src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Bachelor CDA" class="program-img">
                                <div class="program-badge">BAC+3</div>
                            </div>
                            <div class="program-content">
                                <h3 class="program-title">Licence CDA - Concepteur développeur d'application</h3>
                                <div class="program-duration">
                                    <i class="fas fa-clock"></i> 1 ans
                                </div>
                                <p>Formation complète en conception et développement d'applications web et mobiles.</p>
                                <a href="bachelor-cda.php" class="btn btn-outline-primary mt-3 pulse">
                                    En savoir plus <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="program-card">
                            <div class="position-relative">
                                <img src="https://images.unsplash.com/photo-1563986768609-322da13575f3?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Bachelor AIS 1 an" class="program-img">
                                <div class="program-badge">BAC+3</div>
                            </div>
                            <div class="program-content">
                                <h3 class="program-title">Expert-Big Data</h3>
                                <div class="program-duration">
                                    <i class="fas fa-clock"></i> 1 an
                                </div>
                                <p>Formation accélérée pour les professionnels souhaitant se spécialiser en administration d'infrastructures sécurisées.</p>
                                <a href="expert-bigdata.php" class="btn btn-outline-primary mt-3 pulse">
                                    En savoir plus <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="program-card">
                            <div class="position-relative">
                                <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Bachelor CDA 1 an" class="program-img">
                                <div class="program-badge">BAC+3</div>
                            </div>
                            <div class="program-content">
                                <h3 class="program-title">Expert-Cybersecurite     </h3>
                                <div class="program-duration">
                                    <i class="fas fa-clock"></i> 1 an
                                </div>
                                <p>Programme intensif pour les développeurs expérimentés souhaitant valider un diplôme BAC+3.</p>
                                <a href="expert-cybersecurite.php" class="btn btn-outline-primary mt-3 pulse">
                                    En savoir plus <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>



                                      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
    <div class="program-card">
        <div class="position-relative">
            <img src="https://images.unsplash.com/photo-1581090464777-f3220bbe1b8b?auto=format&fit=crop&w=1350&q=80" alt="Mastère Réseaux & Cloud" class="program-img">
            <div class="program-badge">BAC+5</div>
        </div>
        <div class="program-content">
            <h3 class="program-title">Mastère ESI - Réseaux & Cloud</h3>
            <div class="program-duration">
                <i class="fas fa-clock"></i> 2 ans
            </div>
            <p>Devenez un expert des infrastructures réseau, de la virtualisation et des architectures cloud pour piloter la transformation numérique.</p>
            <a href="formation-reseaux-cloud.php" class="btn btn-outline-primary mt-3 pulse">
                En savoir plus <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</div>



<div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
    <div class="program-card">
        <div class="position-relative">
            <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&w=1350&q=80" alt="Mastère Développement" class="program-img">
            <div class="program-badge">BAC+5</div>
        </div>
        <div class="program-content">
            <h3 class="program-title">Mastère ESI - Développement</h3>
            <div class="program-duration">
                <i class="fas fa-clock"></i> 2 ans
            </div>
            <p>Maîtrisez les langages et frameworks modernes pour concevoir et développer des applications logicielles robustes et innovantes.</p>
            <a href="formation-developpement.php" class="btn btn-outline-primary mt-3 pulse">
                En savoir plus <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</div>
 

 <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
    <div class="program-card">
        <div class="position-relative">
            <img src="https://images.unsplash.com/photo-1555949963-ff9fe0c870eb?auto=format&fit=crop&w=1350&q=80" alt="Mastère Cybersécurité" class="program-img">
            <div class="program-badge">BAC+5</div>
        </div>
        <div class="program-content">
            <h3 class="program-title">Mastère ESI - Cybersécurité</h3>
            <div class="program-duration">
                <i class="fas fa-clock"></i> 2 ans
            </div>
            <p>Apprenez à protéger les systèmes d'information, à détecter les menaces et à répondre aux incidents de sécurité.</p>
            <a href="formation-cybersecurite.php" class="btn btn-outline-primary mt-3 pulse">
                En savoir plus <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</div>




          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
    <div class="program-card">
        <div class="position-relative">
            <img src="https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?auto=format&fit=crop&w=1350&q=80" alt="Mastère Big Data & IA" class="program-img">
            <div class="program-badge">BAC+5</div>
        </div>
        <div class="program-content">
            <h3 class="program-title">Mastère ESI - Big Data & IA</h3>
            <div class="program-duration">
                <i class="fas fa-clock"></i> 2 ans
            </div>
            <p>Explorez le potentiel des données massives et de l'intelligence artificielle pour créer des systèmes intelligents et prédictifs.</p>
            <a href="formation-bigdata-ia.php" class="btn btn-outline-primary mt-3 pulse">
                En savoir plus <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</div>      
                </div>
            </div>
            
            <div class="tab-pane fade" id="commerce" role="tabpanel" aria-labelledby="commerce-tab">
                <div class="row">
                    <div class="col-md-6 col-lg-4" data-aos="fade-up">
                        <div class="program-card">
                            <div class="position-relative">
                                <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="BTS NDRC" class="program-img">
                                <div class="program-badge">BAC+2</div>
                            </div>
                            <div class="program-content">
                                <h3 class="program-title">BTS NDRC - Négociation et digitalisation de la relation client</h3>
                                <div class="program-duration">
                                    <i class="fas fa-clock"></i> 2 ans
                                </div>
                                <p>Maîtrisez les techniques de négociation et la gestion de la relation client à l'ère digitale.</p>
                                <a href="formation-ndrc.php" class="btn btn-outline-primary mt-3 pulse">
                                    En savoir plus <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="program-card">
                            <div class="position-relative">
                                <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="BTS MCO" class="program-img">
                                <div class="program-badge">BAC+2</div>
                            </div>
                            <div class="program-content">
                                <h3 class="program-title">BTS MCO - Management commercial opérationnel</h3>
                                <div class="program-duration">
                                    <i class="fas fa-clock"></i> 2 ans
                                </div>
                                <p>Formation complète en gestion d'unité commerciale et management d'équipe.</p>
                                <a href="formation-mco.php" class="btn btn-outline-primary mt-3 pulse">
                                    En savoir plus <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="program-card">
                            <div class="position-relative">
                                <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="BTS GPME" class="program-img">
                                <div class="program-badge">BAC+2</div>
                            </div>
                            <div class="program-content">
                                <h3 class="program-title">BTS GPME - Gestion des petites et moyennes entreprises</h3>
                                <div class="program-duration">
                                    <i class="fas fa-clock"></i> 2 ans
                                </div>
                                <p>Apprenez à gérer tous les aspects d'une PME, de la comptabilité à la gestion des ressources.</p>
                                <a href="formation-gpme.php" class="btn btn-outline-primary mt-3 pulse">
                                    En savoir plus <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
    <div class="program-card">
        <div class="position-relative">
            <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?auto=format&fit=crop&w=1350&q=80" alt="BTS Support à l'Action Managériale" class="program-img">
            <div class="program-badge">BAC+2</div>
        </div>
        <div class="program-content">
            <h3 class="program-title">BTS SAM - Support à l'Action Managériale</h3>
            <div class="program-duration">
                <i class="fas fa-clock"></i> 2 ans
            </div>
            <p>Devenez le bras droit d'un manager en optimisant les processus administratifs et en gérant des projets complexes.</p>
            <a href="formation-bts-sam.php" class="btn btn-outline-primary mt-3 pulse">
                En savoir plus <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</div>

<div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
    <div class="program-card">
        <div class="position-relative">
            <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&w=1350&q=80" alt="BTS Communication" class="program-img">
            <div class="program-badge">BAC+2</div>
        </div>
        <div class="program-content">
            <h3 class="program-title">BTS Communication</h3>
            <div class="program-duration">
                <i class="fas fa-clock"></i> 2 ans
            </div>
            <p>Maîtrisez les stratégies et les outils de communication pour valoriser l'image d'une organisation ou d'une marque.</p>
            <a href="formation-bts-communication.php" class="btn btn-outline-primary mt-3 pulse">
                En savoir plus <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</div>
                    
                    <div class="col-md-6 col-lg-4" data-aos="fade-up">
                        <div class="program-card">
                            <div class="position-relative">
                                <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Bachelor RDC" class="program-img">
                                <div class="program-badge">BAC+3</div>
                            </div>
                            <div class="program-content">
                                <h3 class="program-title">Bachelor RDC - Responsable développement commercial</h3>
                                <div class="program-duration">
                                    <i class="fas fa-clock"></i> 3 ans
                                </div>
                                <p>Devenez expert en stratégie commerciale et développement d'activité pour les entreprises.</p>
                                <a href="formation-rdc.php" class="btn btn-outline-primary mt-3 pulse">
                                    En savoir plus <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>


<div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
    <div class="program-card">
        <div class="position-relative">
            <img src="https://images.unsplash.com/photo-1557804506-669a67965ba0?auto=format&fit=crop&w=1350&q=80" alt="Bachelor Responsable Commercial et Marketing" class="program-img">
            <div class="program-badge">BAC+3</div>
        </div>
        <div class="program-content">
            <h3 class="program-title">Bachelor RCM - Responsable Commercial & Marketing</h3>
            <div class="program-duration">
                <i class="fas fa-clock"></i> 3 ans
            </div>
            <p>Pilotez la stratégie commerciale et marketing, de la conception à la mise en œuvre, pour développer les ventes.</p>
            <a href="formation-bachelor-rcm.php" class="btn btn-outline-primary mt-3 pulse">
                En savoir plus <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</div>

<div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
    <div class="program-card">
        <div class="position-relative">
            <img src="https://images.unsplash.com/photo-1543286386-713bdd548da4?auto=format&fit=crop&w=1350&q=80" alt="Bachelor Responsable du Développement Commercial" class="program-img">
            <div class="program-badge">BAC+3</div>
        </div>
        <div class="program-content">
            <h3 class="program-title">Bachelor RDC - Responsable du Développement Commercial</h3>
            <div class="program-duration">
                <i class="fas fa-clock"></i> 3 ans
            </div>
            <p>Devenez un expert de la croissance d'entreprise en identifiant de nouvelles opportunités et en gérant des grands comptes.</p>
            <a href="formation-bachelor-rdc.php" class="btn btn-outline-primary mt-3 pulse">
                En savoir plus <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</div>

<div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
    <div class="program-card">
        <div class="position-relative">
            <img src="https://images.unsplash.com/photo-1554224155-1696413565d3?auto=format&fit=crop&w=1350&q=80" alt="DCG - Diplôme de Comptabilité et de Gestion" class="program-img">
            <div class="program-badge">BAC+3</div>
        </div>
        <div class="program-content">
            <h3 class="program-title">DCG - Diplôme de Comptabilité et de Gestion</h3>
            <div class="program-duration">
                <i class="fas fa-clock"></i> 3 ans
            </div>
            <p>La voie royale pour les carrières de la finance et de l'expertise-comptable, avec une maîtrise du droit, de la finance et de la gestion.</p>
            <a href="formation-dcg.php" class="btn btn-outline-primary mt-3 pulse">
                En savoir plus <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</div>

      

<div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
    <div class="program-card">
        <div class="position-relative">
            <img src="https://images.unsplash.com/photo-1522881451255-f59ad836fdfb?auto=format&fit=crop&w=1350&q=80" alt="Licence Responsable Commercial et Marketing" class="program-img">
            <div class="program-badge">BAC+3</div>
        </div>
        <div class="program-content">
            <h3 class="program-title">Licence RCM - Responsable Commercial & Marketing</h3>
            <div class="program-duration">
                <i class="fas fa-clock"></i> 1 an
            </div>
            <p>Spécialisez-vous en un an après un BAC+2 pour acquérir une expertise approfondie en stratégies marketing et commerciales.</p>
            <a href="formation-licence-rcm.php" class="btn btn-outline-primary mt-3 pulse">
                En savoir plus <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</div>


<div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="600">
    <div class="program-card">
        <div class="position-relative">
            <img src="https://images.unsplash.com/photo-1556742502-ec7c0e9f34b1?auto=format&fit=crop&w=1350&q=80" alt="Licence Responsable du Développement Commercial" class="program-img">
            <div class="program-badge">BAC+3</div>
        </div>
        <div class="program-content">
            <h3 class="program-title">Licence RDC - Responsable du Développement Commercial</h3>
            <div class="program-duration">
                <i class="fas fa-clock"></i> 1 an
            </div>
            <p>Une année intensive pour devenir un pro de la négociation et du développement d'affaires sur des marchés complexes.</p>
            <a href="formation-licence-rdc.php" class="btn btn-outline-primary mt-3 pulse">
                En savoir plus <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</div>

<div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
    <div class="program-card">
        <div class="position-relative">
            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1350&q=80" alt="Master Commerce et Marketing" class="program-img">
            <div class="program-badge">BAC+5</div>
        </div>
        <div class="program-content">
            <h3 class="program-title">Master - Commerce et Marketing</h3>
            <div class="program-duration">
                <i class="fas fa-clock"></i> 2 ans
            </div>
            <p>Développez une expertise de haut niveau en stratégies marketing, analyse de marché et management commercial à l'échelle internationale.</p>
            <a href="formation-master-commerce-marketing.php" class="btn btn-outline-primary mt-3 pulse">
                En savoir plus <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</div>

<div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
    <div class="program-card">
        <div class="position-relative">
            <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&w=1350&q=80" alt="Master Management et Gestion PME" class="program-img">
            <div class="program-badge">BAC+5</div>
        </div>
        <div class="program-content">
            <h3 class="program-title">Master - Management et Gestion PME</h3>
            <div class="program-duration">
                <i class="fas fa-clock"></i> 2 ans
            </div>
            <p>Acquérez les compétences stratégiques pour diriger, développer et assurer la pérennité d'une petite ou moyenne entreprise.</p>
            <a href="formation-master-gestion-pme.php" class="btn btn-outline-primary mt-3 pulse">
                En savoir plus <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</div>

<div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
    <div class="program-card">
        <div class="position-relative">
            <img src="https://images.unsplash.com/photo-1593113598332-cd288d649433?auto=format&fit=crop&w=1350&q=80" alt="Master Commerce Équitable & International" class="program-img">
            <div class="program-badge">BAC+5</div>
        </div>
        <div class="program-content">
            <h3 class="program-title">Master - Commerce Équitable & International</h3>
            <div class="program-duration">
                <i class="fas fa-clock"></i> 2 ans
            </div>
            <p>Spécialisez-vous dans le commerce durable et les échanges internationaux éthiques pour un impact positif.</p>
            <a href="formation-master-commerce-equitable.php" class="btn btn-outline-primary mt-3 pulse">
                En savoir plus <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</div>


<div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
    <div class="program-card">
        <div class="position-relative">
            <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=1350&q=80" alt="Master Business Developer IT" class="program-img">
            <div class="program-badge">BAC+5</div>
        </div>
        <div class="program-content">
            <h3 class="program-title">Master - Business Developer IT</h3>
            <div class="program-duration">
                <i class="fas fa-clock"></i> 2 ans
            </div>
            <p>Faites le lien entre la technique et le commerce en maîtrisant la vente de solutions et services technologiques complexes.</p>
            <a href="formation-master-business-dev-it.php" class="btn btn-outline-primary mt-3 pulse">
                En savoir plus <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</div>


<div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="600">
    <div class="program-card">
        <div class="position-relative">
            <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=1350&q=80" alt="Master Chef de Projet Digital" class="program-img">
            <div class="program-badge">BAC+5</div>
        </div>
        <div class="program-content">
            <h3 class="program-title">Master - Chef de Projet Digital</h3>
            <div class="program-duration">
                <i class="fas fa-clock"></i> 2 ans
            </div>
            <p>Pilotez des projets web et mobiles de A à Z, en coordonnant les équipes, le budget et la stratégie digitale.</p>
            <a href="formation-master-chef-projet-digital.php" class="btn btn-outline-primary mt-3 pulse">
                En savoir plus <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</div>

     </div>
</div>

<section class="programs-section">
    <div class="container">
        <div class="tab-content" id="programTabsContent">
            <div class="tab-pane fade" id="reconversion" role="tabpanel" aria-labelledby="reconversion-tab">
                <div class="row">
                    <?php foreach ($formations_reconversion as $formation): ?>
                    <div class="col-md-6 col-lg-4 mb-4"> <div class="program-card">
                            <img src="photos/<?= htmlspecialchars($formation['image']) ?>" alt="<?= htmlspecialchars($formation['titre']) ?>" class="program-img">
                            <div class="program-content">
                                <h3 class="program-title" style="font-size: 1.3rem;"><?= htmlspecialchars($formation['titre']) ?></h3>
                                <a href="pdf/<?= rawurlencode($formation['pdf']) ?>" class="btn btn-outline-primary pulse" download>
                                    <i class="fas fa-file-pdf me-2"></i> Voir la fiche PDF
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
          
    </div>
</section>

<section class="career-change-section">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h2>Reconversion professionnelle chez ESICIM ACADEMY</h2>
            <p class="lead">Réalisez votre reconversion avec notre accompagnement sur-mesure</p>
        </div>

        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="feature-card">
                    <div class="card-icon">
                        <i class="fas fa-sync-alt"></i>
                    </div>
                    <h3>Une opportunité d'évolution</h3>
                    <p>Depuis une décennie, la reconversion professionnelle est devenue une préoccupation majeure. L'essor du numérique et les avancées technologiques transforment rapidement des pratiques autrefois considérées comme établies.</p>
                    <p>Que vous souhaitiez progresser dans votre carrière actuelle ou changer de voie, ESICIM ACADEMY vous accompagne dans votre reconversion jusqu'à la certification !</p>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <div class="feature-card">
                    <div class="card-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h3>Nos programmes de reconversion</h3>
                    <ul class="program-list">
                        <li><strong>TISR en 1 an</strong> - Reconvertion professionnelle : Technicien(ne) informatique systèmes et réseaux</li>
                        <li><strong>CDA en 1 an</strong> - Formation accélérée pour devenir développeur d'applications</li>
                        <li><strong>NDRC en 1 an</strong> - Spécialisation en négociation et relation client digitale</li>
                    </ul>
                    <p class="mt-3">Nos formations en reconversion sont éligibles au CPF et peuvent être financées par Pôle Emploi.</p>
                    <a href="tisr.php" class="btn-custom">
                        <i class="fas fa-info-circle me-2"></i>En savoir plus sur la reconversion
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                <div class="contact-form">
                    <h3 class="mb-4">Pour toute demande d'inscription</h3>
                    <form>
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
            
            <div class="col-lg-6" data-aos="fade-left">
                <div class="p-4 h-100 d-flex flex-column justify-content-center">
                    <h3 class="mb-4">Vous souhaitez en savoir plus ?</h3>
                    <p class="mb-4">Notre équipe pédagogique est à votre disposition pour répondre à toutes vos questions sur nos formations, les modalités d'inscription et les possibilités de financement.</p>
                    <div class="d-flex gap-3">
                        <a href="demande-info.php" class="btn btn-primary pulse">
                            <i class="fas fa-phone me-2"></i>Nous contacter
                        </a>
                        <a href="brochure.pdf" class="btn btn-outline-primary pulse" download>
                            <i class="fas fa-download me-2"></i>Télécharger la brochure
                        </a>
                    </div>
                    
                    <div class="mt-5">
                        <h4 class="mb-3">Prochaines sessions :</h4>
                        <div class="d-flex align-items-center mb-2">
                            <div class="bg-primary text-white rounded p-2 me-3 text-center" style="width: 60px;">
                                <div class="fw-bold">15</div>
                                <div class="small">SEPT</div>
                            </div>
                            <div>Rentrée principale - Toutes formations</div>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <div class="bg-primary text-white rounded p-2 me-3 text-center" style="width: 60px;">
                                <div class="fw-bold">06</div>
                                <div class="small">JAN</div>
                            </div>
                            <div>Rentrée décalée - Formations en 1 an</div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="bg-primary text-white rounded p-2 me-3 text-center" style="width: 60px;">
                                <div class="fw-bold">03</div>
                                <div class="small">MAI</div>
                            </div>
                            <div>Session intensive été - Reconversion</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__.'/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
<script>
    // Initialisation AOS
    AOS.init({
        duration: 800,
        once: true,
        offset: 100
    });
    
    // Animation des cartes au survol
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.program-card, .conversion-card');
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px)';
            });
            card.addEventListener('mouseleave', function() {
                this.style.transform = '';
            });
        });
        
        // Smooth scroll pour les ancres
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    });
</script>
</body>
</html>