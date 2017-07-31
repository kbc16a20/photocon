<?php
$host = "localhost";
$username = "sampleuser";
$password = "ju78iklo";
$dbname = "photocondb";
$mysqli = new mysqli( $username, $password);
$mysqli->set_charset("utf8");
if ($mysqli->connect_error) {
    error_log($mysqli->connect_error);
    exit;
}