<?php

ob_start();
use Doctrine\Common\ClassLoader;
session_start();

if (isset($_SESSION['reservatieCode']))
{
    /**
     * Load twig template
     */
    require_once("lib/Twig/Autoloader.php");
    Twig_Autoloader::register();
    $loader = new Twig_Loader_Filesystem("src/ProjectBioscoop/presentation");
    $twig = new Twig_Environment($loader);

    $view = $twig->render("checkout.twig", array("reservatieCode" => $_SESSION['reservatieCode']));
    print($view);


    $_SESSION = array();
    unset($_COOKIE[session_name()]);
    session_destroy();


}
else
{
    header("Location: index.php");
}

ob_flush();