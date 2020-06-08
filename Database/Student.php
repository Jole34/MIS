<?php

class Student
{

    private $korisnik;
    private $brIndeks;
    private $ime;
    private $prezime;
    private $lozinka;
    private $jmbg;
    private $email;
    private $semestar;

    public function __construct(
        $korisnik,
        $brIndeks,
        $ime,
        $prezime,
        $lozinka,
        $jmbg,
        $email,
        $semestar
    ) {
        $this->korisnik = $korisnik;
        $this->brIndeks = $brIndeks;
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->lozinka = $lozinka;
        $this->email = $email;
        $this->jmbg = $jmbg;
        $this->semestar = $semestar;
    }

    public function getKorisicko()
    {
        return $this->korisnik;
    }

    public function getBrIndeks()
    {
        return $this->brIndeks;
    }


    public function getIme()
    {
        return $this->ime;
    }


    public function getPrezime()
    {
        return $this->prezime;
    }


    public function getLozinka()
    {
        return $this->lozinka;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function getJmbg()
    {
        return $this->jmbg;
    }


    public function getSemestar()
    {
        return $this->semestar;
    }
}
