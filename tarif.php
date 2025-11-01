<?php
// config.php - Déclaration unique des fonctions utilitaires
require_once __DIR__ . '/config.php';

// Définir la page active pour la navbar
$GLOBALS['active_page'] = 'tarif.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarification & Financement - ESICIM Academy</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <link rel="stylesheet" href="css/style.css">

    <style>
        :root {
            --primary-color: #125195; /* Bleu institutionnel */
            --accent-color: #f15a29;  /* Orange vibrant */
            --light-bg: #f8f9fa;
            --dark-text: #212529;
            --light-text: #6c757d;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-bg);
        }

        .section {
            padding: 6rem 0;
        }
        
        .section-header {
            max-width: 800px;
        }

        .section-title {
            font-weight: 800;
            color: var(--primary-color);
        }
        
        .section-intro {
            color: var(--light-text);
            font-size: 1.1rem;
        }

        /* --- Toggle de prix amélioré --- */
        .pricing-toggle {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 3rem;
        }
        .toggle-switch {
            width: 220px;
            background-color: #e9ecef;
            border-radius: 50px;
            padding: 5px;
            position: relative;
            display: flex;
        }
        .toggle-switch .switch {
            position: absolute;
            top: 5px;
            left: 5px;
            width: 105px;
            height: 40px;
            background-color: var(--primary-color);
            border-radius: 50px;
            transition: transform 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }
        .toggle-switch.monthly .switch {
            transform: translateX(105px);
        }
        .toggle-option {
            flex: 1;
            text-align: center;
            padding: 10px;
            cursor: pointer;
            z-index: 1;
            color: var(--light-text);
            font-weight: 500;
            transition: color 0.3s;
        }
        .toggle-option.active {
            color: #fff;
        }
        
        /* --- Cartes de prix au design unique --- */
        .pricing-card {
            background: #fff;
            border: 1px solid #dee2e6;
            border-radius: 1rem;
            padding: 2.5rem;
            height: 100%;
            display: flex;
            flex-direction: column;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.05);
            position: relative;
            overflow: hidden;
            transition: transform .3s, box-shadow .3s;
        }
        .pricing-card:before { /* Effet "Aura" au survol */
            content: '';
            position: absolute;
            top: 0; right: 0; bottom: 0; left: 0;
            background: radial-gradient(circle, rgba(18, 81, 149, 0.1), transparent 70%);
            opacity: 0;
            transition: opacity 0.4s ease;
        }
        .pricing-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 1rem 3rem rgba(0,0,0,0.1);
        }
        .pricing-card:hover:before {
            opacity: 1;
        }

        .pricing-card h3 {
            font-weight: 700;
            color: var(--primary-color);
        }
        .price {
            font-size: 3.5rem;
            font-weight: 800;
            color: var(--dark-text);
            margin: 1.5rem 0;
        }
        .price .period {
            font-size: 1rem;
            font-weight: 500;
            color: var(--light-text);
        }
        .pricing-card ul { margin-top: 1.5rem; flex-grow: 1; }
        .pricing-card ul li i { color: var(--accent-color); }
        .btn-select-plan {
            background-color: var(--primary-color);
            color: #fff;
            font-weight: 600;
            padding: 0.8rem 1.5rem;
            transition: all .3s;
        }
        .btn-select-plan:hover {
            background-color: var(--dark-text);
            transform: scale(1.05);
        }

        /* Carte Recommandée */
        .recommended-card {
            border: 2px solid var(--accent-color);
        }
        .recommended-card .btn-select-plan {
            background-color: var(--accent-color);
            color: #fff;
        }
        .recommended-card .btn-select-plan:hover {
            background-color: #d84a1a;
        }
        .ribbon {
            position: absolute;
            top: -6px;
            right: -6px;
            width: 120px;
            height: 120px;
            overflow: hidden;
        }
        .ribbon span {
            position: absolute;
            display: block;
            width: 170px;
            padding: 10px 0;
            background-color: var(--accent-color);
            color: #fff;
            font-size: 0.9rem;
            font-weight: 600;
            text-align: center;
            transform: rotate(45deg) translateY(-20px);
            right: -40px;
            top: 20px;
        }
    </style>
</head>
<body>

<?php include __DIR__ . '/nav.php'; ?>

<main class="mt-4">
    <section class="section">
        <div class="container">
            <div class="section-header mx-auto text-center mb-5" data-aos="fade-down">
                <h1 class="display-4 section-title">TARIFICATION</h1>
                <p class="section-intro mt-3">
                    Bienvenue sur la page des tarifs de ESICIM ACADEMY. Nous comprenons que le coût de l’éducation est un facteur important dans votre décision. C’est pourquoi nous nous efforçons de proposer des formations d'excellence à des tarifs compétitifs, avec des solutions de financement pour vous accompagner.
                </p>
            </div>
            
            <div class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                <div class="pricing-toggle">
                    <div class="toggle-switch" id="toggle-container">
                        <div class="switch"></div>
                        <div class="toggle-option active" data-period="annuel">Annuel</div>
                        <div class="toggle-option" data-period="mensuel">Mensuel</div>
                    </div>
                </div>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="pricing-card">
                        <h3 class="text-center">Formation Initiale</h3>
                        <p class="text-center text-muted">Le parcours focus</p>
                        <hr>
                        <div class="price text-center" data-price-year="7500" data-price-month="750">
                            </div>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li class="d-flex"><i class="fas fa-check-circle mt-1 me-2"></i><span>Suivi pédagogique personnalisé</span></li>
                            <li class="d-flex"><i class="fas fa-check-circle mt-1 me-2"></i><span>Immersion via stages longs</span></li>
                            <li class="d-flex"><i class="fas fa-check-circle mt-1 me-2"></i><span>Accès illimité aux ressources</span></li>
                        </ul>
                        <a href="demande-info.php" class="btn btn-select-plan mt-auto">En savoir plus</a>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="pricing-card recommended-card">
                        <div class="ribbon"><span>Populaire</span></div>
                        <h3 class="text-center">Alternance</h3>
                        <p class="text-center text-muted">Le tremplin carrière</p>
                        <hr>
                        <div class="price text-center">
                           0€<span class="period"> / pour l'étudiant</span>
                        </div>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li class="d-flex"><i class="fas fa-check-circle mt-1 me-2"></i><span><strong>Formation 100% financée</strong></span></li>
                            <li class="d-flex"><i class="fas fa-check-circle mt-1 me-2"></i><span>Rémunération mensuelle</span></li>
                            <li class="d-flex"><i class="fas fa-check-circle mt-1 me-2"></i><span>Expérience professionnelle concrète</span></li>
                        </ul>
                        <a href="demande-info.php" class="btn btn-select-plan mt-auto">Choisir ce parcours</a>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="pricing-card">
                        <h3 class="text-center">Autres Dispositifs</h3>
                        <p class="text-center text-muted">Solutions sur-mesure</p>
                        <hr>
                        <div class="price text-center">
                           Flexible<span class="period"> / selon votre profil</span>
                        </div>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li class="d-flex"><i class="fas fa-check-circle mt-1 me-2"></i><span>Compte Personnel de Formation (CPF)</span></li>
                            <li class="d-flex"><i class="fas fa-check-circle mt-1 me-2"></i><span>Aides de France Travail</span></li>
                            <li class="d-flex"><i class="fas fa-check-circle mt-1 me-2"></i><span>Projet de Transition Professionnelle</span></li>
                        </ul>
                        <a href="demande-info.php" class="btn btn-select-plan mt-auto">Vérifier mon éligibilité</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . '/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true,
        offset: 50
    });

    document.addEventListener('DOMContentLoaded', function() {
        const toggleContainer = document.getElementById('toggle-container');
        const priceElement = document.querySelector('.price[data-price-year]');

        // --- Script du Compteur Animé ---
        function animateCountUp(element, start, end, duration) {
            let startTimestamp = null;
            const step = (timestamp) => {
                if (!startTimestamp) startTimestamp = timestamp;
                const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                const current = Math.floor(progress * (end - start) + start);
                const periodText = element.querySelector('.period').outerHTML;
                element.innerHTML = `${current.toLocaleString('fr-FR')}€ ${periodText}`;
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                }
            };
            window.requestAnimationFrame(step);
        }

        // --- Script du Toggle de Prix ---
        function updatePrices(isMonthly) {
            const currentPriceText = priceElement.innerText.replace(/[^0-9]/g, '');
            const currentPrice = parseInt(currentPriceText, 10) || 0;
            const priceYear = parseFloat(priceElement.dataset.priceYear);
            const priceMonth = parseFloat(priceElement.dataset.priceMonth);
            
            const targetPrice = isMonthly ? priceMonth : priceYear;
            const periodHTML = isMonthly ? '<span class="period">/ mois (sur 10 mois)</span>' : '<span class="period">/ an</span>';

            priceElement.innerHTML = `0€ ${periodHTML}`; // Reset before animation
            animateCountUp(priceElement, currentPrice, targetPrice, 500);
        }

        toggleContainer.addEventListener('click', (e) => {
            const selectedOption = e.target.dataset.period;
            if (!selectedOption) return;

            const isMonthly = selectedOption === 'mensuel';
            
            toggleContainer.classList.toggle('monthly', isMonthly);
            toggleContainer.querySelectorAll('.toggle-option').forEach(opt => {
                opt.classList.toggle('active', opt.dataset.period === selectedOption);
            });

            updatePrices(isMonthly);
        });

        // Initialisation
        const initialIsMonthly = toggleContainer.classList.contains('monthly');
        const initialPrice = initialIsMonthly ? priceElement.dataset.priceMonth : priceElement.dataset.priceYear;
        const initialPeriod = initialIsMonthly ? '/ mois (sur 10 mois)' : '/ an';
        priceElement.innerHTML = `${parseInt(initialPrice).toLocaleString('fr-FR')}€ <span class="period">${initialPeriod}</span>`;
    });
</script>
</body>
</html>