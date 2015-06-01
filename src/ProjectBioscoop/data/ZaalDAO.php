<?php

namespace src\ProjectBioscoop\data;
use src\ProjectBioscoop\entities\Zaal;
use src\ProjectBioscoop\data\DBConnect;
use PDO;
use Exception;


class ZaalDAO
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

    public function getZaalById($zaalId)
    {
        self::connectToDB();
        $this->sql = "SELECT * FROM zalen WHERE zaal_id = ?";

        try
        {
            $this->query = $this->handler->prepare($this->sql);
            $this->query->execute(array($zaalId));
            $this->result = $this->query->fetchAll(PDO::FETCH_ASSOC);

            $this->query->closeCursor();
            $this->handler = null;


            return $this->result;
        }
        catch (Exception $e)
        {
            echo "Error: query failure";
            return false;
        }
    }

}