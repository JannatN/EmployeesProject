<?php
session_start();
$name = $_SESSION['username'];
if (!isset($_SESSION["username"])) {

    header("location: looginHTML.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>HOME</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="external">
        <div class="leftSide">
            <div id="company"> <img id="proimg" src="profile.png" alt="icon">
                <p class="profile"><a href="Home.php">Profile</a></p>
            </div>
            <div> <img id="happyman" src="happy man2.png" alt="employee" width="200">
            </div>
        </div>
        <div class="rightSide">
            <header>
                <p id="dash">
                    <?php
                    echo 'Welcome ' . $name . ' in Employees App';
                    ?>
                </p>
                <span id="name">
                    <form action="logout.php" method="POST">
                        <button id="logout">Logout</button>
                    </form>
                </span>
            </header>
            <div id="sec-1">
                <img id="lifeEmp" src="c.png" alt="c" width="500">
                <div id="sec-2">
                    <div class="overview">
                        <p class="subtitles"> &nbsp; First Section &nbsp;&nbsp; </p>
                        <p class="innerHref"><a href="employee.php">Employees</a></p>
                    </div>
                    <div class="sources">
                        <p class="subtitles">Second Section</p>
                        <p class="innerHref"><a href="dept.php">Departments</a></p>
                    </div>
                </div>

            </div>

        </div>

    </div>
    </div>
</body>

</html>