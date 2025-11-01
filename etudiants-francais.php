<?php
// require_once __DIR__.'/config.php'; // Tu peux garder cette ligne si tu en as besoin
$GLOBALS['active_page'] = 'etudiants-francais.php'; // Pour que le lien dans la nav soit actif
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L'Alternance - ESICIM Academy</title>
    
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
            background: linear-gradient(rgba(0, 51, 102, 0.8), rgba(0, 51, 102, 0.8)), 
                        url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1350&q=80') no-repeat center center/cover;
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
        
        /* Style des cartes de comparaison */
        .comparison-card {
            background: white;
            border-radius: 15px;
            padding: 2.5rem;
            box-shadow: 0 15px 30px rgba(0,0,0,0.08);
            height: 100%;
            border-top: 5px solid var(--primary-color);
            transition: all 0.3s ease;
        }
        .comparison-card.accent-border {
             border-top-color: var(--accent-color);
        }
        .comparison-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.12);
        }
        
        /* Style des cartes d'avantages */
        .benefit-card {
            background-color: white;
            border-radius: 15px;
            padding: 40px 30px;
            text-align: center;
            height: 100%;
            border: 1px solid #eee;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        .benefit-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(40, 52, 85, 0.1);
            border-color: var(--accent-color);
        }
        .benefit-icon {
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
        .benefit-card:hover .benefit-icon {
            background-color: var(--accent-color);
            transform: scale(1.1);
        }
        .benefit-card h4 {
            color: var(--primary-color);
            font-weight: 600;
        }

        /* Images */
        .content-img {
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

    </style>
</head>
<body>

<?php include __DIR__.'/nav.php'; ?>

<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1 class="hero-title animate__animated animate__fadeInDown">Optez pour l'alternance à ESICIM ACADEMY</h1>
                <p class="lead fs-4 mt-3 animate__animated animate__fadeInUp animate__delay-1s">Alliez théorie et pratique pour une insertion professionnelle réussie.</p>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?auto=format&fit=crop&w=1350&q=80" alt="Étudiants collaborant" class="img-fluid content-img">
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <h2 class="section-title">Les études en alternance</h2>
                <p class="lead">Les contrats d’apprentissage ou de professionnalisation facilitent l’insertion en entreprise pour nos étudiants.</p>
                <p>Prêt pour l’alternance ? ESICIM ACADEMY répond à vos questions.</p>
            </div>
        </div>
    </div>
</section>

<section class="section section-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-down">
            <h2 class="section-title">Pourquoi choisir l’initiale ou l’alternance ?</h2>
        </div>
        <div class="row gy-4 justify-content-center">
            <div class="col-lg-5" data-aos="fade-up">
                <div class="comparison-card">
                    <h4>Formation Initiale</h4>
                    <p>En choisissant cette option, vous avez l’opportunité de vous concentrer pleinement sur vos études, sans la pression immédiate du monde professionnel. Pendant cette période, notre équipe pédagogique est à votre écoute pour vous aider à affiner votre projet professionnel. Les stages et divers cours vous offriront une vision claire de vos préférences pour votre future carrière.</p>
                </div>
            </div>
            <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">
                <div class="comparison-card accent-border">
                    <h4>Alternance</h4>
                    <p>Choisir l’alternance, c’est combiner pratique et théorie en alternant les périodes de formation à l’école et en entreprise. C’est l’option idéale pour découvrir le monde professionnel tout en poursuivant vos études. Vous gagnerez en expérience pratique et vous vous intégrerez plus facilement dans la vie professionnelle.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="row align-items-center">
             <div class="col-lg-6 order-lg-2 mb-5 mb-lg-0" data-aos="fade-left">
                <img src="https://images.unsplash.com/photo-1542744095-291d1f67b221?auto=format&fit=crop&w=1350&q=80" alt="Organisation et planning" class="img-fluid content-img">
            </div>
            <div class="col-lg-6 order-lg-1" data-aos="fade-right">
                <h2 class="section-title">Comment s'organise l'alternance ?</h2>
                <p>La durée et le rythme de l’alternance sont définis dans le contrat. La période d’alternance varie entre 6 et 12 mois, et peut aller jusqu’à 24 mois. La présence en entreprise est priorisée, et le rythme est adapté aux besoins de l’entreprise. La formation représente entre 15 % et 25 % de la durée totale du contrat, soit entre 150 et 250 heures.</p>
            </div>
        </div>
    </div>
</section>

<section class="section section-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-down">
            <h2 class="section-title">Quels sont les avantages de l'alternance ?</h2>
            <p class="lead">Chez ESICIM ACADEMY, l’alternance est plus qu’un simple choix de formation : c’est un tremplin vers une carrière réussie.</p>
        </div>
        <div class="row gy-4">
            <div class="col-md-6 col-lg-4" data-aos="fade-up">
                <div class="benefit-card">
                    <div class="benefit-icon"><i class="fas fa-user-graduate"></i></div>
                    <h4>Qualification Reconnue</h4>
                    <p>Obtenez une qualification professionnelle à travers un diplôme ou un titre certifié par le ministère du Travail.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="benefit-card">
                    <div class="benefit-icon"><i class="fas fa-briefcase"></i></div>
                    <h4>Expérience Professionnelle</h4>
                    <p>Ajoutez à votre CV une expérience significative en lien direct avec votre formation, un avantage considérable sur le marché du travail.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="benefit-card">
                    <div class="benefit-icon"><i class="fas fa-euro-sign"></i></div>
                    <h4>Rémunération & Gratuité</h4>
                    <p>En tant que salarié, vous percevez un salaire et vos frais de formation sont entièrement pris en charge par l'entreprise.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="row align-items-center mb-5 pb-5">
            <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                <img src="https://images.unsplash.com/photo-1516321497487-e288fb19713f?auto=format&fit=crop&w=1350&q=80" alt="Signature de contrat d'apprentissage" class="img-fluid content-img">
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <h2 class="section-title">Le Contrat d'Apprentissage</h2>
                <p>Ce contrat s'adresse aux jeunes de 16 à 29 ans révolus (sans limite d'âge pour certains publics). Il offre une formation complète : générale, théorique et pratique. Guidé par un maître d'apprentissage, vous êtes formé aux techniques, méthodes et valeurs de l'entreprise.</p>
            </div>
        </div>
        <div class="row align-items-center">
             <div class="col-lg-6 order-lg-2 mb-5 mb-lg-0" data-aos="fade-left">
                <img src="https://images.unsplash.com/photo-1556740758-90de374c12ad?auto=format&fit=crop&w=1350&q=80" alt="Professionnel en formation" class="img-fluid content-img">
            </div>
            <div class="col-lg-6 order-lg-1" data-aos="fade-right">
                <h2 class="section-title">Le Contrat de Professionnalisation</h2>
                <p>Il s'adresse aux jeunes de 16 à 25 ans et aux demandeurs d'emploi de 26 ans et plus. C'est un contrat tripartite impliquant :</p>
                <ul class="list-unstyled">
                    <li class="d-flex mb-2"><i class="fas fa-check-circle text-success mt-1 me-2"></i><strong>Le salarié :</strong> vous vous engagez à travailler et à suivre la formation.</li>
                    <li class="d-flex mb-2"><i class="fas fa-check-circle text-success mt-1 me-2"></i><strong>L'organisme de formation :</strong> il dispense les cours en lien avec votre projet.</li>
                    <li class="d-flex"><i class="fas fa-check-circle text-success mt-1 me-2"></i><strong>L'employeur :</strong> l'entreprise qui vous embauche et vous forme.</li>
                </ul>
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