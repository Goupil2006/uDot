<?php 
    class userhandle {

        private $sql;
        private $userdata;
        private $con;
        private $stundenplan;
        private $username;
        private $jsondata;

        public function __construct($name, $con, $where){
            $this->con = $con;
            $this->username = $name;
            $this->sql = mysqli_query($this->con, "SELECT * FROM nutzer WHERE name LIKE '$this->username'");
            $this->userdata = mysqli_fetch_assoc($this->sql);
            $this->username = $this->userdata["json"];
            if($where == 1){
                $this->jsondata = json_decode(file_get_contents("nutzer/$this->username"), true);
            } else {
                $this->jsondata = json_decode(file_get_contents("../../nutzer/$this->username"), true);
            }
            $this->stundenplan = $this->jsondata[5][0];
        }

        public function resetjson($hausaufgaben){
            $this->jsondata[1] = $hausaufgaben;
            file_put_contents("../../nutzer/$this->username", json_encode($this->jsondata));
            $this->jsondata = json_decode(file_get_contents("../../nutzer/$this->username"), true);
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
    }

?>