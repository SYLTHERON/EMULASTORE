<?php
session_start();
include "config.php";
if(isset($_SESSION['login']))
{
    $email = $_SESSION['login'];
}else{
    $email = "";
}
include "classe.php";
$info_user = $account_data->info_acount($email);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= NOM_SITE; ?></title>
    <link rel="stylesheet" href="<?= ROOT,ASSETS,CSS; ?>bootstrap.css">
    <link rel="stylesheet" href="<?= ROOT,ASSETS,CSS; ?>bootstrap-theme.css">
    <link rel="stylesheet" href="<?= ROOT,ASSETS,CSS; ?>font-awesome.css">
    <link rel="stylesheet" href="<?= ROOT,ASSETS,CSS; ?>emulastore.css">
    <link rel="stylesheet" href="<?= ROOT,ASSETS,CSS; ?>toastr.css">
    <link rel="shortcut icon" href="<?= ROOT,ASSETS,IMG; ?>favicon.ico"/>
</head>