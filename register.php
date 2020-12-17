<?php
$conn =  mysqli_connect("localhost", "root", "", "employees") or die("FAILEEED");

mysqli_select_db($conn, "employees") or die("could not connect to db");

$username = mysqli_real_escape_string($conn, $_POST["username"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$pass = md5($_POST["pass"]);

$myObj = new stdClass();
$myObj->username =  $_POST["username"];
$myObj->email =  $_POST["email"];
$myObj->pass = md5($pass);

$query = "INSERT INTO users(username, email,password) VALUES('$username', '$email', '$pass')";

$result = mysqli_query($conn, $query);
if ($result) {
    echo "WELCOME";
}
