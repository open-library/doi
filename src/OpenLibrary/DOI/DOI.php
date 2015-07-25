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

        public function create ($encoded = false){
            $doi = $this->generate();

            if($encoded){
                $doi = $this->encodeDOI($doi);
            }

            return $doi;
        }

        private function generate () {
            return $this->getPrefix() . "/" . $this->getSuffix();
        }

        private function getPrefix(){
            return implode(".",array_filter([$this->directoryIndicator,$this->registrantCode, $this->registrantSubdivision]));
        }

        private function getSuffix(){
            return "";
        }

        private function encodeDOI($doi){

            $doi= str_replace("/","%2F",$doi);

            # Mandatory
            $doi= str_replace("%","%25",$doi);
            $doi= str_replace('"',"%22",$doi);
            $doi= str_replace("#","%23",$doi);
            $doi= str_replace(" ","%20",$doi);
            $doi= str_replace("?","%3F",$doi);

            # Recommended
            $doi= str_replace("<","%3C",$doi);
            $doi= str_replace(">","%3E",$doi);
            $doi= str_replace("{","%7B",$doi);
            $doi= str_replace("}","%7D",$doi);
            $doi= str_replace("^","%5E",$doi);
            $doi= str_replace("[","%5B",$doi);
            $doi= str_replace("]","%5D",$doi);
            $doi= str_replace("`","%60",$doi);
            $doi= str_replace("|","%7C",$doi);
            $doi= str_replace("\\","%5C",$doi);
            $doi= str_replace("+","%2B",$doi);

            return $doi;
        }
    }
