<?php

/**
 * @File : register.php
 * @Brief : Displays register page
 * @Author : Created by Shanshe GUNDISHVILI
 * @Author : Updated by Kevin VAUCHER
 * @Version : 17-02-2021
 */


$title = 'Register';

ob_start();
?>

    <!-- MAIN -->
    <main role="main">
        <!-- Content -->
        <article>
            <header class="section background-primary text-center">
                <h1 class="text-white margin-bottom-0 text-size-50 text-thin text-line-height-1">Register</h1>
            </header>
            <div class="section background-white">
                <div class="line">
                    <div class="margin">

                        <!-- Company Information -->
                        <div class="s-12 m-12 l-6">
                            <h2 class="text-uppercase text-strong margin-bottom-30">Company Information</h2>
                            <div class="float-left">
                                <i class="icon-placepin background-primary icon-circle-small text-size-20"></i>
                            </div>
                            <div class="margin-left-80 margin-bottom">
                                <h4 class="text-strong margin-bottom-0">Company Address</h4>
                                <p>Avenue De La Gare 26,<br>
                                    Sainte-Croix, Vaud,<br>
                                    Switzerland</p>
                            </div>
                            <div class="float-left">
                                <i class="icon-paperplane_ico background-primary icon-circle-small text-size-20"></i>
                            </div>
                            <div class="margin-left-80 margin-bottom">
                                <h4 class="text-strong margin-bottom-0">E-mail</h4>
                                <p>coloswiss@gmail.com</p><br><br>
                            </div>
                            <div class="float-left">
                                <i class="icon-smartphone background-primary icon-circle-small text-size-20"></i>
                            </div>
                            <div class="margin-left-80">
                                <h4 class="text-strong margin-bottom-0">Phone Number</h4>
                                <p>079 895 91 73
                                </p>
                            </div>
                        </div>

                        <!-- Contact Form -->
                        <div class="s-12 m-12 l-6">
                            <h2 class="text-uppercase text-strong margin-bottom-30">Register</h2>
                            <form class="customform" action="../index.php?action=register" method="post">
                                <div class="line">
                                    <div class="margin">
                                        <div class="s-12 m-12 l-6">
                                            <div class="form-group">
                                                <label for="inputEmail">Email address</label>
                                                <input class="form-control" type="email" name="inputUserEmailAddress"
                                                       id="inputEmail" aria-describedby="emailHelp"
                                                       placeholder="firstname@domain.ch" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword">Password</label>
                                                <input class="form-control" type="password" name="inputUserPsw"
                                                       id="inputPassword" placeholder="Password" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputConfirmPassword">Password confirm</label>
                                                <input class="form-control" type="password" name="inputUserPswRepeat"
                                                       id="inputConfirmPassword" placeholder="PasswordConfirm" required>
                                            </div>



                                            <div class="form-group">
                                                <label for="inputUsername">Username</label>
                                                <input class="form-control" type="text" name="inputUsername"
                                                       id="inputUsername" placeholder="Username" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputNumber">Phone number</label>
                                                <input class="form-control" type="text" name="inputNumber"
                                                       id="inputNumber" placeholder="Phone number" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputAddress">Address</label>
                                                <input class="form-control" type="text" name="inputAddress"
                                                       id="inputAddress" placeholder="Address" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputFirstname">Firstname</label>
                                                <input class="form-control" type="text" name="inputFirstname"
                                                       id="inputFirstname" placeholder="Firstname" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputLastname">Lastname</label>
                                                <input class="form-control" type="text" name="inputLastname"
                                                       id="inputLastname" placeholder="Lastname" required>
                                            </div>

                                        </div>
                                    </div><p>
                                    <?php if(isset($registerErrorMessage)): echo $registerErrorMessage?>
                                    <?php elseif(!isset($registerErrorMessage)): ?>
                                        <?php if(isset($registerPswErrorMessage)): echo $registerPswErrorMessage?>

                                        <?php elseif(!isset($registerPswErrorMessage)): ?>

                                        <?php endif; ?>
                                    <?php endif; ?></p>


                                    <div class="s-12 m-12 l-4">
                                        <button class="submit-form button background-primary border-radius text-white"
                                                type="submit">Register
                                        </button>
                                    </div>
                            </form>
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