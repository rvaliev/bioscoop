<?php

namespace src\ProjectBioscoop\business;
use src\ProjectBioscoop\data\UsersDAO;

class UsersBusiness
{
    private $usersDAO;
    private $lijst;

    public function overzichtUsers()
    {
        $this->usersDAO = new UsersDAO();
        $this->lijst = $this->usersDAO->getAll();
        return $this->lijst;
    }


    public function overzichtUserByEmail($userEmail)
    {
        $this->usersDAO = new UsersDAO();
        $this->lijst = $this->usersDAO->getUserByEmail($userEmail);
        return $this->lijst;
    }


    public function creerGebruiker($userVoornaam, $userFamilienaam, $userEmail)
    {
        $this->usersDAO = new UsersDAO();
        $this->lijst = $this->usersDAO->insertNewUser($userVoornaam, $userFamilienaam, $userEmail);
        return $this->lijst;
    }

}