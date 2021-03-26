<?php 
    session_start();
    $con = mysqli_connect("127.0.0.1:3307", "schuelerapp", "WsdSuwmnA26!", "schuelerapp");
    if(isset($_SESSION["username"])){
                $username = $_SESSION["username"];
                $sql = mysqli_query($con, "SELECT * FROM nutzer WHERE name LIKE '$username'");
                $dsatz = mysqli_fetch_assoc($sql);
    }
    if(isset($_SESSION["username"])){
                $jsonname = $dsatz["json"];
                $jsondata = json_decode(file_get_contents("../../nutzer/$jsonname"));
    }
?>
<?php 
        if(isset($_POST['submit'])){

            $jsondata[0][0]->akzent = $_POST['farbe'];
            file_put_contents("../../nutzer/$jsonname", json_encode($jsondata));
            header("Location: ../../index.php");
            exit;
        }

    ?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php 
        include "../../css/style.php";
    ?>
    <style>
    .opzionen li {
        width: 92%;
        padding: 3em;
        border-bottom: 0.25em solid #000000;
    }

    .opzionen {
        text-decoration: none;
    }

    .opzionen li div {
        display: inline-block;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
        position: absolute;
        right: 5em;
    }

    .lol {
        position: absolute;
        right: 5em;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    .submit {
        position: fixed;
        right: 2em;
        bottom: 2em;
    }
    </style>
</head>

<body>


    <?php 
        include"../../inc/nav.php";
    ?>
    <div id="Main">
        <form action="Einstellungen.php" method="post">
            <ul class="opzionen">
                <li>
                    <div class="Bechreibung">Darkmode / Lightmode</div>
                    <label class="switch">
                        <input type="checkbox">
                        <span class="slider round"></span>
                    </label>
                </li>
                <li>
                    <div class="Bechreibung">Akzentfarbe</div>
                    <select class="lol" name="farbe">
                        <option value="FF0000" selected="selected">Rot</option>
                        <option>Orange</option>
                        <option>Gelb</option>
                        <option>Grün</option>
                        <option>Hell-Blau</option>
                        <option>Blau</option>
                        <option>Indigo</option>
                        <option>Lila</option>
                        <option>Pink</option>

                    </select>
                </li>
                <li>
                    <div class="Bechreibung">Das ist ein test und du kannst dich entscheiden</div>
                    <label class="switch">
                        <input type="checkbox">
                        <span class="slider round"></span>
                    </label>
                </li>
            </ul>
            <input type="submit" class="submit" name="submit" value="Speichern">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
</body>

</html>