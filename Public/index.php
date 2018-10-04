<?php
/**
 * Created by PhpStorm.
 * User: guangzhe
 * Date: 10/2/18
 * Time: 9:46 PM
 */

main::start();

class main{

    static public function start(){

        $file = fopen("week4.csv","r");
        print_r(fgetcsv($file));
        fclose($file);
    }
}
