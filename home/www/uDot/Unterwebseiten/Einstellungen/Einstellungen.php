<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
    .opzionen li{
        width: 92%;
        padding: 3em;
        border-bottom: 0.25em solid #000000;
    }
    .opzionen {
        text-decoration: none;
    }
    .opzionen li div{
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
    </style>
</head>

<body>
    <?php 
        include"../../inc/nav.php";
    ?>
    <div id="Main">
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
                    <select class="lol" name="Schule">
						<option selected="selected">rot</option>
						<option>orange</option>
                        <option>gelb</option>
                        <option>grün</option>
                        <option>hell-blau</option>
                        <option>blau</option>
                        <option>indigo</option>
                        <option>lila</option>
                        <option>pink</option>

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
    </div>
</body>

</html>