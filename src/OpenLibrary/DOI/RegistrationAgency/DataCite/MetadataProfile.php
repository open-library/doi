<?php
    /**
     * Created by PhpStorm.
     * User: skhanker
     * Date: 28/07/2015
     * Time: 4:02 PM
     */

    namespace OpenLibrary\DOI\RegistrationAgency\DataCite;


    use OpenLibrary\DOI\RegistrationAgency\DataCite\Properties\Creator;
    use OpenLibrary\DOI\RegistrationAgency\DataCite\Properties\Identifier;
    use OpenLibrary\DOI\RegistrationAgency\DataCite\Properties\Publisher;
    use OpenLibrary\DOI\RegistrationAgency\DataCite\Properties\PublisherYear;
    use OpenLibrary\DOI\RegistrationAgency\DataCite\Properties\Title;

    /**
     * Class MetadataProfile
     *
     * @package OpenLibrary\DOI\RegistrationAgency\DataCite
     */
    class MetadataProfile
    {
        /**
         * @var string
         */
        private $resource = '<resource xmlns="http://datacite.org/schema/kernel-3" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://datacite.org/schema/kernel-3
        http://schema.datacite.org/meta/kernel-3/metadata.xsd"></resource>';
        /**
         * @var
         */
        protected $identifier;
        /**
         * @var array
         */
        protected $creator = [];
        /**
         * @var array
         */
        protected $title = [];
        /**
         * @var
         */
        protected $publisher;
        /**
         * @var
         */
        protected $publisherYear;
        /**
         * MetadataProfile constructor.
         */
        public function __construct () { }

        /**
         * @return mixed
         */
        public function getIdentifier() {
            return $this->identifier;
        }

        /**
         * @param \OpenLibrary\DOI\RegistrationAgency\DataCite\Properties\Identifier $identifier
         */
        public function setIdentifier(Identifier $identifier) {
            $this->identifier = $identifier;
        }

        /**
         * @return \ArrayIterator
         */
        public function getCreator() {
            $t = new \ArrayObject($this->creator);
            return $t->getIterator();
        }

        /**
         * @param \OpenLibrary\DOI\RegistrationAgency\DataCite\Properties\Creator $creator
         */
        public function setCreator(Creator $creator) {
            $this->creator [] = $creator;
        }

        /**
         * @return \ArrayIterator
         */
        public function getTitle() {
            $t = new \ArrayObject($this->title);
            return $t->getIterator();
        }

        /**
         * @param \OpenLibrary\DOI\RegistrationAgency\DataCite\Properties\Title $title
         */
        public function setTitle(Title $title) {
            $this->title [] = $title;
        }

        /**
         * @return mixed
         */
        public function getPublisher() {
            return $this->publisher;
        }

        /**
         * @param \OpenLibrary\DOI\RegistrationAgency\DataCite\Properties\Publisher $publisher
         */
        public function setPublisher(Publisher $publisher) {
            $this->publisher = $publisher;
        }

        /**
         * @return mixed
         */
        public function getPublisherYear() {
            return $this->publisherYear;
        }

        /**
         * @param \OpenLibrary\DOI\RegistrationAgency\DataCite\Properties\PublisherYear $publisherYear
         */
        public function setPublisherYear(PublisherYear $publisherYear) {
            $this->publisherYear = $publisherYear;
        }

        /**
         * @throws \OpenLibrary\DOI\RegistrationAgency\DataCite\MetadataProfileException
         */
        public function verifyProfile(){
            # Identifier
            if (!isset($this->identifier)){
                throw new MetadataProfileException("Identifier (DOI string) not set in Profile. Occurrence [1]");
            }

            # Creator
            if (count($this->creator) <= 0){
                throw new MetadataProfileException("Creator not set in Profile - at least 1 is required. Occurrence [1-n]");
            }

            # Title
            if (count($this->title) <= 0){
                throw new MetadataProfileException("Title not set in Profile - at least 1 is required. Occurrence [1-n]");
            }

            # Publisher
            if (!isset($this->publisher)){
                throw new MetadataProfileException("Publisher not set in Profile. Occurrence [1]");
            }

            # PublisherYear
            if (!isset($this->publisherYear)){
                throw new MetadataProfileException("PublisherYear not set in Profile. Occurrence [1]");
            }
        }

        /**
         *
         */
        public function generateProfileXML ()
        {
            $resource = new \SimpleXMLElement($this->resource);


        }
    }
