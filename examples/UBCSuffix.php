<?php

    /**
     * Created by PhpStorm.
     * User: skhanker
     * Date: 29/07/2015
     * Time: 1:07 PM
     */
    class UBCSuffix extends \OpenLibrary\DOI\DOI\Suffix
    {

        /**
         * @var
         */
        protected $pattern;

        /**
         * @var string
         */
        protected $brand;

        /**
         * @var string
         */
        protected $unit;

        /**
         * @var string
         */
        protected $year;

        /**
         * @param \OpenLibrary\DOI\DOI\Generator $generator
         * @param                                $brand
         * @param                                $unit
         * @param                                $year
         */
        public function __construct ($generator, $brand, $unit, $year)
        {
            parent::__construct ($generator);
            $this->brand = sprintf ("%02d", $brand);
            $this->unit = sprintf ("%02d", $unit);
            $this->year = sprintf ("%04d", $year);
        }


        /**
         * @return string
         */
        public function getSuffix ()
        {
            # prefix be like 10.1234/
            # this adds on 001.002.2015.1234567
            return implode (".", array_filter ([$this->brand, $this->unit, $this->year, $this->autoNumber]));
        }

    }
