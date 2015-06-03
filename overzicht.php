<?php

use src\ProjectBioscoop\business\FilmsBusiness;
use Doctrine\Common\ClassLoader;
use src\ProjectBioscoop\exceptions\OngeldigeInputException;
ob_start();
session_start();


try {
    /**
     * Load Doctrine autoloader
     */
    require_once'Doctrine/Common/ClassLoader.php';
    $classLoader = new ClassLoader("src");
    $classLoader->register();

    /**
     * If there's no '$_SESSION['programmatie']', which means that hour (within movie) on page 'films.php'
     * wasn't selected, then return user to 'films.php' to make the choice.
     */
    if (!isset($_SESSION['programmatie'])) throw new OngeldigeInputException();

    /**
     * Check whether 'rij' and 'kolom' are provided, otherwise return user to 'films.php' to make the choice.
     */
    if (!isset($_GET['rij']) && !isset($_GET['kolom'])) throw new OngeldigeInputException();

    $_SESSION['gekozenRij'] = $rij = $_GET['rij'];
    $_SESSION['gekozenKolom'] = $kolom = $_GET['kolom'];

    /**
     * Check whether 'rij' and 'kolom' are positive numbers, otherwise return user to 'films.php' to make the choice.
     */
    if ((!is_numeric($rij) && $rij < 1) && (!is_numeric($kolom) && $kolom < 1)) throw new OngeldigeInputException();

    /**
     * Check whether choosen 'rij' and 'kolom' are within the table range
     */
    if(($rij > $_SESSION['zaalInfo']['zaal_rijen']) || $kolom > $_SESSION['zaalInfo']['zaal_kolommen']) throw new OngeldigeInputException();

    /**
     * Check whether choosen 'rij' and 'kolom' aren't already reserved in case if user wants to smart out the code by putting the wrong data by hand
     */
    foreach ($_SESSION['reservaties'] as $reservatie) {
        if(($rij == $reservatie['rij']) && ($kolom == $reservatie['kolom'])) throw new OngeldigeInputException();
    }


    /**
     * Defining values of input fields from form
     */
    if(!isset($_SESSION['voornaam']))
    {
        $_SESSION['voornaam'] = "";
    }

    if(!isset($_SESSION['familienaam']))
    {
        $_SESSION['familienaam'] = "";
    }

    if(!isset($_SESSION['email']))
    {
        $_SESSION['email'] = "";
    }


    /**
     * Load twig template
     */
    require_once("lib/Twig/Autoloader.php");
    Twig_Autoloader::register();
    $loader = new Twig_Loader_Filesystem("src/ProjectBioscoop/presentation");
    $twig = new Twig_Environment($loader);

    $view = $twig->render("overzicht.twig", array("gekozenDatum" => $_SESSION['gekozenDatum'], "rij" => $rij, "kolom" => $kolom, "programmatie" => $_SESSION['programmatie'], "filmNaam" => $_SESSION['filmNaam'], "programmatieTijd" => $_SESSION['programmatieTijd'], "zaalId" => $_SESSION['zaalInfo']['zaal_id'], "errors" => $_SESSION['errors'], "voornaam" => $_SESSION['voornaam'], "familienaam" => $_SESSION['familienaam'], "email" => $_SESSION['email']));
    print($view);


}
catch (OngeldigeInputException $e)
{
    header("Location: films.php");
}


ob_flush();