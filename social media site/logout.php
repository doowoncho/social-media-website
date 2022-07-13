<?php
require "functions.php";

session_destroy();
session_unset();
session_regenerate_id();
 header("Location: index.php");
 die;
?>