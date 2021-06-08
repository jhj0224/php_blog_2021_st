<?php
session_start();
require_once __DIR__ . "/util.php";
require_once __DIR__ . "/app.php";

$dbConn = mysqli_connect("127.0.0.1", "st__2021_04_full__site12", "1234", "st__2021_04_full__site12") or die("DB CONNECTION ERROR");

?>