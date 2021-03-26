<?php 
    $output = "";
    $output .= '<a href="Unterwebseiten/StundenplanBearbeiten/StundenplanBearbeiten.php" style="position: absolute; top: -3em; right: 2em;" type="button" id="bearbeitenbutton" class="btn btn-primary">Bearbeiten</a>';

    function printhour($wahttodo = 1, $Tempstunden, $TempTage, $TempTempstunden, $stundenplan, $output) {
        $output .= "<div class='borderding' ";
        if($wahttodo == 2){
            $output .= "style='padding-bottom: 5.29em'";
        }
        $output .= " >";
        $output .= "<div class='Stunde'>";
        $output .= "Stunde:&nbsp;";
        $output .= "</div>";
        $output .= "<div class='Stunde-Stunde'>";
        if($wahttodo == 1){
            $output .= $stundenplan[$TempTage][$Tempstunden]["Stunde"];
        } elseif($wahttodo == 2) {
            $output .= $stundenplan[$TempTage][$Tempstunden]["Stunde"];
            $output .= "/";
            $output .= $stundenplan[$TempTage][$TempTempstunden]["Stunde"];
        }
        $output .= "</div>";
        $output .= "<br>";
        $output .= "<div class='Fach'>";
        $output .= "Fach:&nbsp;";
        $output .= "</div>";
        $output .= "<div class='Fach-Fach'>";
        $output .= $stundenplan[$TempTage][$Tempstunden]["Fach"];
        $output .= "</div>";
        $output .= "<br>";
        $output .= "<div class='Raum'>";
        $output .= "Raum:&nbsp;";
        $output .= "</div>";
        $output .= "<div class='Raum-Raum'>";
        $output .= $stundenplan[$TempTage][$Tempstunden]["Raum"];
        $output .= "</div>";
        $output .= "<br>";
        $output .= "<div class='Lehrer'>";
        $output .= "Lehrer:&nbsp;";
        $output .= "</div>";
        $output .= "<div class='Lehrer-Lehrer'>";
        $output .= $stundenplan[$TempTage][$Tempstunden]["Lehrer"];
        $output .= "</div>";
        $output .= "</div>";
        return $output;
    }


    $jetzt = time();
    $Tagename = array("Montag","Dienstag","Mittwoch","Donnerstag","Freitag");
    $Tage = 5;
    $stunden = 1000;

    $output .= "<table class='Heutiger-Stundenplan'>";
    $output .= "<tr>";

    $TempTage = 0;
    $Tempstunden = 0;
    setlocale(LC_ALL, "german");

    while($TempTage < $Tage){
        $Tempstunden = 0;
        $output .= "<td class='Tag' ";
        if($TempTage == intval(date('w', $jetzt)) - 1){ // intval(date('w', $jetzt)) - 1
        $output .= "id='Heute' ";
    }
    $output .= ">";
    if(isset($Tage)){
        $output .= $Tagename[$TempTage];
    }
    while($Tempstunden < $stunden && isset($this->stundenplan[$TempTage][$Tempstunden]["Fach"])){
        $TempTempstunden = $Tempstunden + 1;
        if($TempTempstunden < count($this->stundenplan[$TempTage])){
            if($this->stundenplan[$TempTage][$Tempstunden]["Fach"] == $this->stundenplan[$TempTage][$TempTempstunden]["Fach"]){    
                $output = printhour($wahttodo = 2 , $Tempstunden, $TempTage, $TempTempstunden, $this->stundenplan, $output);
                $Tempstunden++;
            }else {
                $output = printhour($wahttodo = 1 , $Tempstunden, $TempTage, $TempTempstunden, $this->stundenplan, $output);
            }
        } else {
            $output = printhour($wahttodo = 1 , $Tempstunden, $TempTage, $TempTempstunden, $this->stundenplan, $output);
        }
        $Tempstunden++;
    }
    $output .= "</td>";
    $TempTage++;
    }

    $output .= "</tr>";
    $output .= "</table>";

?>