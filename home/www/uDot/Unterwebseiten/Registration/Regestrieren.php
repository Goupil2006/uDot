<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Anmeldung bei der Schülerapp</title>
		<link rel="stylesheet" href="css/Regestrierung.css">
	</head>
	<body>
		<?php 
			$jsondata = array("Allgemein"=> array("Lasttimeonline"=> null),"Hausaufgaben"=> array("Anzahl"=> 0),"Arbeiten"=> array("Anzahl"=> 0),"Noten"=> array("Anzahl"=> 0));
			if(isset($_POST["ges"])){
				$con = mysqli_connect("127.0.0.1:3307", "schuelerapp", "WsdSuwmnA26!", "schuelerapp");
				$user = $_POST["username"];
				$sql = mysqli_query($con, "SELECT * FROM nutzer WHERE name LIKE '$user'"); //Username überprüfen
				$count = mysqli_num_rows($sql);
				if($count == 0){
					if($_POST["pw"] == $_POST["pw2"]){
						//User anlegen
						$json = $user . ".json";
						file_put_contents("../../nutzer/$json", json_encode($jsondata));
						$user = $_POST["username"];
						$Schule = $_POST["Schule"];
						$Klasse = $_POST["Klasse"];
						$pw = $_POST["pw"];
						$hash = password_hash($pw, PASSWORD_DEFAULT);
						mysqli_query($con, "INSERT INTO `nutzer` (`name`, `passwort`, `Schule`, `Klasse`, `json`) VALUES ('$user', '$hash', '$Schule', '$Klasse', '$json')");
						echo "Dein Account wurde angelegt";
					} else {
						echo "Die Passwörter stimmen nicht überein";
					}
				} else {
					echo "Der Username ist bereits vergeben";
				}
				mysqli_close($con);
			}
		?>
        <form action="Regestrieren.php" method="post" class="anmeldung">
            <div class="main">
				<div class="login-box">

					<div class="textbox">
						<i class="fas fa-user"></i>
						<input type="text" name="username" placeholder="Benutzername">
					</div>

					<div class="textbox">
						<i class="fas fa-users"></i>
						<select name="Schule">
							<option value="Gymnasium-im-Schloss" selected="selected">Gymnasium-im-Schloss</option>
							<option value="Große-Schule" selected="selected">Große-Schule</option>
						</select>
					</div>

					<div class="textbox">
						<i class="fas fa-school"></i>
						<select name="Klasse">
							<option value="9it" selected="selected">9it</option>
							<option value="9nw" selected="selected">9nw</option>
						</select>
					</div>

					<div class="textbox">
						<i class="fas fa-lock"></i>
						<input type="password" name="pw" placeholder="Password">
					</div>	

					<div class="textbox">
						<i class="fas fa-lock"></i>
						<input type="password" name="pw2" placeholder="Password-wiederholung">
					</div>	
					
					<input type="submit" name="ges" class="btn" value="Sign in">
				</div>
            </div>
        </form>
	</body>
</html>