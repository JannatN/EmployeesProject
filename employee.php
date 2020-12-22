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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

    <link rel="stylesheet" href="emp.css">

    <style>
        .content {
            background-color: #854b3d;
            width: 100%;
            /* height: 100%; */
            display: none;
            z-index: -1;
        }

        .active {
            display: block;
        }

        .hide {
            display: none;
        }

        table,
        tr,
        th,
        td {
            border: 1px solid #e3e3e3;
            padding: 7px;
            font-size: 10px;
            color: black;
            /* display: none; */
        }

        .insertCard {
            color: white;
            display: block;
            width: 50%;
            display: grid;
            justify-self: center;
            text-align: center;
            justify-content: center;
            margin-left: 25%;
        }

        .formbtn {
            background-color: #af8177;
            color: white;
            font-size: 1vw;
            padding: 4%;
            width: 100%;
            text-decoration: none;
            outline: none;
            cursor: pointer;
            border-radius: 30%;
            border: none;
            text-align: center;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        #nav {
            width: 100%;
            display: grid;
            grid-template-columns: auto;
            margin-left: 5%;
            grid-gap: 5%;
            height: 20vh;
        }
    </style>

</head>

<body>
    <div id="external">
        <div class="leftSide">
            <div> <img id="happyman" src="happy man2.png" alt="employee" width="200">
            </div>
        </div>
        <div class="rightSide">
            <header>
                <p id="dash">
                    <?php
                    echo 'Welcome ' . $name . ' in Employees Section';
                    ?>
                </p>
                <span id="name">
                    <form action="logout.php" method="POST">
                        <button id="logout">Logout</button>
                    </form>
                    <form action="home.php" method="POST">
                        <button id="logout">Home</button>
                    </form>
                </span>
            </header>
            <div id="sec-1">
                <div id="nav">
                    <p class="subtitles">Search BY:</p>
                    <form action="name_search.php">
                        <button class="formbtn" type="submit">Name</button>
                    </form>
                    <form action="dept_search.php">
                        <button class="formbtn" type="submit">Department</button>
                    </form>
                    <form action="title_search.php">
                        <button class="formbtn" type="submit">Title</button>
                    </form>
                    <form action="">
                        <button class="formbtn" type="submit">Salary</button>
                    </form>

                </div>
                <div id="sec-2">
                    <div class="overview">
                        <p class="subtitles"> View Employees information </p>
                        <button class="butn" id="btn1" type="submit"> Employees General Info </button>
                        <div class="content"></div>

                    </div>
                    <div class="sources">
                        <p class="subtitles">Insert New Employee</p>
                        <button type="button" name="id" id="id" data-toggle="modal" data-target="#add_data_Modal" class="butn">New Employee +</button>

                    </div>
                </div>

            </div>


        </div>

        <script>
            $(document).ready(function() {
                $("#btn1").on('click', function() {
                    $('.content').toggleClass('active');
                    if ($(".content").is(":visible")) {

                        var ajax = new XMLHttpRequest();
                        ajax.open("GET", "emp_db.php", true);
                        ajax.send();

                        ajax.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                var data = JSON.parse(this.responseText);
                                console.log(data);

                                var tableContentHtml = '<table class="table-responsive"><tr><th>Employee Number</th><th>First Name</th><th>Last Name</th><th>Salary</th><th>Title</th> <th>Department Name</th></tr>';

                                for (var a = 0; a < data.length; a++) {
                                    var emp_no = data[a].emp_no;
                                    var first_name = data[a].first_name;
                                    var last_name = data[a].last_name;
                                    var salary = data[a].salary;
                                    var title = data[a].title;
                                    var dept_name = data[a].dept_name;
                                    console.log(dept_name);


                                    tableContentHtml += '<tr><td>' + emp_no + '</td>' + '<td>' + first_name + '</td>' + '<td>' + last_name + '</td>' + '<td>' + salary + '</td>' + '<td>' + title + '</td>' + '<td>' + dept_name + '</td></tr>';
                                }
                                tableContentHtml += '</table>';
                                $(tableContentHtml).appendTo(".content");
                            }

                        }
                    };

                });
            });
        </script>
        <div id="add_data_Modal" class="modal fade">
            <div class="insertCard" style="color:white">
                <div class="modal-header">
                    <button style="color:yellow; font-size:40px" type="button" class="close" data-dismiss="modal">&times;</button>

                </div>

                <div class="modal-body">
                    <form method="post" id="insert_form">
                        <label>Enter employee ID number</label>
                        <br>
                        <input style="color: black;" type="text" id="number" name="number">
                        <br />
                        <label>Enter employee birth date</label>
                        <br>
                        <input style="color: black;" type="text" id="birthDate" name="birthDate">
                        <br />
                        <label>Enter employee first name</label>
                        <br>
                        <input style="color: black;" type="text" id="fname" name="fname">
                        <br />
                        <label>Enter employee last name</label>
                        <br>
                        <input style="color: black;" type="text" id="lname" name="lname">
                        <br />
                        <label>Enter employee gender</label>
                        <br>
                        <input style="color: black;" type="text" id="gender" name="gender">
                        <br />
                        <label>Enter employee hire date</label>
                        <br>
                        <input style="color: black;" type="text" id="hireDate" name="hireDate">
                        <br />
                        <br>
                        <input style="color: black" class="btns" type="submit" name="insert" id="insert" value="Insert" />
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btns" class="btn btn-default" data-dismiss="modal" style="color: black; ">Close</button>
                    </div>
                </div>

            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('#insert_form').on('submit', function(event) {
                    event.preventDefault();
                    if ($('#number').val() == '') {
                        alert("Employee id is required");
                    } else if ($('#birthDate').val() == '') {
                        alert("Birth date is required");
                    } else if ($('#fname').val() == '') {
                        alert("First name is required");
                    } else if ($('#lname').val() == '') {
                        alert("Last name is required");
                    } else if ($('#gender').val() == '') {
                        alert("Gender is required");
                    } else if ($('#hireDate').val() == '') {
                        alert("Hire date is required");

                    } else {
                        $.ajax({
                            url: "emp_insert.php",
                            method: "POST",
                            data: $('#insert_form').serialize(),
                            beforeSend: function() {
                                $('#insert').val("Inserting");
                            },
                            success: function(data) {
                                alert("done");
                                $('#insert_form')[0].reset();
                                // $('#add_data_Modal').modal('none');
                                // $('.modal fade').modal('hide');


                            }
                        });
                    }


                });

            });
        </script>

</body>

</html>