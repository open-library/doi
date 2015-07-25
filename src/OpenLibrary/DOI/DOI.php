<?php
    /**
     * Created by PhpStorm.
     * User: skhanker
     * Date: 24/07/2015
     * Time: 10:59 AM
     */

    namespace OpenLibrary\DOI;

    class DOI
    {

        private $directoryIndicator = 10;

        private $registrantCode;

        private $registrantSubdivision;

        function __construct ($rc = null, $sd = null)
        {
            $this->registrantCode = $rc;
            $this->registrantSubdivision = $sd;
        }

        public function resolve ($doi){

        }

        public function create () {
            return $this->getPrefix();
        }

        private function getPrefix(){
            return implode(".",array_filter([$this->directoryIndicator,$this->registrantCode, $this->registrantSubdivision, "%2F"]));
        }
    }
