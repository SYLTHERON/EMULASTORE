<?php

/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 25/10/2015
 * Time: 00:11
 */
class account
{

    public function crypted_pass($login, $password)
    {
        $crypted_pass = sha1($login.':'.$password);
        return $crypted_pass;
    }

    public function emutag_gen()
    {
        $emutag = rand(1000, 999999);
        return $emutag;
    }

    public function info_acount($email)
    {
        $sql_account = mysql_query("SELECT * FROM account, account_info WHERE account_info.idacoount = account.idaccount AND account.email = '$email'")or die(mysql_error());
        $account = mysql_fetch_array($sql_account);
        return $account;
    }
}
$account_class = new account();
if(isset($_POST['action']) && $_POST['action'] == 'Connexion')
{
    include "../include/config.php";
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pass_crypt = $account_class->crypted_pass($email, $password);

    if (isset($email) && !empty($email) && isset($password) && !empty($password)) {

        $sql_verif_account = mysql_query("SELECT COUNT(*) FROM account WHERE email = '$email' AND password = '$pass_crypt'")or die(mysql_error());
        $verif_account = mysql_fetch_array($sql_verif_account);

        if($verif_account[0] == 1)
        {
            session_start();
            $remote_ip = $_SERVER['REMOTE_ADDR'];
            $sql_up = mysql_query("UPDATE account SET connect = 1, last_update = '$date_jour_heure_strt', ip_update = '$remote_ip' WHERE email = '$email'")or die(mysql_error());
            $_SESSION['login'] = $email;
            header("Location: ../index.php?view=account");
            exit();
        }elseif($verif_account[0] == 0){
            header("Location: ../index.php?view=login&error=account");
        }else{
            header("Location: ../index.php?view=login&error=bdd");
        }
    }else{
        header("Location: ../index.php?view=login&warning=champs");
    }
}
if(isset($_GET['action']) && $_GET['action'] == 'deconnexion'){
    session_start();
    include "../include/config.php";
    $idaccount = $_GET['idaccount'];

    $sql_up = mysql_query("UPDATE account SET connect = 0 WHERE idaccount = '$idaccount'")or die(mysql_error());
    session_unset();
    session_destroy();
    header("Location: ../index.php?view=emulastore");
}
if(isset($_POST['action']) && $_POST['action'] == 'forgot-password'){
    include "../include/config.php";
    $email = $_POST['email'];

    $sql_verif_account = mysql_query("SELECT COUNT(*) FROM account WHERE email = '$email'")or die(mysql_error());
    $verif_account = mysql_fetch_array($sql_verif_account);

    if($verif_account[0] == 1)
    {
        $to = $email;
        $sujet = "EMULASTORE - Réinitialisation du mot de passe";

        $headers = 'From: EMULASTORE <no-reply@emulastore.net>'."\r\n";
        $headers = 'Mime-Version: 1.0'."\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8'."\r\n";
        $headers .= "\r\n";

        ob_start();
        ?>
            <html>
                <head>

                </head>
                <body>

                    <table style="width: 100%; text-align: center;">
                        <tr>
                            <td><img src="../assets/img/logo-large.png" /></td>
                        </tr>
                    </table>
                    <table style="width: 100%;">
                        <tr>
                            <td>
                                <p>Bonjour,</p>
                                <p>Vous avez demander la réinitialisation de votre mot de passe.<br>Veuillez cliquer sur le lien fournis ci-dessous afin de choisir un nouveau mot de passe.</p>
                                <p><a href="<?= ROOT; ?>index.php?view=login&sub=reinit-pass&email=<?= $email; ?>"><?= ROOT; ?>index.php?view=login&sub=reinit-pass&email=<?= $email; ?></a></p>
                                <p>Si vous n'êtes pas à l'origine de cette demande, veuillez ne pas tenir compte de ce message et avertir directement le staff technique d'Emulastore à l'adresse: abuse@emulastore.net.</p>
                                <p>Une fois votre mot de passe réinserer dans la base de donnée, nous vous suggérons d'utiliser le service authentificateur emuconnect, un service gratuit fournis par google afin de sécuriser votre accès le plus possible.<br>Pour obtenir plus d'info à ce sujet veuillez accéder au support mis en place par emulastore.net</p>
                                <p>Cordialement,<br>L'équipe EMULASTORE</p>
                            </td>
                        </tr>
                    </table>
                </body>
            </html>
        <?php
        $msg = ob_get_contents();
        $mail = mail($to, $sujet, $msg, $headers);

        if($mail === TRUE){
            header("Location: ../index.php?view=login&success=forgot-password");
        }else{
            header("Location: ../index.php?view=login&error=forgot-password");
        }
    }else{
        header("Location: ../index.php?view=login&error=no_account");
    }
}
if(isset($_POST['action']) && $_POST['action'] == 'reinit-pass'){
    include "../include/config.php";
    $email                  = $_POST['email'];
    $password               = $_POST['password'];
    $confirm_password       = $_POST['confirm_password'];

    if($password == $confirm_password){
        $pass_crypt = sha1($email.":".$password);

        $sql_up_pass = mysql_query("UPDATE account SET password = '$pass_crypt' WHERE email = '$email'")or die(mysql_error());

        if($sql_up_pass === TRUE)
        {
            header("Location: ../index.php?view=login&success=reinit-password");
        }else{
            header("Location: ../index.php?view=login&error=reinit-password");
        }
    }else{
        header("Location: ../index.php?view=login&sub=reinit-pass&warning=correspond_pass");
    }
}

if(isset($_POST['action']) && $_POST['action'] == 'active-game-wow')
{
    include "../include/config.php";
    $idaccount      = $_POST['idaccount'];
    $idjeux         = $_POST['idjeux'];

    $sql_account = mysql_query("SELECT * FROM account WHERE idaccount = '$idaccount'")or die(mysql_error());
    $account = mysql_fetch_array($sql_account);
    $username = $account['email'];
    $pass = $account['password'];
    $join_date = date("Y-m-d H:i");

    $sql_jeux = mysql_query("SELECT * FROM jeux WHERE idjeux = '$idjeux'")or die(mysql_error());
    $jeux = mysql_fetch_array($sql_jeux);

    $db->database("realmd");
    $sql_verif_account_wow = mysql_query("SELECT COUNT(*) FROM account WHERE username = '$username'")or die(mysql_error());
    $verif_account_wow = mysql_fetch_array($sql_verif_account_wow);

    if($verif_account_wow[0] == 1)
    {
        header("Location: ../index.php?view=account&error=account_wow_created");
    }else{
        $sql_create_account_wow = mysql_query("INSERT INTO `account`(`id`, `username`, `sha_pass_hash`, `gmlevel`, `sessionkey`, `v`, `s`, `email`, `joindate`, `last_ip`, `failed_logins`, `locked`, `last_login`, `active_realm_id`, `expansion`, `mutetime`, `locale`)
                                              VALUES (NULL,'$username','$pass','0','','0','0','$username','$join_date','','','0','','0','0','0','0')")or die(mysql_error());
    }

    $db->database("site_wow");
    $sql_update_account = mysql_query("UPDATE account_jeux SET etat = 1 WHERE idaccount = '$idaccount' AND idjeux = '$idjeux'")or die(mysql_error());

    if($sql_update_account === TRUE AND $sql_create_account_wow === TRUE)
    {
        header("Location: ../index.php?view=account&success=active-game-wow");
    }else{
        header("Location: ../index.php?view=account&error=active-game-wow");
    }
}