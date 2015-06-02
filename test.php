<?php
use src\ProjectBioscoop\business\ReservatiesBusiness;
use Doctrine\Common\ClassLoader;

session_start();
require_once'Doctrine/Common/ClassLoader.php';
$classLoader = new ClassLoader("src");
$classLoader->register();


$reservatieObj = new ReservatiesBusiness();
$reservatieLijst = $reservatieObj->overzichtReservatieByProgrammatieIdEnDatum(1, "2015-06-06");

foreach ($reservatieLijst as $lijsKey => $lijst)
{

    $reservatieArray[$lijsKey]['rij'] = $lijst->getZaalRij();
    $reservatieArray[$lijsKey]['kolom'] = $lijst->getZaalKolom();
}



echo "<pre>";
print_r($reservatieArray);
echo "</pre>";


