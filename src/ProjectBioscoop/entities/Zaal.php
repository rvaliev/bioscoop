<?php

namespace src\ProjectBioscoop\entities;


class Zaal
{
    private $zaalId;
    private $zaalRijen;
    private $zaalKolommen;



    public function __construct($zaalId, $zaalRijen, $zaalKolommen)
    {
        $this->zaalId = $zaalId;
        $this->zaalRijen = $zaalRijen;
        $this->zaalKolommen = $zaalKolommen;
    }

    public function getZaalId()
    {
        return $this->zaalId;
    }

    public function getZaalRijen()
    {
        return $this->zaalRijen;
    }

    public function getZaalKolommen()
    {
        return $this->zaalKolommen;
    }

}