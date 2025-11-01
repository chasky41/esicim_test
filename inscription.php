<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de pré-inscription</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/19.2.16/css/intlTelInput.css">
    
    <link rel="stylesheet" href="css/style.css"> 
    
    <style>
        /* Variables de couleur */
        :root {
            --brand-blue: #125195;
            --brand-orange: #f15a29;
            --light-bg: #f0f2f5; 
            --white: #ffffff;
            --gray-text: #576574;
            --border-color: #dfe4ea;
        }

        /* Mise en page Sticky Footer */
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
            min-height: 100%;
            font-family: 'Poppins', sans-serif;
        }
        main {
            flex-grow: 1;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 80px 20px;
            background-color: var(--light-bg);
        }

        /* Conteneur du formulaire */
        .form-container {
            position: relative;
            background-color: var(--white);
            padding: 40px 50px;
            border-radius: 20px;
            box-shadow: 0 15px 50px rgba(0,0,0,0.12);
            border: 2px solid var(--border-color);
            width: 100%;
            max-width: 850px;
        }

        /* Barre de progression */
        .progress-bar-container { width: 100%; height: 10px; background-color: #e9ecef; border-radius: 10px; margin-bottom: 30px; overflow: hidden; }
        .progress-bar { 
            height: 100%; 
            width: 0%; 
            background: linear-gradient(90deg, var(--brand-blue), var(--brand-orange)); 
            border-radius: 10px; 
            transition: width 0.4s ease-in-out; 
            background-size: 200% 200%;
            animation: gradient-animation 3s ease infinite;
        }
        @keyframes gradient-animation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Transitions entre étapes */
        .form-step { display: none; animation: fadeIn 0.5s; }
        .form-step.active { display: block; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }

        /* Titres */
        .form-container h1 { font-size: 2rem; color: var(--brand-blue); text-align: center; font-weight: 700; margin-bottom: 10px; padding-top: 10px; }
        .form-container h2 { font-size: 1rem; color: #888; text-align: center; font-weight: 500; margin-bottom: 35px; letter-spacing: 0.5px; }
        .form-container h3 { font-size: 1.25rem; color: var(--brand-blue); border-bottom: 3px solid var(--brand-orange); padding-bottom: 10px; margin-bottom: 30px; font-weight: 600; text-align: left; display: inline-block; }

        /* Champs de formulaire */
        .form-container label { display: block; margin-bottom: 8px; font-weight: 500; color: var(--gray-text); font-size: 0.9rem; }
        .form-container input[type="text"], .form-container input[type="email"], .form-container input[type="tel"], .form-container input[type="date"], .form-container select, .form-container textarea { 
            width: 100%; 
            padding: 12px 15px; 
            margin-bottom: 20px; 
            border: none;
            border-bottom: 2px solid var(--border-color); 
            border-radius: 4px 4px 0 0; 
            background-color: #f8f9fa;
            transition: border-image 0.3s ease, background-color 0.3s ease; 
        }
        .form-container input:focus, .form-container select:focus, .form-container textarea:focus { 
            outline: none; 
            background-color: var(--white);
            border-image: linear-gradient(to right, var(--brand-orange), var(--brand-blue)) 1; 
        }
        
        /* Radio-boutons */
        .radio-group { margin-bottom: 20px; }
        .radio-group input { accent-color: var(--brand-blue); width: 1.15em; height: 1.15em; vertical-align: middle; margin-right: 5px;}
        .radio-group label { display: inline-block; vertical-align: middle; margin-right: 20px; margin-bottom: 0; font-weight: 400; }
        
        /* Champs de téléversement */
        .form-container input[type="file"] { border: 2px dashed var(--border-color); border-radius: 8px; padding: 10px; background-color: #fdfdfd; transition: border-color 0.3s ease; }
        .form-container input[type="file"]:hover { border-color: var(--brand-orange); }
        .form-container input[type="file"]::file-selector-button { padding: 8px 20px; border: none; border-radius: 50px; color: var(--white); background: linear-gradient(45deg, var(--brand-blue), #1a72d1); font-weight: 500; cursor: pointer; transition: all 0.3s ease; margin-right: 15px; }
        .form-container input[type="file"]::file-selector-button:hover { transform: scale(1.05); box-shadow: 0 4px 15px rgba(0,0,0,0.1); }

        /* Boutons */
        .form-container .btn-group { display: flex; justify-content: space-between; margin-top: 30px; }
        .form-container button, .form-container button[type="submit"] { padding: 12px 35px; border: none; border-radius: 50px; color: var(--white); font-size: 16px; font-weight: 600; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(0,0,0,0.1); position: relative; overflow: hidden; }
        .form-container button:hover, .form-container button[type="submit"]:hover { transform: translateY(-3px); box-shadow: 0 8px 25px rgba(0,0,0,0.2); }
        .form-container .next-btn, .form-container button[type="submit"] { background: linear-gradient(45deg, var(--brand-blue), #1a72d1); }
        .form-container .prev-btn { background-color: #6c757d; }
        #add-langue-btn, #add-experience-btn { background: linear-gradient(45deg, var(--brand-orange), #ff8a63); margin-bottom: 20px; border-radius: 8px; padding: 10px 25px; }
        
        /* Bouton retour */
        .back-to-home-btn {
            position: absolute; top: 0; left: 40px; transform: translateY(-100%);
            background-color: var(--white); color: var(--gray-text); padding: 10px 20px;
            border: 2px solid var(--border-color); border-bottom: none; border-radius: 12px 12px 0 0;
            text-decoration: none; font-weight: 600; font-size: 0.9rem;
            display: flex; align-items: center; gap: 8px;
            transition: all 0.3s ease-in-out;
        }
        .back-to-home-btn:hover {
            color: var(--brand-orange); background-color: #f8f9fa;
            transform: translateY(-100%) translateY(-2px);
        }
        .back-to-home-btn i { transition: transform 0.3s ease; }
        .back-to-home-btn:hover i { transform: translateX(-2px); }

        /* Style pour l'indicatif téléphonique (ITI) */
        .iti {
            display: block; 
            margin-bottom: 0;
        }
        .iti input[type="tel"] {
            width: 100%;
            padding-left: 95px !important;
            padding-top: 12px;
            padding-bottom: 12px;
            margin-bottom: 0;
            position: relative;
            z-index: 1;
        }
        .iti--separate-dial-code .iti__selected-flag {
            z-index: 2;
        }
        .iti__country-list {
             box-shadow: 0 5px 20px rgba(0,0,0,0.1);
             border-radius: 8px;
             z-index: 10;
        }
        .phone-help-text {
            font-size: 0.8rem;
            color: var(--gray-text);
            margin-top: 5px;
            margin-bottom: 20px;
            display: block;
        }

    </style>
</head>
<body>

<?php 
// 1. Le menu de navigation
include __DIR__ . '/nav.php'; 
?>

<main>
    <div class="form-container">
        
        <a href="http://localhost/esicim-project/index.php" class="back-to-home-btn" title="Retour à l'accueil">
            <i class="fas fa-arrow-left"></i>
            Retour
        </a>

        <div class="progress-bar-container">
            <div class="progress-bar" id="progress-bar"></div>
        </div>

        <form action="traitement.php" method="post" enctype="multipart/form-data">
            
            <h1>Dépôt de votre candidature</h1>

            <div class="form-step active" id="step-1">
                <h2>Formulaire de pré-inscription (Étape 1 sur 5)</h2>
                <h3>INFORMATIONS PERSONNELLES</h3>
            
                <label>Civilité *</label>
                <div class="radio-group">
                    <input type="radio" id="monsieur" name="civilite" value="Monsieur" required> <label for="monsieur">Monsieur</label>
                    <input type="radio" id="madame" name="civilite" value="Madame"> <label for="madame">Madame</label>
                    <input type="radio" id="mademoiselle" name="civilite" value="Mademoiselle"> <label for="mademoiselle">Mademoiselle</label>
                </div>
            
                <label for="nom">Nom *</label>
                <input type="text" id="nom" name="nom" required>
            
                <label for="prenom">Prénom *</label>
                <input type="text" id="prenom" name="prenom" required>
                
                <label for="email">E-mail *</label>
                <input type="email" id="email" name="email" required>
            
                <label for="telephone">Téléphone *</label>
                <input type="tel" id="telephone" name="telephone" required>
                <small class="phone-help-text">Veuillez sélectionner l'indicatif de votre pays.</small>
            
                <label for="pays">Pays</label>
                <input type="text" id="pays" name="pays">
            
                <label for="ville">Ville</label>
                <input type="text" id="ville" name="ville">
                
                <label for="adresse">Adresse</label>
                <input type="text" id="adresse" name="adresse">
            
                <label for="code_postal">Code postal</label>
                <input type="text" id="code_postal" name="code_postal">
                
                <label for="ville_naissance">Ville de naissance (et départ.)</label>
                <input type="text" id="ville_naissance" name="ville_naissance">
                
                <label for="date_naissance">Date de naissance</label>
                <input type="date" id="date_naissance" name="date_naissance">
                
                <label for="nationalite">Nationalité</label>
                <input type="text" id="nationalite" name="nationalite">
            
                <label for="formation_info">Formation souhaitée (Informatique)</label>
                <select name="formation_info" id="formation_info">
                    <option value="">Veuillez sélectionner</option>
                    <optgroup label="BAC +2">
                        <option value="BAC +2 - BTS SIO SLAM: Services Informatiques aux Organisations">BAC +2 - BTS SIO SLAM: Services Informatiques aux Organisations</option>
                        <option value="BAC +2 - BTS TSSR: Technicien Supérieur Systèmes et Réseaux">BAC +2 - BTS TSSR: Technicien Supérieur Systèmes et Réseaux</option>
                    </optgroup>
                    <optgroup label="BAC +3">
                        <option value="BAC +3 - Bachelor RPI : Responsable de Projets Informatiques (Développement)">BAC +3 - Bachelor RPI : Responsable de Projets Informatiques (Développement)</option>
                        <option value="BAC +3 - Bachelor RPI: Responsable de Projets Informatiques (Systèmes, Réseaux et Cloud)">BAC +3 - Bachelor RPI: Responsable de Projets Informatiques (Systèmes, Réseaux et Cloud)</option>
                        <option value="BAC +3 - Bachelor AIS : Administrateur d'Infrastructures Sécurisées">BAC +3 - Bachelor AIS : Administrateur d'Infrastructures Sécurisées</option>
                        <option value="BAC +3 - Bachelor CDA: Concepteur Développeur d'Applications">BAC +3 - Bachelor CDA: Concepteur Développeur d'Applications</option>
                        <option value="BAC +3 - Bachelor AIS en 3 ans: Administrateur d'Infrastructures Sécurisées">BAC +3 - Bachelor AIS en 3 ans: Administrateur d'Infrastructures Sécurisées</option>
                        <option value="BAC +3 - Bachelor AIS en 1 an: Administrateur d'Infrastructures Sécurisées">BAC +3 - Bachelor AIS en 1 an: Administrateur d'Infrastructures Sécurisées</option>
                        <option value="BAC +3 - Bachelor CDA en 3 ans: Concepteur Développeur d' Applications">BAC +3 - Bachelor CDA en 3 ans: Concepteur Développeur d' Applications</option>
                        <option value="BAC +3 - Bachelor CDA en 1 an : Concepteur Développeur d'Applications">BAC +3 - Bachelor CDA en 1 an : Concepteur Développeur d'Applications</option>
                    </optgroup>
                    <optgroup label="BAC +5">
                        <option value="BAC +5 - Mastère ESI : Expert en Systèmes d'Information (BIG DATA & IA)">BAC +5 - Mastère ESI : Expert en Systèmes d'Information (BIG DATA & IA)</option>
                        <option value="BAC +5 - Mastère ESI : Expert en Systèmes d'Information (Cybersécurité)">BAC +5 - Mastère ESI : Expert en Systèmes d'Information (Cybersécurité)</option>
                        <option value="BAC +5 - Mastère ESI : Expert en Systèmes d'Information (Développement)">BAC +5 - Mastère ESI : Expert en Systèmes d'Information (Développement)</option>
                        <option value="BAC +5 - Mastère ESI : Expert en Systèmes d'Information">BAC +5 - Mastère ESI : Expert en Systèmes d'Information</option>
                    </optgroup>
                </select>
            
                <label for="formation_commerce">Formation souhaitée (Commerce)</label>
                <select name="formation_commerce" id="formation_commerce">
                    <option value="">Veuillez sélectionner</option>
                    <optgroup label="BAC +2">
                        <option value="BAC +2 - BTS GPME en 2 ans: Gestion des petites et moyennes entreprises">BAC +2 - BTS GPME en 2 ans: Gestion des petites et moyennes entreprises</option>
                        <option value="BAC +2 - BTS MCO en 2 ans: Management Commercial Opérationnel">BAC +2 - BTS MCO en 2 ans: Management Commercial Opérationnel</option>
                        <option value="BAC +2 - BTS NDRC en 2 ans: Négociation et Digitalisation de la Relation Client">BAC +2 - BTS NDRC en 2 ans: Négociation et Digitalisation de la Relation Client</option>
                        <option value="BAC +2 - BTS SAM en 2 ans: Assistant Manager">BAC +2 - BTS SAM en 2 ans: Assistant Manager</option>
                        <option value="BAC +2 - BTS COM en 2 ans: Communication">BAC +2 - BTS COM en 2 ans: Communication</option>
                    </optgroup>
                    <optgroup label="BAC +3">
                        <option value="BAC +3 - Bachelor RDC en 3 ans: Responsable Développement Commercial">BAC +3 - Bachelor RDC en 3 ans: Responsable Développement Commercial</option>
                        <option value="BAC +3 - Bachelor RDC en 1 an: Responsable de Développement Commercial">BAC +3 - Bachelor RDC en 1 an: Responsable de Développement Commercial</option>
                        <option value="BAC +3 - Cycle Bachelor RCM en 3 ans: Responsable Commercial et Marketing">BAC +3 - Cycle Bachelor RCM en 3 ans: Responsable Commercial et Marketing</option>
                        <option value="BAC +3 - Bachelor RCM en 1 an : Responsable Commercial et Marketing">BAC +3 - Bachelor RCM en 1 an : Responsable Commercial et Marketing</option>
                        <option value="BAC +3 - Bachelor RGDE Responsable en Gestion et Développement d'Entreprise">BAC +3 - Bachelor RGDE Responsable en Gestion et Développement d'Entreprise</option>
                        <option value="BAC +3 - Bachelor DDG Diplôme de Comptabilité et Gestion">BAC +3 - Bachelor DDG Diplôme de Comptabilité et Gestion</option>
                    </optgroup>
                    <optgroup label="BAC +5">
                        <option value="BAC +5 - Master DSCG Diplôme Supérieur de Comptabilité et de Gestion">BAC +5 - Master DSCG Diplôme Supérieur de Comptabilité et de Gestion</option>
                        <option value="BAC +5 - Master MG PME : Management et Gestion des PME">BAC +5 - Master MG PME : Management et Gestion des PME</option>
                        <option value="BAC +5 - IA en 2 ans: Ingénieur d'Affaires : Management et Gestion des PME">BAC +5 - IA en 2 ans: Ingénieur d'Affaires : Management et Gestion des PME</option>
                        <option value="BAC +5 - IA en 2 ans: Ingénieur d'Affaires : Commerce Equitable & International">BAC +5 - IA en 2 ans: Ingénieur d'Affaires : Commerce Equitable & International</option>
                        <option value="BAC +5 - IA en 2 ans: Ingénieur d'Affaires : Commerce et Marketing">BAC +5 - IA en 2 ans: Ingénieur d'Affaires : Commerce et Marketing</option>
                        <option value="BAC +5 - IA en 2 ans: Ingénieur d'Affaires: Chef de Projet Digital">BAC +5 - IA en 2 ans: Ingénieur d'Affaires: Chef de Projet Digital</option>
                        <option value="BAC +5 - IA en 2 ans: Ingénieur d'Affaires : Business Developer IT">BAC +5 - IA en 2 ans: Ingénieur d'Affaires : Business Developer IT</option>
                    </optgroup>
                </select>
                
                <div class="btn-group">
                    <button type="button" class="next-btn">Suivant</button>
                </div>
            </div>

            <div class="form-step" id="step-2">
                <h2>Formulaire de pré-inscription (Étape 2 sur 5)</h2>
                <h3>FORMATION & LANGUES</h3>
                <label for="dernier_diplome">Dernier diplôme obtenu *</label>
                <select name="dernier_diplome" id="dernier_diplome" required>
                    <option value="">Veuillez sélectionner</option>
                    <option value="Bac">Bac</option>
                    <option value="Bac +2">Bac +2</option>
                    <option value="Bac +3">Bac +3</option>
                    <option value="Bac +4">Bac +4</option>
                    <option value="Bac +5">Bac +5</option>
                </select>
                <label for="intitule_diplome">Intitulé du diplôme *</label>
                <input type="text" id="intitule_diplome" name="intitule_diplome" required>
                <label for="etablissement_diplome">Établissement</label>
                <input type="text" id="etablissement_diplome" name="etablissement_diplome">
                <label for="adresse_etablissement">Adresse complète de l'établissement</label>
                <input type="text" id="adresse_etablissement" name="adresse_etablissement">
                <br><br>
                <h3>LANGUES</h3>
                <div id="langues-container"></div>
                <button type="button" id="add-langue-btn">Ajouter une langue</button>
                <div class="btn-group">
                    <button type="button" class="prev-btn">Précédent</button>
                    <button type="button" class="next-btn">Suivant</button>
                </div>
            </div>

            <div class="form-step" id="step-3">
                <h2>Formulaire de pré-inscription (Étape 3 sur 5)</h2>
                <h3>EXPÉRIENCES PROFESSIONNELLES</h3>
                <p>(stages compris)</p>
                <div id="experiences-container"></div>
                <button type="button" id="add-experience-btn">Ajouter une expérience</button>
                <label for="commentaire_experience" style="margin-top: 20px;">Commentez le stage ou l’expérience professionnelle qui vous a le plus apporté.</label>
                <textarea name="commentaire_experience" id="commentaire_experience" rows="5"></textarea>
                <div class="btn-group">
                    <button type="button" class="prev-btn">Précédent</button>
                    <button type="button" class="next-btn">Suivant</button>
                </div>
            </div>

            <div class="form-step" id="step-4">
                 <h2>Formulaire de pré-inscription (Étape 4 sur 5)</h2>
                 <h3>VOS MOTIVATIONS</h3>
                 <p style="text-align: center; font-size: 1.1rem; color: var(--gray-text); padding: 40px 20px; background-color: #f8f9fa; border-radius: 8px;">Veuillez rédiger et joindre votre lettre de motivation au format PDF à la prochaine étape. <br>C'est votre chance de nous montrer qui vous êtes !</p>
                 <div class="btn-group">
                    <button type="button" class="prev-btn">Précédent</button>
                    <button type="button" class="next-btn">Suivant</button>
                </div>
            </div>
            
            <div class="form-step" id="step-5">
                <h2>Formulaire de pré-inscription (Étape 5 sur 5)</h2>
                <h3>DOCUMENTS À JOINDRE</h3>
                <p>Formats acceptés : PDF, JPG, PNG. La dernière étape avant de finaliser !</p>
                <label for="doc_photo">Photographie d’identité *</label>
                <input type="file" id="doc_photo" name="doc_photo" accept=".pdf,.jpg,.jpeg,.png" required>
                <label for="doc_passeport">Passeport ou CNI *</label>
                <input type="file" id="doc_passeport" name="doc_passeport" accept=".pdf,.jpg,.jpeg,.png" required>
                <label for="doc_diplome">Dernier diplôme obtenu *</label>
                <input type="file" id="doc_diplome" name="doc_diplome" accept=".pdf" required>
                <label for="doc_notes">Dernier relevé de notes annuel *</label>
                <input type="file" id="doc_notes" name="doc_notes" accept=".pdf" required>
                <label for="doc_cv">Curriculum vitae (CV) *</label>
                <input type="file" id="doc_cv" name="doc_cv" accept=".pdf" required>
                <label for="doc_motivation">Lettre de motivation *</label>
                <input type="file" id="doc_motivation" name="doc_motivation" accept=".pdf" required>
                <label for="doc_tcf">TCF (si applicable)</label>
                <input type="file" id="doc_tcf" name="doc_tcf" accept=".pdf">
                <div class="btn-group">
                    <button type="button" class="prev-btn">Précédent</button>
                    <button type="submit">Envoyer ma candidature</button>
                </div>
            </div>

        </form>
    </div>
</main>

<?php 
// 3. Le pied de page
include __DIR__ . '/footer.php'; 
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/19.2.16/js/intlTelInput.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialisation pour l'indicatif téléphonique
    const phoneInput = document.querySelector("#telephone");
    
    const iti = window.intlTelInput(phoneInput, {
      utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/19.2.16/js/utils.js",
      initialCountry: "auto",
      geoIpLookup: function(callback) {
        fetch("https://ipapi.co/json")
          .then(res => res.json())
          .then(data => callback(data.country_code))
          .catch(() => callback("fr"));
      },
      preferredCountries: ['fr', 'be', 'ch', 'dz', 'ma', 'tn', 'sn'],
      nationalMode: false,
      separateDialCode: true,
    });
});
</script>

<script src="script.js"></script> 

</body>
</html>