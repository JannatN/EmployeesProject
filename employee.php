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
    <title>Employees</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="employee.css">

    <style>
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

        .btns {
            font-size: 1vw;
            background-color: rgb(209, 132, 93);
            padding: 10px;
            border-radius: 10%;
            border: 2px solid #854b3d;
            text-decoration: none;
            outline: none;
            cursor: pointer;
        }
    </style>

</head>

<body>
    <header>Welcome to Employees Section </header><br>
    <div id="external">
        <div class="left">
            <h2>View Employees information</h2>
            <button class="butn" id="btn1" type="submit"> Employees General Info </button>
            <div class="content"></div>
        </div>
        <span class="border"></span>
        <div class="middle">
            <h2>Insert New Employee </h2>
            <button type="button" name="id" id="id" data-toggle="modal" data-target="#add_data_Modal" class="butn">New Employee +</button>
        </div>
        <span class="border"></span>
        <div class="right">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Search By </button> <img src="search.png" alt="search" width="70" height="70">

            </div>
            <select name="selector" id="selector">
                <option value="name">Search BY</option>
                <option value="name">Name</option>
                <option value="dept">Department</option>
                <option value="title">Title</option>
                <option value="salary">Salary</option>
            </select>
            <div id="result"></div>
            <form class="form-inline active-pink-3 active-pink-4">
                <i class="fas fa-search" aria-hidden="true"></i>
                <input class="form-control form-control-sm ml-3 w-75" type="text" id="search_text" placeholder="Search" aria-label="Search">
            </form>
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

                                var tableContentHtml = '<table><tr><th>Employee Number</th><th>First Name</th><th>Last Name</th><th>Salary</th><th>Title</th> <th>Department Name</th></tr>';

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
        <script>
            $(document).ready(function() {
                load_data();

                function load_data(query) {
                    var myData ={
                    $selector: $("#selector").val(),
                    };
                    $.ajax({
                        url: "fetch_emp.php",
                        method: "POST",
                        data: {
                            myData:myData,
                            query: query
                        },
                        success: function(data) {
                            $('#result').html(data);
                        }
                    });
                }
                $('#search_text').keyup(function() {
                    var search = $(this).val();
                    if (search != '') {
                        load_data(search);
                    } else {
                        load_data();
                    }
                });
            });
        </script>
</body>

</html>