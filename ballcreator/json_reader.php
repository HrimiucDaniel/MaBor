<?php
    include "reader.php";
    include "Validare.php";


    class JSON_READER extends Reader{
        function read() {
            $i = 0;
            $strJsonFileContents = file_get_contents("data.json");

            $array = json_decode($strJsonFileContents, true);
            
            $valid = new Validare();
            foreach ($array as $key => $value) {
                foreach($value as $val) {
                    $stringx = $valid->ValidareBalIncheiat($val);
                    if (strcmp($stringx, "no") == 0) {
                        
                        $date[$i] = $val;
                        $date[$i][9] = $valid->ValidareDataBall($date[$i]);
                        if(isset($date[$i][9]))
                            $date[$i][10] = @$valid->ValidareInceputBall($date[$i]);
                        if(isset($date[$i][9]))
                            $date[$i][12] = $valid->ValidareBallDesfasurare($date[$i]);
                        $date[$i][11] = null;
                        $i = $i + 1;
                    }else if (strcmp($stringx, "yes") == 0){

                        $date[$i] = $val;
                        $date[$i][9] = $valid->ValidareDataBall($date[$i]);
                        if(isset($date[$i][9]))
                            $date[$i][10] = @$valid->ValidareInceputBall($date[$i]);
                        if(isset($date[$i][9]))
                            $date[$i][12] = $valid->ValidareBallDesfasurare($date[$i]);

                        $date[$i][11] = "Ball incheiat";
                        $i = $i + 1;

                    }else if (strcmp($stringx, "delete")){}

                }
            }
            return  $date;
        }
    }
?>