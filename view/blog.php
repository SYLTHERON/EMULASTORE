<?php include "include/header.php"; ?>
<body>

<div id="layout-top">
    <?php include "include/navbar.php"; ?>
    <div class="sector-page">BLOG</div>
</div>
<div id="layout-middle">
    <?php if(!isset($_GET['sub'])){ ?>
        <div class="container">
            <ol class="breadcrumb">
                <li>ACCUEIL</li>
                <li>Liste des Articles</li>
            </ol>
            <h1>Actualité</h1>
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        <?php
                        $sql_jeux = mysql_query("SELECT * FROM jeux ORDER BY nom_jeux ASC")or die(mysql_error());
                        while($jeux = mysql_fetch_array($sql_jeux))
                        {
                            ?>
                            <li class="list-group-item" onclick="window.location.href='index.php?view=blog&sub=list_article&action=<?= $jeux['idjeux']; ?>'" style="cursor: url('assets/cursor/cursor-hyperlink.cur'), pointer;"><div class="nav-icon-<?= $jeux['diminutif']; ?>"> <span class="title"><?= $jeux['nom_jeux']; ?></span></div></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="col-md-8">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>Actualité Général</h2>
                                <ul class="list-article">
                                    <?php
                                    $sql_news = mysql_query("SELECT * FROM news_emu, jeux WHERE news_emu.jeux = jeux.idjeux ORDER BY date_news ASC")or die(mysql_error());
                                    while($news = mysql_fetch_array($sql_news))
                                    {
                                        ?>
                                        <li class="article" onclick="window.location.href='index.php?view=blog&sub=article&idnews=<?= $news['idnews']; ?>'"><div class="nav-icon-<?= $news['diminutif']; ?>"> <span class="title"><?= html_entity_decode($news['titre_news']); ?></span></div></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php if(isset($_GET['sub']) && $_GET['sub'] == 'article'){ ?>
        <?php
        $idnews = $_GET['idnews'];
        $sql_news = mysql_query("SELECT * FROM news_emu WHERE idnews = '$idnews'")or die(mysql_error());
        $news = mysql_fetch_array($sql_news);
        ?>
        <div class="container">
            <ol class="breadcrumb">
                <li>Accueil</li>
                <li>Article</li>
                <li class="active"><?= html_entity_decode($news['titre_news']); ?></li>
            </ol>
            <div class="row">
                <div class="col-md-12">
                    <div id="blog">
                        <div class="header">
                            <span class="left"><?= html_entity_decode($news['titre_news']); ?></span>
                            <div class="right"><strong>Date d'ajout:</strong> <?= date("d", $news['date_news']); ?> <?= $date_class->mois(date("n", $news['date_news'])); ?> <?= date("Y", $news['date_news']); ?></div>
                        </div>
                        <div class="body">
                            <?= html_entity_decode($news['contenue_news']); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php if(isset($_GET['sub']) && $_GET['sub'] == 'list_article'){ ?>
        <?php
        $jeux = $_GET['action'];
        ?>
        <div class="container">
            <ol class="breadcrumb">
                <li>ACCUEIL</li>
                <li>Liste des Articles</li>
            </ol>
            <h1>Actualité</h1>
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        <?php
                        $sql_jeux = mysql_query("SELECT * FROM jeux ORDER BY nom_jeux ASC")or die(mysql_error());
                        while($jeux = mysql_fetch_array($sql_jeux))
                        {
                            ?>
                            <li class="list-group-item" onclick="window.location.href='index.php?view=blog&sub=list_article&action=<?= $jeux['idjeux']; ?>'" style="cursor: url('assets/cursor/cursor-hyperlink.cur'), pointer;"><div class="nav-icon-<?= $jeux['diminutif']; ?>"> <span class="title"><?= $jeux['nom_jeux']; ?></span></div></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="col-md-8">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>Actualité Général</h2>
                                <ul class="list-article">
                                    <?php
                                    $sql_news = mysql_query("SELECT * FROM news_emu WHERE jeux = '$jeux'")or die(mysql_error());
                                    while($news = mysql_fetch_array($sql_news))
                                    {
                                        ?>
                                        <li class="article" onclick="window.location.href='index.php?view=blog&sub=article&idnews=<?= $news['idnews']; ?>'"><div class="nav-icon-<?= $news['diminutif']; ?>"> <span class="title"><?= html_entity_decode($news['titre_news']); ?></span></div></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>
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
<link rel="stylesheet" href="<?= ROOT,ASSETS,CSS; ?>blog.css">

<!-- END SCRIPT -->
</body>
</html>