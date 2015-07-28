<?php
    /**
     * Created by PhpStorm.
     * User: skhanker
     * Date: 28/07/2015
     * Time: 4:12 PM
     */

    namespace OpenLibrary\DOI\RegistrationAgency\DataCite\Properties;


    class Identifier extends GenericProperty
    {

        protected $type;

        /**
         * Identifier constructor.
         *
         * @param $value
         * @param $type
         */
        public function __construct ($value, $type = "DOI")
        {
            parent::__construct($value);
            $this->type = $type;
        }

        /**
         * @return mixed
         */
        public function getType ()
        {
            return $this->type;
        }

        /**
         * @param mixed $type
         */
        public function setType ($type)
        {
            $this->type = $type;
        }



        public function getAttributes(){
            return [
                'identifierType' => $this->type
            ];
        }


    }
