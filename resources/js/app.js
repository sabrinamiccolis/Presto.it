import './bootstrap';

// Initialization for ES Users
import {
    Input,
    Ripple,
    Collapse,
    Carousel,
    Dropdown,
    Tooltip,
    initTE,
  } from "tw-elements";
  
  initTE({ Input, Ripple, Collapse, Carousel, Dropdown, Tooltip});



/* modali per termini e condizioni */
document.addEventListener('DOMContentLoaded', function () {

    setupModals();
    setupModalSearch();
    setupLanguageDropdown();

    let contactButton = document.getElementById('contactButton');
    let exitButton = document.getElementById('exitButton');

    if (contactButton) {
        contactButton.addEventListener('click', toggleContactForm);
    }

    if (exitButton) {
        exitButton.addEventListener('click', toggleContactForm);
    }

});


function setupModals() {
    setupModal();
    setupUserDeletionModal();

    setupModalLinks('termsLink', 'termsModal', 'closeModal', 'Form', 'terms_accepted');
    setupModalLinks('privacyLink', 'privacyModal', 'closePrivacyModal');
}


function setupModal() {
    let contactForm = document.getElementById('registerForm');
    let termsCheckbox = document.getElementById('terms_accepted');


    // Validazione del form
    if (contactForm && termsCheckbox) {
        contactForm.addEventListener('submit', function (e) {
            if (!termsCheckbox.checked) {
                e.preventDefault();
                alert('Devi accettare i Termini, le Condizioni e la Privacy Policy per procedere.');
            }
        });
    }
}


function setupModalLinks(linkId, modalId, linkCloseId, formId, checkboxId) {
    let link = document.getElementById(linkId);
    let modal = document.getElementById(modalId);
    let closeModal = document.getElementById(linkCloseId);
    let form = document.getElementById(formId);
    let checkbox = document.getElementById(checkboxId);

    if (link && modal && closeModal) {
        link.addEventListener('click', function() {
            modal.classList.remove('hidden');
        });
        closeModal.addEventListener('click', function() {
            modal.classList.add('hidden');
        });
    }

    // Validazione del form
    if (form && checkbox) {
        form.addEventListener('submit', function (e) {
            if (!checkbox.checked) {
                e.preventDefault();
                alert('Devi accettare i Termini, le Condizioni e la Privacy Policy per procedere.');
            }
        });
    }
}

function setupUserDeletionModal() {
    let deleteButtons = document.querySelectorAll('.delete-user');
    let deleteForm = document.getElementById('deleteForm');
    let modal = document.getElementById('deleteConfirmationModal');
    let confirmDelete = document.getElementById('confirmDelete');
    let cancelDelete = document.getElementById('cancelDelete');

    if (deleteButtons && deleteForm && modal && confirmDelete && cancelDelete) {
        deleteButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                deleteForm.action = button.getAttribute('data-form-action');
                modal.classList.remove('hidden');
            });
        });

        confirmDelete.addEventListener('click', function () {
            deleteForm.submit();
        });

        cancelDelete.addEventListener('click', function () {
            modal.classList.add('hidden');
        });
    }
}


function setupModalSearch() {
    const activateSearchButton = document.getElementById('activateSearch');
    const searchContainer = document.getElementById('searchContainer');

    activateSearchButton.addEventListener('click', function() {
        searchContainer.classList.toggle('hidden');
        searchContainer.classList.toggle('visible');
    });

    // Listener globale per i click sul documento
    document.addEventListener('click', function(event) {
        // Controlla se il click è fuori dal container di ricerca
        if (!searchContainer.contains(event.target) && !activateSearchButton.contains(event.target)) {
            searchContainer.classList.add('hidden');
            searchContainer.classList.remove('visible');
        }
    });
}

function setupLanguageDropdown() {
    const dropdownButton = document.getElementById('dropdownLanguageButton');
    const dropdownMenu = document.getElementById('dropdownLanguageMenu');


    if (dropdownButton && dropdownMenu) {
        dropdownButton.addEventListener('click', function(event) {
            dropdownMenu.classList.toggle('hidden');
            event.stopPropagation();
        });

        window.addEventListener('click', function(event) {
            if (!event.target.matches('#dropdownLanguageButton') && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    }
}

function toggleContactForm() {
    let form = document.getElementById('contactForm');
    if (form) {
        form.classList.toggle('hidden');
    }
}

document.addEventListener('DOMContentLoaded', function () {

    // Gestione modale cambio ruolo
    const roleChangeModal = document.getElementById('roleChangeModal');
    const cancelRoleChange = document.getElementById('cancelRoleChange');
    const confirmRoleChange = document.getElementById('confirmRoleChange');
    let currentRoleForm = null;

    document.querySelectorAll('.roleChangeTrigger').forEach(button => {
        button.addEventListener('click', () => {
            currentRoleForm = button.closest('form');
            roleChangeModal.classList.remove('hidden');
        });
    });

    confirmRoleChange.addEventListener('click', () => {
        if (currentRoleForm) {
            currentRoleForm.submit();
        }
        roleChangeModal.classList.add('hidden');
    });

    cancelRoleChange.addEventListener('click', () => {
        roleChangeModal.classList.add('hidden');
    });

    // Gestione modale eliminazione utente
    const userDeletionModal = document.getElementById('userDeletionModal');
    const cancelUserDeletion = document.getElementById('cancelUserDeletion');
    const confirmUserDeletion = document.getElementById('confirmUserDeletion');


    document.querySelectorAll('.userDeletionTrigger').forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault(); // Previene l'invio del form
            userDeletionModal.classList.remove('hidden');
            confirmUserDeletion.onclick = () => button.closest('form').submit();
        });
    });

    cancelUserDeletion.addEventListener('click', () => {
        userDeletionModal.classList.add('hidden');
    });

});


document.addEventListener('DOMContentLoaded', function () {
    // Gestione modale eliminazione annuncio
    const announcementDeletionModal = document.getElementById('announcementDeletionModal');
    const cancelAnnouncementDeletion = document.getElementById('cancelAnnouncementDeletion');
    const confirmAnnouncementDeletion = document.getElementById('confirmAnnouncementDeletion');


    document.querySelectorAll('.announcementDeletionTrigger').forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault(); // Previene l'invio del form
            announcementDeletionModal.classList.remove('hidden');
            confirmAnnouncementDeletion.onclick = () => button.closest('form').submit();
        });
    });

    cancelAnnouncementDeletion.addEventListener('click', () => {
        announcementDeletionModal.classList.add('hidden');
    });

});