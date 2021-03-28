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
    $jsondata = $user->getjson();

    if(isset($_POST["submit"])){
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Noten</title>
    <script>
        function myFunction() {
            if (window.innerWidth > 1665) {
                document.getElementById("sidebar").style.display = "block";
                document.getElementById("sidebar").style.display = "Flex";
            }
        }
    </script>
    <link rel="stylesheet" href="style.css">
</head>
<body onresize="myFunction()">
    <?php 
        include "../../inc/nav.php";
    ?>

    <div id="Main">
        <button type="button" onclick="addthing()" id="addthing" class="btn btn-primary"><img src="../../icons/Plus.png"
        style="height: 2em; width: 2em;"></button>
    </div>

    <form id="theform" method="post" action="Noten.php">
        <h1 style="color: #000000;">Hallo</h1>
        <select id="what" class="form-select" aria-label="Default select example">
            <option value="1">Fach</option>
            <option value="2">Note</option>
        </select>
        <div id="formrest1">
            <div class="form-floating mb-3">
                <input name="Fachname" type="input" class="form-control" id="floatingInput" placeholder="Mathe">
                <label for="floatingInput">Name des Faches</label>
            </div>
            <div id="schriftmünd">
                <div id="schrift" class="form-floating mb-3">
                    <input name="Proschrift" type="input" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="input">Schriftlich in Prozent (z.B. 40%)</label>
                </div>
                <div id="münd" class="form-floating">
                    <input name="promünd" type="input" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Mündlich in Prozent (z.B. 60%)</label>
                </div>
            </div>
        </div>
        <div id="formrest2" style="display: none;">
            <select name="fachauswahl" id="Fach" class="form-select" aria-label="Default select example">
                <option value="1">Mathe</option>
                <option value="2">Deutsch</option>
            </select>
            <select name="schriftodermünd" id="schriftt" class="form-select" aria-label="Default select example">
                <option value="1">Schriftlich</option>
                <option value="2">Mündlich</option>
            </select>
            <select name="noteselctor" id="note" class="form-select" aria-label="Default select example">
                <?php 
                    for($i = 1; $i < 6; $i += 0.1){
                        echo '<option value="' . $i . '">' . $i . '</option>';
                    }
                ?>
            </select>
        </div>
        <input type="submit" name="submit" value="Hinzufügen">
    </form>


    <?php 
        include "../../inc/js/color.php";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        var witch = 1
        let selected = document.getElementById("what");

        selected.addEventListener("change", lookwhat);

        function lookwhat() {
            witch = this.options[this.selectedIndex].value;
            if(witch == 2){
                document.getElementById("formrest2").style.display = "block";
                document.getElementById("formrest1").style.display = "none";
            } else {
                document.getElementById("formrest1").style.display = "block";
                document.getElementById("formrest2").style.display = "none";
            }
        }

        function addthing() {
            
        }
    </script>
</body>
</html>