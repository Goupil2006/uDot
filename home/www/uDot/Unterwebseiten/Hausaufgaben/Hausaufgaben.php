<?php   
    include '../../inc/connect.php';
    include '../../classes/userhandeling.php';
    // session wird gestartet um mit $_SESSION daten auszulesen
    session_start();
    // wird überprüft ob nutzer angemeldet ist
    if(isset($_SESSION["username"])){
        $username = $_SESSION["username"];
        $user = new userhandle($username, $con, 2);
        $jsondata = $user->getjson();
    }

    if(isset($_POST["submit"])){
        $user->addha();
        $jsondata = $user->getjson();
    }

    if(isset($_POST["submit2"])){
        $user->changeha();
    }

    if(isset($_POST["submit3"])){
        $user->deleteha();
    }
    $jsondata = $user->getjson();

?>
<!DOCTYPE html>
<html lang="de" dir="ltr">

<head>
    <link rel="shortcut icon" type="image/x-icon" href="../../icons/Lehrer-nav-bar_white.png" />
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script type="text/javascript">
    // wenn größe geendert wird wird die Function aufgerufen
    function myFunction() {
        // wenn seite größer als 1665 ist wird die navbar angezeigt
        if (window.innerWidth > 1500) {
            document.getElementById("sidebar").style.display = "block";
            document.getElementById("sidebar").style.display = "Flex";
        }
    }
    </script>
    <title>Schülerapp</title>
</head>

<body onresize="myFunction()" id="bodyid">
    <?php 
        include "../../inc/nav.php";
    ?>
    <!--Main Bereich-->

    <button type="button" onclick="addthing()" id="addthing" class="btn btn-primary"><img src="../../icons/Plus.png"
        style="height: 2em; width: 2em;"></button>
    <?php
        $user->printha();
    ?>
    <!--Bootstrap wird eingebunden-->
    <script>
    function bearbeiten(i) {
        document.getElementsByTagName("nav")[0].setAttribute("class", "blur");
        document.getElementById("main").setAttribute("class", "blur");
        var object = document.createElement("div");
        object.setAttribute("id", "abfrage");
        object.innerHTML = `
                <form id="form1" method="post" action="Hausaufgaben.php" class="row g-3"> 
                    <input class="hidden" type="input" name="welches" value="` + i + `">
                    <div class="col-md-4">
                        <label for="inputAddress" class="form-label">Titel:</label>
                        <input type="text" name="title" class="form-control" id="inputitel" placeholder="Mathe Hausaufgabe" value="` + document.getElementsByClassName("title2")[parseInt(i)].innerText + `">
                    </div>

                    <div class="col-md-4">
                        <label for="inputFach4" class="form-label">Fach:</label>
                        <input type="text" name="Fach" class="form-control" id="inputFach4" placeholder="Mathematik" value="` + document.getElementsByClassName("Fach")[parseInt(i)].innerText + `">
                    </div>

                    <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Datum:</label>
                        <input type="date" name="Datum"  class="form-control" id="inputDatum4" value="` + document.getElementsByClassName("Ablaufdatum")[parseInt(i)].innerText + `">
                    </div>

                    <div class="col-md-4">
                        <label for="inputBeschreibung" class="form-label">Beschreibung:</label>
                        <textarea class="form-control" name="Beschreibung" placeholder="Beschreibung:" id="floatingTextarea2" style="height: 100px">` + document.getElementsByClassName("Beschreibung")[parseInt(i)].innerText + `</textarea>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Mich erinnern!
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
                        <label class="form-check-label" for="flexRadioDefault2">
                            Mich nicht erinnern!
                        </label>
                    </div>

                    <div class="col-10">
                        <button type="submit" name="submit2" class="btn btn-primary">Speichern</button>
                    </div>
                    <div class="col-10">
                        <a id="abbrechen" class="btn btn-primary">Abbrechen</a>
                    </div>
                </form>
            
            `;
        document.getElementById("bodyid").insertBefore(object, document.getElementById("bodyid").firstChild);
        document.getElementById("abbrechen").addEventListener("click", () => {
            document.getElementById("abfrage").remove();
            document.getElementsByTagName("nav")[0].removeAttribute("class");
            document.getElementById("main").removeAttribute("class");
        
        });
    }

    function addthing() {
        document.getElementsByTagName("nav")[0].setAttribute("class", "blur");
        document.getElementById("main").setAttribute("class", "blur");
        var object = document.createElement("div");
        object.setAttribute("id", "abfrage");
        object.innerHTML = `
                <form id="form1" method="post" action="Hausaufgaben.php" class="row g-3"> 
                    <div class="col-md-4">
                        <label for="inputAddress" class="form-label">Titel:</label>
                        <input type="text" name="title" class="form-control" id="inputitel" placeholder="Mathe Hausaufgabe">
                    </div>

                    <div class="col-md-4">
                        <label for="inputFach4" class="form-label">Fach:</label>
                        <input type="text" name="Fach" class="form-control" id="inputFach4" placeholder="Mathematik">
                    </div>

                    <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Datum:</label>
                        <input type="date" name="Datum"  class="form-control" id="inputDatum4">
                    </div>

                    <div class="col-md-4">
                        <label for="inputBeschreibung" class="form-label">Beschreibung:</label>
                        <textarea class="form-control" name="Beschreibung" placeholder="Beschreibung:" id="floatingTextarea2" style="height: 100px"></textarea>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Mich erinnern!
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
                        <label class="form-check-label" for="flexRadioDefault2">
                            Mich nicht erinnern!
                        </label>
                    </div>

                    <div class="col-10">
                        <button type="submit" name="submit" class="btn btn-primary">Speichern</button>
                    </div>
                    <div class="col-10">
                        <a id="abbrechen2" class="btn btn-primary">Abbrechen</a>
                    </div
                </form>
            
            `;
        document.getElementById("bodyid").insertBefore(object, document.getElementById("bodyid").firstChild);
        document.getElementById("abbrechen2").addEventListener("click", () => {
            document.getElementById("abfrage").remove();
            document.getElementsByTagName("nav")[0].removeAttribute("class");
            document.getElementById("main").removeAttribute("class");
        });

    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>

    <?php 
        include "../../inc/js/color.php";
    ?>
</body>

</html>