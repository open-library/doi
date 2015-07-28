<?php
    /**
     * Created by PhpStorm.
     * User: skhanker
     * Date: 28/07/2015
     * Time: 4:02 PM
     */

    namespace OpenLibrary\DOI\RegistrationAgency\DataCite;


    class MetadataProfile
    {

        private $resource = '<resource xmlns="http://datacite.org/schema/kernel-3" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://datacite.org/schema/kernel-3
        http://schema.datacite.org/meta/kernel-3/metadata.xsd"></resource>';

        /**
         * MetadataProfile constructor.
         */
        public function __construct () { }


        public function generateProfile ()
        {
            $resource = new \SimpleXMLElement($this->resource);


        }
    }
