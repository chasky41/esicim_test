<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solutions de Financement - ESICIM Academy</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #1a4b8c;
            --accent-color: #FF6347; /* Orange pour les accents */
            --bg-light: #f8f9fa;
            --text-dark: #212529;
            --text-light: #6c757d;
            --white: #ffffff;
            --border-color: #dee2e6;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
        }

        .section {
            padding: 80px 0;
        }

        /* --- 1. En-tête Bleu --- */
        .finance-hero {
            background: linear-gradient(rgba(26, 75, 140, 0.85), rgba(0, 51, 102, 0.85)), url('https://images.pexels.com/photos/5905709/pexels-photo-5905709.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2') no-repeat center center/cover;
            color: var(--white);
            padding: 100px 0;
            text-align: center;
        }
        .finance-hero h1 {
            font-weight: 800;
            color: var(--white);
        }
        .finance-hero .lead {
            max-width: 700px;
            margin: 1rem auto 0 auto;
            color: rgba(255, 255, 255, 0.8);
        }

        /* --- 2. Sections Blanches --- */
        .section-white {
            background-color: var(--white);
            border-bottom: 1px solid var(--border-color);
        }

        .section-heading {
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .section-subheading {
            color: var(--text-light);
            max-width: 700px;
            margin-bottom: 3rem;
        }

        /* --- Style des Onglets (Tabs) --- */
        .nav-tabs .nav-link {
            font-weight: 600;
            color: var(--text-light);
            border: none;
            border-bottom: 3px solid transparent;
            padding: 1rem 1.5rem;
        }
        .nav-tabs .nav-link.active, .nav-tabs .nav-link:hover {
            color: var(--primary-color);
            border-bottom-color: var(--accent-color);
        }
        
        /* --- Style des sections dépliantes (Accordion) --- */
        .accordion-item {
            border: 1px solid var(--border-color);
            border-radius: 8px !important;
            margin-bottom: 1rem;
        }
        .accordion-button {
            font-weight: 600;
            color: var(--primary-color);
            background-color: #f8f9fa;
        }
        .accordion-button:not(.collapsed) {
            background-color: var(--primary-color);
            color: var(--white);
        }
        .accordion-button:focus {
            box-shadow: 0 0 0 0.25rem rgba(255, 99, 71, 0.25);
        }
        .accordion-button::after {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%231a4b8c'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
        }
        .accordion-button:not(.collapsed)::after {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23ffffff'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
        }
        
        /* --- Liste des Avantages --- */
        .advantages-list {
            list-style: none;
            padding-left: 0;
        }
        .advantages-list li {
            display: flex;
            align-items: flex-start;
            margin-bottom: 1rem;
        }
        .advantages-list .fa-check-circle {
            color: var(--accent-color);
            margin-right: 12px;
            margin-top: 5px;
        }
        
       /* Partners Section */
        .partners-section {
            padding: 4rem 0;
            background-color: var(--bg-light); /* J'ai corrigé --light-color qui n'était pas défini */
        }
        
        /* Correction et fusion des styles pour partner-logo */
        .partner-logo {
            filter: none;
            opacity: 1;
            transition: all 0.3s ease;
            max-width: 180px;
            margin: 0 auto;
            display: block;
        }
        
        .partner-logo:hover {
            filter: none;
            opacity: 1;
        }

    </style>
</head>
<body>
 <?php include __DIR__ . '/nav.php'; ?>

<header class="finance-hero">
    <div class="container">
        <h1 class="display-4" data-aos="fade-down">Trouvez les solutions de financement adaptées à votre parcours</h1>
        <p class="lead" data-aos="fade-up" data-aos-delay="100">Avec ESICIM ACADEMY, chaque projet a sa solution.</p>
    </div>
</header>

<section class="section section-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <h2 class="section-heading">Trouvez le bon financement pour vos études</h2>
                <p class="text-secondary">Vous avez un projet de formation mais ne savez pas comment le financer ? Pas d’inquiétude : quel que soit votre statut, des solutions de financement existent.</p>
                <p>Retrouvez des premières informations sur cette page, et n’hésitez pas à nous contacter pour obtenir des conseils personnalisés et trouver le financement adapté à votre situation.</p>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <img src="https://images.pexels.com/photos/5905445/pexels-photo-5905445.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Conseiller en financement discutant avec un étudiant" class="img-fluid rounded-3 shadow">
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <ul class="nav nav-tabs justify-content-center border-bottom-0 mb-5" id="financeTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="demandeur-emploi-tab" data-bs-toggle="tab" data-bs-target="#demandeur-emploi-pane" type="button" role="tab"><i class="fas fa-user-tie me-2"></i>Demandeur d'emploi</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="salarie-tab" data-bs-toggle="tab" data-bs-target="#salarie-pane" type="button" role="tab"><i class="fas fa-briefcase me-2"></i>Salarié & Alternance</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="mission-locale-tab" data-bs-toggle="tab" data-bs-target="#mission-locale-pane" type="button" role="tab"><i class="fas fa-user-graduate me-2"></i>Jeunes Mission Locale</button>
            </li>
        </ul>

        <div class="tab-content" id="financeTabsContent">
            
            <div class="tab-pane fade show active" id="demandeur-emploi-pane" role="tabpanel">
                <div class="row align-items-center">
                    <div class="col-lg-7" data-aos="fade-up">
                        <div class="accordion" id="accordionDemandeur">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                        1. Financement par la Région Hauts-de-France
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionDemandeur">
                                    <div class="accordion-body">Le Conseil Régional Hauts-de-France offre des subventions pour les demandeurs d’emploi inscrits en Mission Locale ou à France Travail. Ces financements soutiennent la reconversion professionnelle, l’acquisition d’une Certification Professionnelle, ou la formation à des métiers en tension.</div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                        2. Budget de reclassement (CSP, PSE, RCC)
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionDemandeur">
                                    <div class="accordion-body">Les dispositifs de reclassement permettent de financer une formation pour accéder à de nouvelles opportunités professionnelles. Après avoir été admis à ESICIM ACADEMY, nous vous aiderons à élaborer une demande de financement pour votre parcours individualisé.</div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                        3. Compte Personnel de Formation (CPF)
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionDemandeur">
                                    <div class="accordion-body">Chaque actif dispose d’un CPF crédité de 500 € par an. Ce crédit peut financer tout ou partie de votre formation. En cas de reste à charge, une Aide Individuelle à la Formation (AIF) peut être sollicitée auprès de Pôle emploi.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 text-center" data-aos="fade-up" data-aos-delay="100">
                         <img src="https://images.pexels.com/photos/4386370/pexels-photo-4386370.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Financement études" class="img-fluid rounded-3 shadow">
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="salarie-pane" role="tabpanel">
                <div class="row align-items-center">
                    <div class="col-lg-7" data-aos="fade-up">
                         <div class="accordion" id="accordionSalarie">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
                                        Projet de Transition Professionnelle (PTP)
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse show" data-bs-parent="#accordionSalarie">
                                    <div class="accordion-body">Le PTP permet de suivre une formation pour se reconvertir ou acquérir de nouvelles compétences. Le contrat de travail est maintenu, et vous continuez à percevoir votre rémunération tout en bénéficiant du financement des frais de formation par Transitions Pro.</div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive">
                                        Financer votre formation en Alternance
                                    </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionSalarie">
                                    <div class="accordion-body">Notre formule d'alternance sous contrat de professionnalisation permet de suivre la formation "Technicien(ne) Informatique Systèmes et Réseaux". Vous percevez une rémunération et vos frais de formation sont pris en charge par l’OPCO de votre entreprise d'accueil. Des aides exceptionnelles sont disponibles pour l’emploi des jeunes.</div>
                                </div>
                            </div>
                         </div>
                    </div>
                    <div class="col-lg-5 text-center" data-aos="fade-up" data-aos-delay="100">
                        <img src="photos/images-site-esicim-31-scaled.png" alt="Salarié en formation" class="img-fluid rounded-3 shadow">
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="mission-locale-pane" role="tabpanel">
                <div class="row align-items-center">
                    <div class="col-lg-7" data-aos="fade-up">
                         <div class="accordion" id="accordionMissionLocale">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix">
                                        1. Contrat d'Engagement Jeune (CEJ)
                                    </button>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse show" data-bs-parent="#accordionMissionLocale">
                                    <div class="accordion-body">Le CEJ est un parcours intensif pour les jeunes de 16 à 25 ans. Il propose un accompagnement personnalisé et une allocation pour sécuriser votre projet professionnel, y compris le financement de formations qualifiantes.</div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven">
                                        2. Garantie Jeunes
                                    </button>
                                </h2>
                                <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionMissionLocale">
                                    <div class="accordion-body">Ce dispositif combine un accompagnement collectif, des expériences professionnelles et une aide financière pour favoriser votre insertion. La formation est un levier essentiel de ce parcours vers l'autonomie et l'emploi.</div>
                                </div>
                            </div>
                             <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight">
                                        3. Aides à la mobilité
                                    </button>
                                </h2>
                                <div id="collapseEight" class="accordion-collapse collapse" data-bs-parent="#accordionMissionLocale">
                                    <div class="accordion-body">La Mission Locale peut vous aider à financer votre permis de conduire ou à trouver des solutions pour vos déplacements, des freins souvent importants pour accéder à une formation ou un emploi.</div>
                                </div>
                            </div>
                         </div>
                    </div>
                    <div class="col-lg-5 text-center" data-aos="fade-up" data-aos-delay="100">
                        <img src="https://images.pexels.com/photos/5905700/pexels-photo-5905700.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Jeune en formation accompagné par la Mission Locale" class="img-fluid rounded-3 shadow">
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="section section-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 order-lg-2" data-aos="fade-left">
                 <h2 class="section-heading">Avantages pour l'employeur</h2>
                 <p class="text-secondary">Recruter en alternance via un contrat de professionnalisation offre de multiples bénéfices pour votre entreprise.</p>
                 <ul class="advantages-list mt-4">
                      <li><i class="fas fa-check-circle"></i> <div><strong>Accompagnement sur mesure</strong><br>Mise en relation et suivi personnalisé pour une intégration réussie.</div></li>
                      <li><i class="fas fa-check-circle"></i> <div><strong>Prise en charge intégrale</strong><br>Les frais de formation sont entièrement couverts par l’OPCO.</div></li>
                      <li><i class="fas fa-check-circle"></i> <div><strong>Aides financières</strong><br>Bénéficiez d'une aide de 6 000 € pour l'embauche d'un alternant de moins de 30 ans.</div></li>
                 </ul>
            </div>
            <div class="col-lg-6 order-lg-1" data-aos="fade-right">
                <img src="https://images.pexels.com/photos/3184465/pexels-photo-3184465.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Réunion d'équipe en entreprise" class="img-fluid rounded-3 shadow">
            </div>
        </div>
    </div>
</section>

<section class="partners-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-down">
            <h2 class="program-heading">NOS PARTENAIRES</h2> <p class="lead text-muted">Ils nous font confiance</p>
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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    // Initialisation de la librairie d'animations au défilement (AOS)
    AOS.init({
        duration: 800,
        once: true,
        offset: 100
    });
</script>

<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>