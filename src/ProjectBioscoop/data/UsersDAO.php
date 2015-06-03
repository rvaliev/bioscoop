<?php

namespace src\ProjectBioscoop\data;
use src\ProjectBioscoop\entities\Users;
use src\ProjectBioscoop\data\DBConnect;
use PDO;
use Exception;


class UsersDAO
{
    private $result;
    private $handler;
    private $sql;
    private $query;

    private $lijst;


    public function __construct()
    {

    }


    private function connectToDB()
    {
        $this->handler = new DBConnect();
        $this->handler = $this->handler->startConnection();
    }

    public function getAll()
    {
        self::connectToDB();
        $this->sql = "SELECT * FROM users";

        try
        {
            $this->query = $this->handler->query($this->sql);
            $this->result = $this->query->fetchAll(PDO::FETCH_ASSOC);

            $this->query->closeCursor();
            $this->handler = null;

            foreach ($this->result as $row)
            {
                $this->lijst[] = new Users($row['user_id'], $row['user_voornaam'], $row['user_familienaam'], $row['user_email']);
            }

            return $this->lijst;
        }
        catch (Exception $e)
        {
            echo "Error: query failure";
            return false;
        }
    }




    public function getUserByEmail($userEmail)
    {
        self::connectToDB();
        $this->sql = "SELECT * FROM users WHERE user_email = ?";

        try
        {
            $this->query = $this->handler->prepare($this->sql);
            $this->query->execute(array($userEmail));
            $this->result = $this->query->fetchAll(PDO::FETCH_ASSOC);

            $this->query->closeCursor();
            $this->handler = null;

            foreach ($this->result as $row)
            {
                $this->lijst[] = new Users($row['user_id'], $row['user_voornaam'], $row['user_familienaam'], $row['user_email']);
            }
            return $this->lijst;
        }
        catch (Exception $e)
        {
            echo "Error: query failure";
            return false;
        }
    }



    public function insertNewUser($userVoornaam, $userFamilienaam, $userEmail)
    {
        self::connectToDB();
        $this->sql = "INSERT INTO users (user_voornaam, user_familienaam, user_email) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE user_id=LAST_INSERT_ID(user_id)";

        try
        {
            $this->query = $this->handler->prepare($this->sql);
            $this->query->execute(array($userVoornaam, $userFamilienaam, $userEmail));
//            $this->result = $this->query->fetchAll(PDO::FETCH_ASSOC);
            $lastInsertedOrderId = $this->handler->lastInsertId('user_id'); // Getting the id from last entry

            $this->query->closeCursor();
            $this->handler = null;

            return $lastInsertedOrderId;
//            return $this->result;
        }
        catch (Exception $e)
        {
            echo "Error: query failure users";
            return false;
        }
    }

}