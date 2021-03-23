<?php 
    function compareByTimeStamp($time1, $time2) 
    { 
        if (strtotime($time1["Ablaufdatum"]) < strtotime($time2["Ablaufdatum"])) 
            return 1;
        else if (strtotime($time1["Ablaufdatum"]) > strtotime($time2["Ablaufdatum"]))  
            return -1;
        else
            return 0;
    } 
    
    // Input Array 
    $arr = array();
    for($i = 0; $i < count($this->jsondata[1]) + 1; $i++){ 
        if(isset($this->jsondata[1][$i])){
            $arr[$i] = $this->jsondata[1][$i];
        }
    }

    // sort array with given user-defined function 
    usort($arr, "compareByTimeStamp"); 

    /*$Temptrue = true;
    $Tempnum = 0;
    $Temp = array();

    for($i = 0; $i < count($this->jsondata[1]); $i++){
        $Temptrue = true;
        $Tempnum = 0;
        while($Temptrue && $Tempnum < count($this->jsondata[1])){
            if(strtotime($arr[$i]) == strtotime($this->jsondata[1][$Tempnum]["Ablaufdatum"])){
                array_push($Temp, $this->jsondata[1][$Tempnum]);
                unset($this->jsondata[1][$Tempnum]);
                $Temptrue = false;
                $Tempnum++;
            }else {
                $Tempnum++;
            }
        }
    }*/

    $Heute = time();

    for($i = 0; $i < count($arr); $i++){
        if(strtotime($arr[$i]["Ablaufdatum"]) < $Heute - 24*60*60){
            unset($arr[$i]);
            /*unset($Temp[$i]);*/
        }
    }

    $Temp = $arr;
    $Temp = array_reverse($Temp);

    $this->resetjson($Temp);

    if(!isset($_POST["test"])) {  
        echo "<div id='main' style='margin-top: 10em;'";
        //echo '<div class="container"><h1>' . $Temp[$i]["Ablaufdatum"] . '</h1><hr>';

        for($i = 0; $i < count($arr); $i++) {

            if(!isset($Temp[$i - 1]) || $Temp[$i]["Ablaufdatum"] != $Temp[$i - 1]["Ablaufdatum"]){
                echo '</div>';
                echo '<div class="container"><h1>';
                echo $this->covertdate($Temp[$i]["Ablaufdatum"]);
                echo '</h1><hr>';
            }    

            echo '<div class="row"> 
            <h1 class="title2">'
            . $Temp[$i]["title"] . 
            '</h1><div><b>Ablaufdatum:&nbsp</b><div class="Ablaufdatum">' 
            .  $this->covertdate($Temp[$i]["Ablaufdatum"]). 
            '</div></div><div><b>Fach:&nbsp</b><div class="Fach">' 
            . $Temp[$i]["Fach"] . 
            '</div></div><div><b>Bechreibung:&nbsp</b><div class="Beschreibung">' 
            . $Temp[$i]["Beschreibung"] . 
            '</div></div><form action="Hausaufgaben.php" method="post"><input type="input" name="welches" class="hidden" value="' 
            . $i . 
            '"><input type="submit" name="submit3" value="Löschen"></form><button onclick="bearbeiten(' 
            . $i . 
            ')" class="btn2 btn btn-primary">Bearbeiten</button><div><img class="Lesezeichenimg" src="../../icons/Lesezeichen';

            if(strtotime($Temp[$i]["Ablaufdatum"]) < $Heute + 24*60*60 ) {
                echo 'rot';
            }elseif(strtotime($Temp[$i]["Ablaufdatum"]) < $Heute + 24*60*60*2 ){
                echo 'orange';
            }else{
                echo 'grün';
            }
            
            echo '.png"></div></div>';
    
        }

        echo "</div>";
    }
?>