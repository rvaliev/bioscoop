<?php

use src\ProjectBioscoop\business\ZaalBusiness;
use src\ProjectBioscoop\business\ProgrammatieBusiness;
use src\ProjectBioscoop\business\FilmsBusiness;
use src\ProjectBioscoop\exceptions\ZaalBestaatNietException;
use src\ProjectBioscoop\exceptions\ProgrammatieBestaatNietException;
use src\ProjectBioscoop\business\ReservatiesBusiness;
use Doctrine\Common\ClassLoader;
ob_start();

session_start();

$_SESSION['errors'] = "";

/**
 * Load Doctrine autoloader
 */
require_once'Doctrine/Common/ClassLoader.php';
$classLoader = new ClassLoader("src");
$classLoader->register();

/**
 * Check whether $_GET['programmatie'] exists, and whether $_GET['programmatie'] is a number, and whether $_GET['programmatie'] >= 0
 */
if ((isset($_GET['programmatie'])) && (is_numeric($_GET['programmatie'])) && ($_GET['programmatie'] >= 0) && (isset($_SESSION['gekozenDatum'])))
{
    try
    {
        /**
         * Getting 'Programmatie' row by 'programmatie_id'.
         */
        $programmatieObj = new ProgrammatieBusiness();
        $zaalId = $programmatieObj->overzichtProgrammatieById($_GET['programmatie']);


        /**
         * Check whether 'programmatie' exists or not
         */
        if(empty($zaalId)) throw new ProgrammatieBestaatNietException();

        $filmId = $zaalId[0]['film_id'];
        $programmatieTijd = $zaalId[0]['programmatietijd'];
        $zaalId = $zaalId[0]['zaal_id'];


        /**
         * Getting information about 'Zaal'
         */
        $zaalObj = new ZaalBusiness();
        $zaal = $zaalObj->getZaalGrootte($zaalId);


        /**
         * Throw exception if $zaal is empty, which means it doesn't exist
         */
        if(empty($zaal)) throw new ZaalBestaatNietException();


        /**
         * Getting all fields of 1 film by 'film_id'
         */
        $filmObj = new FilmsBusiness();
        $film = $filmObj->overzichtEenFilm($filmId);
        $_SESSION['filmId'] = $film[0]->getFilmId();
        $_SESSION['filmNaam'] = $film[0]->getFilmNaam();


        /**
         * Checking whether some seats are reserved
         */
        $reservatieObj = new ReservatiesBusiness();
        $reservatieDatum = explode("/", $_SESSION['gekozenDatum']);
        $reservatieDatum = $reservatieDatum[2] . "-" . $reservatieDatum[1] . "-" . $reservatieDatum[0];
        $reservatieLijst = $reservatieObj->overzichtReservatieByProgrammatieIdEnDatum($_GET['programmatie'], $reservatieDatum);
        $reservatieArray = array();

        if (!empty($reservatieLijst))
        {
            foreach ($reservatieLijst as $lijstKey => $lijst)
            {
                $reservatieArray[$lijstKey]['rij'] = $lijst->getZaalRij();
                $reservatieArray[$lijstKey]['kolom'] = $lijst->getZaalKolom();
            }
        }
        $_SESSION['reservaties'] = $reservatieArray;

        /**
         * Store selected (current) '$_GET['programmatie']' into session, for later usage in 'overzicht.php'
         */
        $_SESSION['programmatie'] = $_GET['programmatie'];
        $programmatieUur = explode(":", $programmatieTijd);
        $_SESSION['programmatieTijd'] = $programmatieUur[0].":".$programmatieUur[1];
        $_SESSION['zaalInfo'] = $zaal[0];

        /**
         * Load twig template
         */
        require_once("lib/Twig/Autoloader.php");
        Twig_Autoloader::register();
        $loader = new Twig_Loader_Filesystem("src/ProjectBioscoop/presentation");
        $twig = new Twig_Environment($loader);

        $view = $twig->render("zaal.twig", array("zaal" => $zaal[0], "currentTime" => date('H:i'), "programmatieTijd" => $programmatieUur, "gekozenDatum" => $_SESSION['gekozenDatum'], "filmNaam" => $_SESSION['filmNaam'], "reservaties" => $reservatieArray));
        print($view);
    }
    catch (ZaalBestaatNietException $e)
    {
        echo "Zaal bestaat niet";
        header("Location: films.php");
    }
    catch (ProgrammatieBestaatNietException $e)
    {
        echo "Programmatie bestaat niet";
        header("Location: films.php");
    }
}
else
{
    header("Location: films.php");
}



ob_flush();



