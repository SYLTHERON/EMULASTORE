<?php include "include/header.php"; ?>
<body>

<?php if(!isset($_GET['sub'])){ ?>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="logo-large" style="padding-left: 15px; padding-top: 50px;"></div>
                <form class="form-horizontal form-login" action="<?= ROOT,CLASSE; ?>account.php" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" name="email" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-block btn-lg btn-primary" name="action" value="Connexion">Se Connecter</button>
                    <button type="button" class="btn btn-block btn-lg btn-default" onclick="window.location.href='index.php?view=login&sub=create_account'">Créer un Compte</button>
                    <a href="index.php?view=login&sub=forgot-password" class="text-center">Impossible de ce connecter ?</a>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
<?php } ?>
<?php if(isset($_GET['sub']) && $_GET['sub'] == 'forgot-password'){ ?>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="logo-large" style="padding-left: 15px; padding-top: 50px;"></div>
                <h1 class="text-center">Récupération de compte</h1>
                <form class="form-horizontal form-login" action="<?= ROOT,CLASSE; ?>account.php" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" name="email" class="form-control">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-block btn-lg btn-primary" name="action" value="forgot-password">Réinitialiser le mot de passe</button>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
<?php } ?>
<?php if(isset($_GET['sub']) && $_GET['sub'] == 'reinit-pass'){ ?>
    <?php
    $email = $_GET['email'];
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="logo-large" style="padding-left: 15px; padding-top: 50px;"></div>
                <h1 class="text-center">Réinitialisation du mot de passe</h1>
                <form class="form-horizontal form-login" action="<?= ROOT,CLASSE; ?>account.php" method="post">
                    <input type="hidden" name="email" value="<?= $email; ?>" />
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="Nouveau Mot de passe">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="password" name="confirm_password" class="form-control" placeholder="Confirmer le mot de passe">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-block btn-lg btn-primary" name="action" value="reinit-pass">Réinitialiser le mot de passe</button>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

<?php } ?>
<?php if(isset($_GET['sub']) && $_GET['sub'] == 'create_account'){ ?>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="logo-large" style="padding-left: 15px; padding-top: 50px;"></div>
                <form class="form-horizontal form-login" action="<?= ROOT,CLASSE; ?>account.php" method="post">
                    <p>Créer votre compte sur emulastore.net</p>
                    <div class="form-group">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Votre nom" name="nom" />
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Votre prénom" name="prenom" />
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Votre adresse E-mail" name="email" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <input type="password" class="form-control" placeholder="Mot de passe" name="password" />
                        </div>
                        <div class="col-md-6">
                            <input type="password" class="form-control" placeholder="Confirmation du mot de passe" name="confirm_password" />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-block btn-lg btn-primary" name="action" value="create_account">Créer un compte</button>
                    <button type="button" class="btn btn-block btn-lg btn-default" onclick="window.location.href='index.php?view=login'">Vous avez déja un compte</button>

                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
<?php } ?>

<!-- START SCRIPT -->
<?php include "include/script_footer.php"; ?>
<link rel="stylesheet" href="<?= ROOT,ASSETS,CSS; ?>login.css">

<?php if(isset($_GET['success']) && $_GET['success'] == 'forgot-password'){ ?>
    <script type="text/javascript">
        toastr.success("La demande à bien été pris en compte.<br>Un email vous à été envoyer","",{
            "positionClass": "toast-top-center"
        })
    </script>
<?php } ?>
<?php if(isset($_GET['success']) && $_GET['success'] == 'reinit-password'){ ?>
    <script type="text/javascript">
        toastr.success("Votre mot de passe à bien été réinitialiser.","",{
            "positionClass": "toast-top-center"
        })
    </script>
<?php } ?>


<?php if(isset($_GET['error']) && $_GET['error'] == 'account'){ ?>
    <script type="text/javascript">
        toastr.error("Le nom d’utilisateur ou le mot de passe sont erronés. Veuillez réessayer.","",{
            "positionClass": "toast-top-center"
        })
    </script>
<?php } ?>
<?php if(isset($_GET['error']) && $_GET['error'] == 'bdd'){ ?>
    <script type="text/javascript">
        toastr.error("Une problèeme dans la base de donnée à eu lieu","",{
            "positionClass": "toast-top-center"
        })
    </script>
<?php } ?>
<?php if(isset($_GET['error']) && $_GET['error'] == 'forgot-password'){ ?>
    <script type="text/javascript">
        toastr.error("Un problème lors de l'envoie du mail de confirmation à eu lieu","",{
            "positionClass": "toast-top-center"
        })
    </script>
<?php } ?>
<?php if(isset($_GET['error']) && $_GET['error'] == 'no_account'){ ?>
    <script type="text/javascript">
        toastr.error("Aucun compte enregister avec cette adresse mail.","",{
            "positionClass": "toast-top-center"
        })
    </script>
<?php } ?>
<?php if(isset($_GET['error']) && $_GET['error'] == 'reinit-password'){ ?>
    <script type="text/javascript">
        toastr.error("La réinitialisation du mot de passe à échoué.","",{
            "positionClass": "toast-top-center"
        })
    </script>
<?php } ?>


<?php if(isset($_GET['warning']) && $_GET['warning'] == 'champs'){ ?>
    <script type="text/javascript">
        toastr.warning("Un ou plusieurs requis ne sont pas remplie","",{
            "positionClass": "toast-top-center"
        })
    </script>
<?php } ?>
<?php if(isset($_GET['warning']) && $_GET['warning'] == 'correspond_pass'){ ?>
    <script type="text/javascript">
        toastr.warning("Les mot de passe entrées ne correspondent pas !","",{
            "positionClass": "toast-top-center"
        })
    </script>
<?php } ?>

<!-- END SCRIPT -->
</body>
</html>