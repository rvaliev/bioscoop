<?php

namespace src\ProjectBioscoop\business;
use src\ProjectBioscoop\data\ProgrammatieDAO;

class ProgrammatieBusiness
{
    private $programmatieDAO;
    private $lijst;

    public function overzichtProgrammatieById($programmatieId)
    {
        $this->programmatieDAO = new ProgrammatieDAO();
        $this->lijst = $this->programmatieDAO->getProgrammatieRecordsById($programmatieId);
        return $this->lijst;
    }

}