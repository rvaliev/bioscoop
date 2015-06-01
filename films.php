<?php

use src\ProjectBioscoop\business\FilmsBusiness;
use Doctrine\Common\ClassLoader;


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

$view = $twig->render("films.twig", array("filmLijst" => $filmLijst));
print($view);

