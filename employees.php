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

    <link rel="stylesheet" href="emp.css">

    <style>
        input[type='text'] {
            color: black;
            border: 1px solid #854b3d;
        }

        label {
            color: white;
            font-weight: 900;
        }

        .content {
            background-color: #854b3d;
            width: 100%;
            height: 100%;
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
    </style>

</head>

<body>
    <header>
        <div> <img id="happyman" src="happy man2.png" alt="employee" width="50"> </div>

        <?php
        echo 'Welcome ' . $name . ' in Employees Section';
        ?>
        <form action="home.php" method="POST">
            <button class="butnNav" id="logout">Home</button>
        </form>
        <form action="logout.php" method="POST">
            <button class="butnNav" id="logout">Logout</button>
        </form>
    </header><br>
    <div id="external">
        <div class="left">
            <div id="nav">
                <h2>Search By: </h2>
                <form action="name_search.php">
                    <button class="butn" class="formbtn" type="submit">Name</button>
                </form>
                <form action="dept_search.php">
                    <button class="butn" class="formbtn" type="submit">Department</button>
                </form>
                <form action="title_search.php">
                    <button class="butn" class="formbtn" type="submit">Title</button>
                </form>
                <form action="salary_search.php">
                    <button class="butn" class="formbtn" type="submit">Salary</button>
                </form>

            </div>
        </div>
        <span class="border"></span>
        <div class="middle">
            <h2>Insert New Employee </h2>
            <button type="button" name="id" id="id" data-toggle="modal" data-target="#add_data_Modal" class="butn">New Employee +</button>
        </div>
        <span class="border"></span>
        <div class="right">

            <h2>View Employees information</h2>
            <form method="post">
                <select id="dropdownMenuButton" name="selected" id="selected">
                    <option value=0>Show</option>
                    <option value=50>50</option>
                    <option value=100>100</option>
                    <option value=250>250</option>
                    <option value=500>500</option>
                </select>

                <form>
                    <button class="butn" name="submit" id="submit" type="submit"> Employees General Info </button>

                </form>
                <div> <?php require 'emp_db.php' ?>
                </div>
            </form>
        </div>

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
                        <label> Employee Department:</label> <br>

                        <input type="text" name="dept"><br>
                        <label> Employee Department Number: </label><br>
                        <input type="text" name="num"><br>

                        <label> Employee Department From Date: </label><br>
                        <input type="text" name="from"><br>
                        <label> Employee Department To Date: </label><br>
                        <input type="text" name="to"><br>

                        <label>Employee Salary: </label><br>
                        <input type="text" name="salary"><br>
                        <label> Employee Salary From Date: </label><br>
                        <input type="text" name="salaryFrom"><br>
                        <label> Employee Department To Date: </label><br>
                        <input type="text" name="salaryTo"><br>

                        <label> Employee Title: </label><br>
                        <input type="text" name="title"><br>
                        <label> Employee Title From Date: </label><br>
                        <input type="text" name="titleFrom"><br>
                        <label> Employee Title To Date: </label><br>
                        <input type="text" name="titleTo"><br>
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

                    } else if ($('#dept').val() == '') {
                        alert("Department name is required");
                    } else if ($('#num').val() == '') {
                        alert("Department number is required");
                    } else if ($('#from').val() == '') {
                        alert("Department from date is required");
                    } else if ($('#to').val() == '') {
                        alert("Department to date is required");
                    } else if ($('#salary').val() == '') {
                        alert("Employee salary is required");
                    } else if ($('#salaryFrom').val() == '') {
                        alert("Salary from date is required");
                    } else if ($('salaryTo').val() == '') {
                        alert("Salary to date is required");
                    } else if ($('#title').val() == '') {
                        alert("Employee title is required");
                    } else if ($('#titleFrom').val() == '') {
                        alert("Title from date is required");
                    } else if ($('#titleTo').val() == '') {
                        alert("Title to date is required");
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