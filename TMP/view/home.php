
<?php

/**
 * @File : home.php
 * @Brief : Displays homepage
 * @Author : Created by Shanshe GUNDISHVILI
 * @Author : Updated by Kevin VAUCHER
 * @Version : 17-02-2021
 */


$title = 'home';

ob_start();
?>

<div id="fb-root"></div>

<article>
    <div class="section background-white">
        <div class="line">
            <div class="margin">
                <!-- //<socialMedia> -->
                <!-- //<instagram> -->
                <div class="s-12 m-12 l-6">
                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v16.0" nonce="AOjJLbqX"></script>
                    <div class="fb-page" data-href="https://www.facebook.com/hiphopuniverseyoutube" data-tabs="timeline" data-width="414" data-height="650" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/hiphopuniverseyoutube" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/hiphopuniverseyoutube">Hip-Hop Universe</a></blockquote></div>
                </div>
                <!-- //</instagram> -->
                <!-- //<facebook> -->
                <div class="s-12 m-12 l-6">
                    <div class='sk-instagram-feed' data-embed-id='140788'></div><script src='https://widgets.sociablekit.com/instagram-feed/widget.js' async defer></script>
                </div>
                <!-- //</facebook> -->
                <!-- //</socialMedia> -->

            </div>
        </div>
    </div>
</article>



<?php
$content = ob_get_clean();
require 'gabarit.php';
?>
