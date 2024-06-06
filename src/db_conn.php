<?php

$host = "db";
$user = "pokes_demo";
$password = "password";
$db = "pokes_demo";

$conn = mysqli_connect($host, $user, $password, $db);

if (!$conn) {
    echo "Connection failed!";
}


//$connect = mysqli_connect(
//    'db', # service name
//    'pokes_demo', # username
//    'password', # password
//    'pokes_demo' # db table
//);
//
//$table_name = "php_docker_table";
//
//$query = "SELECT * FROM $table_name";
//
//$response = mysqli_query($connect, $query);