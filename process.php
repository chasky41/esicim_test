<?php
// process.php
require 'vendor/autoload.php'; // PHPMailer autoloader

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "esicim_registration";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Server-side validation
$errors = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Nettoyage des données
    $required_fields = ['civilite', 'nom', 'prenom', 'email', 'telephone', 'dernier_diplome', 'intitule_diplome'];
    $formData = [
        'civilite' => filter_input(INPUT_POST, 'civilite', FILTER_SANITIZE_STRING),
        'nom' => filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING),
        'prenom' => filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING),
        'email' => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL),
        'telephone' => filter_input(INPUT_POST, 'telephone', FILTER_SANITIZE_STRING),
        'pays' => filter_input(INPUT_POST, 'pays', FILTER_SANITIZE_STRING),
        'ville' => filter_input(INPUT_POST, 'ville', FILTER_SANITIZE_STRING),
        'adresse' => filter_input(INPUT_POST, 'adresse', FILTER_SANITIZE_STRING),
        'code_postal' => filter_input(INPUT_POST, 'code_postal', FILTER_SANITIZE_STRING),
        'ville_naissance' => filter_input(INPUT_POST, 'ville_naissance', FILTER_SANITIZE_STRING),
        'date_naissance' => filter_input(INPUT_POST, 'date_naissance', FILTER_SANITIZE_STRING),
        'nationalite' => filter_input(INPUT_POST, 'nationalite', FILTER_SANITIZE_STRING),
        'formation_informatique' => filter_input(INPUT_POST, 'formation_informatique', FILTER_SANITIZE_STRING),
        'formation_commerce' => filter_input(INPUT_POST, 'formation_commerce', FILTER_SANITIZE_STRING),
        'source' => filter_input(INPUT_POST, 'source', FILTER_SANITIZE_STRING),
        'dernier_diplome' => filter_input(INPUT_POST, 'dernier_diplome', FILTER_SANITIZE_STRING),
        'intitule_diplome' => filter_input(INPUT_POST, 'intitule_diplome', FILTER_SANITIZE_STRING),
        'etablissement' => filter_input(INPUT_POST, 'etablissement', FILTER_SANITIZE_STRING),
        'adresse_etablissement' => filter_input(INPUT_POST, 'adresse_etablissement', FILTER_SANITIZE_STRING),
        'motivation' => filter_input(INPUT_POST, 'motivation', FILTER_SANITIZE_STRING),
        'commentaire_experience' => filter_input(INPUT_POST, 'commentaire_experience', FILTER_SANITIZE_STRING),
    ];

    // Validation des champs requis
    foreach ($required_fields as $field) {
        if (empty($formData[$field])) {
            $errors[] = "Le champ " . ucfirst(str_replace('_', ' ', $field)) . " est requis.";
        }
    }

    // Validation de l'email
    if (!empty($formData['email']) && !filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Adresse e-mail invalide.";
    }

    // File upload handling
    $upload_dir = "uploads/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }
    $allowed_types = ['image/jpeg', 'image/png', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
    $max_size = 5 * 1024 * 1024; // 5MB
    $file_fields = ['photo_identite', 'passeport', 'diplome', 'releve_notes', 'cv', 'tcf', 'lettre_motivation'];
    $file_paths = [];

    foreach ($file_fields as $field) {
        if (!empty($_FILES[$field]['name'])) {
            $file_type = $_FILES[$field]['type'];
            $file_size = $_FILES[$field]['size'];
            $file_tmp = $_FILES[$field]['tmp_name'];
            $file_name = basename($_FILES[$field]['name']);
            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $new_file_name = uniqid() . '.' . $file_ext;
            $dest_path = $upload_dir . $new_file_name;

            if (!in_array($file_type, $allowed_types)) {
                $errors[] = "Type de fichier non autorisé pour $field.";
            } elseif ($file_size > $max_size) {
                $errors[] = "Fichier $field trop volumineux (max 5MB).";
            } elseif (!move_uploaded_file($file_tmp, $dest_path)) {
                $errors[] = "Erreur lors du téléchargement de $field.";
            } else {
                $file_paths[$field] = $dest_path;
            }
        }
    }

    // Si pas d'erreurs, enregistrer dans la base de données et envoyer l'email
    if (empty($errors)) {
        try {
            $conn->beginTransaction();

            // Insert into candidats table
            $stmt = $conn->prepare("
                INSERT INTO candidats (
                    civilite, nom, prenom, email, telephone, pays, ville, adresse, code_postal,
                    ville_naissance, date_naissance, nationalite, formation_informatique, formation_commerce, source
                ) VALUES (:civilite, :nom, :prenom, :email, :telephone, :pays, :ville, :adresse, :code_postal,
                    :ville_naissance, :date_naissance, :nationalite, :formation_informatique, :formation_commerce, :source)
            ");
            $stmt->execute([
                ':civilite' => $formData['civilite'],
                ':nom' => $formData['nom'],
                ':prenom' => $formData['prenom'],
                ':email' => $formData['email'],
                ':telephone' => $formData['telephone'],
                ':pays' => $formData['pays'] ?: null,
                ':ville' => $formData['ville'] ?: null,
                ':adresse' => $formData['adresse'] ?: null,
                ':code_postal' => $formData['code_postal'] ?: null,
                ':ville_naissance' => $formData['ville_naissance'] ?: null,
                ':date_naissance' => $formData['date_naissance'] ?: null,
                ':nationalite' => $formData['nationalite'] ?: null,
                ':formation_informatique' => $formData['formation_informatique'] ?: null,
                ':formation_commerce' => $formData['formation_commerce'] ?: null,
                ':source' => $formData['source'] ?: null,
            ]);
            $candidat_id = $conn->lastInsertId();

            // Insert into diplomes table
            $stmt = $conn->prepare("
                INSERT INTO diplomes (
                    candidat_id, dernier_diplome, intitule_diplome, etablissement, adresse_etablissement
                ) VALUES (:candidat_id, :dernier_diplome, :intitule_diplome, :etablissement, :adresse_etablissement)
            ");
            $stmt->execute([
                ':candidat_id' => $candidat_id,
                ':dernier_diplome' => $formData['dernier_diplome'],
                ':intitule_diplome' => $formData['intitule_diplome'],
                ':etablissement' => $formData['etablissement'] ?: null,
                ':adresse_etablissement' => $formData['adresse_etablissement'] ?: null,
            ]);

            // Insert into langues table
            if (!empty($_POST['langues']) && is_array($_POST['langues'])) {
                $stmt = $conn->prepare("INSERT INTO langues (candidat_id, langue, niveau) VALUES (:candidat_id, :langue, :niveau)");
                foreach ($_POST['langues'] as $langue) {
                    if (!empty($langue['langue']) && !empty($langue['niveau'])) {
                        $stmt->execute([
                            ':candidat_id' => $candidat_id,
                            ':langue' => filter_var($langue['langue'], FILTER_SANITIZE_STRING),
                            ':niveau' => filter_var($langue['niveau'], FILTER_SANITIZE_STRING),
                        ]);
                    }
                }
            }

            // Insert into experiences table
            if (!empty($_POST['experiences']) && is_array($_POST['experiences'])) {
                $stmt = $conn->prepare("
                    INSERT INTO experiences (
                        candidat_id, domaine, entreprise, ville, fonction, duree
                    ) VALUES (:candidat_id, :domaine, :entreprise, :ville, :fonction, :duree)
                ");
                foreach ($_POST['experiences'] as $exp) {
                    if (!empty($exp['domaine'])) {
                        $stmt->execute([
                            ':candidat_id' => $candidat_id,
                            ':domaine' => filter_var($exp['domaine'], FILTER_SANITIZE_STRING),
                            ':entreprise' => filter_var($exp['entreprise'], FILTER_SANITIZE_STRING) ?: null,
                            ':ville' => filter_var($exp['ville'], FILTER_SANITIZE_STRING) ?: null,
                            ':fonction' => filter_var($exp['fonction'], FILTER_SANITIZE_STRING) ?: null,
                            ':duree' => filter_var($exp['duree'], FILTER_SANITIZE_STRING) ?: null,
                        ]);
                    }
                }
            }

            // Insert into motivations table
            $stmt = $conn->prepare("
                INSERT INTO motivations (candidat_id, motivation, commentaire_experience)
                VALUES (:candidat_id, :motivation, :commentaire_experience)
            ");
            $stmt->execute([
                ':candidat_id' => $candidat_id,
                ':motivation' => $formData['motivation'] ?: null,
                ':commentaire_experience' => $formData['commentaire_experience'] ?: null,
            ]);

            // Insert into documents table
            $stmt = $conn->prepare("
                INSERT INTO documents (
                    candidat_id, photo_identite, passeport, diplome, releve_notes, cv, tcf, lettre_motivation
                ) VALUES (:candidat_id, :photo_identite, :passeport, :diplome, :releve_notes, :cv, :tcf, :lettre_motivation)
            ");
            $stmt->execute([
                ':candidat_id' => $candidat_id,
                ':photo_identite' => $file_paths['photo_identite'] ?? null,
                ':passeport' => $file_paths['passeport'] ?? null,
                ':diplome' => $file_paths['diplome'] ?? null,
                ':releve_notes' => $file_paths['releve_notes'] ?? null,
                ':cv' => $file_paths['cv'] ?? null,
                ':tcf' => $file_paths['tcf'] ?? null,
                ':lettre_motivation' => $file_paths['lettre_motivation'] ?? null,
            ]);

            // Prepare email with PHPMailer
            $mail = new PHPMailer(true);
            try {
                // Server settings
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'your.email@gmail.com'; // Remplace par ton email Gmail
                $mail->Password = 'your-app-password'; // Remplace par ton mot de passe d'application
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;
                $mail->CharSet = 'UTF-8';

                // Recipients
                $mail->setFrom('your.email@gmail.com', 'ESICIM Registration');
                $mail->addAddress('berhili.charafeddine33@gmail.com'); // Destinataire

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Nouvelle candidature ESICIM - ' . $formData['nom'] . ' ' . $formData['prenom'];
                $body = '<h2>Nouvelle candidature reçue</h2>';
                $body .= '<h3>Informations Personnelles</h3>';
                foreach ($formData as $key => $value) {
                    if (!in_array($key, ['langues', 'experiences', 'motivation', 'commentaire_experience']) && !empty($value)) {
                        $body .= "<p><strong>" . ucfirst(str_replace('_', ' ', $key)) . ":</strong> " . htmlspecialchars($value) . "</p>";
                    }
                }
                $body .= '<h3>Diplômes</h3>';
                $body .= "<p><strong>Dernier diplôme :</strong> " . htmlspecialchars($formData['dernier_diplome']) . "</p>";
                $body .= "<p><strong>Intitulé du diplôme :</strong> " . htmlspecialchars($formData['intitule_diplome']) . "</p>";
                $body .= "<p><strong>Établissement :</strong> " . htmlspecialchars($formData['etablissement'] ?: 'Non précisé') . "</p>";
                $body .= "<p><strong>Adresse établissement :</strong> " . htmlspecialchars($formData['adresse_etablissement'] ?: 'Non précisé') . "</p>";

                $body .= '<h3>Langues</h3>';
                if (!empty($_POST['langues']) && is_array($_POST['langues'])) {
                    foreach ($_POST['langues'] as $index => $langue) {
                        $body .= "<p>Langue " . ($index + 1) . ": " . htmlspecialchars($langue['langue'] ?: 'Non précisé') . " (" . htmlspecialchars($langue['niveau'] ?: 'Non précisé') . ")</p>";
                    }
                } else {
                    $body .= "<p>Aucune langue précisée.</p>";
                }

                $body .= '<h3>Expériences Professionnelles</h3>';
                if (!empty($_POST['experiences']) && is_array($_POST['experiences'])) {
                    foreach ($_POST['experiences'] as $index => $exp) {
                        $body .= "<p>Expérience " . ($index + 1) . ":</p>";
                        $body .= "<p><strong>Domaine :</strong> " . htmlspecialchars($exp['domaine'] ?: 'Non précisé') . "</p>";
                        $body .= "<p><strong>Entreprise :</strong> " . htmlspecialchars($exp['entreprise'] ?: 'Non précisé') . "</p>";
                        $body .= "<p><strong>Ville :</strong> " . htmlspecialchars($exp['ville'] ?: 'Non précisé') . "</p>";
                        $body .= "<p><strong>Fonction :</strong> " . htmlspecialchars($exp['fonction'] ?: 'Non précisé') . "</p>";
                        $body .= "<p><strong>Durée :</strong> " . htmlspecialchars($exp['duree'] ?: 'Non précisé') . "</p>";
                    }
                } else {
                    $body .= "<p>Aucune expérience précisée.</p>";
                }

                $body .= '<h3>Motivation</h3>';
                $body .= "<p>" . nl2br(htmlspecialchars($formData['motivation'] ?: 'Non précisé')) . "</p>";
                $body .= '<h3>Commentaire sur l’expérience</h3>';
                $body .= "<p>" . nl2br(htmlspecialchars($formData['commentaire_experience'] ?: 'Non précisé')) . "</p>";

                $mail->Body = $body;

                // Attachments
                foreach ($file_paths as $field => $path) {
                    $mail->addAttachment($path, $field . '_' . basename($path));
                }

                $mail->send();
                $email_status = "Un email a été envoyé avec succès.";
            } catch (Exception $e) {
                $email_status = "Erreur lors de l'envoi de l'email : {$mail->ErrorInfo}";
                $errors[] = $email_status;
            }

            $conn->commit();

            // Nettoyer les fichiers après envoi
            foreach ($file_paths as $path) {
                if (file_exists($path)) {
                    unlink($path);
                }
            }

            // Rediriger vers une page de confirmation
            header('Location: confirmation.php?status=success&message=' . urlencode($email_status));
            exit();
        } catch (Exception $e) {
            $conn->rollBack();
            $errors[] = "Erreur lors de l'enregistrement : " . $e->getMessage();
        }
    }

    // Afficher les erreurs
    if (!empty($errors)) {
        header('Location: inscription.php?errors=' . urlencode(json_encode($errors)));
        exit();
    }
}

$conn = null;
?>