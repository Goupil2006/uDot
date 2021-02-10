<nav>
      <a href="#" class="navbutton" onclick="sidebaropen()">&#9776;</a>
      <a href="http://www.gis-informatik.de/~schuelerapp/uDot/index.php" class="title">Schülerapp</a>
      <div id="sidebar">
        <a href="#" id="close" onclick="sidebarclose()">close &#10006;</a>
        <a href="#"><img src="../../icons/paln-white.png" style="width:25px; height: 25px; color:red; margin-right: 5px;">Plan</a>
        <a href="#"><img src="../../icons/Arbeiten-white.png" style="width:25px; height: 25px; color:red; margin-right: 5px;">Arbeiten</a>
        <a href="#"><img src="../../icons/Arbeiten-white.png" style="width:25px; height: 25px; color:red; margin-right: 5px;">Hausaufgaben</a>
        <a href="#"><img src="../../icons/note-white.png" style="width:25px; height: 25px; color:red; margin-right: 5px;">Noten</a>
        <a href="#"><img src="../../icons/Lehrer-nav-bar_white.png" style="width:25px; height: 25px; color:red; margin-right: 5px;">Lehrer</a>
      </div>
      <div class="Anmeldebereich">
        <img src="../../img/Anmeldeicon.png">
        <a href="http://www.gis-informatik.de/~schuelerapp/uDot/Unterwebseiten/Anmeldung/Anmeldung.php" class="Anmelden">Anmelden</a>
        <a href="http://www.gis-informatik.de/~schuelerapp/uDot/Unterwebseiten/Registration/Regestrieren.php" class="Registrieren">Registrieren</a>
      </div>
    </nav>
    <script type="text/javascript">
      function sidebaropen() {
        document.getElementById("sidebar").style.display = "block"
      }
      function sidebarclose() {
        document.getElementById("sidebar").style.display = "none"
      }
    </script>