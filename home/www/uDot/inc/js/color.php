<script type="text/javascript">

    var color = "#<?php echo $user->getcolor(); ?>";

    window.addEventListener("load", () => {
        for(var i = 0; i < document.getElementsByTagName("a").length; i++){
            document.getElementsByTagName("a")[i].style.color = color;
        }
        for(var i = 0; i < document.getElementsByClassName("title2").length; i++){
            document.getElementsByClassName("title2")[i].style.backgroundColor = color;
        }
        document.getElementById("navbar").style.borderColor = color;
        document.getElementById("close").style.color = color;
        document.getElementById("bearbeitenbutton").style.color = "#FFFFFF";
        document.getElementById("Heute").style.borderColor = color;
        document.getElementById("Abfrage").style.color = color;
        document.getElementById("Ja").style.color = color;
        document.getElementById("Toduu").style.borderColor = color;
        document.getElementById("Tagha").style.borderColor = color;
        
    });


</script>