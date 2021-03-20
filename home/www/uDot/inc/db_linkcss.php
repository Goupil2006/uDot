<!DOCTYPE html><html><head><meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="db_linkcss.css">

<script type="text/javascript">
function send(aktion,id)
{
   if(aktion==2)
      if (!confirm("Datensatz mit id " + id + " entfernen?"))
         return;

   document.f.aktion.value = aktion;
   document.f.id.value = id;
   document.f.submit();
}
</script>
</head>

<body>
<?php
   $con = mysqli_connect("", "root", "", "udot");

   /* Sortierung, wird ggf. überschrieben */
   $od = " ORDER BY personalnummer";

   /* Aktion ausführen */
   if(isset($_POST["aktion"]))
   {
      /* neu eintragen */
      if($_POST["aktion"] == "0")
      {
         $na = mysqli_real_escape_string($con, $_POST["na"][0]);
         $vo = mysqli_real_escape_string($con, $_POST["vo"][0]);
         $pn = intval($_POST["pn"][0]);
         $gh = doubleval($_POST["gh"][0]);
         $gb = mysqli_real_escape_string($con, $_POST["gb"][0]);
         $sql = "INSERT INTO nutzer"
           . "(name, vorname, personalnummer, gehalt, geburtstag)"
           . " VALUES('$na', '$vo', $pn, $gh, '$gb')";
         mysqli_query($con, $sql);
      }

      /* ändern */
      else if($_POST["aktion"] == "1")
      {
         $id = $_POST["id"];
         $na = mysqli_real_escape_string($con, $_POST["na"][$id]);
         $vo = mysqli_real_escape_string($con, $_POST["vo"][$id]);
         $pn = intval($_POST["pn"][$id]);
         $gh = doubleval($_POST["gh"][$id]);
         $gb = mysqli_real_escape_string($con, $_POST["gb"][$id]);
         $sql = "UPDATE nutzer SET name='$na', vorname='$vo',"
           . " personalnummer=$pn, gehalt=$gh, geburtstag='$gb'"
           . " WHERE personalnummer=$id";
         mysqli_query($con, $sql);
      }

      /* löschen */
      else if($_POST["aktion"] == "2")
      {
         $sql = "DELETE FROM nutzer WHERE personalnummer = "
            . $_POST["id"];
         mysqli_query($con, $sql);
      }

      /* sortieren */
      else if($_POST["aktion"] == "3")
         $od = " ORDER BY name";
      else if($_POST["aktion"] == "4")
         $od = " ORDER BY vorname";
      else if($_POST["aktion"] == "5")
         $od = " ORDER BY personalnummer";
      else if($_POST["aktion"] == "6")
         $od = " ORDER BY gehalt";
      else if($_POST["aktion"] == "7")
         $od = " ORDER BY geburtstag";
   }

   /* Formularbeginn */
   echo "<form name='f' action='db_linkcss.php' method='post'>";
   echo "<input name='aktion' type='hidden'>";
   echo "<input name='id' type='hidden'>\n\n";

   /* Tabellenbeginn */
   echo "<table border='1'><tr>";
   echo "<td><a href='javascript:send(3,0);'>Name</a></td>";
   echo "<td><a href='javascript:send(4,0);'>Vorname</a></td>";
   echo "<td><a href='javascript:send(5,0);'>P-Nr</a></td>";
   echo "<td><a href='javascript:send(6,0);'>Gehalt</a></td>";
   echo "<td><a href='javascript:send(7,0);'>Geburtstag</a></td>";
   echo "<td>Aktion</td></tr>\n\n";

   /* Neuer Eintrag */
   echo "<tr>";
   echo "<td><input name='na[0]' size='6'></td>";
   echo "<td><input name='vo[0]' size='6'></td>";
   echo "<td><input name='pn[0]' size='6'></td>";
   echo "<td><input name='gh[0]' size='6'></td>";
   echo "<td><input name='gb[0]' size='10'></td>";
   echo "<td><a href='javascript:send(0,0);'>"
      . "neu eintragen</a></td>";
   echo "</tr>\n\n";

   /* Anzeigen */
   $res = mysqli_query($con, "SELECT * FROM nutzer $od");

   /* Alle vorhandenen Datensätze */
   while ($dsatz = mysqli_fetch_assoc($res))
   {
      $na = $dsatz["name"];
      echo "<tr>"
         . "<td><input name='na[$id]' value=\"$na\" size='6'></td>"
         . "<td><input name='vo[$id]' value=\"$vo\" size='6'></td>"
         . "<td><input name='pn[$id]' value=\"$pn\" size='6'></td>"
         . "<td><input name='gh[$id]' value=\"$gh\" size='6'></td>"
         . "<td><input name='gb[$id]' value=\"$gb\" size='10'></td>"
         . "<td><a href='javascript:send(1,$id);'>speichern</a>"
         . " <a href='javascript:send(2,$id);'>entfernen</a></td>"
         . "</tr>\n\n";
   }
   echo "</table>";
   echo "</form>";
   
   mysqli_close($con);
?>
</body></html>
