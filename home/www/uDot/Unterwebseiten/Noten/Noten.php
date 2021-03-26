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
        if (window.innerWidth > 1665) {
            document.getElementById("sidebar").style.display = "block";
            document.getElementById("sidebar").style.display = "Flex";
        }
    </script>
</head>
<body onresize="myFunction()">
    <?php 
        include "../../inc/nav.php";
    ?>



    <?php 
        include "../../inc/js/color.php";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
</body>
</html>