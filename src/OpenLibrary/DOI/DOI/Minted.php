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
    }
