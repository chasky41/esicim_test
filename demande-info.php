<?php
// Configuration PHP
define('PROJECT_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/esicim-project');
require_once PROJECT_ROOT . '/config.php';
$GLOBALS['active_page'] = 'demande-info.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande d'Information Premium - ESICIM</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="/esicim-project/assets/css/style.css">

    <style>
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes pulse {
            0% { transform: scale(1); box-shadow: 0 0 0 0 rgba(241, 90, 41, 0.7); }
            70% { transform: scale(1.05); box-shadow: 0 0 0 10px rgba(241, 90, 41, 0); }
            100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(241, 90, 41, 0); }
        }

        :root {
            --primary-color: #f15a29;
            --secondary-color: #125195;
            --background-color: #f4f7fc; /* Un gris-bleu très clair */
            --text-color: #333;
            --light-text-color: #fff;
            --success-color: #28a745;
            --error-color: #dc3545;
            --light-gray-color: #e9ecef;
            --border-color: #dee2e6;
        }

        body {
            font-family: 'Segoe UI', 'Roboto', 'Helvetica Neue', sans-serif;
            color: var(--text-color);
            background-color: var(--background-color);
        }

        .info-page-container {
            width: 100%;
            overflow-x: hidden;
        }

        .hero-info {
            background: linear-gradient(60deg, rgba(18, 81, 149, 0.85), rgba(241, 90, 41, 0.8)), url('photos/contact-hero.jpg');
            background-size: cover;
            background-position: center;
            padding: 100px 20px;
            color: var(--light-text-color);
            text-align: center;
            border-bottom: 5px solid var(--primary-color);
        }

        .hero-info h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 15px;
            animation: fadeInUp 0.8s ease-out;
        }

        .hero-info p {
            font-size: 1.3rem;
            max-width: 750px;
            margin: 0 auto;
            opacity: 0.95;
            animation: fadeInUp 0.8s ease-out 0.2s;
            animation-fill-mode: both; /* Garde l'état final de l'animation */
        }
        
        .main-content {
            display: flex;
            gap: 40px;
            padding: 80px 20px;
            max-width: 1400px;
            margin: auto;
            align-items: flex-start;
        }
        .main-content > * {
            animation: fadeInUp 0.8s ease-out 0.4s;
            animation-fill-mode: both;
        }

        @media (max-width: 1024px) {
            .main-content { flex-direction: column; }
        }

        .form-wrapper {
            flex: 2;
            background-color: #fff;
            padding: 50px;
            border-radius: 16px;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
        }
        
        .form-wrapper h2 {
            text-align: center;
            color: var(--secondary-color);
            margin-bottom: 30px;
            font-size: 2.2rem;
            font-weight: 700;
        }

        /* --- Barre de progression améliorée --- */
        #progress-bar {
            display: flex; justify-content: space-between; margin-bottom: 40px;
            list-style: none; padding: 0; position: relative;
        }
        #progress-bar .step { text-align: center; flex-grow: 1; position: relative; }
        #progress-bar .step-icon {
            width: 45px; height: 45px; background: var(--light-gray-color); border-radius: 50%;
            margin: 0 auto 10px; display: flex; align-items: center; justify-content: center;
            color: var(--secondary-color); border: 4px solid var(--light-gray-color);
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94); font-size: 1.2rem;
        }
        #progress-bar .step.active .step-icon {
            border-color: var(--primary-color); background: var(--primary-color);
            color: white; animation: pulse 1.5s infinite;
        }
        #progress-bar .step-label { font-size: 0.9rem; color: #888; transition: all 0.4s; }
        #progress-bar .step.active .step-label { color: var(--primary-color); font-weight: bold; }
        #progress-bar::before {
            content: ''; position: absolute; top: 22px; left: 10%; right: 10%;
            height: 4px; background: var(--light-gray-color); z-index: 0;
        }
        #progress-line {
            position: absolute; top: 22px; left: 10%; height: 4px; background: var(--primary-color);
            width: 0%; z-index: 1; transition: width 0.6s cubic-bezier(0.65, 0, 0.35, 1);
        }

        /* --- Formulaire --- */
        .form-step {
            display: none;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }
        .form-step.active { display: block; opacity: 1; }
        
        /* --- Labels Flottants --- */
        .form-group { position: relative; margin-bottom: 30px; }
        .form-group .form-control {
            width: 100%; padding: 14px; border: 1px solid var(--border-color);
            border-radius: 8px; transition: border-color 0.3s; background: #fff;
            font-size: 1rem;
        }
        .form-group .form-label {
            position: absolute; top: 14px; left: 14px; color: #999;
            background: #fff; padding: 0 5px; transition: all 0.3s ease;
            pointer-events: none;
        }
        .form-control:focus, .form-control:not(:placeholder-shown) {
            outline: none; border-color: var(--primary-color);
        }
        .form-control:focus + .form-label,
        .form-control:not(:placeholder-shown) + .form-label {
            top: -10px; left: 10px; font-size: 0.85rem; color: var(--primary-color);
        }

        /* Boutons personnalisés */
        .choice-group { display: flex; gap: 15px; flex-wrap: wrap; margin-top: 10px; }
        .choice-label {
            padding: 12px 22px; border: 1px solid var(--border-color); border-radius: 50px;
            cursor: pointer; transition: all 0.3s;
        }
        .choice-label input { display: none; }
        .choice-label:has(input:checked) {
            background: var(--secondary-color); color: white; border-color: var(--secondary-color);
        }

        .form-buttons { display: flex; justify-content: space-between; margin-top: 40px; }
        .btn {
            padding: 14px 35px; border: none; border-radius: 50px;
            font-weight: 700; cursor: pointer; transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .btn-prev { background-color: #6c757d; color: white; }
        .btn-next, .btn-submit {
            background: linear-gradient(45deg, var(--primary-color), #ff7e5f); color: white;
        }
        .btn:hover { opacity: 0.9; transform: translateY(-3px); box-shadow: 0 7px 20px rgba(0,0,0,0.15); }

        /* --- Sidebar Améliorée --- */
        .sidebar {
            flex: 1; padding: 30px; background: #fff; border-radius: 16px;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
        }
        .sidebar-widget { margin-bottom: 40px; }
        .sidebar-widget h3 {
            color: var(--secondary-color); border-bottom: 3px solid var(--primary-color);
            padding-bottom: 10px; margin-bottom: 20px; font-size: 1.4rem;
        }
        /* -- ✅ BUG FIX ✅ -- */
        .contact-info li {
            display: flex; align-items: center; gap: 15px;
            margin-bottom: 20px; list-style: none; font-size: 1rem;
        }
        .contact-info i { color: var(--primary-color); font-size: 1.5rem; width: 25px; text-align: center; }
        .contact-info span { color: var(--text-color); font-weight: 500; } /* Couleur corrigée */
        
        /* --- FAQ Animée --- */
        .faq-item { margin-bottom: 10px; border-bottom: 1px solid var(--light-gray-color); }
        .faq-question {
            display: flex; justify-content: space-between; align-items: center;
            padding: 15px 0; font-weight: 600; cursor: pointer;
        }
        .faq-question::after { /* Icône chevron */
            content: '\f078'; font-family: 'Font Awesome 6 Free'; font-weight: 900;
            transition: transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }
        .faq-item.active .faq-question::after { transform: rotate(180deg); }
        .faq-answer {
            max-height: 0; overflow: hidden; color: #555;
            transition: max-height 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94), padding 0.4s;
            padding: 0 10px;
        }
        .faq-item.active .faq-answer { max-height: 200px; padding: 0 10px 15px; }

        /* Confirmation Message */
        #confirmation-message { display: none; text-align: center; padding: 40px; }
        #confirmation-message i { font-size: 6rem; margin-bottom: 20px; color: var(--success-color); animation: fadeIn 0.5s; }
        #confirmation-message h2 { color: var(--success-color); margin-bottom: 10px; animation: fadeInUp 0.5s 0.2s both; }
        #confirmation-message p { animation: fadeInUp 0.5s 0.4s both; font-size: 1.1rem; }

    </style>
</head>
<body>

<?php include PROJECT_ROOT . '/nav.php'; ?>

<div class="info-page-container">
    <header class="hero-info">
        <h1>Parlons de Votre Avenir</h1>
        <p>Prêt à construire votre carrière dans le numérique ? Laissez-nous un message. Chaque grand projet commence par un premier contact.</p>
    </header>

    <div class="main-content">
        <div class="form-wrapper">
            
            <div id="request-form">
                <h2>Votre Demande d'Information</h2>
                <ul id="progress-bar">
                    <div id="progress-line"></div>
                    <li class="step active" data-step="1"><div class="step-icon"><i class="fa-solid fa-user"></i></div><div class="step-label">Identité</div></li>
                    <li class="step" data-step="2"><div class="step-icon"><i class="fa-solid fa-graduation-cap"></i></div><div class="step-label">Projet</div></li>
                    <li class="step" data-step="3"><div class="step-icon"><i class="fa-solid fa-paper-plane"></i></div><div class="step-label">Message</div></li>
                </ul>

                <form id="multi-step-form" novalidate>
                    <div class="form-step active" data-step="1">
                        <div class="form-group"><input type="text" id="nom" name="nom" class="form-control" placeholder=" " required><label for="nom" class="form-label">Nom & Prénom *</label></div>
                        <div class="form-group"><input type="email" id="email" name="email" class="form-control" placeholder=" " required><label for="email" class="form-label">Adresse E-mail *</label></div>
                        <div class="form-group"><input type="tel" id="tel" name="tel" class="form-control" placeholder=" "><label for="tel" class="form-label">Numéro de téléphone</label></div>
                        <div class="form-buttons"><button type="button" class="btn btn-next" style="margin-left: auto;">Suivant <i class="fa-solid fa-arrow-right"></i></button></div>
                    </div>

                    <div class="form-step" data-step="2">
                        <div class="form-group"><label>Formation d'intérêt *</label><select id="formation" name="formation" class="form-control" required><option value="">-- Choisir une formation --</option><option value="BTS SIO SLAM">BTS SIO SLAM</option><option value="TP TSSR">TP TSSR</option><option value="Autre">Autre</option></select></div>
                        <div class="form-group"><label>Votre niveau d'études *</label><select id="niveau" name="niveau" class="form-control" required><option value="">-- Choisir un niveau --</option><option value="Bac">Bac</option><option value="Bac+1">Bac+1</option><option value="Bac+2">Bac+2</option><option value="Bac+3 et plus">Bac+3 et plus</option><option value="Reconversion">En reconversion</option></select></div>
                        <div class="form-group"><label>Rythme envisagé</label><div class="choice-group"><label class="choice-label"><input type="radio" name="rythme" value="Alternance"> Alternance</label><label class="choice-label"><input type="radio" name="rythme" value="Initiale"> Initiale</label><label class="choice-label"><input type="radio" name="rythme" value="Continue"> Continue</label></div></div>
                        <div class="form-buttons"><button type="button" class="btn btn-prev"><i class="fa-solid fa-arrow-left"></i> Précédent</button><button type="button" class="btn btn-next">Suivant <i class="fa-solid fa-arrow-right"></i></button></div>
                    </div>
                    
                    <div class="form-step" data-step="3">
                        <div class="form-group"><textarea id="message" name="message" rows="6" class="form-control" placeholder=" "></textarea><label for="message" class="form-label">Votre message</label></div>
                        <div class="form-group"><label class="choice-label" style="display:flex; align-items:center; gap: 10px;"><input type="checkbox" name="rgpd" required> J'accepte la politique de confidentialité *</label></div>
                        <div class="form-buttons"><button type="button" class="btn btn-prev"><i class="fa-solid fa-arrow-left"></i> Précédent</button><button type="submit" class="btn btn-submit">Envoyer ma demande</button></div>
                    </div>
                </form>
            </div>

            <div id="confirmation-message">
                 <i class="fa-regular fa-paper-plane"></i>
                 <h2>C'est parti !</h2>
                 <p>Votre demande a bien été envoyée. Notre équipe revient vers vous sous 48h.</p>
            </div>
        </div>

        <aside class="sidebar">
            <div class="sidebar-widget">
                <h3>Contact Direct</h3>
                <ul class="contact-info">
                    <li><i class="fa-solid fa-phone"></i> <span>+33 1 23 45 67 89</span></li>
                    <li><i class="fa-solid fa-envelope"></i> <span>contact@esicim-academy.fr</span></li>
                    <li><i class="fa-solid fa-location-dot"></i> <span>123 Rue de l'Exemple, 75000 Paris</span></li>
                </ul>
            </div>
             <div class="sidebar-widget">
                <h3>Questions Fréquentes</h3>
                <div class="faq-list">
                    <div class="faq-item"><div class="faq-question">Quels sont les prérequis ?</div><div class="faq-answer"><p>Nos formations sont accessibles Post-Bac. Pour les détails spécifiques, consultez la page de la formation qui vous intéresse.</p></div></div>
                    <div class="faq-item"><div class="faq-question">Comment se passe l'admission ?</div><div class="faq-answer"><p>L'admission se fait sur étude de dossier, tests et entretien de motivation pour évaluer votre projet et votre adéquation avec nos valeurs.</p></div></div>
                    <div class="faq-item"><div class="faq-question">Aidez-vous à trouver une alternance ?</div><div class="faq-answer"><p>Oui, notre service des relations entreprises vous coache et vous accompagne activement dans votre recherche d'entreprise d'accueil.</p></div></div>
                </div>
            </div>
        </aside>
    </div>
</div>

<?php include PROJECT_ROOT . '/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // --- Logique du formulaire multi-étapes ---
    const form = document.getElementById('multi-step-form');
    const steps = Array.from(document.querySelectorAll('.form-step'));
    const progressSteps = Array.from(document.querySelectorAll('#progress-bar .step'));
    const progressLine = document.getElementById('progress-line');
    let currentStep = 1;

    const showStep = (stepNumber) => {
        steps.forEach(step => step.classList.remove('active'));
        steps.find(step => parseInt(step.dataset.step) === stepNumber).classList.add('active');
        currentStep = stepNumber;
        updateProgress();
    };

    const updateProgress = () => {
        progressSteps.forEach((step, index) => {
            step.classList.toggle('active', index < currentStep);
        });
        const progressPercentage = ((currentStep - 1) / (steps.length - 1)) * 80 + 10;
        progressLine.style.width = `${progressPercentage}%`;
    };

    const validateStep = (stepNumber) => {
        const currentStepElement = steps.find(step => parseInt(step.dataset.step) === stepNumber);
        const fields = currentStepElement.querySelectorAll('[required]');
        let isValid = true;
        fields.forEach(field => {
            field.parentElement.classList.remove('error');
            let hasError = false;
            if (field.type === 'checkbox' && !field.checked) {
                hasError = true;
            } else if (!field.value.trim()) {
                hasError = true;
            } else if (field.type === 'email' && !/^\S+@\S+\.\S+$/.test(field.value)) {
                hasError = true;
            }
            if(hasError) {
                field.closest('.form-group').querySelector('.form-control')?.style.setProperty('border-color', 'var(--error-color)', 'important');
                isValid = false;
            } else {
                 field.closest('.form-group').querySelector('.form-control')?.style.removeProperty('border-color');
            }
        });
        return isValid;
    };

    form.addEventListener('click', e => {
        if (e.target.matches('.btn-next')) {
            if (validateStep(currentStep) && currentStep < steps.length) {
                showStep(currentStep + 1);
            }
        } else if (e.target.matches('.btn-prev')) {
            if (currentStep > 1) {
                showStep(currentStep - 1);
            }
        }
    });

    form.addEventListener('submit', e => {
        e.preventDefault();
        if (validateStep(currentStep)) {
            console.log('Formulaire soumis !');
            document.getElementById('request-form').style.display = 'none';
            document.getElementById('confirmation-message').style.display = 'block';
        }
    });

    // --- Logique de la FAQ ---
    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        question.addEventListener('click', () => {
            const isActive = item.classList.contains('active');
            faqItems.forEach(i => i.classList.remove('active')); // Optionnel: ferme les autres
            if (!isActive) {
                item.classList.add('active');
            }
        });
    });

    showStep(1); // Initialisation
});
</script>

</body>
</html>