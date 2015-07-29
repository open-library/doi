<?php
    /**
     * Created by PhpStorm.
     * User: skhanker
     * Date: 28/07/2015
     * Time: 4:12 PM
     */

    namespace OpenLibrary\DOI\RegistrationAgency\DataCite\Validators;

    use Respect\Validation\Rules\AbstractRule;

    class PublisherYear extends AbstractRule
    {
        /**
         * @param $input
         *
         * @return bool
         */
        public function validate($input)
        {
            if (!is_string($input)) {
                return false;
            }

            $input = trim($input);

            $match = null;

            preg_match("/^[0-9]{4}$/", $input, $match);

            if(isset($match) || count($match) == 1){
                return true;
            }

            return false;
        }
    }
