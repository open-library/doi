<?php

    /**
     * Created by PhpStorm.
     * User: skhanker
     * Date: 29/07/2015
     * Time: 1:08 PM
     */

    namespace OpenLibrary\DOI\DOI;

    class Factory
    {
        private $directoryIndicator = 10;

        private $registrantCode;

        private $registrantSubdivision;

        function __construct ($rc = null, $sd = null) {
            $this->registrantCode = $rc;
            $this->registrantSubdivision = $sd;
        }

        public function generate(Suffix $doiNameGenerator) {
            return $this->getPrefix() . "/" . $doiNameGenerator->getSuffix();
        }

        private function getPrefix() {
            return implode(".",array_filter([$this->directoryIndicator,$this->registrantCode, $this->registrantSubdivision]));
        }
    }
