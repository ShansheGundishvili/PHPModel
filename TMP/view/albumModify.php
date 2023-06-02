<?php



$title = 'Gallery Modify';

ob_start();
?>

    <header class="section background-primary text-center">
        <h1 class="text-white margin-bottom-0 text-size-50 text-thin text-line-height-1"><?php echo $album[0]['details']?></h1>
    </header>
    <form class=" padding-2x customform l-2 center" action="/index.php?action=addImage&albumId=<?php echo $album[0]['id']?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputPictures">images</label>
            <input class="form-control" type="file" name="inputPictures[]" id="inputPictures" accept="image/*" placeholder="Photos" required multiple>
        </div>
        <button class="center text-l-size-16" type="submit">add images</button>
    </form>


    <div class="margin-bottom-10">
        <!-- Content -->







        <div id="gallery" class="gallery grid-template-columns: repeat(4, 1fr);"">

        <?php foreach ($images as $image) {?>
                <div>
                    <img src="<?php echo $image['path'] ?>">
                    <form class="customform" action="/index.php?action=deleteImage&id=<?php echo $image['id'] ?>&albumId=<?php echo $album[0]['id']?>" method="POST">
                        <button class="background-primary" type="submit">Delete Image</button>
                    </form>
                </div>
        <?php }?>
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