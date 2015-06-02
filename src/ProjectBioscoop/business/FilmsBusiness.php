<?php

namespace src\ProjectBioscoop\business;
use src\ProjectBioscoop\data\FilmsDAO;
use src\ProjectBioscoop\data\ProgrammatieDAO;

class FilmsBusiness
{
    private $filmsDAO;
    private $lijst;

    public function overzichtFilms()
    {
        $this->filmsDAO = new FilmsDAO();
        $this->lijst = $this->filmsDAO->getAll();
        return $this->lijst;
    }

    public function overzichtEenFilm($filmId)
    {
        $this->filmsDAO = new FilmsDAO();
        $this->lijst = $this->filmsDAO->getFilmById($filmId);
        return $this->lijst;
    }

}