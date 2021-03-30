<?php
    include 'inc/connect.php';
    include 'classes/userhandeling.php';
    // files werden eingelesen und in eine arry umgewandelt       
    $nutzer = json_decode(file_get_contents("inc/Farbschehmen.json"));
    // session wird gestartet um mit $_SESSION daten auszulesen
    session_start();
    // wird überprüft ob nutzer angemeldet ist
    if(isset($_SESSION["username"])){
        $username = $_SESSION["username"];
        $user = new userhandle($username, 1);
        $jsondata = $user->getjson();
    }
    $stundenplan = $jsondata[5][0];
?>
<!DOCTYPE html>
<html lang="de" dir="ltr">

<head>
    <link rel="shortcut icon" type="image/x-icon" href="icons/Lehrer-nav-bar_white.png" />
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Unterwebseiten/Hausaufgaben/style.css">
    <script type="text/javascript">
    // wenn größe geendert wird wird die Function aufgerufen
    function myFunction() {
        // wenn seite größer als 1665 ist wird die navbar angezeigt
        if (window.innerWidth > 1665) {
            document.getElementById("sidebar").style.display = "block";
            document.getElementById("sidebar").style.display = "Flex";
        }
    }
    </script>
    <link rel="stylesheet" href="css/style.css">
    <title>Schülerapp</title>
</head>

<body onresize="myFunction()">
    <nav id="navbar">
        <a href="#" class="navbutton" onclick="sidebaropen()">&#9776;</a>
        <a href="#" class="title">Schülerapp</a>
        <?php 
        if(isset($_SESSION["username"])){
            echo '
                <div id="sidebar">
                    <a href="#" id="close" onclick="sidebarclose()">&#10006;</a>
                    <a href="#">
                        <img src="icons/paln-white.png" style="width:25px; height: 25px; color:red; margin-right: 5px;">
                        Plan
                    </a>
                    <a href="#"><img src="icons/Arbeiten-white.png"
                            style="width:25px; height: 25px; color:red; margin-right: 5px;">Arbeiten</a>
                    <a href="Unterwebseiten/Hausaufgaben/Hausaufgaben.php"><img src="icons/Arbeiten-white.png"
                            style="width:25px; height: 25px; color:red; margin-right: 5px;">Hausaufgaben</a>
                    <a href="Unterwebseiten/Noten/Noten.php"><img src="icons/note-white.png"
                            style="width:28px; height: 28px; color:red; margin-right: 5px;">Noten</a>
                    <a href="Unterwebseiten/Einstellungen/Einstellungen.php"><img src="icons/settings-white.png"
                            style="width:25px; height: 25px; margin-right: 5px;">Einstellungen</a>
                    <!--<a href="Unterwebseiten/Lehrer/Lehrer.php"><img src="icons/Lehrer-nav-bar_white.png" style="width:25px; height: 25px; color:red; margin-right: 5px;">Lehrer</a>-->
                </div>';
            echo '
                <div class="Anmeldebereich">
                    <a style="font-size: 1em;" href="Unterwebseiten/Anmeldung/Anmeldung.php">
                        <img style="margin-right: 5px; margin-top: 0.1em" src="icons/ICON_ohne_HUT_white.png">
                    </a>
                </div>
            ';
        }else {
            echo '
                <div class="Anmeldebereich">
                    <a style="font-size: 1em;" href="Unterwebseiten/Anmeldung/Anmeldung.php">
                        <img style="margin-right: 5px; margin-top: 0.1em" src="icons/ICON_ohne_HUT_white.png">
                    </a>
                </div
            ';
        }
        ?>
    </nav>
    <script type="text/javascript">
    // wenn mann auf button auf drückt
    function sidebaropen() {
        // navbar wird angezeigt
        document.getElementById("sidebar").style.display = "Flex"
    }

    function sidebarclose() {
        // navbar wird versteckt
        document.getElementById("sidebar").style.display = "none"
    }
    </script>
    <!--Main Bereich-->
    <div id="Main" >
        <!--Stundenplan Der Woche-->
        <?php

            // wenn nutzer angemeldet ist
            if(isset($_SESSION["username"])){

                echo "<div class='indexflexeins'>";
                // tabelle mit stundenplan wird eingefügt
                echo $user->gettable();

                echo "</div>";

                echo "</div>";

                echo '<div class="thingslol">';

                echo "<div id='Toduu'>";
                    echo '
                        <h1>To du lsite</h1>
                        <div class="todulistobj">ein objekt</div>
                        <div class="todulistobj">ein objekt</div>
                        <div class="todulistobj">ein objekt</div>
                    ';
                echo "</div>";

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
                    for($i = 0; $i < count($jsondata[1]) + 1; $i++){ 
                        if(isset($jsondata[1][$i])){
                            $arr[$i] = $jsondata[1][$i];
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

                    for($i = 0; $i < count($arr); $i++) {

                        if(!isset($Temp[$i - 1]) || $Temp[$i]["Ablaufdatum"] != $Temp[$i - 1]["Ablaufdatum"]){
                            if($i > 0){
                                break;
                            }
                            echo '</div>';
                            echo '<div id="Tagha"><h1>';
                            echo $user->covertdate($Temp[$i]["Ablaufdatum"]);
                            echo '</h1><hr>';
                        }    

                        echo '<div class="row"> 
                        <h1 class="title2">'
                        . $Temp[$i]["title"] . 
                        '</h1><div><b>Ablaufdatum:&nbsp</b><div class="Ablaufdatum">' 
                        .  $user->covertdate($Temp[$i]["Ablaufdatum"]). 
                        '</div></div><div><b>Fach:&nbsp</b><div class="Fach">' 
                        . $Temp[$i]["Fach"] . 
                        '</div></div><div><b>Bechreibung:&nbsp</b><div class="Beschreibung">' 
                        . $Temp[$i]["Beschreibung"] . 
                        '</div></div><form action="Hausaufgaben.php" method="post"><input type="input" name="welches" class="hidden" value="' 
                        . $i . 
                        '"><div><img class="Lesezeichenimg" src="icons/Lesezeichen';

                        if(strtotime($Temp[$i]["Ablaufdatum"]) < $Heute + 24*60*60 ) {
                            echo 'rot';
                        }elseif(strtotime($Temp[$i]["Ablaufdatum"]) < $Heute + 24*60*60*2 ){
                            echo 'orange';
                        }else{
                            echo 'grün';
                        }
                        
                        echo '.png"></div></div>';
                
                    } 
                    echo '</div>';
            }else {
                // sonst wird die startseite angezeigt
                include "inc/home.php";
                echo "</div>";
            }
        ?>
        <!--Cookieabfrage-->
        <div id="Abfrage">
            <div>
                Ihre Daten werden von dieser Website nicht weiter verkauft.
                Wir verwenden Ihre Cookies ausschließlich damit Sie ein besseres Benutzererlebnis haben.
                Die Einstellungen der Cookies finden sie in den Einstellungen unter “Cookies”. <br> <br>
                Mit einem Klick auf "Zustimmen" akzeptieren Sie diese Verarbeitung.</div> <a id="Ja"
                href="#">Zustimmen</a>
        </div>

        <script type="text/javascript" src="inc/js/cookieabfrage.js"></script>
    <!--Bootstrap wird eingebunden-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>

    <?php 
        include "inc/js/color.php";
    ?>
</body>

</html>