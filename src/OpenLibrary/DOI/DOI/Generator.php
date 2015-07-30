<?php

    /**
     * Created by PhpStorm.
     * User: skhanker
     * Date: 29/07/2015
     * Time: 1:07 PM
     */

    namespace OpenLibrary\DOI\DOI;

    use RedBeanPHP\R;

    class Generator
    {

        public static function get(){

            $config = parse_ini_file(__DIR__ . "/../../../../config/db.d/config-db.ini");

            R::setup(
                  $config['db_hand']. ":host=" .  $config['db_host'] . ";dbname=" . $config['db_name']
                , $config['db_user']
                , $config['db_pass']
            );

            $env = "uat";

            R::exec("SET search_path TO {$env}");

            try {
                $record = R::findOne( $config['db_pass'], ' ORDER BY id DESC LIMIT 1 ' );
            } catch (\Exception $e){
                error_log($e->getMessage());
            } finally {
                if(!isset($record) || $record == null){
                    $id = 0;
                } else {
                    $row = $record->export();
                    $id = (integer)$row['id'] + 1;
                }
            }

            R::dispense($config['db_tabl']);

            $record = R::dispense($config['db_tabl']);

            $record->doi    = $id;

            $autoNumber = R::store($record);

            # get last id from doi table

            return sprintf ("%07d", $autoNumber);
        }

    }
