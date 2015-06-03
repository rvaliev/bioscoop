<?php

use src\ProjectBioscoop\business\ReservatiesBusiness;
use Doctrine\Common\ClassLoader;

session_start();
require_once'Doctrine/Common/ClassLoader.php';
$classLoader = new ClassLoader("src");
$classLoader->register();


$reservatieObj = new ReservatiesBusiness();
$reservatie = $reservatieObj->voegNieuweReservatie($userId = 1, $rij = 10, $kolom = 10, "2015-06-15", 1, "hkhkhjhjkk");






echo "<pre>";
print_r($lijst);
echo "</pre>";






