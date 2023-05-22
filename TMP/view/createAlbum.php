<?php

/**
 * @File : login.php
 * @Brief : Displays login page
 * @Author : Created by Shanshe GUNDISHVILI
 * @Author : Updated by Kevin VAUCHER
 * @Version : 17-02-2021
 */


$title = 'Create Album';

ob_start();
?>
<div>
    <form class="customform" action="../index.php?action=createAlbum" method="POST" enctype="multipart/form-data">
        <div class="line">
            <div class="margin">
                <div class="s-12 m-12 l-6">
                    <div class="form-group">
                        <label for="name">name</label>
                        <input class="form-control" type="text" name="name" id="name" placeholder="name" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="details">description</label>
                        <input class="form-control" type="text" name="details" id="details" placeholder="details" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="inputPictures">Photos de l'appartement *</label>
                        <input class="form-control" type="file" name="inputPictures[]" id="inputPictures" accept="image/*" placeholder="Photos" required multiple>
                    </div>
                </div>
            </div>
            <div class="s-12 m-12 l-4"><button class="submit-form button background-primary border-radius text-white" type="submit">create</button></div>
    </form>
</div>

<?php
$content = ob_get_clean();
require 'gabarit.php';
?>