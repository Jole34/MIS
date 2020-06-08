<?php
    class SlusanjePredmeta{
        
        private $id;
        private $st;
        private $pred;

        public function __construct($id, $st, $pred)
        {
            $this->id = $id;
            $this->st = $st;
            $this->pred = $pred;
        }

        public function getId(){
            return $this->id;
        }

        public function getSt(){
            return $this->st;
        }

        public function getPred(){
            return $this->pred;
        }
    }

?>