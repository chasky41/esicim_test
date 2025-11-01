<?php
require_once __DIR__.'/config.php';
$GLOBALS['active_page'] = 'academy.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESICIM Academy - L'excellence académique</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        :root {
            --primary-color: #0d47a1;      /* Le bleu foncé professionnel */
            --secondary-color: #003366;    /* Conservé pour les dégradés */
            --accent-color: #f39c12;       /* Le orange/or vif */
            --light-color: #f8f9fa;
            --dark-color: #212529;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            color: #333;
        }
        
        /* Hero Section */
        .about-hero {
            height: 70vh;
            background: linear-gradient(rgba(0, 51, 102, 0.8), rgba(0, 51, 102, 0.8)), 
                        url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center/cover;
            color: white;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        
        .about-hero::after {
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
        
        /* About Section */
        .about-section {
            padding: 6rem 0;
            position: relative;
        }
        
        .about-content {
            position: relative;
            z-index: 2;
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
        
        .mission-card {
            background: white;
            border-radius: 15px;
            padding: 3rem;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            position: relative;
            overflow: hidden;
            z-index: 1;
            transition: all 0.4s ease;
        }
        
        .mission-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: var(--accent-color);
        }
        
        .mission-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0,0,0,0.15);
        }
        
        /* Campus Section */
        .campus-section {
            padding: 6rem 0;
            background: var(--light-color);
        }
        
        .campus-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            transition: all 0.4s ease;
            margin-bottom: 2rem;
        }
        
        .campus-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0,0,0,0.2);
        }
        
        .campus-img {
            height: 250px;
            object-fit: cover;
            width: 100%;
        }
        
        .campus-feature {
            display: flex;
            align-items: flex-start;
            margin-bottom: 1.5rem;
        }
        
        .feature-icon {
            background: var(--accent-color);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            flex-shrink: 0;
        }
        
        /* Why Choose Section */
        .why-choose-section {
            padding: 6rem 0;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }
        
        .why-choose-section::before {
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
        
        .benefit-card {
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(255,255,255,0.2);
            transition: all 0.4s ease;
            height: 100%;
            position: relative;
            z-index: 1;
        }
        
        .benefit-card:hover {
            transform: translateY(-10px);
            background: rgba(255,255,255,0.15);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }
        
        .benefit-icon {
            font-size: 2.5rem;
            color: var(--accent-color);
            margin-bottom: 1.5rem;
        }
        
        /* Careers Section */
        .careers-section {
            padding: 6rem 0;
        }
        
        .career-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            transition: all 0.4s ease;
            margin-bottom: 2rem;
            background: white;
        }
        
        .career-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0,0,0,0.2);
        }
        
        .career-img {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }
        
        /* Registration Section */
        .registration-section {
            padding: 6rem 0;
            background: var(--light-color);
        }
        
        .step-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            height: 100%;
            position: relative;
            transition: all 0.4s ease;
        }
        
        .step-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }
        
        .step-number {
            width: 50px;
            height: 50px;
            background: var(--accent-color);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }
        
        /* Contact Form */
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

        .why-choose-section-updated {
            padding: 80px 0;
        }

        .why-choose-section-updated .section-heading {
            font-weight: 700;
        }

        .why-choose-section-updated .section-subheading {
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .benefit-card-updated {
            background-color: white;
            border-radius: 15px;
            padding: 40px 30px;
            text-align: center;
            height: 100%;
            border: 1px solid #eee;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, 
                        box-shadow 0.3s ease,
                        border-color 0.3s ease;
        }

        .benefit-icon-updated {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 70px;
            height: 70px;
            background-color: var(--primary-color);
            color: white;
            border-radius: 50%;
            font-size: 32px;
            margin-bottom: 25px;
            transition: background-color 0.3s ease,
                        transform 0.3s ease;
        }

        .benefit-card-updated h4 {
            font-weight: 600;
            font-size: 1.2rem;
            margin-bottom: 15px;
        }

        .benefit-card-updated p {
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .benefit-card-updated:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(40, 52, 85, 0.1);
            border-color: var(--accent-color);
        }

        .benefit-card-updated:hover .benefit-icon-updated {
            background-color: var(--accent-color);
            transform: scale(1.1);
        }
    </style>
</head>
<body>

<?php include __DIR__.'/nav.php'; ?>

<section class="about-hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="hero-title animate__animated animate__fadeInDown">Qui sommes-nous ?</h1>
                <p class="lead animate__animated animate__fadeInDown animate__delay-1s">Découvrez ESICIM ACADEMY, votre passerelle vers l'excellence académique et professionnelle</p>
            </div>
        </div>
    </div>
</section>

<section class="about-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                <img src="https://esicim-academy.fr/public/assets/wp-content/uploads/2024/08/Untitled-5-07.webp" alt="ESICIM Academy" class="img-fluid rounded shadow floating-img">
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="mission-card">
                    <h2 class="section-title">Notre Mission</h2>
                    <p class="lead mb-4">ESICIM ACADEMY est une institution dédiée à votre réussite, proposant des formations initiales et en alternance de BAC+3 à BAC+5 dans les domaines du commerce et du numérique.</p>
                    <p>Notre mission est de vous conduire au sommet de votre carrière grâce à un enseignement de qualité, riche et diversifié.</p>
                    <p>Nous nous engageons à vous offrir une expérience éducative enrichissante, avec une équipe pédagogique dévouée, un réseau professionnel étendu et des professeurs experts dans leurs disciplines.</p>
                    <p>À ESICIM ACADEMY, vous bénéficierez d'un accompagnement personnalisé tout au long de vos études. Notre objectif est de vous soutenir individuellement, depuis votre arrivée jusqu'à votre intégration en entreprise, en révélant le meilleur de vous-même et en vous préparant efficacement au marché du travail.</p>
                    <p class="mt-4"><strong>Rejoignez ESICIM ACADEMY et laissez-nous vous aider à réaliser votre projet d'avenir.</strong></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="campus-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-down">
            <h2 class="section-title">Le campus de Méru</h2>
            <p class="lead">Un cadre idéal pour vos études</p>
        </div>
        
        <div class="row">
            <div class="col-lg-6 mb-4" data-aos="fade-up">
                <div class="campus-card">
                    <img src="https://esicim-academy.fr/public/assets/wp-content/uploads/elementor/thumbs/images-site-esicim-10-1-scaled-qsggfdzjkdollny3w1fw2lzfmmyvy7sqh5elstg9h0.webp" alt="Campus ESICIM" class="campus-img">
                    <div class="p-4">
                        <h3>Équipements Modernes</h3>
                        <div class="campus-feature">
                            <div class="feature-icon">
                                <i class="fas fa-laptop"></i>
                            </div>
                            <p>Salles de classe et laboratoires équipés des dernières technologies pour un apprentissage interactif et pratique.</p>
                        </div>
                        <div class="campus-feature">
                            <div class="feature-icon">
                                <i class="fas fa-book"></i>
                            </div>
                            <p>Bibliothèque et centre de ressources fournissant une vaste gamme de documents académiques.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="campus-card">
                    <img src="https://esicim-academy.fr/public/assets/wp-content/uploads/elementor/thumbs/images-site-esicim-ssss-22-32-qsgge064q0khudpms7kcw9wcy8xjihbyy04cas2d8k.webp" alt="Vie étudiante ESICIM" class="campus-img">
                    <div class="p-4">
                        <h3>Vie Étudiante et Bien-être</h3>
                        <div class="campus-feature">
                            <div class="feature-icon">
                                <i class="fas fa-couch"></i>
                            </div>
                            <p>Espaces de détente et installations sportives pour une vie étudiante équilibrée.</p>
                        </div>
                        <div class="campus-feature">
                            <div class="feature-icon">
                                <i class="fas fa-utensils"></i>
                            </div>
                            <p>Cafétéria proposant diverses options de restauration.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="campus-card">
                    <img src="https://esicim-academy.fr/public/assets/wp-content/uploads/elementor/thumbs/images-site-esicim-38-qsggbqe67fgjsb0f1q7tdcj99q4lwtbbmrd3jpfm9w.webp" alt="Dynamisme ESICIM" class="campus-img">
                    <div class="p-4">
                        <h3>Dynamisme et Accessibilité</h3>
                        <div class="campus-feature">
                            <div class="feature-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <p>Clubs, associations et événements réguliers pour enrichir votre expérience étudiante.</p>
                        </div>
                        <div class="campus-feature">
                            <div class="feature-icon">
                                <i class="fas fa-bus"></i>
                            </div>
                            <p>Accès facile grâce aux transports en commun et aux parkings disponibles.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="campus-card h-100">
                    <div class="p-4 d-flex flex-column h-100">
                        <h3 class="mb-4">Bienvenue sur le campus de Méru</h3>
                        <p class="mb-4">Un lieu moderne et dynamique dédié à la réussite de nos étudiants en informatique et en commerce. Situé au cœur de Méru, notre campus offre des infrastructures de pointe pour un apprentissage optimal.</p>
                        <div class="mt-auto">
                            <a href="https://www.google.fr/maps/@49.2335,2.1315617,3a,75y,192.35h,90t/data=!3m8!1e2!3m6!1sCIHM0ogKEICAgIChsLDlAw!2e10!3e12!6shttps:%2F%2Flh3.googleusercontent.com%2Fgps-cs-s%2FAC9h4nrUktWqQ42PS3hEGgb2jvr_H1MyoL1G8qDeDDZd3KxwIuir3K-pYWFP-RRIO1JFFIIewqyBP5kXXcRfEZOVSOjKL50EQkJnjr1vqveUUuqvptl50GfsZG1lKslabUrVC0rWYNKA%3Dw180-h120-k-no!7i1800!8i1200?hl=fr&entry=ttu&g_ep=EgoyMDI1MDcyNy4wIKXMDSoASAFQAw%3D%3D" class="btn btn-primary pulse">
                                <i class="fas fa-map-marked-alt me-2"></i>Visite virtuelle du campus
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="why-choose-section-updated">
    <div class="container position-relative">
        <div class="text-center mb-5" data-aos="fade-down">
            <h2 class="section-heading">Pourquoi nous choisir ?</h2>
            <p class="lead section-subheading">Découvrez ce qui fait la différence ESICIM ACADEMY</p>
        </div>

        <div class="row gy-4">
            <div class="col-md-6 col-lg-4" data-aos="fade-up">
                <div class="benefit-card-updated">
                    <div class="benefit-icon-updated">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <h4>Des professeurs engagés et expérimentés</h4>
                    <p>Nos enseignants, experts dans leur domaine, sont pleinement engagés dans la réussite de chaque étudiant.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="benefit-card-updated">
                    <div class="benefit-icon-updated">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <h4>Formation initiale ou alternance</h4>
                    <p>Nous offrons la possibilité de suivre une formation en initiale ou en alternance, selon vos objectifs.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="benefit-card-updated">
                    <div class="benefit-icon-updated">
                        <i class="fas fa-hands-helping"></i>
                    </div>
                    <h4>Un coaching personnalisé</h4>
                    <p>Nos conseillers vous aident à définir un parcours de formation adapté à vos projets de carrière.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
                <div class="benefit-card-updated">
                    <div class="benefit-icon-updated">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h4>Un démarrage chaque trimestre</h4>
                    <p>Notre système de cycles flexibles vous permet de nous rejoindre à tout moment de l'année.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="benefit-card-updated">
                    <div class="benefit-icon-updated">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <h4>Diplômes d'état certifiés RNCP</h4>
                    <p>Nos titres sont reconnus par l'état, garantissant la qualité et la pertinence de nos formations.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="benefit-card-updated">
                    <div class="benefit-icon-updated">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h4>Un pack numérique de pointe</h4>
                    <p>Accédez à des ressources pédagogiques modernes : outils, plateformes et matériel de dernière génération.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="careers-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-down">
            <h2 class="section-title">Les métiers d'avenir</h2>
            <p class="lead">Découvrez les perspectives professionnelles qui vous attendent</p>
        </div>
        
        <div class="row">
            <div class="col-md-6" data-aos="fade-up">
                <div class="career-card">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Métiers de l'informatique" class="career-img">
                    <div class="p-4">
                        <h3>Les métiers de l'informatique</h3>
                        <p>Dans un monde en constante évolution technologique, l'informatique représente un secteur dynamique et en forte croissance. Choisir l'ESICIM ACADEMY, c'est opter pour un domaine d'avenir et maximiser vos opportunités professionnelles.</p>
                        <a href="formations.php" class="btn btn-primary pulse">
                            <i class="fas fa-laptop-code me-2"></i>Découvrir nos formations
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="career-card">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Métiers du commerce" class="career-img">
                    <div class="p-4">
                        <h3>Les métiers du commerce et du management</h3>
                        <p>Le secteur du commerce et du management offre des perspectives de carrière diversifiées et enrichissantes. À l'ESICIM ACADEMY, nous formons des professionnels capables de s'adapter aux évolutions du marché et de prendre des décisions stratégiques.</p>
                        <a href="formations.php" class="btn btn-primary pulse">
                            <i class="fas fa-chart-line me-2"></i>Découvrir nos formations
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="registration-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-down">
            <h2 class="section-title">Procédure d'inscription</h2>
            <p class="lead">Comment intégrer ESICIM ACADEMY ?</p>
        </div>
        
        <div class="row">
            <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up">
                <div class="step-card">
                    <div class="step-number">1</div>
                    <h4>Formulaire de pré-inscription</h4>
                    <p>Complétez notre formulaire en ligne avec vos informations personnelles et votre parcours académique.</p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="step-card">
                    <div class="step-number">2</div>
                    <h4>Test de compétences</h4>
                    <p>Passez notre test d'évaluation pour valider vos aptitudes et votre niveau dans le domaine choisi.</p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="step-card">
                    <div class="step-number">3</div>
                    <h4>Entretien de motivation</h4>
                    <p>Rencontrez notre équipe pédagogique pour échanger sur votre projet professionnel et vos motivations.</p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="step-card">
                    <div class="step-number">4</div>
                    <h4>Recherche d'alternance</h4>
                    <p>Bénéficiez de notre accompagnement pour trouver une entreprise partenaire si vous optez pour l'alternance.</p>
                </div>
            </div>
        </div>
        
        <div class="row mt-5">
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
                    <h3 class="mb-4">Prêt à rejoindre ESICIM ACADEMY ?</h3>
                    <p class="mb-4">Notre équipe est à votre disposition pour répondre à toutes vos questions et vous guider dans votre projet de formation.</p>
                    <div class="d-flex gap-3">
                        <a href="demande-info.php" class="btn btn-primary pulse">
                            <i class="fas fa-phone me-2"></i>Nous contacter
                        </a>
                        <a href="formations.php" class="btn btn-outline-primary pulse">
                            <i class="fas fa-graduation-cap me-2"></i>Voir nos formations
                        </a>
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
        const cards = document.querySelectorAll('.card, .benefit-card, .step-card, .campus-card, .career-card');
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
                this.style.boxShadow = '0 10px 20px rgba(0,0,0,0.1)';
            });
            card.addEventListener('mouseleave', function() {
                this.style.transform = '';
                this.style.boxShadow = '';
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