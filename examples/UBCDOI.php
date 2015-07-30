<?php

    /**
     * Created by PhpStorm.
     * User: skhanker
     * Date: 30/07/2015
     * Time: 10:23 AM
     */

    use OpenLibrary\DOI\DOI;
    use OpenLibrary\DOI\RegistrationAgency\DataCite\Minted;
    use Curl\Curl;

    class UBCDOI extends DOI
    {

        /**
         * @var
         */
        protected $mintedDOI;

        /**
         * @param      $registrantCode
         * @param null $registrantSubdivision
         */
        function __construct ($registrantCode, $registrantSubdivision = null)
        {
            parent::__construct ($registrantCode, $registrantSubdivision);
        }


        # This generates a new DOI that is not used within the institution. May need to be called multiple times in case the DOI is, for whatever reason, rejected by the Registration Agency when
        # you try to mint()


        public function generate (UBCSuffix $suffix, $url)
        {
            return new Minted($this->DOIFactory->generate ($suffix), $url);
        }


        ## This attempts to mint the DOI at the remote Registration Agency


        public function mint (Minted $minted)
        {
            $curl = new Curl();
            $curl->setBasicAuthentication ('username', 'password');
            $curl->setOpt (CURLOPT_SSL_VERIFYPEER, false);
            $curl->setHeader ('Content-Type', 'text/plain;charset=UTF-8');
            $curl->post ($minted->getAPIEndpoint (), $minted->getPayload ());

            $ret = false;
            if ($curl->error) {
                error_log ('Error: ' . $curl->error_code . ': ' . $curl->error_message);
            } else {
                $ret = $curl->response;
            }
            $curl->close ();

            return $ret;
        }

        private function updateDoiRecord ($id, $doi, $url){
            $config = parse_ini_file( __DIR__ . "/../../../../bin/db.d/config-doi-db.ini");

            try {
                R::setup(
                    $config['db_hand']. ":host=" .  $config['db_host'] . ";dbname=" . $config['db_name']
                    , $config['db_user']
                    , $config['db_pass']
                );
            } catch (\Exception $e){
                error_log($e->getMessage());
                die;
            }

            R::exec("SET search_path TO uat");

            try {
                $record = R::load( $config['db_tabl'], $id );
            } catch (\Exception $e){
                error_log("DOi Error - unable to update doi and url for db record row: {$id}");
                error_log($e->getMessage());
                die;
            }

            $record->doi    = $doi;
            $record->url    = $url;

            $autoNumber = R::store($record);
        }
    }
