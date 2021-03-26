<nav id="navbar">
    <a href="#" class="navbutton" onclick="sidebaropen()">&#9776;</a>
    <a href="http://www.gis-informatik.de/~schuelerapp/uDot/index.php" class="title">Schülerapp</a>
    <div id="sidebar">
        <a href="#" id="close" onclick="sidebarclose()">&#10006;</a>
        <a href="#"><img src="../../icons/paln-white.png"
                style="width:25px; height: 25px; color:red; margin-right: 5px;">Plan</a>
        <a href="#"><img src="../../icons/Arbeiten-white.png"
                style="width:25px; height: 25px; color:red; margin-right: 5px;">Arbeiten</a>
        <a href="../../Unterwebseiten/Hausaufgaben/Hausaufgaben.php"><img src="../../icons/Arbeiten-white.png"
                style="width:25px; height: 25px; color:red; margin-right: 5px;">Hausaufgaben</a>
        <a href="../../Unterwebseiten/Noten/Noten.php"><img src="../../icons/note-white.png"
                style="width:25px; height: 25px; color:red; margin-right: 5px;">Noten</a>
        <a href="../../Unterwebseiten/Einstellungen/Einstellungen.php"><img src="../../icons/Lehrer-nav-bar_white.png"
                style="width:25px; height: 25px; color:red; margin-right: 5px;">Einstellungen</a>
    </div>
    <div class="Anmeldebereich">
        <a style="font-size: 1em;" href="../../Unterwebseiten/Anmeldung/Anmeldung.php">
            <img style="margin-right: 5px; margin-top: 0.1em" src="../../icons/ICON_ohne_HUT_white.png">
        </a>
    </div>
</nav>
<script type="text/javascript">
function sidebaropen() {
    document.getElementById("sidebar").style.display = "Flex"
}

function sidebarclose() {
    document.getElementById("sidebar").style.display = "none"
}
</script>