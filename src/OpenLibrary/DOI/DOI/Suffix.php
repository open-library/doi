<?php

    /**
     * Created by PhpStorm.
     * User: skhanker
     * Date: 29/07/2015
     * Time: 1:07 PM
     */

    namespace OpenLibrary\DOI\DOI;

    class Suffix
    {

        protected $pattern;

        protected $brand;

        protected $unit;

        protected $year;

        protected $autoNumber;

        /**
         * Pattern constructor.
         *
         * @param $brand
         * @param $unit
         * @param $year
         */
        public function __construct ($brand, $unit, $year)
        {
            $this->brand = sprintf ("%02d", $brand);
            $this->unit = sprintf ("%02d", $unit);
            $this->year = sprintf ("%04d", $year);
            $this->autoNumber = Generator::get();
        }


        public function getSuffix ()
        {
            # prefix be like 10.1234/
            # this adds on 001.002.2015.1234567
            return implode(".",array_filter([$this->brand,$this->unit, $this->year, $this->autoNumber]));
        }

    }
