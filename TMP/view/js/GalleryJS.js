
    // Get the modal element
    const modal = document.querySelector('.modal');

    // Get the modal image element
    const modalImg = document.querySelector('.modal-img');

    // Get the close button element
    const closeBtn = document.querySelector('.close-btn');

    // Get all the gallery images
    const galleryImgs = document.querySelectorAll('.gallery img');

    // Loop through the gallery images and attach a click event listener to each one
    galleryImgs.forEach(function(img) {
    img.addEventListener('click', function() {
        // When an image is clicked, set the source of the modal image to the clicked image
        modalImg.src = this.src;

        // Show the modal
        modal.style.display = 'flex';
    });
});

    // Attach a click event listener to the close button
    closeBtn.addEventListener('click', function() {
    // Hide the modal
    modal.style.display = 'none';
});