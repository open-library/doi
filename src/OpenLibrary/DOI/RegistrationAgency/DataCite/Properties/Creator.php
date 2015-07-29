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
        /**
         * @var CreatorIdentifier
         */
        protected $identifier;

        protected $affiliation;

        /**
         * @return mixed
         */
        public function getAffiliation() {
            if(isset($this->affiliation) && count($this->affiliation) > 0){
                return $this->affiliation;
            }
            return false;
        }

        /**
         * @param mixed $affiliation
         */
        public function setAffiliation($affiliation) {
            $this->affiliation [] = $affiliation;
        }

        public function resetAffiliation(){
            $this->affiliation = [];
        }



        /**
         * Creator constructor.
         *
         * @param $value
         */
        public function __construct ($value) {
            parent::__construct($value);
        }

        /**
         * @return CreatorIdentifier
         */
        public function getIdentifier() {
            if(isset($this->identifier)){
                return $this->identifier;
            }
            return false;
        }

        /**
         * @param CreatorIdentifier $identifier
         */
        public function setIdentifier(CreatorIdentifier $identifier) {
            $this->identifier = $identifier;
        }


        public function getAttributes(){
            return [
            ];
        }
    }
