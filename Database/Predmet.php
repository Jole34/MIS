<?php

    class Predmet{
        
            private $sifra;
            private $naziv;
            private $asistentId;
            private $profesorId;
            private $semestarId;


            public function __construct($sifra, $naziv, $asistentId, $profesorId, $semestarId) {
                $this->sifra = $sifra;
                $this->naziv = $naziv;
                $this->asistentId = $asistentId;
                $this->profesorId = $profesorId;
                $this->semestarId = $semestarId;
            }

            public function getSifra(){
                return $this->sifra;
            }

            public function getNaziv(){
                return $this->naziv;
            }

            public function getAsistentId(){
                return $this->asistentId;
            }

            public function getProfesorId(){
                return $this->profesorId;
            }

            public function getSemestarId(){
                return $this->semestarId;
            }
    }

?>