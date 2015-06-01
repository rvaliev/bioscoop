<?php

use src\ProjectBioscoop\business\ZaalBusiness;
use src\ProjectBioscoop\business\ProgrammatieBusiness;
use src\ProjectBioscoop\exceptions\ZaalBestaatNietException;
use Doctrine\Common\ClassLoader;

/**
 * Load Doctrine autoloader
 */
require_once'Doctrine/Common/ClassLoader.php';
$classLoader = new ClassLoader("src");
$classLoader->register();

/**
 * Check if $_GET['programmatie'] exists, and if $_GET['programmatie'] is a number, and if $_GET['programmatie'] >= 0
 */
if ((isset($_GET['programmatie'])) && (is_numeric($_GET['programmatie'])) && ($_GET['programmatie'] >= 0))
{
    try
    {
        /**
         * Getting 'Programmatie' row by 'programmatie_id'.
         */
        $programmatieObj = new ProgrammatieBusiness();
        $zaalId = $programmatieObj->overzichtProgrammatieById($_GET['programmatie']);
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



        require_once("lib/Twig/Autoloader.php");
        Twig_Autoloader::register();
        $loader = new Twig_Loader_Filesystem("src/ProjectBioscoop/presentation");
        $twig = new Twig_Environment($loader);

        $view = $twig->render("zaal.twig", array("zaal" => $zaal[0], "currentTime" => date('H:i')));
        print($view);
    }
    catch (ZaalBestaatNietException $e)
    {
        /**
         * todo: redirect user if Zaal doesn't exist
         */
        echo "Zaal bestaat niet";
    }
}
else
{
    header("Location: films.php");
}






