<?php
session_start();

require_once __DIR__ . "/config.php";
require_once SITE_ROOT . "/db_conn.php";

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    $to_user_id = $_POST['to_user_id']; // Get the user ID from the hidden field

    if (!is_numeric($to_user_id) || $to_user_id == $_SESSION['id']) {
        die("Invalid user ID");
    }

    $today = date('Y-m-d');
    $from = $_SESSION['id'];

    $query = "INSERT INTO pokes(`from`, `to`, `date_created`) VALUES('$from', '$to_user_id', '$today')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: home.php");
        exit();
    } else {
        echo "Failed to poke user.";
    }

} else {
    header("Location: index.php");
    exit();
}
