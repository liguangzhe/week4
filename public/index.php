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
        $table = html::generateTable($records);
        //foreach ($records as $record) {
            //$record->createRow();
            //$array = $record->returnArray();
            //print_r($array);
        //}

    }
}


class html {

    public static function generateTable($records) {
        echo '<HR style="FILTER:alpha(opacity=100,finishopacity=0,style=3)" width="80%" color="#987cb9" SIZE=10>';
        echo '<table>';
        echo '<thead>';
        echo '<tbody>';
        echo '<tr><th>First</th><th>Last</th><th>UCID</th><th>Grade</th></tr>';
        echo '</thead>';
        echo '<style>body{text-align:center}</style>';
        foreach($records as $record) {
            $array = $record->returnArray();
            $First = $array["First"];
            $Last = $array["Last"];
            $UCID = $array["UCID"];
            $Grade = $array["Grade"];
            echo "<tr><th>$First</th><th>$Last</th><th>$UCID</th><th>$Grade</th></tr>";

            //print_r($array);
        }
        echo '</tbody>';
        echo '</table>';
        
    }
}




class csv{

    static public function getRecords($filename){

        $file = fopen($filename, "r");
        $fieldNames = array();
        $count = 0;
        while(! feof($file))
        {
            $record = fgetcsv($file);
            if($count == 0){
                $fieldNames = $record;
            } else{
                $records[]= recordFactory::create($fieldNames, $record);
            }
            $count++;
        }

        fclose($file);
        return $records;


    }

}

class record{

    public function __construct(Array $fieldNames = null, $values = null)
    {

        $record = array_combine($fieldNames, $values);
        foreach ($record as $property => $value){
            $this->createProperty($property, $value);
        }

        //print_r($this);

    }

    //public function createRow(){
    public function returnArray(){
        $array = (array) $this;
        //print_r($this);
        return $array;
    }

    public function createProperty($name = 'first', $value = 'Guangzhe') {

        $this->{$name} = $value;

    }

}

class recordFactory {

    public static function create(Array $fieldNames = null, Array $values = null){

        $record = new record($fieldNames, $values);

        return $record;
    }
}

