<?php
session_start();
include "config.php";


if (isset($_POST['name']) && isset($_POST['pwd'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlentities($data);
        return $data;
    }
    $uname = validate($_POST['name']);
    $pwd = validate($_POST['pwd']);

    if (empty($uname)) {
        header("location:login.php?error=Username is required");
        exit();
    } else if (empty($pwd)) {
        header("location:login.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM user WHERE username='$uname' AND password='$pwd'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $uname && $row['password'] === $pwd) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("location:index.php");
                exit();
            } else {
                header("location:login.php?error=Incorect username or password");
                exit();
            }
        } else {
            header("location:login.php?error=Incorect username or password");
            exit();
        }
    }
} else {
    header("location:login.php");
    exit();
}
