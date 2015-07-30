<?php
    /**
     * Created by PhpStorm.
     * User: hajime
     * Date: 15-07-29
     * Time: 22:46
     */
    namespace OpenLibrary\DOI\RegistrationAgency\DataCite;

    class Minted extends \OpenLibrary\DOI\DOI\Minted {

        /**
         * Minted constructor.
         *
         * @param $doi
         * @param $uri
         */
        public function __construct($doi, $uri) {

            parent::__construct($doi,$uri);
        }

        public function getPayload () {
            $payload = "doi={$this->doi}" . PHP_EOL . "url={$this->uri}";
            return utf8_encode($payload);
        }

        public function getAPIEndpoint () {
            return 'https://mds.datacite.org/doi';
        }

    }
