<div class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a class="logo navbar-brand" href="<?= ROOT; ?>index.php?view=emulastore">
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">Jeux <span class="caret"></span></a>
                    <ul class="dropdown-menu game">
                        <?php
                        $sql_jeux = mysql_query("SELECT * FROM jeux")or die(mysql_error());
                        while($jeux = mysql_fetch_array($sql_jeux))
                        {
                        ?>
                        <li>
                            <a class="nav-item games-icon" href="<?= ROOT; ?><?= $jeux['diminutif']; ?>/index.php?view=index">
                                <div class="nav-icon-<?= $jeux['diminutif']; ?>">
                                    <span class="title"><?= $jeux['nom_jeux']; ?></span>
                                </div>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </li>
                <li><a href="index.php?view=blog">Blog</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="">Assistance</a></li>
                <?php if(!isset($_SESSION['login'])){ ?>
                    <li class="dropdown">
                        <a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">Votre compte <span class="caret"></span></a>
                        <ul class="dropdown-menu text-primary">
                            <li>
                                <div class="nav-box">
                                    <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#login-form">Vous connecter</button>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li><a href="index.php?view=login" class="menu-text">Configuration du compte</a></li>
                        </ul>
                    </li>
                <?php }else{ ?>
                    <li class="dropdown">
                        <a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#"><?= $info_user['username']; ?><span class="caret"></span></a>
                        <ul class="dropdown-menu text-primary">
                            <li>
                                <div class="nav-box">
                                    <div class="label">
                                        <span class="tag"><?= $info_user['username']; ?></span>
                                        <span class="code">#<?= $info_user['emutag']; ?></span>
                                    </div>
                                    <div class="email"><?= $info_user['email']; ?></div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li><a href="index.php?view=account" class="menu-text">Configuration du compte</a></li>
                            <li><a href="<?= ROOT,CLASSE; ?>account.php?action=deconnexion&idaccount=<?= $info_user['idaccount']; ?>" class="menu-text">Déconnexion</a></li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<div class="modal fade login" id="login-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    <div class="logo-large"></div>
                </h4>
            </div>
            <form class="form-horizontal" action="<?= ROOT,CLASSE; ?>account.php" method="post">
                <div class="modal-body">
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
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-block btn-lg btn-primary" name="action" value="Connexion">Se Connecter</button>
                    <button type="button" class="btn btn-block btn-lg btn-default" onclick="window.location.href='index.php?view=login&sub=create_account'">Créer un Compte</button>
                    <a href="index.php?view=login&sub=forgot-password" class="text-center">Impossible de ce connecter ?</a>
                </div>
            </form>
        </div>
    </div>
</div>