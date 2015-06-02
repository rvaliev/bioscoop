<?php

namespace src\ProjectBioscoop\entities;


class Reservaties
{
    private $reservatieId;
    private $userId;
    private $rij;
    private $kolom;
    private $reservatieDatum;
    private $programmatieId;
    private $reservatieCode;


    public function __construct($reservatieId, $userId, $rij, $kolom, $reservatieDatum, $programmatieId, $reservatieCode)
    {
        $this->reservatieId = $reservatieId;
        $this->userId = $userId;
        $this->rij = $rij;
        $this->kolom = $kolom;
        $this->reservatieDatum = $reservatieDatum;
        $this->programmatieId = $programmatieId;
        $this->reservatieCode = $reservatieCode;
    }

    public function getReservatieId()
    {
        return $this->reservatieId;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getZaalRij()
    {
        return $this->rij;
    }

    public function getZaalKolom()
    {
        return $this->kolom;
    }

    public function getReservatieDatum()
    {
        return $this->reservatieDatum;
    }

    public function getProgrammatieId()
    {
        return $this->programmatieId;
    }

    public function getReservatieCode()
    {
        return $this->reservatieCode;
    }

}