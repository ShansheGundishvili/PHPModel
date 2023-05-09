<?php

/**
 * @File : contact.php
 * @Brief : Displays contact page
 * @Author : Created by Shanshe GUNDISHVILI
 * @Author : Updated by Kevin VAUCHER
 * @Version : 17-02-2021
 */


$title = 'Contacts';

ob_start();
?>

    <!-- MAIN -->
    <main role="main">
        <!-- Content -->
        <article>
            <header class="section background-primary text-center">
                <h1 class="text-white margin-bottom-0 text-size-50 text-thin text-line-height-1">Contacter-nous</h1>
            </header>
            <div class="section background-white">
                <div class="line">
                    <div class="margin">
                        <form class="customform" action="send_email.php" method="post">
                            <div class="line">
                                <div class="margin">
                                    <div class="s-12 m-12 l-6">
                                        <div class="form-group">
                                            <label for="name">Name *</label>
                                            <input class="form-control" type="text" name="name" id="name" placeholder="Enter your name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email *</label>
                                            <input class="form-control" type="email" name="email" id="email" placeholder="Enter your email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="message">Message *</label>
                                            <textarea class="form-control" name="message" id="message" rows="6" placeholder="Enter your message" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button class="submit-form button background-primary border-radius text-white" type="submit">Send Message</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </article>


    </main>
<?php
$content = ob_get_clean();
require 'gabarit.php';
?>