<?php
    /**
     * Created by PhpStorm.
     * User: skhanker
     * Date: 24/07/2015
     * Time: 10:59 AM
     */

    namespace OpenLibrary\DOI;

    use OpenLibrary\DOI\DOI\Factory;
    use OpenLibrary\DOI\RegistrationAgency\DataCite\Minted;
    use Curl\Curl;

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
        /**
         * @var
         */
        protected $mintedDOI;

        /**
         * @param      $registrantCode
         * @param null $registrantSubdivision
         */
        function __construct ($registrantCode, $registrantSubdivision = null) {
            $this->DOIFactory = new Factory($registrantCode, $registrantSubdivision);
        }

        /**
         * @param $doi
         */
        public function resolve ($doi){
            $doi = str_replace("doi:","",$doi);

            # well this is pretty crap here
            $curl = new Curl();
            $curl->get("http://dx.doi.org/{$doi}");

            $curl->close();
        }

        /**
         * @param $brand
         * @param $unit
         * @param $year
         * @param $url
         *
         * @return \OpenLibrary\DOI\RegistrationAgency\DataCite\Minted
         *
         * This generates a new DOI that is not used within the institution. May need to be called multiple times in case the DOI is, for whatever reason, rejected by the Registration Agency when you try to mint()
         *
         */
        public function generate ($brand, $unit, $year, $url){
            return new Minted($this->DOIFactory->generate($brand, $unit, $year), $url);
        }

        /**
         * @param \OpenLibrary\DOI\RegistrationAgency\DataCite\Minted $minted
         *
         * @return bool|null
         *
         * This attempts to mint the DOI at the remote Registration Agency
         *
         */
        public function mint (Minted $minted) {
            $curl = new Curl();
            $curl->setBasicAuthentication('username', 'password');
            $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
            $curl->setHeader('Content-Type', 'text/plain;charset=UTF-8');
            $curl->post($minted->getAPIEndpoint(), $minted->getPayload());

            $ret = false;
            if ($curl->error) {
                error_log('Error: ' . $curl->error_code . ': ' . $curl->error_message);
            }
            else {
                $ret = $curl->response;
            }
            $curl->close();

            return $ret;
        }



        /* NOPE! SCRAP THIS - POST with doi and url alone, THEN post to metadata after confirming DOI has been delegated, see https://mds.datacite.org/static/apidoc */
        /*
        public function create (MetadataProfile $profile, $encoded = false){
            // $profile->getPublisherYear();

            $doiFactory = new Factory();

            return $doiFactory->generate($profile->getPublisherYear(),$profile->getPublisherYear(),$profile->getPublisherYear());// this is wrong
        }
        */
        /**
         * @param $doi
         *
         * @return mixed
         */
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
