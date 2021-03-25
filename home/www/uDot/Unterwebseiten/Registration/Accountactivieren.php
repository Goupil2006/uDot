<?php 
    session_start();
    if(isset($_POST["submit"])){
        if($code == $_POST["code"]){
            $_SESSION["username"] = $_SESSION["usernamenotactiv"];
            header("Location: weitereeinstellungen.php");
        }
    }else {
    $user = $session["usernamenotactiv"];
    $code = rand(100000, 999999);
    mail("marc.bernard@iserv-gis.de", "your code", "your code" . $code);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account audentifiezieren</title>
</head>
<body>
    <?php 
        echo $code;
    ?>
    <form action="Accountactivieren.php" method="post">
        <input type="text" name="code">
        <input type="submit" name="submit">
    </form>
</body>
</html>