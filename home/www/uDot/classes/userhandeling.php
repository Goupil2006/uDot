<?php
    class userhandle {

        private $sql;
        private $where;
        private $userdata;
        private $con;
        private $stundenplan;
        private $username;
        private $jsondata;

        public function __construct($name, $where){
            $this->con = new mysqli("127.0.0.1:3307", "schuelerapp", "WsdSuwmnA26!", "schuelerapp");
            $this->username = $name;
            $this->sql = $this->con->prepare("SELECT json FROM nutzer WHERE name LIKE ?");
            $this->sql->bind_param("s", $this->username);
            $this->sql->execute();
            $this->sql->bind_result($json);
            $this->userdata = $this->sql->fetch();
            $this->username = $json;
            $this->where = $where;
            if($where == 1){
                $this->jsondata = json_decode(file_get_contents("nutzer/$this->username"), true);
            } else {
                $this->jsondata = json_decode(file_get_contents("../../nutzer/$this->username"), true);
            }
            $this->stundenplan = $this->jsondata[5][0];
        }

        public function resetjson(...$hausaufgaben){
            if(isset($hausaufgaben)){
                $this->jsondata[1] = $hausaufgaben;
            }
            if($this->where == 1){
                file_put_contents("nutzer/$this->username", json_encode($this->jsondata));
                $this->jsondata = json_decode(file_get_contents("nutzer/$this->username"), true);
            }else {
                file_put_contents("../../nutzer/$this->username", json_encode($this->jsondata));
                $this->jsondata = json_decode(file_get_contents("../../nutzer/$this->username"), true);
            }
        }

        public function gettable(){
            include "inc/tabelle.php";
            return $output;
        }

        public function addha() {
            array_push($this->jsondata[1], array("title" => $_POST["title"], "Ablaufdatum" => $_POST["Datum"], "Fach" => $_POST["Fach"], "Beschreibung" => $_POST["Beschreibung"]));
            $this->resetjson($this->jsondata[1]);
        }

        public function changeha(){
            $this->jsondata[1][intval($_POST["welches"])] = array("title" => $_POST["title"], "Ablaufdatum" => $_POST["Datum"], "Fach" => $_POST["Fach"], "Beschreibung" => $_POST["Beschreibung"]);
        }

        public function deleteha() {
            unset($this->jsondata[1][intval($_POST["welches"])]);
            $this->resetjson($this->jsondata[1]);
        }

        public function printha() {
            include("../../inc/hausaufgabenausgabe.php");
        }

        public function getjson(){
            return $this->jsondata;
        }

        public function getcolor(){
            return $this->jsondata[0][0]["akzent"];
        }

        public function covertdate($datum){
            $Temp = explode("-",$datum);
            $Temp = $Temp[2] . "." . $Temp[1] . "." . $Temp[0];
            return $Temp;
        }

        public function addFach($name, $pros, $prom) {
            array_push($this->jsondata[2][0], array($name, $pros, $prom));
            $this->resetjson();
        }

        public function getFach() {
            return $this->jsondata[2][0];
        }

        public function setNote($name, $sm, $note){
            array_push($this->jsondata[2][1], array($name, $sm, $note));
            $this->resetjson();
        }

        public function getNote() {
            return $this->jsondata[2][1];
        }

        public function sortNote() {
            $Temp = array();
            for($i = 0; $i < count($this->jsondata[2][0]); $i++) {
                array_push($Temp, array("name" => $this->jsondata[2][0][$i][0], "schrift" => array(), "münd" => array()));
            }
            for($i = 0; $i < $this->jsondata[2][1]; $i++) {
                $Tempfach = $this->jsondata[2][1][$i][0];
                for($x = 0; $x < $this->jsondata[2][0][$x][0]; $x++) {
                    if($Tempfach == $this->jsondata[2][0][$x][0]){

                    }
                }
            }
            return $Temp;
        }
    }

?>