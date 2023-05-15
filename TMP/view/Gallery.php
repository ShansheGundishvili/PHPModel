<?php

/**
 * @File : contact.php
 * @Brief : Displays contact page
 * @Author : Created by Shanshe GUNDISHVILI
 * @Author : Updated by Kevin VAUCHER
 * @Version : 17-02-2021
 */


$title = 'Gallery';

ob_start();
?>


        <!-- Content -->
        <div class="gallery">
            <img src="view/img/blog-01.jpg" alt="Image 1">
            <img src="view/img/blog-02.jpg" alt="Image 3">
            <img src="view/img/blog-03.jpg" alt="Image 2">
            <img src="view/img/blog-04.jpg" alt="Image 4">
            <img src="view/img/blog-05.jpg" alt="Image 5">
            <img src="view/img/blog-06.jpg" alt="Image 6">
        </div>


        <div class="modal">
            <div class="modal-content">
                <span class="close-btn">&times;</span>
                <img class="modal-img">
            </div>
        </div>
    <script type="text/javascript" src="/view/js/GalleryJS.js"></script>
<?php
$content = ob_get_clean();
require 'gabarit.php';
?>