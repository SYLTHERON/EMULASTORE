<?php
DEFINE("ROOT", "http://192.168.1.94/wow/");
DEFINE("ASSETS", "assets/");
DEFINE("CSS", "css/");
DEFINE("IMG", "img/");
DEFINE("JS", "js/");
DEFINE("PLUGINS", "plugins/");
DEFINE("CLASSE", "classe/");

DEFINE("NOM_SITE", "World Of Paradise");
//DATE
$date_jour = date("d-m-Y");
$date_jour_strt = strtotime(date("d-m-Y 00:00"));

$date_jour_heure = date("d-m-Y H:i");
$date_jour_heure_strt = strtotime(date("d-m-Y H:i"));

$heure_jour = date("H:i");

$jour_num = date("N");
$mois_num = date("n");

$jour = date("d");
$semaine = date("W");
$mois = date("m");
$years = date("Y");
$heure = date("H");
$minutes = date("i");
class date_format{
    public function jour_semaine($jour)
    {
        switch($jour)
        {
            case 1: echo "Lundi"; break;
            case 2: echo "Mardi"; break;
            case 3: echo "Mercredi"; break;
            case 4: echo "Jeudi"; break;
            case 5: echo "vendredi"; break;
            case 6: echo "Samedi"; break;
            case 7: echo "Dimanche"; break;
        }
    }

    public function mois($mois)
    {
        switch($mois)
        {
            case 1: echo "Janvier"; break;
            case 2: echo "Février"; break;
            case 3: echo "Mars"; break;
            case 4: echo "Avril"; break;
            case 5: echo "Mai"; break;
            case 6: echo "Juin"; break;
            case 7: echo "Juillet"; break;
            case 8: echo "Aout"; break;
            case 9: echo "Septembre"; break;
            case 10: echo "Octobre"; break;
            case 11: echo "Novembre"; break;
            case 12: echo "Décembre"; break;
        }
    }
    public function formatage($date_format)
    {
        $jour = date("d", $date_format);
        $mois = date("m", $date_format);
        $year = date("Y", $date_format);

        $formatage = $jour." ".$this->mois($mois)." ".$year;
        return $formatage;
    }



}
$date_class = new date_format();
class DB{

    public $host = "localhost";
    public $user = "root";
    public $pass = "1992maxime";
    public $base = "site_wow";

    public function __construct()
    {
        $connect = mysql_connect($this->host, $this->user,$this->pass)or die(header("Location: ../index.php?view=error&code=53112244BDD"));
        $database = mysql_select_db($this->base)or die(header("Location: ../index.php?view=error&code=5419412244BDD"));

    }

    public function database($database)
    {
        $connect = mysql_connect($this->host, $this->user,$this->pass)or die(mysql_error());
        $database = mysql_select_db($database);
    }
}

$db = new DB();
