<?php
    /**
     * Created by PhpStorm.
     * User: hajime
     * Date: 15-07-29
     * Time: 22:46
     */
    namespace OpenLibrary\DOI\RegistrationAgency\DataCite;
    class Minted {

        protected $doi;

        protected $uri;

        /**
         * Minted constructor.
         *
         * @param $doi
         * @param $uri
         */
        public function __construct($doi, $uri) {

            $this->doi = $doi;

            $this->uri = $uri;
        }

        public function getPayload () {
            $payload = "doi={$this->doi}" . PHP_EOL . "url={$this->uri}";
            return utf8_encode($payload);
        }

        public function getAPIEndpoint () {
            return 'https://mds.datacite.org/doi';
        }
    }