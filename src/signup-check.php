<?php

session_start();

require_once __DIR__ . "/config.php";
require_once SITE_ROOT . "/db_conn.php";

if (isset($_POST['username'])
    && isset($_POST['first_name'])
    && isset($_POST['last_name'])
    && isset($_POST['email'])
    && isset($_POST['password'])
    && isset($_POST['confirm_password'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['username']);
    $firstName = validate($_POST['first_name']);
    $lastName = validate($_POST['last_name']);
    $email = validate($_POST['email']);
    $pass = validate($_POST['password']);
    $confirm_pass = validate($_POST['confirm_password']);

    $user_data = 'username=' . $username;
    $date_created = date("Y-m-d H:i:s");

    if (empty($username)) {
        header("Location: signup.php?error=Username is required&$user_data");
        exit();
    } else if (empty($firstName)) {
        header("Location: signup.php?error=First name is required&$user_data");
        exit();
    } else if (empty($lastName)) {
        header("Location: signup.php?error=Last name is required&$user_data");
        exit();
    } else if (empty($email)) {
        header("Location: signup.php?error=Email is required&$user_data");
        exit();
    } else if (empty($pass)) {
        header("Location: signup.php?error=Password is required&$user_data");
        exit();
    } else if (empty($confirm_pass)) {
        header("Location: signup.php?error=Confirm password is required&$user_data");
        exit();
    } else if ($pass !== $confirm_pass) {
        header("Location: signup.php?error=The confirmation password does not match&$user_data");
        exit();
    } else {

        $pass = md5($pass);

        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            header("Location: signup.php?error=The username is taken try another&$user_data");
        } else {
            $sql2 = "INSERT INTO users(username, first_name, last_name, email, password, date_created) VALUES('$username', '$firstName', '$lastName', '$email', '$pass', '$date_created')";
            $result2 = mysqli_query($conn, $sql2);

            if ($result2) {
                header("Location: signup.php?success=Your account has been created successfully");
            } else {
                header("Location: signup.php?error=unknown error occurred&$user_data");
            }
        }
        exit();
    }

} else {
    header("Location: signup.php");
    exit();
}