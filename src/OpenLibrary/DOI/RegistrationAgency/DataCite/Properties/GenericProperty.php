<?php
    /**
     * Created by PhpStorm.
     * User: skhanker
     * Date: 28/07/2015
     * Time: 4:39 PM
     */

    namespace OpenLibrary\DOI\RegistrationAgency\DataCite\Properties;


    class GenericProperty
    {

        protected $value;

        /**
         * GenericProperty constructor.
         *
         * @param $value
         */
        public function __construct ($value) { $this->value = $value; }

        /**
         * @return mixed
         */
        public function getValue ()
        {
            return $this->value;
        }

        /**
         * @param mixed $value
         */
        public function setValue ($value)
        {
            $this->value = $value;
        }


    }
