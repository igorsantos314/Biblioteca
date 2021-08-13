<?php
    class connection{

        public static function getConnection(){
            return mysqli_connect("localhost", "root", "", "database");
        }
    }
?>