<script type="text/javascript">

    var color = "#<?php echo $user->getcolor(); ?>";

    window.addEventListener("load", () => {
        for(var i = 0; i < document.getElementsByTagName("a").length; i++){
            document.getElementsByTagName("a")[i].style.color = color;
        }
        document.getElementById("navbar").style.borderColor = color;
        document.getElementById("close").style.color = color;
        document.getElementById("bearbeitenbutton").style.color = "#FFFFFF";
        if(document.getElementById("Heute").length > 0){
            document.getElementById("Heute").style.borderColor = color;
        }
        document.getElementById("Abfrage").style.color = color;
        document.getElementById("Ja").style.color = color;
        
    });


</script>