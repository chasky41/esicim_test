<?php
// require_once __DIR__.'/config.php';
$GLOBALS['active_page'] = 'etudiants-etrangers.php'; // Pour que le lien dans la nav soit actif
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Étudiants Étrangers - ESICIM Academy</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    <style>
        :root {
            --primary-color: #1a4b8c;
            --secondary-color: #003366;
            --accent-color: #f8b400; /* Jaune/Or pour l'accent */
            --light-color: #f8f9fa;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            color: #333;
        }
        
        /* Section Héro (Bannière en haut) */
        .hero-section {
            height: 70vh;
            min-height: 500px;
            background: linear-gradient(rgba(26, 75, 140, 0.8), rgba(26, 75, 140, 0.8)), 
                        url('https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1350&q=80') no-repeat center center/cover;
            color: white;
            display: flex;
            align-items: center;
            text-align: center;
        }
        
        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            text-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }
        
        /* Style général des sections */
        .section {
            padding: 5rem 0;
        }
        .section-light {
            background-color: var(--light-color);
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
        .text-center .section-title::after {
            left: 50%;
            transform: translateX(-50%);
        }
        
        /* Style des cartes d'étapes (Campus France) */
        .step-card {
            background-color: white;
            border-radius: 15px;
            padding: 30px 25px;
            text-align: center;
            height: 100%;
            border: 1px solid #eee;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        .step-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(40, 52, 85, 0.1);
            border-color: var(--accent-color);
        }
        .step-icon {
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
            transition: all 0.3s ease;
        }
        .step-card:hover .step-icon {
            background-color: var(--accent-color);
            transform: scale(1.1);
        }
        .step-card h5 {
            color: var(--primary-color);
            font-weight: 600;
        }

        /* Images */
        .content-img {
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        /* Formulaire */
        .form-section {
            background: white;
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
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

    </style>
</head>
<body>

<?php include __DIR__.'/nav.php'; ?>

<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1 class="hero-title animate__animated animate__fadeInDown">Étudier en France avec ESICIM ACADEMY</h1>
                <p class="lead fs-4 mt-3 animate__animated animate__fadeInUp animate__delay-1s">Votre partenaire pour une expérience académique et professionnelle réussie en France.</p>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                <img src="photos/agents.webp" alt="Étudiant international souriant" class="img-fluid content-img">
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <h2 class="section-title">Notre Mission d'Accueil</h2>
                <p class="lead">Nous formons les professionnels de demain dans le commerce, l'informatique et le management, en offrant un accompagnement sur mesure à nos étudiants internationaux.</p>
                <p>Notre priorité est votre réussite, votre épanouissement et votre employabilité ! Avec une pédagogie innovante axée sur l’expérience pratique, nous vous aidons à exceller dans vos études et à valoriser votre potentiel.</p>
            </div>
        </div>
    </div>
</section>

<section class="section section-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-down">
            <h2 class="section-title">Un Accompagnement Complet</h2>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6 order-lg-2 mb-5 mb-lg-0" data-aos="fade-left">
                <img src="photos/confus.webp" alt="Conseiller pédagogique" class="img-fluid content-img">
            </div>
            <div class="col-lg-6 order-lg-1" data-aos="fade-right">
                <h4>Accompagnement Personnalisé</h4>
                <p>Notre équipe vous aide à construire votre projet d’orientation et à accéder à la formation de votre choix. Le processus d’admission est clair, concret, et nous ajustons votre projet pour anticiper vos ambitions.</p>
                <h4 class="mt-4">Recherche d’Alternance</h4>
                <p>Trouver un contrat d’alternance est facilité grâce à notre coaching. Nous vous préparons aux entretiens et vous mettons en contact avec nos entreprises partenaires pour maximiser vos chances de succès.</p>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-down">
            <h2 class="section-title">Démarche Campus France</h2>
            <p class="lead">Les 6 étapes clés pour venir étudier en France.</p>
        </div>
        <div class="row gy-4">
            <div class="col-md-6 col-lg-4" data-aos="fade-up">
                <div class="step-card">
                    <div class="step-icon">1</div>
                    <h5>Créez votre compte</h5>
                    <p>Inscrivez-vous et créez votre dossier personnel sur la plateforme "Études en France".</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="step-card">
                    <div class="step-icon">2</div>
                    <h5>Inscriptions et TCF</h5>
                    <p>Inscrivez-vous dans un établissement et, si nécessaire, passez le Test de Connaissance du Français (TCF).</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="step-card">
                    <div class="step-icon">3</div>
                    <h5>Frais de dossier</h5>
                    <p>Réglez les frais de dossier auprès de l'Espace Campus France de votre pays de résidence.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up">
                <div class="step-card">
                    <div class="step-icon">4</div>
                    <h5>Entretien Campus France</h5>
                    <p>Passez un entretien individuel pour présenter votre projet d'études et vos motivations.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="step-card">
                    <div class="step-icon">5</div>
                    <h5>Validation du dossier</h5>
                    <p>Une fois votre admission confirmée par un établissement, validez votre choix définitif.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="step-card">
                    <div class="step-icon">6</div>
                    <h5>Demande de visa</h5>
                    <p>Effectuez votre demande de visa étudiant "long séjour" sur le site France-Visas.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section section-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8" data-aos="fade-up">
                <div class="form-section">
                    <div class="text-center mb-4">
                        <h2 class="section-title">Demande d'Inscription</h2>
                        <p>Remplissez le formulaire pour démarrer votre aventure avec nous.</p>
                    </div>
                    <form action="submit_form.php" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control p-3" placeholder="Nom complet" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="email" class="form-control p-3" placeholder="Adresse e-mail" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <select class="form-select p-3">
                                <option selected>Choisissez votre programme...</option>
                                <option value="1">Commerce</option>
                                <option value="2">Informatique</option>
                                <option value="3">Management</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control p-3" rows="5" placeholder="Votre message ou vos questions..." required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn submit-btn">
                                <i class="fas fa-paper-plane me-2"></i>Envoyer ma demande
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include __DIR__.'/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    // Initialisation AOS
    AOS.init({
        duration: 800,
        once: true,
        offset: 50
    });
</script>
</body>
</html>