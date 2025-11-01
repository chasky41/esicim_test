document.addEventListener('DOMContentLoaded', () => {
    const nextBtns = document.querySelectorAll('.next-btn');
    const prevBtns = document.querySelectorAll('.prev-btn');
    const steps = document.querySelectorAll('.form-step');
    let currentStep = 0;

    // Gère le passage à l'étape suivante
    nextBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            if (currentStep < steps.length - 1) {
                steps[currentStep].classList.remove('active');
                currentStep++;
                steps[currentStep].classList.add('active');
            }
        });
    });

    // Gère le retour à l'étape précédente
    prevBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            if (currentStep > 0) {
                steps[currentStep].classList.remove('active');
                currentStep--;
                steps[currentStep].classList.add('active');
            }
        });
    });

    // Ajout dynamique de champs pour les langues
    const addLangueBtn = document.getElementById('add-langue-btn');
    const languesContainer = document.getElementById('langues-container');
    addLangueBtn.addEventListener('click', () => {
        const newLangueGroup = document.createElement('div');
        newLangueGroup.classList.add('dynamic-group');
        newLangueGroup.innerHTML = `
            <label>Langue</label>
            <input type="text" name="langues[]" placeholder="Ex: Anglais">
            <label>Niveau</label>
            <select name="niveaux[]">
                <option value="">Veuillez sélectionner</option>
                <option value="Assez bien">Assez bien</option>
                <option value="Bien">Bien</option>
                <option value="Très bien">Très bien</option>
                <option value="Courant / Bilingue">Courant / Bilingue</option>
            </select>
        `;
        languesContainer.appendChild(newLangueGroup);
    });

    // Ajout dynamique de champs pour les expériences
    const addExperienceBtn = document.getElementById('add-experience-btn');
    const experiencesContainer = document.getElementById('experiences-container');
    addExperienceBtn.addEventListener('click', () => {
        const newExperienceGroup = document.createElement('div');
        newExperienceGroup.classList.add('dynamic-group');
        newExperienceGroup.innerHTML = `
            <label>Entreprise</label>
            <input type="text" name="entreprises[]">
            <label>Ville</label>
            <input type="text" name="villes_exp[]">
            <label>Fonction</label>
            <input type="text" name="fonctions[]">
            <label>Durée (en mois)</label>
            <input type="text" name="durees[]">
        `;
        experiencesContainer.appendChild(newExperienceGroup);
    });
});