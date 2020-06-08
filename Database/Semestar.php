<?php


    class Semestar{

        private $naziv;
        private $godina;

        public function __construct($naziv, $godina)
        {   
                $this->naziv = $naziv;
                $this->godina = $godina;
        }


        public function getNaziv(){
            return $this->naziv;
        }

        public function getGodina(){
            return $this->godina;
        }
    }
