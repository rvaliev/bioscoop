<?php

namespace src\ProjectBioscoop\entities;


class Users
{
    private $userId;
    private $userVoornaam;
    private $userFamilienaam;
    private $userEmail;


    public function __construct($userId, $userVoornaam, $userFamilienaam, $userEmail)
    {
        $this->userId = $userId;
        $this->userVoornaam = $userVoornaam;
        $this->userFamilienaam = $userFamilienaam;
        $this->userEmail = $userEmail;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getUserVoornaam()
    {
        return $this->userVoornaam;
    }

    public function getUserFamilienaam()
    {
        return $this->userFamilienaam;
    }

    public function getUserEmail()
    {
        return $this->userEmail;
    }

}