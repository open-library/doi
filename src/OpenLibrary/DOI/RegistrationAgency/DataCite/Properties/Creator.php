<?php
    /**
     * Created by PhpStorm.
     * User: skhanker
     * Date: 28/07/2015
     * Time: 4:12 PM
     */

    namespace OpenLibrary\DOI\RegistrationAgency\DataCite\Properties;


    class Creator extends GenericProperty
    {

        protected $identifier;

        protected $identifierScheme;

        protected $identifierSchemeURI;

        /**
         * Creator constructor.
         *
         * @param $value
         */
        public function __construct ($value) {
            parent::__construct($value);
        }

        /**
         * @param string $identifier
         * @param string $schemeName the name of the identifier scheme e.g. ORCID
         * @param string $schemeURI the uri of the identifier scheme e.g. http://orcid.org
         */
        public function setIdentifier ($identifier, $schemeName, $schemeURI)
        {
            $this->identifier = $identifier;
            $this->identifierScheme = $schemeName;
            $this->identifierSchemeURI = $schemeURI;
        }

        public function getAttributes(){
            return [
                  'schemeURI' => $this->identifierSchemeURI
                , 'nameIdentifierScheme' => $this->identifierScheme
            ];
        }

    }
