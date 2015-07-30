<?php
    /**
     * Created by PhpStorm.
     * User: hajime
     * Date: 15-07-29
     * Time: 22:46
     */
    namespace OpenLibrary\DOI\DOI;

    abstract class Minted {

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

        abstract public function getPayload ();

        abstract public function getAPIEndpoint ();

        /**
         * @return mixed
         */
        public function getDoi ()
        {
            return $this->doi;
        }

        /**
         * @param mixed $doi
         */
        public function setDoi ($doi)
        {
            $this->doi = $doi;
        }

        /**
         * @return mixed
         */
        public function getUri ()
        {
            return $this->uri;
        }

        /**
         * @param mixed $uri
         */
        public function setUri ($uri)
        {
            $this->uri = $uri;
        }


    }
