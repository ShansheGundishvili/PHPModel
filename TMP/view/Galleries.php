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
                <h1 class="text-white margin-bottom-0 text-size-50 text-thin text-line-height-1">My Quizzes</h1>
            </header>
            <h4 class="text-strong margin-bottom-0">My Quizzes</h4>
            <table>

                <tr>
                    <td>Name</td>
                    <td>Level</td>
                    <td>Code</td>
                </tr>
                    <tr class="block-bordered">
                        <td>hello1</td>
                        <td>hello11</td>
                        <td>hello111</td>
                        <td class="text-center background-primary"><a class="text-white"
                                                                      href="/index.php?action=play&code=123">
                                <div class="full-width">Play</div>
                            </a></td>
                        <td class="text-center background-dark"><a class="text-white"
                                                                   href="/index.php?action=stats&code=123">
                                <div class="full-width">Stats</div>
                            </a></td>
                    </tr>
            </table>
        </article>
    </main>
<?php
$content = ob_get_clean();
require 'gabarit.php';
?>