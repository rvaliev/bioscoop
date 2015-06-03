<?php

namespace src\ProjectBioscoop\business;
use src\ProjectBioscoop\data\ReservatiesDAO;

class ReservatiesBusiness
{
    private $reservatiesDAO;
    private $lijst;

    public function overzichtReservaties()
    {
        $this->reservatiesDAO = new ReservatiesDAO();
        $this->lijst = $this->reservatiesDAO->getAll();
        return $this->lijst;
    }

    public function overzichtReservatieByProgrammatieIdEnDatum($programmatieId, $datum)
    {
        $this->reservatiesDAO = new ReservatiesDAO();
        $this->lijst = $this->reservatiesDAO->getReservatieByProgrammatieIdEnDatum($programmatieId, $datum);
        return $this->lijst;
    }


    public function voegNieuweReservatie($userId, $rij, $kolom, $reservatieDatum, $programmatieId, $reservatieCode)
    {
        $this->reservatiesDAO = new ReservatiesDAO();
        $this->lijst = $this->reservatiesDAO->insertNewReservation($userId, $rij, $kolom, $reservatieDatum, $programmatieId, $reservatieCode);
        return $this->lijst;
    }

}