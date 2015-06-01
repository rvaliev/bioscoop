<?php

namespace src\ProjectBioscoop\data;
use src\ProjectBioscoop\entities\Programmatie;
use src\ProjectBioscoop\data\DBConnect;
use PDO;
use DateTime;
use Exception;


class ProgrammatieDAO
{
    private $result;
    private $handler;
    private $sql;
    private $query;
    private $time;

    private $lijst;


    public function __construct()
    {

    }


    private function connectToDB()
    {
        $this->handler = new DBConnect();
        $this->handler = $this->handler->startConnection();
    }

    public function getProgrammatieTijdByFilmId($filmId)
    {
        self::connectToDB();
        $this->sql = "SELECT * FROM programmatie WHERE film_id = ? ORDER BY programmatietijd ASC";

        try
        {
            $this->query = $this->handler->prepare($this->sql);
            $this->query->execute(array($filmId));
            $this->result = $this->query->fetchAll(PDO::FETCH_ASSOC);

            $this->query->closeCursor();
            $this->handler = null;



            foreach ($this->result as $row) {
                $this->time = new DateTime($row['programmatietijd']);
                $row['programmatietijd'] = $this->time->format('H:i');
                $this->lijst[] = new Programmatie($row['programmatie_id'], $row['zaal_id'], $row['film_id'], $row['programmatietijd']);
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