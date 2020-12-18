<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees App</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <div id="external">
        <div class="Left"> <img id="background" src="wh.jpeg" alt="cover">
        </div>
        <div class="right">
            <div class="card">

                <h5 class="card-header " style="background: #854b3d;">
                    <p class="header-back">Employees App</p>
                </h5>
                <br><br>

                <!--Card content-->
                <div class="card-body px-lg-5 pt-0">
                    <form action="loogin.php" method="POST">
                        <div class="md-form">
                            <h1 style="text-align: center;">Login</h1>
                            <input type="text" placeholder="Enter Username" id="username" name="username" id="materialLoginFormEmail" class="form-control" required>
                        </div>
                        <br>
                        <div class="md-form">

                            <input type="password" placeholder="Enter Password" id="pass" name="pass" id="materialLoginFormEmail" class="form-control" required>
                        </div>
                        <div class="md-form">

                            <button class="btn btn-rounded btn-block my-4 waves-effect z-depth-0 " style="border: 1px solid #854b3d;   font-size: 1.3vw;
                            font-weight: 700;" id="login" name="login">Login</button>
                        </div>
                        <?php
                        if (@$_GET['Invalid'] == true) {
                        ?>
                            <div class="alert-light text-danger text-center py-3">
                                <?php echo $_GET['Invalid'] ?>
                            </div>
                        <?php
                        }
                        ?>
                        <p>Not a member?
                            <a href="registration.html">Register</a>
                        </p>

                        <br><br>
                        <label>“When you wear a mask you'll be saving a life. That life could be your own, or someone
                            who means a lot to you.” <br>Wear your Mask Please!</label>
                    </form>
                    <div id="result"></div>


                    <!-- <script>
        $(document).ready(function () {
            $("#login").click(function () {
                var myData = {
                    username: $("#username").val(),
                    pass: $("#pass").val(),
                };
                $.ajax({
                    url: 'login.php',
                    type: "POST",
                    data: myData,
                    success: function (receivedData) {
                        var obj = JSON.parse(receivedData);
                        $("#result").html(obj.result);
                        location.href = "home.php"
                        // alert(obj.result);
                    },
                    error: function () {
                        alert('failure');
                    }
                });
            });
        });

    </script> -->
                    <!-- <script>
        $(document).ready(function () {
            $("#login").click(function () {
                var myData = {
                    username: $("#username").val(),
                    pass: $("#pass").val(),
                };
                $.ajax({
                    url: 'login.php',
                    type: "POST",
                    data: myData,
                    success: function (receivedData) {
                        location.href = "home.php"
                    },
                    error: function () {
                        alert('failure');
                    }
                });
            });
        });

    </script> -->

</body>

</html>