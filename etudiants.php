<?php
require_once __DIR__.'/config.php';
$GLOBALS['active_page'] = 'etudiants.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vie Étudiante - ESICIM Academy</title>
    
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        :root {
    --primary-color: #1a4b8c;
    --secondary-color: #003366;
    --accent-color: #f8b400; /* Un doré/jaune pour l'accentuation */
    --accent-hover: #e0a800; /* Doré plus foncé pour le survol */
    --text-dark: #212529;
    --text-light: #5a6a7b;
    --background-white: #ffffff;
    --border-light: #e9ecef;
}

body {
    font-family: 'Poppins', sans-serif;
    color: var(--text-dark);
    background-color: var(--background-white); /* Fond général blanc */
    overflow-x: hidden;
}

/* --- En-tête (Hero Section) - INCHANGÉ --- */
.students-hero {
    height: 70vh;
    min-height: 500px;
    background: linear-gradient(rgba(0, 51, 102, 0.9), rgba(0, 51, 102, 0.8)), 
                url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center/cover;
    color: white;
    display: flex;
    align-items: center;
    position: relative;
}
.hero-title {
    font-size: 3.5rem;
    font-weight: 700;
}

/* --- Styles Généraux de Section --- */
.students-section,
.multicultural-section,
.testimonials-section,
.contact-section {
    padding: 100px 0;
    position: relative;
    background-color: var(--background-white); /* Assure un fond blanc pour toutes les sections */
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 2rem;
    position: relative;
    padding-bottom: 15px;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 70px;
    height: 4px;
    background-color: var(--accent-color);
    border-radius: 2px;
}

.text-center .section-title::after {
    left: 50%;
    transform: translateX(-50%);
}

.lead {
    color: var(--text-light);
    margin-bottom: 3rem;
}

@keyframes float {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-15px); }
    100% { transform: translateY(0px); }
}

.floating {
    animation: float 6s ease-in-out infinite;
}

/* --- Section Présentation Étudiants --- */
.students-section p {
    line-height: 1.8;
}

/* --- Section Multiculturelle (Adaptée pour fond blanc) --- */
.multicultural-section h2.text-white,
.multicultural-section p.text-white-50 {
    color: var(--text-dark) !important; /* Important pour surcharger les classes bootstrap */
}
.multicultural-section p.text-white-50 {
    color: var(--text-light) !important;
}

.culture-card {
    background: var(--background-white);
    border: 1px solid var(--border-light);
    border-radius: 12px;
    padding: 40px;
    height: 100%;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.culture-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.08);
}

.culture-icon {
    font-size: 2.5rem;
    color: var(--accent-color);
    margin-bottom: 20px;
}

.culture-card h3 {
    font-weight: 600;
    color: var(--primary-color);
}

.flags-container {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    margin-top: 30px;
}

.flag {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid var(--border-light);
    transition: transform 0.3s ease;
}
.flag:hover {
    transform: scale(1.2);
}

.culture-card .list-unstyled .fa-check-circle {
    color: var(--accent-color);
}

/* --- Section Témoignages --- */
.testimonial-card {
    background: var(--background-white);
    border: 1px solid var(--border-light);
    border-radius: 12px;
    padding: 40px;
    height: 100%;
    position: relative;
    text-align: center;
}

.testimonial-card::before {
    content: '“';
    position: absolute;
    top: 15px;
    left: 25px;
    font-size: 6rem;
    color: var(--border-light);
    font-family: serif;
    line-height: 1;
    z-index: 0;
}

.testimonial-card > * {
    position: relative;
    z-index: 1;
}

.student-avatar {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid var(--accent-color);
    margin-bottom: 1rem;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.testimonial-card h4 {
    font-weight: 600;
}

.student-rating {
    color: var(--accent-color);
    margin-bottom: 1rem;
}

/* --- Section Contact --- */
.contact-form {
    background: var(--background-white);
    padding: 40px;
    border-radius: 12px;
    border: 1px solid var(--border-light);
}

.contact-form h3 {
    font-weight: 600;
    color: var(--primary-color);
}

.form-control {
    border-radius: 8px;
    border: 1px solid var(--border-light);
    padding: 12px 20px;
    transition: all 0.3s ease;
}
.form-control:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.25rem rgba(26, 75, 140, 0.1);
}

.submit-btn {
    background: var(--accent-color);
    color: var(--text-dark);
    font-weight: 600;
    padding: 12px 30px;
    border-radius: 8px;
    border: none;
    transition: all 0.3s ease;
}

.submit-btn:hover {
    background: var(--accent-hover);
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.contact-section .btn-primary {
     background-color: var(--primary-color);
     border-color: var(--primary-color);
}
.contact-section .btn-outline-primary {
    border-color: var(--primary-color);
    color: var(--primary-color);
}
.contact-section .btn-outline-primary:hover {
    background-color: var(--primary-color);
    color: white;
}

/* --- Responsive --- */
@media (max-width: 768px) {
    .hero-title { font-size: 2.5rem; }

    .section-title { font-size: 2rem; }
    .students-section,
    .multicultural-section,
    .testimonials-section,
    .contact-section {
        padding: 60px 0;
    }
}
    </style>
</head>
<body>

<?php include __DIR__.'/nav.php'; ?>

<!-- Hero Section -->
<section class="students-hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="hero-title" data-aos="fade-up">Communauté Étudiante</h1>
                <p class="lead mb-4" data-aos="fade-up" data-aos-delay="100">Une expérience multiculturelle unique au cœur de l'Europe</p>
                <a href="#multicultural" class="btn btn-light btn-lg" data-aos="fade-up" data-aos-delay="200">Découvrir</a>
            </div>
        </div>
    </div>
</section>

<!-- Students Section -->
<section class="students-section">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right">
                <img src="https://esicim-academy.fr/public/assets/wp-content/uploads/elementor/thumbs/images-site-esicim-18-scaled-qsggg9y2vg22vnb0j3c0bhfypex6sid336zv8e2x8g.webp" alt="Étudiants ESICIM" class="img-fluid rounded-lg shadow floating">
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <h2 class="section-title">Étudiants français et européens</h2>
                <p class="lead mb-4">Bienvenue à tous les étudiants français et européens !</p>
                <p>À ESICIM ACADEMY, nous offrons des programmes de formation de haute qualité en commerce et en informatique, conçus pour répondre aux attentes du marché du travail actuel.</p>
                <p>Que vous soyez en formation initiale ou en reconversion professionnelle, notre établissement vous propose un accompagnement personnalisé et des opportunités d'apprentissage enrichissantes.</p>
            </div>
        </div>
        
        <div class="row align-items-center mt-5">
            <div class="col-lg-6 order-lg-2 mb-4 mb-lg-0" data-aos="fade-left">
                <img src="https://esicim-academy.fr/public/assets/wp-content/uploads/elementor/thumbs/SITE-ESICIM-ss-20-01-qsggbu5gj21gczm7dmnoszbdzthfukh42iube9i2gw.webp" alt="Étudiants internationaux" class="img-fluid rounded-lg shadow floating">
            </div>
            <div class="col-lg-6 order-lg-1" data-aos="fade-right">
                <h2 class="section-title">Étudiants internationaux</h2>
                <p class="lead mb-4">Nous sommes fiers d'accueillir des étudiants du monde entier.</p>
                <p>Nos programmes sont reconnus internationalement et vous permettront d'acquérir des compétences recherchées sur le marché global.</p>
                <p>À ESICIM ACADEMY, vous trouverez un environnement inclusif et dynamique, idéal pour développer vos compétences et construire votre réseau professionnel.</p>
            </div>
        </div>
    </div>
</section>

<!-- Multicultural Section -->
<section id="multicultural" class="multicultural-section">
    <div class="container position-relative">
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="text-white mb-4" data-aos="fade-up">Un environnement multiculturel</h2>
                <p class="lead text-white-50" data-aos="fade-up" data-aos-delay="100">L'une des forces de notre école</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-6 mb-4" data-aos="fade-right">
                <div class="culture-card">
                    <div class="culture-icon">
                        <i class="fas fa-globe-americas"></i>
                    </div>
                    <h3>Diversité culturelle</h3>
                    <p>L'un des points forts de ESICIM ACADEMY est notre communauté étudiante diverse et multiculturelle, avec des représentants de plus de 30 nationalités différentes.</p>
                    <p>En étudiant ici, vous bénéficierez de perspectives variées et d'un enrichissement culturel constant, tout en partageant vos propres expériences.</p>
                    
                    <div class="flags-container">
                        <img src="https://flagcdn.com/w40/fr.png" alt="France" class="flag" title="France">
                        <img src="https://flagcdn.com/w40/de.png" alt="Allemagne" class="flag" title="Allemagne">
                        <img src="https://flagcdn.com/w40/es.png" alt="Espagne" class="flag" title="Espagne">
                        <img src="https://flagcdn.com/w40/it.png" alt="Italie" class="flag" title="Italie">
                        <img src="https://flagcdn.com/w40/sn.png" alt="Sénégal" class="flag" title="Sénégal">
                        <img src="https://flagcdn.com/w40/ma.png" alt="Maroc" class="flag" title="Maroc">
                        <img src="https://flagcdn.com/w40/ca.png" alt="Canada" class="flag" title="Canada">
                        <img src="https://flagcdn.com/w40/br.png" alt="Brésil" class="flag" title="Brésil">
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4" data-aos="fade-left">
                <div class="culture-card">
                    <div class="culture-icon">
                        <i class="fas fa-hands-helping"></i>
                    </div>
                    <h3>Accompagnement personnalisé</h3>
                    <p>Nous mettons un point d'honneur à accompagner chaque étudiant dans son parcours, quel que soit son pays d'origine.</p>
                    <p>Nos services dédiés :</p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check-circle text-accent me-2"></i> Programme de parrainage étudiant</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-accent me-2"></i> Cours de français langue étrangère</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-accent me-2"></i> Aide à la recherche de logement</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-accent me-2"></i> Ateliers d'intégration culturelle</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-accent me-2"></i> Soutien administratif pour les visas</li>
                    </ul>
                    <p class="mt-3">Rejoignez-nous à ESICIM ACADEMY et devenez acteur de votre succès dans un cadre d'apprentissage stimulant et bienveillant.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="section-title" data-aos="fade-up">Ils témoignent</h2>
                <p class="lead" data-aos="fade-up" data-aos-delay="100">Ce que nos étudiants disent de leur expérience</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4 mb-4" data-aos="fade-up">
                <div class="testimonial-card">
                    <div class="text-center mb-4">
                        <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Étudiante" class="student-avatar">
                        <h4>Camille Dubois</h4>
                        <div class="d-flex justify-content-center align-items-center mb-3">
                            <img src="https://flagcdn.com/w40/fr.png" alt="France" class="me-2" style="width: 20px;">
                            <span>France</span>
                        </div>
                    </div>
                    <p class="mb-4">"ESICIM m'a offert un cadre idéal pour me former en commerce avec des professeurs disponibles et un réseau professionnel de qualité."</p>
                    <div class="student-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <small class="text-muted">BTS NDRC - Promotion 2023</small>
                </div>
            </div>
            
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="testimonial-card">
                    <div class="text-center mb-4">
                        <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Étudiant" class="student-avatar">
                        <h4>Lucas Müller</h4>
                        <div class="d-flex justify-content-center align-items-center mb-3">
                            <img src="https://flagcdn.com/w40/de.png" alt="Allemagne" class="me-2" style="width: 20px;">
                            <span>Allemagne</span>
                        </div>
                    </div>
                    <p class="mb-4">"Venir étudier à ESICIM fut la meilleure décision. L'approche pratique des cours en informatique m'a permis de trouver un emploi immédiatement."</p>
                    <div class="student-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <small class="text-muted">Bachelor AIS - Promotion 2022</small>
                </div>
            </div>
            
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="testimonial-card">
                    <div class="text-center mb-4">
                        <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Étudiante" class="student-avatar">
                        <h4>Aïcha Diallo</h4>
                        <div class="d-flex justify-content-center align-items-center mb-3">
                            <img src="https://flagcdn.com/w40/sn.png" alt="Sénégal" class="me-2" style="width: 20px;">
                            <span>Sénégal</span>
                        </div>
                    </div>
                    <p class="mb-4">"L'accueil des étudiants internationaux est exceptionnel. J'ai pu m'intégrer rapidement grâce au programme de parrainage."</p>
                    <div class="student-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <small class="text-muted">Bachelor RDC - Promotion 2023</small>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
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
                        <button type="submit" class="btn submit-btn w-100">
                            <i class="fas fa-envelope me-2"></i>Envoyer
                        </button>
                        <p class="text-muted mt-3 small">* En vous inscrivant à nos programmes, vous acceptez qu'ESICIM ACADEMY collecte et utilise vos données pour vous envoyer des communications électroniques. Vous avez la possibilité de vous désabonner à tout moment. Pour plus de détails, consultez notre politique de confidentialité.</p>
                    </form>
                </div>
            </div>
            
            <div class="col-lg-6" data-aos="fade-left">
                <div class="p-4 h-100 d-flex flex-column justify-content-center">
                    <h3 class="mb-4">Prêt à nous rejoindre ?</h3>
                    <p class="mb-4">Notre équipe des relations internationales est à votre disposition pour répondre à toutes vos questions sur les admissions, les visas et la vie étudiante à Méru.</p>
                    
                    <div class="mb-5">
                        <h4 class="mb-3">Nos services étudiants :</h4>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary text-white rounded-circle p-2 me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-home"></i>
                                    </div>
                                    <span>Aide au logement</span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary text-white rounded-circle p-2 me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-user-friends"></i>
                                    </div>
                                    <span>Programme de parrainage</span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary text-white rounded-circle p-2 me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-language"></i>
                                    </div>
                                    <span>Cours de français</span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary text-white rounded-circle p-2 me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                    <span>Aide aux stages</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-auto">
                        <a href="demande-info.php" class="btn btn-primary me-3">
                            <i class="fas fa-phone me-2"></i>Nous contacter
                        </a>
                        <a href="brochure.pdf" class="btn btn-outline-primary" download>
                            <i class="fas fa-download me-2"></i>Brochure
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__.'/footer.php'; ?>

<!-- Scripts JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    // Initialisation AOS
    AOS.init({
        duration: 800,
        once: true,
        offset: 100
    });
</script>
</body>
</html>