<?php

namespace src\ProjectBioscoop\data;
use src\ProjectBioscoop\entities\Reservaties;;
use src\ProjectBioscoop\data\DBConnect;
use PDO;
use Exception;


class ReservatiesDAO
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
        $this->sql = "SELECT * FROM reservaties";

        try
        {
            $this->query = $this->handler->query($this->sql);
            $this->result = $this->query->fetchAll(PDO::FETCH_ASSOC);

            $this->query->closeCursor();
            $this->handler = null;

            foreach ($this->result as $row)
            {
                $this->lijst[] = new Reservaties($row['reservatie_id'], $row['user_id'], $row['rij'], $row['kolom'], $row['reservatie_datum'], $row['programmatie_id'], $row['reservatie_code']);
            }

            return $this->lijst;
        }
        catch (Exception $e)
        {
            echo "Error: query failure";
            return false;
        }
    }


    public function getReservatieByProgrammatieIdEnDatum($programmatieId, $datum)
    {
        self::connectToDB();
        $this->sql = "SELECT * FROM reservaties WHERE programmatie_id = ? AND reservatie_datum = ?";

        try
        {
            $this->query = $this->handler->prepare($this->sql);
            $this->query->execute(array($programmatieId, $datum));
            $this->result = $this->query->fetchAll(PDO::FETCH_ASSOC);

            $this->query->closeCursor();
            $this->handler = null;

            foreach ($this->result as $row)
            {
                $this->lijst[] = new Reservaties($row['reservatie_id'], $row['user_id'], $row['rij'], $row['kolom'], $row['reservatie_datum'], $row['programmatie_id'], $row['reservatie_code']);
            }
            return $this->lijst;
        }
        catch (Exception $e)
        {
            echo "Error: query failure";
            return false;
        }
    }

}