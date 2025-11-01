<!-- Footer ESICIM -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESICIM ACADEMY - Formation Professionnelle</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Votre CSS personnalisé -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<footer class="footer-esicim">

    <div class="container">
        <div class="footer-content">
            <div class="row">
                <div class="col-lg-3 col-md-6 footer-col">
                    <a href="/" class="footer-logo">
                        <img src="photos/esicimphotooffice.png" alt="ESICIM Academy" class="img-fluid">
                    </a>
                    <p class="footer-description">
                        École Supérieure Internationale de Commerce et d'Ingénierie Managériale, formant les leaders de demain.
                    </p>
                    <div class="social-icons">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 footer-col">
                    <h4 class="footer-title">Formations</h4>
                    <ul class="footer-links">
                        <li><a href="formations.php"><i class="fas fa-angle-right me-2"></i>MBA Marketing Digital</a></li>
                        <li><a href="formations.php"><i class="fas fa-angle-right me-2"></i>Bachelor Commerce</a></li>
                        <li><a href="formations.php"><i class="fas fa-angle-right me-2"></i>MSc Finance et Gestion</a></li>
                        <li><a href="formations.php"><i class="fas fa-angle-right me-2"></i>Formation Continue</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 footer-col">
                    <h4 class="footer-title">Liens Rapides</h4>
                    <ul class="footer-links">
                        <li><a href="academy.php"><i class="fas fa-angle-right me-2"></i>À Propos de Nous</a></li>
                        <li><a href="campus.php"><i class="fas fa-angle-right me-2"></i>Campus & Infrastructures</a></li>
                        <li><a href="partenaires.php"><i class="fas fa-angle-right me-2"></i>Partenaires Entreprises</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 footer-col">
                    <h4 class="footer-title">Contact & Admission</h4>
                    <ul class="contact-info">
                        <li><i class="fas fa-map-marker-alt"></i> 123 Avenue de l'Université, Paris</li>
                        <li><i class="fas fa-phone-alt"></i> +33 (0)1 23 45 67 89</li>
                        <li><i class="fas fa-envelope"></i> contact@esicim.fr</li>
                    </ul>
                    <div style="margin-top: 20px;">
                        <span class="footer-badge">Certification RNCP</span>
                        <span class="footer-badge">Qualiopi</span>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <div class="copyright">
                    &copy; <?php echo date('Y'); ?> ESICIM ACADEMY. Tous droits réservés.
                </div>
                <div class="footer-bottom-links">
                    <a href="mentions-legales.php">Mentions Légales</a>
                    <a href="confidentialite.php">Confidentialité</a>
                </div>
            </div>
        </div>
    </div>
    
    <a href="#" class="scroll-top" id="scrollTop">
        <i class="fas fa-chevron-up"></i>
    </a>
</footer>

</body>

<!-- Scripts du footer -->
<script>
    // Bouton retour en haut
    window.addEventListener('scroll', function() {
        var scrollBtn = document.getElementById('scrollTop');
        if (window.pageYOffset > 300) {
            scrollBtn.classList.add('show');
        } else {
            scrollBtn.classList.remove('show');
        }
    });
    
    document.getElementById('scrollTop').addEventListener('click', function(e) {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // Animation des éléments du footer
    document.addEventListener('DOMContentLoaded', function() {
        const footerCols = document.querySelectorAll('.footer-col');
        footerCols.forEach((col, index) => {
            setTimeout(() => {
                col.style.opacity = '1';
                col.style.transform = 'translateY(0)';
            }, 100 * (index + 1));
        });
    });
</script>