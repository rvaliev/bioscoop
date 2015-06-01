<?php




if (isset($_POST['kiesDatum']))
{
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
}











require_once("lib/Twig/Autoloader.php");
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem("src/ProjectBioscoop/presentation");
$twig = new Twig_Environment($loader);

$view = $twig->render("index.twig", array());
print($view);