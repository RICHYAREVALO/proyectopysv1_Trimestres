<?php
$host = "localhost";
$username = "root";
$pw = "";
$db_name = "database";

$conn = new mysqli($host, $username, $pw, $db_name);
if (!$conn) {
   die('Database connection failed');
}
