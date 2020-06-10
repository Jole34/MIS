<?php

class Anketa
{

    private $id;
    private $naziv;
    private $rez;
    private $popunjena;
    private $semestar;

    public function __construct(
        $id,
        $naziv,
        $rez,
        $popunjena,
        $semestar
    ) {
        $this->id = $id;
        $this->naziv = $naziv;
        $this->rez = $rez;
        $this->popunjena = $popunjena;
        $this->semestar = $semestar;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNaziv()
    {
        return $this->naziv;
    }


    public function getRez()
    {
        return $this->rez;
    }


    public function getPopunjena()
    {
        return $this->popunjena;
    }


    public function getSemestar()
    {
        return $this->semestar;
    }
}
