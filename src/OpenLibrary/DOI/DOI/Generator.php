<?php

    /**
     * Created by PhpStorm.
     * User: skhanker
     * Date: 29/07/2015
     * Time: 1:07 PM
     */

    namespace OpenLibrary\DOI\DOI;

    abstract class Generator
    {
        # override this to generate a unique id for the suffix based on your institution
        # a suffix can be "just" this id, or, this id can be part of a larger suffix
        public static function get() {
            return rand(0,9999999);
        }
    }
