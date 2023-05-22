<?php

/**
 * @File : login.php
 * @Brief : Displays login page
 * @Author : Created by Shanshe GUNDISHVILI
 * @Author : Updated by Kevin VAUCHER
 * @Version : 17-02-2021
 */


$title = 'modify my account';

ob_start();
?>
<!-- MAIN -->
<main role="main">
    <!-- Content -->
    <article>
        <header class="section background-primary text-center">
            <h1 class="text-white margin-bottom-0 text-size-50 text-thin text-line-height-1">Créer une annonce</h1>
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
                        <h2 class="text-uppercase text-strong margin-bottom-30">Formulaire</h2>

                        <form class="customform" action="../index.php?action=modifyUser" method="POST" enctype="multipart/form-data">
                            <div class="line">
                                <div class="margin">
                                    <div class="s-12 m-12 l-6">
                                        <div class="form-group">
                                            <label for="inputEmail">Email address</label>
                                            <input class="form-control" type="email" name="inputUserEmailAddress"
                                                   id="inputEmail" aria-describedby="emailHelp"
                                                   value="<?php echo $userInfo['email'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputUsername">Username</label>
                                            <input class="form-control" type="text" name="inputUsername"
                                                   id="inputUsername" value="<?php echo $userInfo['username'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputNumber">Phone number</label>
                                            <input class="form-control" type="text" name="inputNumber"
                                                   id="inputNumber" value="<?php echo $userInfo['NUMBER'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputAddress">Address</label>
                                            <input class="form-control" type="text" name="inputAddress"
                                                   id="inputAddress" value="<?php echo $userInfo['address'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputFirstname">Firstname</label>
                                            <input class="form-control" type="text" name="inputFirstname"
                                                   id="inputFirstname" value="<?php echo $userInfo['firstname'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputLastname">Lastname</label>
                                            <input class="form-control" type="text" name="inputLastname"
                                                   id="inputLastname" value="<?php echo $userInfo['lastname'] ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                <?php if(isset($errorMessage)){echo $errorMessage;}?>

                                <div class="s-12 m-12 l-4"><button class="submit-form button background-primary border-radius text-white" type="submit">Modify User</button></div>
                        </form>

                        <form class="customform" action="../index.php?action=modifyPassword" method="POST" enctype="multipart/form-data">
                            <div class="line">
                                <div class="margin">
                                    <div class="s-12 m-12 l-6">
                                        <div class="form-group">
                                            <label for="inputAddress">Mot de passe *</label>
                                            <input class="form-control" type="password" name="inputUserPsw" id="inputUserPsw" placeholder="Password" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Repeat the Password *</label>
                                            <input class="form-control" type="password" name="inputUserPswRepeat" id="inputUserPswRepeat" placeholder="Repeat the Password" value="" required>
                                        </div>

                                    </div>
                                </div>
                                <p><?php if(isset($errorMessage)){echo $errorMessage;}?></p>
                                <div class="s-12 m-12 l-4"><button class="submit-form button background-primary border-radius text-white" type="submit">Modify Password</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </article>

<?php
$content = ob_get_clean();
require 'gabarit.php';
?>
