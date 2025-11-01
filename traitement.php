<?php
// Importer les classes PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Charger l'autoloader de Composer
require 'vendor/autoload.php';

// Vérifier que le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $mail = new PHPMailer(true);

    try {
        // --- DÉBOGAGE DÉSACTIVÉ POUR LA PRODUCTION ---
        $mail->SMTPDebug = 0;

        // --- CONFIGURATION RECOMMANDÉE POUR O2SWITCH ---
        $mail->isSMTP();
        $mail->Host       = 'volant.o2switch.net';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'inscriptions@chsa7034.odns.fr';
        $mail->Password   = '%u=%kPoL6_?e';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->CharSet    = 'UTF-8';

        // --- DESTINATAIRES ---
        $mail->setFrom('inscriptions@chsa7034.odns.fr', 'Service des Admissions'); 
        $mail->addAddress('berhili.charafeddine33@gmail.com', 'Secrétariat École');
        
        // --- CONSTRUCTION DU CONTENU DE L'EMAIL ---
        function clean($data) {
            return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
        }

        $civilite = clean($_POST['civilite'] ?? 'Non précisé');
        $nom = clean($_POST['nom'] ?? '');
        $prenom = clean($_POST['prenom'] ?? '');
        $email_candidat = clean($_POST['email'] ?? '');
        $telephone = clean($_POST['telephone'] ?? '');
        
        $formation = !empty($_POST['formation_info']) ? clean($_POST['formation_info']) : clean($_POST['formation_commerce']);

        $corps_email = "<h1>Nouvelle candidature de {$prenom} {$nom}</h1>";
        $corps_email .= "<h2>Informations Personnelles</h2><ul>";
        $corps_email .= "<li><strong>Civilité:</strong> {$civilite}</li>";
        $corps_email .= "<li><strong>Nom:</strong> {$nom}</li>";
        $corps_email .= "<li><strong>Prénom:</strong> {$prenom}</li>";
        $corps_email .= "<li><strong>Email:</strong> {$email_candidat}</li>";
        $corps_email .= "<li><strong>Téléphone:</strong> {$telephone}</li>";
        $corps_email .= "<li><strong>Date de naissance:</strong> " . clean($_POST['date_naissance'] ?? '') . "</li>";
        $corps_email .= "<li><strong>Lieu de naissance:</strong> " . clean($_POST['ville_naissance'] ?? '') . "</li>";
        $corps_email .= "<li><strong>Nationalité:</strong> " . clean($_POST['nationalite'] ?? '') . "</li>";
        $corps_email .= "<li><strong>Adresse:</strong> " . clean($_POST['adresse'] ?? '') . ", " . clean($_POST['code_postal'] ?? '') . " " . clean($_POST['ville'] ?? '') . ", " . clean($_POST['pays'] ?? '') . "</li>";
        $corps_email .= "</ul>";
        $corps_email .= "<h2>Formation souhaitée</h2><p>{$formation}</p>";

        $corps_email .= "<h2>Cursus</h2><ul>";
        $corps_email .= "<li><strong>Dernier diplôme:</strong> " . clean($_POST['dernier_diplome'] ?? '') . "</li>";
        $corps_email .= "<li><strong>Intitulé:</strong> " . clean($_POST['intitule_diplome'] ?? '') . "</li>";
        $corps_email .= "<li><strong>Établissement:</strong> " . clean($_POST['etablissement_diplome'] ?? '') . " (" . clean($_POST['adresse_etablissement'] ?? '') . ")</li>";
        $corps_email .= "</ul>";

        if (!empty($_POST['langues'])) {
            $corps_email .= "<h2>Langues</h2><ul>";
            foreach ($_POST['langues'] as $index => $langue) {
                if (!empty($langue)) {
                    $niveau = clean($_POST['niveaux'][$index] ?? '');
                    $corps_email .= "<li>" . clean($langue) . " - Niveau: {$niveau}</li>";
                }
            }
            $corps_email .= "</ul>";
        }
        
        if (!empty($_POST['entreprises'])) {
            $corps_email .= "<h2>Expériences Professionnelles</h2>";
            foreach ($_POST['entreprises'] as $index => $entreprise) {
                if (!empty($entreprise)) {
                    $corps_email .= "<ul>";
                    $corps_email .= "<li><strong>Entreprise:</strong> " . clean($entreprise) . "</li>";
                    $corps_email .= "<li><strong>Ville:</strong> " . clean($_POST['villes_exp'][$index] ?? '') . "</li>";
                    $corps_email .= "<li><strong>Fonction:</strong> " . clean($_POST['fonctions'][$index] ?? '') . "</li>";
                    $corps_email .= "<li><strong>Durée:</strong> " . clean($_POST['durees'][$index] ?? '') . "</li>";
                    $corps_email .= "</ul>";
                }
            }
        }
        $corps_email .= "<h2>Motivations</h2><p>" . nl2br(clean($_POST['commentaire_experience'] ?? '')) . "</p>";

        // --- GESTION DES PIÈCES JOINTES ---
        $fichiers_a_joindre = [
            'doc_photo' => 'Photo_Identite', 'doc_passeport' => 'Passeport_CNI',
            'doc_diplome' => 'Diplome', 'doc_notes' => 'Releve_Notes', 'doc_cv' => 'CV',
            'doc_motivation' => 'Lettre_Motivation', 'doc_tcf' => 'TCF'
        ];

        foreach ($fichiers_a_joindre as $input_name => $nom_fichier) {
            if (isset($_FILES[$input_name]) && $_FILES[$input_name]['error'] == UPLOAD_ERR_OK) {
                $chemin_temporaire = $_FILES[$input_name]['tmp_name'];
                $nom_original = $_FILES[$input_name]['name'];
                $nouveau_nom = $nom_fichier . '_' . $prenom . '_' . $nom . '.' . pathinfo($nom_original, PATHINFO_EXTENSION);
                $mail->addAttachment($chemin_temporaire, $nouveau_nom);
            }
        }

        // --- ENVOI DE L'EMAIL ---
        $mail->isHTML(true);
        $mail->Subject = "Nouvelle candidature : {$prenom} {$nom}";
        $mail->Body    = $corps_email;
        $mail->AltBody = strip_tags($corps_email);

        $mail->send();

        // --- ACTION EN CAS DE SUCCÈS : REDIRECTION VERS LA PAGE SUCCES.PHP ---
        header('Location: succes.php');
        exit();

    } catch (Exception $e) {
        // --- ACTION EN CAS D'ERREUR : REDIRECTION VERS UNE PAGE D'ERREUR ---
        // (Créez un fichier erreur.php sur le même modèle que succes.php si vous le souhaitez)
        header('Location: erreur.php');
        exit();
    }
} else {
    // Si la page est accédée directement, on renvoie au formulaire
    header('Location: inscription.php');
    exit();
}
?>