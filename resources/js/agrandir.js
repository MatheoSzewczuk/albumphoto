// Fonction pour gérer le clic sur une photo
function togglePhotoSize(photoElement) {
    // Vérifie si la photo a déjà la classe "en-grand"
    if (photoElement.classList.contains('en-grand')) {
      // Si oui, on la remet à sa taille normale
      photoElement.classList.remove('en-grand');
    } else {
      // Sinon, on l'agrandit
      photoElement.classList.add('en-grand');
    }
  }
  
  // Ajout d'écouteurs d'événements à toutes les images avec la classe "photo"
  document.querySelectorAll('.photo').forEach(photo => {
    photo.addEventListener('click', function () {
      togglePhotoSize(this);
    });
  });