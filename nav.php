<?php
require_once __DIR__ . '/config.php';
$GLOBALS['active_page'] = 'etudiants.php';

// --- GESTION DES FORMATIONS (VERSION MISE À JOUR SELON VOTRE NOUVELLE LISTE) ---
// Tout est géré par les 5 tableaux ci-dessous.

// PÔLE INFORMATIQUE
$formations_informatique = [
    // --- BAC+2 ---
    ['level' => 'BAC+2', 'title' => 'BTS SIO SLAM', 'href' => 'bts-sio-slam.php'],
    ['level' => 'BAC+2', 'title' => 'BTS SIO SISR', 'href' => 'bts-sio-sisr.php'],
    ['level' => 'BAC+2', 'title' => 'TSSR', 'href' => 'tssr.php'],
    ['level' => 'BAC+2', 'title' => 'TWFT - Développeur Web', 'href' => 'twft-dev-web.php'],
    // --- BAC+3 ---
    ['level' => 'BAC+3', 'title' => 'Bachelor AIS', 'href' => 'bachelor-ais.php'],
    ['level' => 'BAC+3', 'title' => 'Bachelor CDA', 'href' => 'bachelor-cda.php'],
    // --- BAC+5 ---
    ['level' => 'BAC+5', 'title' => 'Mastère ESI - Réseaux & Cloud', 'href' => 'mastere-esi-reseaux-cloud.php'],
    ['level' => 'BAC+5', 'title' => 'Mastère ESI - Développement', 'href' => 'mastere-esi-developpement.php'],
];

// PÔLE COMMERCE & MANAGEMENT
$formations_commerce = [
    // --- BAC+2 ---
    ['level' => 'BAC+2', 'title' => 'BTS MCO', 'href' => 'formation-mco.php'],
    ['level' => 'BAC+2', 'title' => 'BTS NDRC', 'href' => 'formation-ndrc.php'],
    ['level' => 'BAC+2', 'title' => 'BTS COM', 'href' => 'formation-com.php'],
    ['level' => 'BAC+2', 'title' => 'BTS SAM', 'href' => 'formation-sam.php'],
    ['level' => 'BAC+2', 'title' => 'AC - Assistant Commercial', 'href' => 'assistant-commercial.php'],
    ['level' => 'BAC+2', 'title' => 'NTC - Négociateur Technico-Com.', 'href' => 'negociateur-technico-commercial.php'],
    ['level' => 'BAC+2', 'title' => 'MUM - Manager Unité Marchande', 'href' => 'manager-unite-marchande.php'],
    // --- BAC+3 ---
    ['level' => 'BAC+3', 'title' => 'Bachelor REM', 'href' => 'bachelor-rem.php'],
    ['level' => 'BAC+3', 'title' => 'Bachelor RDC', 'href' => 'formation-rdc.php'],
    // --- BAC+5 ---
    ['level' => 'BAC+5', 'title' => 'Mastère - Commerce et Marketing', 'href' => 'Formation_CM/Commerce et Marketing.php'],
    ['level' => 'BAC+5', 'title' => 'Mastère - Management et Gestion PME', 'href' => 'Formation_CM/Management et Gestion des PME.php'],
    ['level' => 'BAC+5', 'title' => 'Master International', 'href' => 'master-international.php'],
];

// PÔLE COMPTABILITÉ & GESTION (Nouveau)
$formations_comptabilite = [
    // --- BAC+2 ---
    ['level' => 'BAC+2', 'title' => 'BTS GPME', 'href' => 'formation-gpme.php'],
    ['level' => 'BAC+2', 'title' => 'ARH - Assistant RH', 'href' => 'assistant-rh.php'],
    ['level' => 'BAC+2', 'title' => 'ADD - Assistant de Direction', 'href' => 'assistant-direction.php'],
    ['level' => 'BAC+2', 'title' => 'GCF - Gestionnaire Comptable', 'href' => 'gestionnaire-comptable.php'],
    ['level' => 'BAC+2', 'title' => 'GDP - Gestionnaire De Paie', 'href' => 'gestionnaire-paie.php'],
    // --- BAC+3 ---
    ['level' => 'BAC+3', 'title' => 'DCG', 'href' => 'formation-dcg.php'],
];

// PÔLE RECONVERSION PROFESSIONNELLE (Nouveau)
$formations_reconversion = [
    // --- BAC ---
    ['level' => 'BAC', 'title' => 'TAI - Technicien Assistance Info.', 'href' => 'tai.php'],
    ['level' => 'BAC', 'title' => 'CC - Conseiller Commercial', 'href' => 'conseiller-commercial.php'],
    ['level' => 'BAC', 'title' => 'CDV - Conseiller de Vente', 'href' => 'conseiller-de-vente.php'],
    ['level' => 'BAC', 'title' => 'CA - Comptable Assistant', 'href' => 'comptable-assistant.php'],
    ['level' => 'BAC', 'title' => 'SAA - Secrétaire Assistant(e)', 'href' => 'secretaire-assistant.php'],
    ['level' => 'BAC', 'title' => 'SAMA - Secrétaire Assistant Médico-Admin.', 'href' => 'secretaire-medico-admin.php'],
    ['level' => 'BAC', 'title' => 'ADVF - Assistant de Vie', 'href' => 'assistant-de-vie.php'],
    // --- PREPA ---
    ['level' => 'PREPA', 'title' => 'PREPA Informatique (3 mois)', 'href' => 'prepa-informatique.php'],
    ['level' => 'PREPA', 'title' => 'PREPA Commerce (3 mois)', 'href' => 'prepa-commerce.php'],
];

// PÔLE SÉCURITÉ & PRÉVENTION (Nouveau)
$formations_securite = [
    ['level' => 'CAP', 'title' => 'CAP - Agent de Sécurité', 'href' => 'cap-agent-securite.php'],
    ['level' => 'BAC', 'title' => 'BAC - Agent de Sûreté', 'href' => 'bac-agent-surete.php'],
    ['level' => 'BAC+2', 'title' => 'BTS MOS - Management Sécurité', 'href' => 'bts-mos.php'],
];


// Fonction pour grouper les formations par niveau (pas besoin de la modifier)
function group_by_level($formations) {
    $grouped = [];
    foreach ($formations as $formation) {
        $grouped[$formation['level']][] = $formation;
    }
    uksort($grouped, function($a, $b) { return strnatcasecmp($a, $b); });
    return $grouped;
}

// On groupe chaque pôle
$grouped_informatique = group_by_level($formations_informatique);
$grouped_commerce = group_by_level($formations_commerce);
$grouped_comptabilite = group_by_level($formations_comptabilite);
$grouped_reconversion = group_by_level($formations_reconversion);
$grouped_securite = group_by_level($formations_securite);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESICIM Academy - Formation Professionnelle</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* TON CSS EST ICI - JE N'AI RIEN CHANGÉ */
        :root { --primary-blue: #1a4b8c; --secondary-blue: #003366; --accent-color: #e74c3c; --accent-hover: #c0392b; --light-bg: #f8f9fa; --dark-text: #212529; --white: #ffffff; --light-shadow: rgba(0, 0, 0, 0.05); --medium-shadow: rgba(0, 0, 0, 0.1); --dark-shadow: rgba(0, 0, 0, 0.2); --gradient-blue: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%); --gradient-accent: linear-gradient(135deg, var(--accent-color) 0%, var(--accent-hover) 100%); } * { margin: 0; padding: 0; box-sizing: border-box; } body { font-family: 'Poppins', sans-serif; padding-top: 90px; color: var(--dark-text); background-color: var(--light-bg); overflow-x: hidden; } a { text-decoration: none; color: inherit; } ul { list-style: none; } img { max-width: 100%; height: auto; } .container { width: 100%; max-width: 1200px; margin: 0 auto; padding: 0 15px; } .page-loader { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255, 255, 255, 0.95); display: flex; flex-direction: column; align-items: center; justify-content: center; z-index: 9999; transition: opacity 0.5s ease; } .loader-logo { width: 200px; margin-bottom: 30px; animation: pulse 1.5s infinite ease-in-out; } .loader-spinner { width: 50px; height: 50px; border: 5px solid #f3f3f3; border-top: 5px solid var(--accent-color); border-radius: 50%; animation: spin 1s linear infinite; } @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } } @keyframes pulse { 0% { transform: scale(1); } 50% { transform: scale(1.05); } 100% { transform: scale(1); } } .navbar-esicim { background-color: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); box-shadow: 0 5px 30px var(--light-shadow); transition: all 0.4s ease; border-bottom: 1px solid rgba(0, 0, 0, 0.03); position: fixed; top: 0; left: 0; width: 100%; z-index: 1000; } .navbar-scrolled { box-shadow: 0 10px 30px var(--medium-shadow); background-color: rgba(255, 255, 255, 0.98); } .navbar-container { display: flex; justify-content: space-between; align-items: center; padding: 15px 20px; } .navbar-brand img { height: 55px; transition: height 0.4s ease; } .navbar-scrolled .navbar-brand img { height: 45px; } .nav-menu { display: flex; align-items: center; } .nav-item { position: relative; margin: 0 3px; } .nav-link { color: var(--primary-blue); font-weight: 500; text-transform: uppercase; font-size: 13px; letter-spacing: 0.8px; padding: 30px 15px; transition: all 0.3s ease; position: relative; overflow: hidden; display: block; } .navbar-scrolled .nav-link { padding: 25px 15px; } .nav-link:before { content: ''; position: absolute; bottom: 0; left: 0; width: 100%; height: 3px; background: var(--gradient-accent); transform: translateX(-100%); transition: transform 0.4s cubic-bezier(0.65, 0, 0.35, 1); } .nav-link:hover:before, .nav-link.active:before { transform: translateX(0); } .nav-link:hover, .nav-link.active { color: var(--accent-color); } .btn-admission { background: var(--gradient-accent); border: none; color: var(--white); border-radius: 30px; padding: 10px 25px; box-shadow: 0 5px 15px rgba(231, 76, 60, 0.3); transition: all 0.3s cubic-bezier(0.68, -0.55, 0.27, 1.55); font-weight: 600; letter-spacing: 0.5px; position: relative; overflow: hidden; z-index: 1; text-transform: uppercase; font-size: 13px; } .btn-admission:before { content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: var(--gradient-blue); opacity: 0; z-index: -1; transition: all 0.4s ease; } .btn-admission:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(231, 76, 60, 0.4); } .btn-admission:hover:before { opacity: 1; } .btn-admission:active { transform: translateY(0); box-shadow: 0 5px 10px rgba(231, 76, 60, 0.4); } .dropdown-menu { position: absolute; top: 100%; left: 0; min-width: 220px; background-color: var(--white); border: none; border-radius: 15px; box-shadow: 0 10px 40px var(--medium-shadow); padding: 15px; opacity: 0; visibility: hidden; transform: translateY(20px); transition: all 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55); z-index: 1001; } .dropdown:hover .dropdown-menu { opacity: 1; visibility: visible; transform: translateY(0); } .dropdown-item { color: var(--primary-blue); font-weight: 500; padding: 12px 20px; border-radius: 10px; margin-bottom: 5px; transition: all 0.3s ease; display: block; } .dropdown-item:hover { background-color: rgba(26, 75, 140, 0.08); color: var(--accent-color); transform: translateX(5px); } .dropdown-item:active { background-color: rgba(231, 76, 60, 0.1); } .dropdown-item i { width: 20px; text-align: center; margin-right: 8px; } .mega-dropdown { position: static; } .mega-dropdown-menu { position: absolute; left: 0; right: 0; width: 100%; background: linear-gradient(to right, rgba(255, 255, 255, 0.98), rgba(255, 255, 255, 0.95)), url('https://esicim-academy.fr/wp-content/uploads/2023/03/formation-professionnelle.jpg') no-repeat center center; background-size: cover; background-blend-mode: overlay; border-radius: 0 0 20px 20px; box-shadow: 0 20px 50px var(--medium-shadow); padding: 30px; opacity: 0; visibility: hidden; transform: translateY(20px); transition: all 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55); z-index: 1001; } .mega-dropdown:hover .mega-dropdown-menu { opacity: 1; visibility: visible; transform: translateY(0); } .mega-menu-title { color: var(--secondary-blue); font-weight: 700; margin-bottom: 20px; font-size: 16px; position: relative; padding-bottom: 10px; } .mega-menu-title:after { content: ''; position: absolute; bottom: 0; left: 0; width: 40px; height: 3px; background: var(--gradient-accent); } .mega-dropdown-menu .dropdown-item { border-radius: 8px; padding: 10px 15px; font-size: 14px; } .formation-promo { background: var(--white); border-radius: 15px; overflow: hidden; box-shadow: 0 15px 35px var(--light-shadow); transition: all 0.4s ease; } .formation-promo:hover { transform: translateY(-10px); box-shadow: 0 20px 40px var(--medium-shadow); } .formation-promo img { width: 100%; height: 150px; object-fit: cover; border-radius: 15px 15px 0 0; transition: all 0.5s ease; } .formation-promo:hover img { transform: scale(1.05); } .formation-promo-content { padding: 20px; text-align: center; } .mobile-menu-btn { display: none; background: none; border: none; font-size: 24px; cursor: pointer; color: var(--primary-blue); transition: color 0.3s ease; } .mobile-menu-btn:hover { color: var(--accent-color); } @media (max-width: 1199.98px) { .nav-link { padding: 25px 10px; font-size: 12px; } .mega-dropdown-menu .container { max-width: 100%; padding: 0 15px; } } @media (max-width: 991.98px) { body { padding-top: 70px; } .navbar-esicim { padding: 8px 0; } .navbar-container { flex-wrap: wrap; } .mobile-menu-btn { display: block; order: 1; } .navbar-brand { order: 0; } .nav-menu { display: none; order: 2; width: 100%; flex-direction: column; padding: 15px 0; background-color: var(--white); box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15); max-height: calc(100vh - 70px); overflow-y: auto; } .nav-menu.active { display: flex; } .nav-item { margin: 5px 0; width: 100%; } .nav-link { padding: 12px 15px; font-size: 15px; border-bottom: 1px solid rgba(0, 0, 0, 0.05); } .dropdown-menu, .mega-dropdown-menu { position: static; opacity: 1; visibility: visible; transform: none; box-shadow: none; width: 100%; display: none; padding: 0 0 0 15px; background: transparent; border-left: 2px solid var(--accent-color); } .dropdown.active .dropdown-menu, .mega-dropdown.active .mega-dropdown-menu { display: block; } .mega-dropdown-menu .container { padding: 0; } .mega-dropdown-menu .row { flex-direction: column; margin: 0; } .mega-dropdown-menu [class*="col-"] { padding: 0; margin-bottom: 20px; } .mega-menu-title { font-size: 15px; margin-top: 20px; margin-bottom: 10px; } .dropdown-item { padding: 10px 15px; margin-bottom: 0; } .btn-admission { display: block; width: 100%; margin: 15px 0; padding: 12px 20px; } .formation-promo { margin: 20px 0; width: 100%; } .dropdown-toggle { display: inline-block; width: 30px; text-align: center; cursor: pointer; color: var(--primary-blue); transition: color 0.3s ease; } .dropdown-toggle:hover { color: var(--accent-color); } .loader-logo { width: 150px; } } @media (max-width: 767.98px) { .navbar-container { padding: 10px 15px; } .navbar-brand img { height: 40px; } .nav-link { font-size: 14px; } .dropdown-menu, .mega-dropdown-menu { padding: 5px 0 5px 10px; } .mega-dropdown-menu { max-height: 60vh; overflow-y: auto; } .formation-promo img { height: 120px; } } @media (max-width: 575.98px) { body { padding-top: 60px; } .navbar-container { padding: 8px 10px; } .navbar-brand img { height: 35px; } .nav-link { font-size: 13px; padding: 10px 15px; } .btn-admission { font-size: 12px; padding: 10px 15px; } .loader-logo { width: 120px; margin-bottom: 20px; } .loader-spinner { width: 40px; height: 40px; border-width: 4px; } .mega-dropdown-menu [class*="col-"] { width: 100%; } }
    </style>
</head>
<body>

<div class="page-loader" id="pageLoader">
    <img src="photos/esicimphotooffice.png" alt="ESICIM Academy" class="loader-logo">
    <div class="loader-spinner"></div>
</div>

<nav class="navbar-esicim">
    <div class="navbar-container container">
        <a class="navbar-brand" href="index.php">
            <img src="photos/esicimphotooffice.png" alt="ESICIM Academy">
        </a>
        <button class="mobile-menu-btn" id="mobileMenuBtn"><i class="fas fa-bars"></i></button>
        <ul class="nav-menu" id="navMenu">
            <li class="nav-item"><a class="nav-link <?= is_active('index.php') ?>" href="index.php">Accueil</a></li>
            <li class="nav-item"><a class="nav-link <?= is_active('academy.php') ?>" href="academy.php">ESICIM Academy</a></li>
            
            <li class="nav-item mega-dropdown">
                <div class="d-flex align-items-center">
                    <a class="nav-link <?= is_active('formations.php') ?>" href="formations.php">Formations</a>
                    <span class="dropdown-toggle" id="formationsToggle"><i class="fas fa-chevron-down"></i></span>
                </div>
                <div class="mega-dropdown-menu">
                    <div class="container">
                        
                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <h6 class="mega-menu-title">PÔLE INFORMATIQUE</h6>
                                <?php foreach ($grouped_informatique as $level => $formations) : ?>
                                    <div class="mb-3">
                                        <h6 class="fw-bold mt-3 mb-2 text-primary"><?= htmlspecialchars($level) ?></h6>
                                        <?php foreach ($formations as $formation) : ?>
                                            <a class="dropdown-item" href="<?= htmlspecialchars($formation['href']) ?>">
                                                <i class="fas fa-angle-right me-2 text-primary"></i><?= htmlspecialchars($formation['title']) ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            
                            <div class="col-md-6 col-lg-3">
                                <h6 class="mega-menu-title">PÔLE COMMERCE & MANAGEMENT</h6>
                                <?php foreach ($grouped_commerce as $level => $formations) : ?>
                                    <div class="mb-3">
                                        <h6 class="fw-bold mt-3 mb-2 text-primary"><?= htmlspecialchars($level) ?></h6>
                                        <?php foreach ($formations as $formation) : ?>
                                            <a class="dropdown-item" href="<?= htmlspecialchars($formation['href']) ?>">
                                                <i class="fas fa-angle-right me-2 text-primary"></i><?= htmlspecialchars($formation['title']) ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            
                            <div class="col-md-6 col-lg-3">
                                <h6 class="mega-menu-title">PÔLE COMPTABILITÉ & GESTION</h6>
                                <?php foreach ($grouped_comptabilite as $level => $formations) : ?>
                                    <div class="mb-3">
                                        <h6 class="fw-bold mt-3 mb-2 text-primary"><?= htmlspecialchars($level) ?></h6>
                                        <?php foreach ($formations as $formation) : ?>
                                            <a class="dropdown-item" href="<?= htmlspecialchars($formation['href']) ?>">
                                                <i class="fas fa-angle-right me-2 text-primary"></i><?= htmlspecialchars($formation['title']) ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            
                            <div class="col-md-6 col-lg-3 d-none d-lg-block">
                                <div class="formation-promo">
                                    <div class="overflow-hidden"><img src="photos/esicimphotooffice.png" alt="Formation"></div>
                                    <div class="formation-promo-content">
                                        <h6 class="fw-bold mb-3">Prêt à démarrer ?</h6>
                                        <p class="small text-muted mb-3">Rejoignez nos formations et lancez votre carrière</p>
                                        <a href="demande-info.php" class="btn btn-admission w-100"><i class="fas fa-user-graduate me-2"></i>Demande d'info</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6 col-lg-3">
                                <h6 class="mega-menu-title">PÔLE RECONVERSION PRO</h6>
                                <?php foreach ($grouped_reconversion as $level => $formations) : ?>
                                    <div class="mb-3">
                                        <h6 class="fw-bold mt-3 mb-2 text-primary"><?= htmlspecialchars($level) ?></h6>
                                        <?php foreach ($formations as $formation) : ?>
                                            <a class="dropdown-item" href="<?= htmlspecialchars($formation['href']) ?>">
                                                <i class="fas fa-angle-right me-2 text-primary"></i><?= htmlspecialchars($formation['title']) ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                <h6 class="mega-menu-title">PÔLE SÉCURITÉ & PRÉVENTION</h6>
                                <?php foreach ($grouped_securite as $level => $formations) : ?>
                                    <div class="mb-3">
                                        <h6 class="fw-bold mt-3 mb-2 text-primary"><?= htmlspecialchars($level) ?></h6>
                                        <?php foreach ($formations as $formation) : ?>
                                            <a class="dropdown-item" href="<?= htmlspecialchars($formation['href']) ?>">
                                                <i class="fas fa-angle-right me-2 text-primary"></i><?= htmlspecialchars($formation['title']) ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endforeach; ?>
                                <a href="formations.php" class="btn btn-outline-primary rounded-pill w-100 mt-4"><i class="fas fa-list me-2"></i>Toutes nos formations</a>
                            </div>

                            <div class="col-lg-6 d-none d-lg-block"></div>

                        </div>
                    </div>
                </div>
            </li>
            
            <li class="nav-item dropdown">
                <div class="d-flex align-items-center">
                    <a class="nav-link <?= is_active('etudiants.php') ?>" href="etudiants.php">Étudiants</a>
                    <span class="dropdown-toggle" id="studentsToggle"><i class="fas fa-chevron-down"></i></span>
                </div>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="etudiants-francais.php"><i class="fas fa-user-graduate me-2 text-primary"></i>Étudiants français/européens</a></li>
                    <li><a class="dropdown-item" href="etudiants-etrangers.php"><i class="fas fa-globe-europe me-2 text-primary"></i>Étudiants étrangers</a></li>
                </ul>
            </li>
            <li class="nav-item"><a class="nav-link <?= is_active('tarif.php') ?>" href="tarif.php">Tarif</a></li>
            <li class="nav-item"><a class="nav-link <?= is_active('financement.php') ?>" href="financement.php">Financement</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle btn-admission <?= is_active('admission.php') ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user-graduate me-1"></i>Admission</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="admission.php">Page Admission</a></li>
                    <li><a class="dropdown-item" href="inscription.php">Formulaire d'inscription</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<script>
    // TON JS EST ICI - JE N'AI RIEN CHANGÉ
    function hideLoader() { const loader = document.getElementById('pageLoader'); if (loader) { loader.style.opacity = '0'; setTimeout(() => { loader.style.display = 'none'; }, 500); } } window.addEventListener('load', () => { setTimeout(hideLoader, 1500); }); setTimeout(hideLoader, 5000); window.addEventListener('scroll', function () { const navbar = document.querySelector('.navbar-esicim'); if (window.pageYOffset > 50) { navbar.classList.add('navbar-scrolled'); } else { navbar.classList.remove('navbar-scrolled'); } }); const mobileMenuBtn = document.getElementById('mobileMenuBtn'); const navMenu = document.getElementById('navMenu'); mobileMenuBtn.addEventListener('click', function () { navMenu.classList.toggle('active'); this.innerHTML = navMenu.classList.contains('active') ? '<i class="fas fa-times"></i>' : '<i class="fas fa-bars"></i>'; }); document.querySelectorAll('.dropdown-toggle').forEach(toggle => { toggle.addEventListener('click', function (e) { e.preventDefault(); e.stopPropagation(); const dropdown = this.closest('.dropdown, .mega-dropdown'); const isActive = dropdown.classList.contains('active'); document.querySelectorAll('.dropdown, .mega-dropdown').forEach(item => { item.classList.remove('active'); }); if (!isActive) { dropdown.classList.add('active'); } dropdown.offsetHeight; }); }); document.querySelectorAll('.nav-link').forEach(link => { link.addEventListener('click', function (e) { if (!this.closest('.dropdown, .mega-dropdown') && window.innerWidth < 992) { navMenu.classList.remove('active'); mobileMenuBtn.innerHTML = '<i class="fas fa-bars"></i>'; } }); }); function setupDesktopHover() { if (window.innerWidth >= 992) { document.querySelectorAll('.dropdown, .mega-dropdown').forEach(dropdown => { dropdown.addEventListener('mouseenter', function () { document.querySelectorAll('.dropdown, .mega-dropdown').forEach(d => { if (d !== this) { d.classList.remove('active'); } }); this.classList.add('active'); }); dropdown.addEventListener('mouseleave', function () { this.classList.remove('active'); }); }); } } setupDesktopHover(); window.addEventListener('resize', function () { setupDesktopHover(); if (window.innerWidth < 992) { document.querySelectorAll('.dropdown, .mega-dropdown').forEach(dropdown => { dropdown.classList.remove('active'); }); } });
</script>
</body>
</html>