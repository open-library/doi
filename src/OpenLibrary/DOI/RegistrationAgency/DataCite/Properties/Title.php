<?php
    /**
     * Created by PhpStorm.
     * User: skhanker
     * Date: 28/07/2015
     * Time: 4:12 PM
     */

    namespace OpenLibrary\DOI\RegistrationAgency\DataCite\Properties;


    class Title extends GenericProperty
    {
        protected $lang;

        protected $type;

        public function __construct ($value, $type = false) {
            parent::__construct($value);
            if($type){
                $this->type=$type;
            }
        }

        /**
         * @param mixed $lang
         */
        public function setLang ($lang)
        {
            $this->lang = $lang;
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
                  'xml:lang'  => $this->lang
                , 'titleType' => $this->type
            ];
        }


    }
