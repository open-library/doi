<?php

    /**
     * Created by PhpStorm.
     * User: skhanker
     * Date: 29/07/2015
     * Time: 1:07 PM
     */

    namespace OpenLibrary\DOI\DOI;

    abstract class Suffix
    {

        protected $autoNumber;

        public function __construct (Generator $generator)
        {
            $this->autoNumber = $generator::get();
        }

        public function getSuffix ()
        {
            # prefix be like 10.1234/
            # this adds on 001.002.2015.1234567
            return implode(".",array_filter([$this->autoNumber]));
        }

    }
