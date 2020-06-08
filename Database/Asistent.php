<?php

class Asistent
{

    private $korisnik;
    private $ime;
    private $prezime;
    private $lozinka;
    private $email;

    public function __construct(
        $korisnik,
        $ime,
        $prezime,
        $lozinka,
        $email
    ) {
        $this->korisnik = $korisnik;
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->lozinka = $lozinka;
        $this->email = $email;
    }

    public function getKorisicko()
    {
        return $this->korisnik;
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

}
