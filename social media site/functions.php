<?php

require "connection.php";

//if you ever want to check check
function check_login(){

    if(empty($_SESSION['logged'])){
        header("Location: login.php");
        die;
    }
}