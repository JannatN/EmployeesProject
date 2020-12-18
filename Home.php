<?php
session_start();
if (!isset($_SESSION["username"])) {

    header("location: looginHTML.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>

    <style>
        body {
            margin-top: 0px;
            background-color: #c3b5ac;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <a class="navbar-brand" href="#">
            <img src="icon.jpeg" class="d-inline-block align-top" alt="" loading="lazy">
            Employees Application
        </a>
    </div>
    <br><br><br><br>
    <div id="external">
        <form action="logout.php" method="POST">
            <button id="logout">Logout</button>
        </form>
        <div><img id="qoute" src="Capture.PNG" alt="qoute"></div>
        <div class="butns">
            <div id="mynav">
                <li><a href="employee.php">Employees</a></li>
                <li><a href="dept.php">Departments</a></li>
            </div>
        </div>
    </div>
</body>

</html>