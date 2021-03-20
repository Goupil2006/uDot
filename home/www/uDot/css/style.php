<?php 
  $Auswahl_dark = "0a84ff";
  $Auswahl_light = "007aff";
  switch ($jsondata[0][0]->akzent) {
    case "Rot":
      $Auswahl_dark = "ff453a";
      $Auswahl_light = "ff3b30";
      break;
    case "Orange":
      $Auswahl_dark = "ff9f0a";
      $Auswahl_light = "ff9500";
      break;
    case "Gelb":
      $Auswahl_dark = "ffd60a";
      $Auswahl_light = "ffcc00";
      break;
    case "Grün":
      $Auswahl_dark = "32d74b";
      $Auswahl_light = "34c759";
      break;
    case "Hell-Blau":
      $Auswahl_dark = "64d2ff";
      $Auswahl_light = "5ac8fa";
      break;
    case "Blau":
      $Auswahl_dark = "0a84ff";
      $Auswahl_light = "007aff";
      break; 
    case "Indigo":
      $Auswahl_dark = "5e5ce6";
      $Auswahl_light = "5856d6";
      break; 
    case "Lila":
      $Auswahl_dark = "bf5af2";
      $Auswahl_light = "af52de";
      break; 
    case "Pink":
      $Auswahl_dark = "ff375f";
      $Auswahl_light = "ff2d55";
      break; 
    }
    if($jsondata[0][0]->colormode=="light"){
      $Auswahl = $Auswahl_light;
    } else {
      $Auswahl = $Auswahl_dark;
    }
?>




<style>
body {
    font-size: 100%;
    margin: 0em;
    padding: 0em;

    <?php if($jsondata[0][0]->colormode=="black") {
        echo "color: #FFFFFF;";
    }

    elseif($jsondata[0][0]->colormode=="light") {
        echo "background-color: #000000;";
    }

    else {
        echo "color: #FFFFFF;";
    }

    ?>font-family: 'Quicksand',
    sans-serif;

    <?php if($jsondata[0][0]->colormode=="black") {
        echo "background-color: #1C1C1E;";
    }

    elseif($jsondata[0][0]->colormode=="light") {
        echo "background-color: #f1f2f7;";
    }

    else {
        echo "background-color: #1C1C1E;";
    }

    ?>
}

a {
    text-decoration: none;
    color: <?php echo "#". $Auswahl;
    ?>;
}

nav {
    display: block;
    position: absolute;
    position: fixed;
    width: 100%;
    height: 3.55em;

    <?php if($jsondata[0][0]->colormode=="black") {
        echo "background-color: #000000;";
    }

    elseif($jsondata[0][0]->colormode=="light") {
        echo "background-color: #f1f2f7;";
    }

    else {
        echo "background-color: #000000;";
    }

    ?>margin-top: 0em;
    top: 0em;
    z-index: 100000;
    border-bottom: 1px <?php echo "#". $Auswahl . " ";
    ?>solid;
}

nav .navbutton {
    position: fixed;
    display: none;
    font-size: 2em;
}

nav .title {
    position: fixed;
    width: 5em;
    text-align: center;
    margin-top: 0.1em;
    margin-left: 1em;
    font-size: 2em;
}

#sidebar {
    position: fixed;
    left: 15em;
    margin-top: 0px;
}

#sidebar a:not(#close) {
    display: inline-block;
    width: auto;
    padding-left: 0em;
    padding-right: 1em;
    text-align: left;
    font-size: 2.35em;
    margin-top: 0em;
    color: <?php echo "#". $Auswahl;
    ?>;
}

#sidebar a:hover:not(#close) {
    <?php if($jsondata[0][0]->colormode=="black") {
        echo "background-color: #2A2C2B;";
    }

    elseif($jsondata[0][0]->colormode=="light") {
        echo "background-color: #FFFFFF;";
    }

    else {
        echo "background-color: #2A2C2B;";
    }

    ?>border-bottom: 1px <?php echo "#". $Auswahl . " ";
    ?>solid;
}

.Anmeldebereich {
    position: fixed;
    right: 1em;
    font-size: 1em;
    margin-top: 0.25;
}

.Anmeldebereich img {
    position: absolute;
    right: 0.3em;
    height: 1em;
    width: 1em;
    font-size: 3em;
}

.Anmeldebereich a {
    font-size: 0.55em;
}

#close {
    display: none;
    width: 1em;
    text-align: center;
    font-size: 2em;
    margin-top: 0.2em;
    color: <?php echo "#". $Auswahl;
    ?>;
    margin-left: 1em;
}

#close:hover {
    color: <?php echo "#". $Auswahl;
    ?>;
}

#Main {
    margin-top: 3em;
    z-index: 10;
    position: relative;
}

#Heute {
    border: 0.5em solid <?php echo "#". $Auswahl;
    ?>;
}

.borderding {

    <?php if($jsondata[0][0]->colormode=="black") {
        echo "border: 0.2em solid #FFFFFF;";
    }

    elseif($jsondata[0][0]->colormode=="light") {
        echo "border: 0.2em solid #2A2C2B;";
    }

    else {
        echo "border: 0.2em solid #FFFFFF;";
    }

    ?>
}

.borderding2 {
    position: relative;
    width: 100%;

    <?php if($jsondata[0][0]->colormode=="black") {
        echo "border: 0.2em solid #FFFFFF;";
    }

    elseif($jsondata[0][0]->colormode=="light") {
        echo "border: 0.2em solid #2A2C2B;";
    }

    else {
        echo "border: 0.2em solid #FFFFFF;";
    }

    ?>
}

.borderding2 div {
    width: 100%;
    position: relative;
}

.Hinzufügen {
    position: static;
    text-align: center;
}

.Löchen {
    position: absolute;
    top: 0;
    right: 0;
}

.Heutiger-Stundenplan tr .borderding div {
    display: inline-block;
    position: relative;
}

.Heutiger-Stundenplan {
    margin-top: 10em;
    border-radius: 0.25em;
    width: 90%;
    font-size: 0.7m;
    margin-right: 5%;
    margin-left: 5%;
}

.Tag {
    padding-top: 0px;
    vertical-align: top;
}

#Abfrage {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 2em;

    <?php if($jsondata[0][0]->colormode=="black") {
        echo "background-color: #2A2C2B;";
    }

    elseif($jsondata[0][0]->colormode=="light") {
        echo "background-color: #FFFFFF;";
    }

    else {
        echo "background-color: #2A2C2B;";
    }

    ?>border-top: solid 0.5em <?php echo "#". $Auswahl;
    ?>;
    display: none;
    font-size: 17px;
}

#Abfrage div {
    width: 50%;
}

#Ja {
    border-radius: 10px;
    font-size: 2.2em;
    padding: 15px 30px;
    bottom: 27.5%;
    right: 10%;
    position: absolute;

    <?php if($jsondata[0][0]->colormode=="black") {
        echo "color: #000000;";
    }

    elseif($jsondata[0][0]->colormode=="light") {
        echo "color: #FFFFFF;";
    }

    else {
        echo "color: #000000;";
    }

    ?>background-color: <?php echo "#". $Auswahl;
    ?>;
}

@media (max-width: 1500px) {
    body {
        font-size: 80%;
    }

    #close {
        display: block;
    }

    #sidebar a {
        display: inline-block;
        color: <?php echo "#". $Auswahl;
        ?>;
        width: 7.5em;
    }

    #sidebar {
        left: 0em;
        display: none;

        <?php if($jsondata[0][0]->colormode=="black") {
            echo "background-color: black;";
        }

        elseif($jsondata[0][0]->c9olormode=="light") {
            echo "background-color: #f1f2f7;";
        }

        else {
            echo "background-color: black;";
        }

        ?>color: <?php echo "#". $Auswahl;
        ?>;
        height: 100%;
        width: 20em;
        text-align: center;
    }

    nav .navbutton {
        display: block;
    }
}

@media (max-width: 1500px) {
    body {
        font-size: 60%;
    }

    .Heutiger-Stundenplan td:not(#Heute) {
        display: none;
    }
}


.home {
    margin-top: 10em;
    text-align: center;
}


.AbstandHome {
    margin-bottom: 50%;
}
</style>