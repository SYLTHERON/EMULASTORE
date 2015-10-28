<?php
if(isset($_GET['view'])) {
    switch ($_GET['view']) {
        case "login":
            include "view/login.php";
            break;

        case "emulastore":
            include "view/emulastore.php";
            break;

        case "blog":
            include "view/blog.php";
            break;

        case "account":
            include "view/account.php";
            break;

        default:
            include "view/emulastore.php";
    }
}else{
    include "view/emulastore.php";
}