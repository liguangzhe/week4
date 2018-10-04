<?php
/**
 * Created by PhpStorm.
 * User: guangzhe
 * Date: 10/2/18
 * Time: 9:46 PM
 */

main::start("week4.csv");

class main{

    static public function start($filename){

        $records = csv::getRecords($filename);

        print_r($records);
    }
}

class csv{

    static public function getRecords($filename){

        $file = fopen($filename, "r");

        while(! feof($file))
        {

            $record = fgetcsv($file);

            $records[] = $record;
        }

        fclose($file);
        return $records;

    }

}