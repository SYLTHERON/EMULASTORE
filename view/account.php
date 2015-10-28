<?php include "include/header.php"; ?>
<?php
$idaccount = $info_user['idaccount'];
?>
<body>
    <?php if(!isset($_GET['sub'])){ ?>
    <div id="layout-top">
        <?php include "include/navbar.php"; ?>
    <div class="jumbotron">
        <div class="container">
            <div class="row header-jumb">
                <div class="col-md-6">
                    <a href=""><div class="logo-large"></div></a>
                </div>
                <div class="col-md-6">
                    <div class="search-bar">
                        <form action="" method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Rechercher sur le site">
                                      <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit" name="action" value="search-emu"><i class="fa fa-search"></i></button>
                                      </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="menu-emulastore">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand menu-title">COMPTE</a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="#">Sommaire <span class="sr-only">(current)</span></a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuration <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Jeux <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Historique des Achats <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sécurité <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 0,00 € <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </div>
        </div>
    </div>
</div>
<div id="layout-middle">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div id="info_account">
                        <div class="title">D&Eacute;TAIL DU COMPTE</div>
                        <h4 class="subcategory">Nom du compte</h4>
                        <p><?= $info_user['email']; ?></p>
                        <h4 class="subcategory">Nom</h4>
                        <p><?= $info_user['prenom']; ?> <?= substr($info_user['nom'], 1); ?></p>
                        <h4 class="subcategory">EMUtag</h4>
                        <p><?= $info_user['username']; ?>#<?= $info_user['emutag']; ?></p>
                    </div>
                    <div id="info_account">
                        <div class="title">S&Eacute;CURIT&Eacute; DES COMPTES</div>
                        <h4 class="subcategory">Vérifié</h4>
                        <p><?php if($info_user['verif_account'] == 0){echo "<i class='fa fa-times text-danger'></i> Non vérifié";}else{echo "<i class='fa fa-check text-success'></i> Vérifié";} ?></p>
                        <h4 class="subcategory">Authentificateur</h4>
                        <p><?php if($info_user['auth'] == 0){echo "<i class='fa fa-times text-danger'></i> Pas d'Authentificateur";}else{echo "<i class='fa fa-check text-success'></i> Authentificateur activé";} ?></p>

                    </div>
                </div>
                <div class="col-md-4">
                    <div id="info_account">
                        <div class="title">VOS COMPTE DE JEUX</div>
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <?php
                            $sql_jeux = mysql_query("SELECT * FROM account_jeux, jeux WHERE account_jeux.idjeux = jeux.idjeux AND account_jeux.idaccount = '$idaccount'")or die(mysql_error());
                            while($acc_jeux = mysql_fetch_array($sql_jeux))
                            {
                                ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?= $acc_jeux['idjeux']; ?>" aria-expanded="true" aria-controls="collapseOne">
                                                <?= $acc_jeux['nom_jeux']; ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="<?= $acc_jeux['idjeux']; ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <?php if($acc_jeux['etat'] == 0){ ?>
                                                <div id="info_jeu_disabled" data-toggle="tooltip" title="Activer votre <?= $acc_jeux['nom_jeux']; ?>">
                                                    <div class="row">
                                                        <div class="col-md-2 game-image">
                                                            <img src="<?= ROOT,ASSETS,IMG; ?><?= $acc_jeux['diminutif']; ?>-logo-32.png" />
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="game-title"><?= $acc_jeux['nom_jeux']; ?></div>
                                                            <div class="game-extension"><?php if(!empty($acc_jeux['extension'])){echo $acc_jeux['extension'];} ?></div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="active-game"><button type="button" data-toggle="modal" data-target="#active-game-<?= $acc_jeux['diminutif']; ?>"><i class="fa fa-chevron-right"></i></button> </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade <?= $acc_jeux['diminutif']; ?>" id="active-game-<?= $acc_jeux['diminutif']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" id="myModalLabel">
                                                                    <div class="logo-<?= $acc_jeux['diminutif']; ?>"></div>
                                                                </h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class="text-modal text-center">Vous allez liés votre compte EMULASTORE avec le Service: <strong><?= $acc_jeux['nom_jeux']; ?></strong>.<br>Cette liaison est définitive, êtes-vous sur de continuer</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="<?= ROOT,CLASSE; ?>account.php" method="post">
                                                                    <input type="hidden" name="idaccount" value="<?= $idaccount; ?>" />
                                                                    <input type="hidden" name="idjeux" value="<?= $acc_jeux['idjeux']; ?>" />
                                                                    <button type="submit" class="btn btn-success" name="action" value="active-game-<?= $acc_jeux['diminutif']; ?>"><i class="fa fa-check"></i> Oui</button>
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Non</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php }else{ ?>
                                                <div id="info_jeu">
                                                    <div class="row">
                                                        <div class="col-md-2 game-image">
                                                            <img src="<?= ROOT,ASSETS,IMG; ?><?= $acc_jeux['diminutif']; ?>-logo-32.png" />
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="game-title"><?= $acc_jeux['nom_jeux']; ?></div>
                                                            <div class="game-extension"><?php if(!empty($acc_jeux['extension'])){echo $acc_jeux['extension'];} ?></div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <button type="button" class="btn" onclick="window.location.href='index.php?view=account&sub=game&idjeux=<?= $acc_jeux['idjeux']; ?>'"><i class="fa fa-chevron-right"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
    <?php } ?>
    <?php if(isset($_GET['sub']) && $_GET['sub'] == 'game'){ ?>
        <?php
        $idjeux = $_GET['idjeux'];
        $username = $info_user['email'];
        $sql_select_jeux = mysql_query("SELECT * FROM account_jeux WHERE idjeux = '$idjeux' AND idaccount = '$idaccount'")or die(mysql_error());
        $select_jeux = mysql_fetch_array($sql_select_jeux);

        $sql_jeux = mysql_query("SELECT * FROM jeux WHERE idjeux = '$idjeux'")or die(mysql_error());
        $jeux = mysql_fetch_array($sql_jeux);

        $db->database("realmd");
        $sql_realmd = mysql_query("SELECT * FROM account WHERE realmd.account.username = '$username'")or die(mysql_error());
        $realmd = mysql_fetch_array($sql_realmd);
        $db->database("site_wow");
        ?>
        <div id="layout-top">
            <?php include "include/navbar.php"; ?>
        <div class="jumbotron">
        <div class="container">
            <div class="row header-jumb">
                <div class="col-md-6">
                    <a href=""><div class="logo-large"></div></a>
                </div>
                <div class="col-md-6">
                    <div class="search-bar">
                        <form action="" method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Rechercher sur le site">
                                      <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit" name="action" value="search-emu"><i class="fa fa-search"></i></button>
                                      </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="menu-emulastore">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand menu-title">COMPTE</a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li><a href="#">Sommaire <span class="sr-only">(current)</span></a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuration <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown active">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Jeux <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Historique des Achats <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sécurité <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 0,00 € <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </div>
        </div>
    </div>
</div>
<div id="layout-middle">
    <div class="container game-card">
        <div class="row">
            <div class="col-md-12">
                <div id="game-card">

                </div>
            </div>
        </div>
    </div>
</div>
    <?php } ?>
<div id="layout-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <img src="assets/img/logo.png" />
                &copy; 2015 Emulastore
            </div>
        </div>
    </div>
</div>

<!-- START SCRIPT -->
<?php include "include/script_footer.php"; ?>
<link rel="stylesheet" href="<?= ROOT,ASSETS,CSS; ?>account.css">
<link rel="stylesheet" href="<?= ROOT,ASSETS,PLUGINS; ?>toastr/toastr.css">
<script type="text/javascript" src="<?= ROOT,ASSETS,PLUGINS; ?>toastr/toastr.js"></script>

<?php if(isset($_GET['success']) && $_GET['success'] == 'active-game-wow'){ ?>
<script type="text/javascript">
    toastr.success("Votre jeux à été activé.", "Activation du jeux", {
        "postionClass": "toast-top-center"
    })
</script>
<?php } ?>

<?php if(isset($_GET['error']) && $_GET['error'] == 'active-game-wow'){ ?>
    <script type="text/javascript">
        toastr.error("Une erreur à eu lieu lors de l'activation", "Activation du jeux", {
            "postionClass": "toast-top-center"
        })
    </script>
<?php } ?>

<!-- END SCRIPT -->
</body>
</html>