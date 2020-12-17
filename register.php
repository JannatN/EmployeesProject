<?php
$conn =  mysqli_connect("localhost", "root", "", "employees") or die("FAILEEED");

mysqli_select_db($conn, "employees") or die("could not connect to db");
// if (isset($_POST['submit'])) {
//     $username = $_POST["username"];
//     $email = $_POST["email"];
//     $pass = md5($_POST["pass"]);
//     $re_pass = md5($_POST["re_pass"]);

//     $query = "INSERT INTO login(name, password) VALUES('$username', '$email', '$pass', '$re_pass')";


//     if($result = mysqli_query($conn, $query))

//     if (mysqli_num_rows($result) < 1) {
//         header('location: registration.html');
//     } else {
//         $result = 'Welcome ' . $username;
//         header('location: Home.html');

//     }
// }
// $username = stripslashes($_REQUEST['username']);
//     //escapes special characters in a string
// $username = mysqli_real_escape_string($conn,$username); 
// $email = stripslashes($_REQUEST['email']);
// $email = mysqli_real_escape_string($conn,$email);
// $password = stripslashes($_REQUEST['pass']);
// $password = mysqli_real_escape_string($conn,$password);

$username = mysqli_real_escape_string($conn, $_POST["username"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$pass = md5($_POST["pass"]);

$myObj = new stdClass();
$myObj->username =  $_POST["username"];
$myObj->email =  $_POST["email"];
$myObj->pass = md5($pass);

$query = "INSERT INTO users(username, email,password)  
    VALUES('$username', '$email', '$pass')";

// $query = "INSERT into `users` (username, email, password) 
//  VALUES ('$username',  '$email','" .md5($password) . "'";
$result = mysqli_query($conn, $query);
if ($result) {
    echo "<div class='form'>
            <h3>You are registered successfully.</h3>
            <br/>Click here to <a href='login.php'>Login</a></div>";
}
