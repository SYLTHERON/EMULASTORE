<?php include "include/header.php"; ?>
<body>
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
            </div>
        </div>
    </div>
    <div id="layout-middle">
        <div class="container">
            <div class="row">
                <?php
                $sql_jeux = mysql_query("SELECT * FROM jeux ")or die(mysql_error());
                while($jeux = mysql_fetch_array($sql_jeux))
                {
                ?>
                <div class="col-md-2 game-column">
                    <div class="home-game-<?= $jeux['diminutif']; ?>" onclick="window.location.href='<?= ROOT; ?><?= $jeux['diminutif']; ?>/index.php?view=index'">
                        <span class="game-title"><?= $jeux['nom_jeux']; ?></span>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
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

<!-- END SCRIPT -->
</body>
</html>