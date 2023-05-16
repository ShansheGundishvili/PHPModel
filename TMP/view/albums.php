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

    <!-- MAIN -->
    <main role="main">
        <!-- Content -->
        <article>
            <header class="section background-primary text-center">
                <h1 class="text-white margin-bottom-0 text-size-50 text-thin text-line-height-1">Galleries</h1>
            </header>
            <div class="section background-white">
                <div class="line">
                    <div class="margin">
                        <div>
                            <table>
                                <tr>
                                    <td>User</td>
                                    <td>Gallery name</td>
                                </tr>
                                <?php foreach ($galleries as $gallery){?>
                                <tr class="block-bordered">
                                    <td><?php echo $gallery['username']?></td>id
                                    <td><?php echo $gallery['name']?></td>
                                    <td class="text-center background-dark"><a class="text-white" href="/index.php?action=gallery&id=<?php echo $gallery['id']?>">
                                            <div class="full-width">Visit</div>
                                        </a></td>
                                </tr>
                                <?php }?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </main>
<?php
$content = ob_get_clean();
require 'gabarit.php';
?>