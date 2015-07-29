<?php
    /**
     * Created by PhpStorm.
     * User: skhanker
     * Date: 28/07/2015
     * Time: 4:12 PM
     */

    namespace OpenLibrary\DOI\RegistrationAgency\DataCite\Properties;


    class CreatorIdentifier extends GenericProperty
    {

        protected $identifier;

        protected $identifierScheme;

        protected $identifierSchemeURI = false;

        /**
         * CreatorIdentifier constructor.
         *
         * @param $value
         * @param $schemeName
         * @param $schemeURI
         */
        public function __construct ($value, $schemeName, $schemeURI = false) {
            parent::__construct($value);
            if($schemeName){
                $this->identifierScheme = $schemeName;
            }
            if($schemeURI){
                $this->identifierSchemeURI = $schemeURI;
            }
        }

        /**
         * @param string $identifier
         * @param string $schemeName the name of the identifier scheme e.g. ORCID
         * @param string $schemeURI the uri of the identifier scheme e.g. http://orcid.org
         */
        public function setIdentifier ($identifier, $schemeName, $schemeURI = false)
        {
            $this->identifier = $identifier;
            $this->identifierScheme = $schemeName;
            if($schemeURI){
                $this->identifierSchemeURI = $schemeURI;
            }
        }

        public function getAttributes(){
            return [
                  'schemeURI'               => $this->identifierSchemeURI
                , 'nameIdentifierScheme'    => $this->identifierScheme
            ];
        }

    }
