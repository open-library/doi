<?php
    /**
     * Created by PhpStorm.
     * User: hajime
     * Date: 15-07-29
     * Time: 01:07
     */
    namespace OpenLibrary\DOI\RegistrationAgency\DataCite\Profiles;
    /**
     * Class MetadataProfileException
     *
     * @package OpenLibrary\DOI\RegistrationAgency\DataCite
     */
    class MetadataProfileException extends \Exception {
        /**
         * @param string $message
         * @param int    $code
         */
        public function __construct($message, $code = 500) {
            parent::__construct($message, $code);
        }
    }
