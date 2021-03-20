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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script type="text/javascript">
    // wenn größe geendert wird wird die Function aufgerufen
    function myFunction() {
        // wenn seite größer als 1665 ist wird die navbar angezeigt
        if (window.innerWidth > 1500) {
            document.getElementById("sidebar").style.display = "block";
        }
    }
    </script>
    <?php 
        // style wird hinzugefügt
        include "../../css/style.php";
    ?>
    <title>Schülerapp</title>

    <style>
    #form1 {
        position: fixed;
        width: 50%;
        left: 25%;
        height: 60%;
        top: 25%;
        border: 1px solid #000000;
        border-radius: 10px;
        padding: 1em;
        z-index: 99999;
        background-color: #FFFFFF;
    }

    .nice {
        position: absolute;
        top: 1em;
        left: 1em;
    }


    @media (max-width: 1665px) {
        #form1 {
            position: fixed;
            width: 80%;
            left: 10%;
            right: 10%;
            height: 49%;
            top: 10%;
            border: 1px solid #000000;
            border-radius: 10px;
            padding: 10px;
        }
    }

    #Main {
        margin-left: -10em;
    }

    #addthing {
        position: absolute;
        top: 5em;
        right: 1em;
        background: url('../../icons/Plus.png');
    }

    .row {
        position: relative;
        color: black;
        height: 10em;
        background-color: #FFFFFF;
        border-radius: 1em;
        margin-bottom: 2em;
    }

    .row h1 {
        border-radius: 0.4em 0.4em 0em 0em;
        height: 1.2em;
        background-color: #00FF00;
        border-bottom: 1px solid black;
    }

    .row p {
        margin-top: 0em;
    }

    .btn2 {
        position: absolute;
        top: 0.1em;
        right: 1em;
        width: 7em;
    }
    .hidden {
        display: none;
    }
    </style>
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
        var object = document.createElement("div");
        object.setAttribute("id", "abfrage");
        object.innerHTML = `
                <form id="form1" method="post" action="Hausaufgaben.php" class="row g-3"> 
                    <input class="hidden" type="input" name="welches" value="` + i + `">
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
                        <textarea class="form-control" name="Beschreibung" placeholder="Beschreibung:" id="floatingTextarea2" style="height: 100px">Buch Seite 4, Ausgabe 3</textarea>
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
                        <button type="submit" name="submit2" class="btn btn-primary">Sign in</button>
                    </div>
                    <div class="col-10">
                        <a id="abbrechen" class="btn btn-primary">Abbrechen</a>
                    </div>
                </form>
            
            `;
        document.getElementById("bodyid").insertBefore(object, document.getElementById("bodyid").firstChild);
        document.getElementById("abbrechen").addEventListener("click", () => {
            document.getElementById("abbrechen").remove();
        });
    }

    function addthing() {
        var object = document.createElement("div");
        object.setAttribute("class", "abfrage");
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
                        <textarea class="form-control" name="Beschreibung" placeholder="Beschreibung:" id="floatingTextarea2" style="height: 100px">Buch Seite 4, Ausgabe 3</textarea>
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
                        <button type="submit" name="submit" class="btn btn-primary">Sign in</button>
                    </div>
                </form>
            
            `;
        document.getElementById("bodyid").appendChild(object);
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
</body>

</html>