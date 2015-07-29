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
        const AlternativeTitle = "AlternativeTitle";

        const Subtitle = "Subtitle";

        const TranslatedTitle = "TranslatedTitle";


        protected $lang;

        protected $type;

        public function __construct ($value, $type = false) {
            parent::__construct($value);
            if($type){
                if(defined($type)){
                    $this->type=$type;
                }
                else {
                    error_log("Title::{$type} not found in class OpenLibrary\\DOI\\RegistrationAgency\\DataCite\\Properties\\Title");
                }
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
