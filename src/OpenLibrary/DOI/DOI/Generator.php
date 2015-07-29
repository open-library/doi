<?php

    /**
     * Created by PhpStorm.
     * User: skhanker
     * Date: 29/07/2015
     * Time: 1:07 PM
     */

    namespace OpenLibrary\DOI\DOI;

    class Generator
    {

        public static function get(){

            $autoNumber = 0;

            # get last id from doi table

            # increment by 1

            return sprintf ("%07d", $autoNumber);
        }

    }
