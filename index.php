<?php


session_start();




$_SESSION['errors'] = "";






require_once("lib/Twig/Autoloader.php");
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem("src/ProjectBioscoop/presentation");
$twig = new Twig_Environment($loader);

$view = $twig->render("index.twig", array());
print($view);