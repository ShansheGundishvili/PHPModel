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

    <header class="section background-primary text-center">
        <h1 class="text-white margin-bottom-0 text-size-50 text-thin text-line-height-1"><?php echo $album[0]['details']?></h1>
    </header>

<div class="margin-top-bottom-10 padding-2x">

    <select id="dropdown" class="background-primary h1">
        <option value="" selected disabled hidden>images</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
    </select>
        <!-- Content -->
        <div id="gallery" class="gallery"">
            <?php foreach ($images as $image) {?>
            <img src="<?php echo $image['path'] ?>">

            <?php }?>
        </div>


        <div class="modal">
            <div class="modal-content">
                <span class="close-btn">&times;</span>
                <img class="modal-img">
            </div>
        </div>
    <script type="text/javascript" src="/view/js/GalleryJS.js"></script>

</div>
<?php
$content = ob_get_clean();
require 'gabarit.php';
?>