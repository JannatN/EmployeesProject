<?php
$conn =  mysqli_connect("localhost", "root", "", "employees") or die("FAILEEED");

mysqli_select_db($conn, "employees") or die("could not connect to db");
session_start();

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $pass = md5($_POST["pass"]);

    $query = "SELECT * from users where users.username ='$username' AND users.password ='$pass'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) < 1) {
        $result = 'Please check your username or password';
        header('location: loogin.html');
    } else {
        $result = 'Welcome ' . $username;
        $_SESSION['username'] = $username;
        header('location: Home.php');
    }
}
