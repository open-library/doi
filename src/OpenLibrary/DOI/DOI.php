<?php
    /**
     * Created by PhpStorm.
     * User: skhanker
     * Date: 24/07/2015
     * Time: 10:59 AM
     */

    namespace OpenLibrary\DOI;

    use OpenLibrary\DOI\DOI\Factory;
    use OpenLibrary\DOI\RegistrationAgency\DataCite\Profiles\MetadataProfile;
    use Curl\Curl;

    class DOI
    {

        function __construct () { }

        public function resolve ($doi){
            $doi = str_replace("doi:","",$doi);

            # well this is pretty crap here
            $curl = new Curl();
            $curl->get("http://dx.doi.org/{$doi}");

            $curl->close();
        }

        public function create (MetadataProfile $profile, $encoded = false){
            // $profile->getPublisherYear();

            $doiFactory = new Factory();

            return $doiFactory->generate($profile->getPublisherYear(),$profile->getPublisherYear(),$profile->getPublisherYear());// this is wrong
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
