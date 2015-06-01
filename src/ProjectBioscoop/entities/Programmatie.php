<?php

namespace src\ProjectBioscoop\entities;


class Programmatie
{
    private $programmatieId;
    private $zaalId;
    private $filmId;
    private $programmatieTijd;


    public function __construct($programmatieId, $zaalId, $filmId, $programmatieTijd)
    {
        $this->programmatieId = $programmatieId;
        $this->zaalId = $zaalId;
        $this->filmId = $filmId;
        $this->programmatieTijd = $programmatieTijd;
    }

    public function getProgrammatieId()
    {
        return $this->programmatieId;
    }

    public function getZaalId()
    {
        return $this->zaalId;
    }

    public function getFilmId()
    {
        return $this->filmId;
    }

    public function getProgrammatieTijd()
    {
        return $this->programmatieTijd;
    }

}