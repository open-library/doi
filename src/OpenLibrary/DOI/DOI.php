<?php
    /**
     * Created by PhpStorm.
     * User: skhanker
     * Date: 24/07/2015
     * Time: 10:59 AM
     */

    namespace OpenLibrary\DOI;

    use OpenLibrary\DOI\DOI\Factory;

    /**
     * Class DOI
     *
     * @package OpenLibrary\DOI
     */
    class DOI
    {

        /**
         * @var \OpenLibrary\DOI\DOI\Factory
         */
        protected $DOIFactory;

        function __construct ($registrantCode, $registrantSubdivision = null) {
            $this->DOIFactory = new Factory($registrantCode, $registrantSubdivision);
        }

        private function encodeDOI($doi){

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

            # Replace / with %2F
            $doi= str_replace("/","%2F",$doi);

            return $doi;
        }
    }
