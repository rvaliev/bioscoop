<?php

use src\ProjectBioscoop\business\ZaalBusiness;
use src\ProjectBioscoop\exceptions\ZaalBestaatNietException;
use Doctrine\Common\ClassLoader;


require_once'Doctrine/Common/ClassLoader.php';
$classLoader = new ClassLoader("src");
$classLoader->register();

try
{
    $zaalId = 3;

    $obj = new ZaalBusiness();
    $zaal = $obj->getZaalGrootte($zaalId);

    if(empty($zaal)) throw new ZaalBestaatNietException();
}
catch (ZaalBestaatNietException $e)
{
    /**
     * todo: redirect user if Zaal doesn't exist
     */
    echo "Zaal bestaat niet";
}






echo "<pre>";
print_r($zaal);
echo "</pre>";


