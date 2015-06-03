<?php

use src\ProjectBioscoop\business\FilmsBusiness;
use src\ProjectBioscoop\exceptions\OngeldigeInputException;
use Doctrine\Common\ClassLoader;
session_start();

$_SESSION['errors'] = "";

$currentDate = date("d/m/Y");

if (isset($_POST['kiesDatum']) && !empty($_POST['gekozenDatum']))
{
    try
    {
        $dateToCheck = explode("/", $_POST['gekozenDatum']);

        /**
         * Check whether choosen date was < current date, otherwise sent user to 'index.php'
         */
        if ($_POST['gekozenDatum'] < $currentDate) throw new OngeldigeInputException();

        if (checkdate($dateToCheck[1], $dateToCheck[0], $dateToCheck[2]))
        {
            $_SESSION['gekozenDatum'] = $_POST['gekozenDatum'];
        }
    }
    catch(OngeldigeInputException $e)
    {
        header("Location: index.php");
    }

}


if (isset($_SESSION['gekozenDatum']))
{
    require_once'Doctrine/Common/ClassLoader.php';
    $classLoader = new ClassLoader("src");
    $classLoader->register();


    $obj = new FilmsBusiness();
    $films = $obj->overzichtFilms();


    foreach ($films as $filmKey => $film)
    {
        $filmLijst[$filmKey]['filmId'] = $film->getFilmId();
        $filmLijst[$filmKey]['filmNaam'] = $film->getFilmNaam();
        $filmLijst[$filmKey]['filmOmschrijving'] = $film->getFilmOmschrijving();
        $filmLijst[$filmKey]['filmImage'] = $film->getFilmImage();
        foreach ($film->getFilmProgrammatie() as $programmatieKey => $programmatie)
        {
            $filmLijst[$filmKey]['filmProgrammatie'][$programmatieKey]['programmatieId'] = $programmatie->getProgrammatieId();
            $filmLijst[$filmKey]['filmProgrammatie'][$programmatieKey]['zaalId'] = $programmatie->getZaalId();
            $filmLijst[$filmKey]['filmProgrammatie'][$programmatieKey]['filmId'] = $programmatie->getFilmId();
            $filmLijst[$filmKey]['filmProgrammatie'][$programmatieKey]['programmatieTijd'] = $programmatie->getProgrammatieTijd();
        }

    }


    require_once("lib/Twig/Autoloader.php");
    Twig_Autoloader::register();
    $loader = new Twig_Loader_Filesystem("src/ProjectBioscoop/presentation");
    $twig = new Twig_Environment($loader);

    $view = $twig->render("films.twig", array("filmLijst" => $filmLijst, "currentTime" => date('H:i'), "currentDate" => $currentDate, "gekozenDatum" => $_SESSION['gekozenDatum']));
    print($view);

}
else
{
    header("Location: index.php");
}

