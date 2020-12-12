<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departments</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="dept.css">

    <style>
        .content1 {
            background-color: pink;
            width: 100%;
            height: 100%;
            display: none;
            z-index: -1;
        }

        .content2 {
            background-color: pink;
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
            padding: 5px;
            color: black;
            font-size: 1.3vw;
            /* display: none; */
        }

        h2 {
            color: black;
            font-size: 2vw;
        }
    </style>

</head>

<body>
    <header>Welcome to Departments Section </header><br>
    <div id="external">
        <div class="left">
            <h2>View Departments information </h2>
            <button class="butn" id="btn1" type="submit">Department Managers </button>
            <div class="content1"></div>
            <button class="butn" id="btn2" type="submit">Department Salaries </button>
            <!-- <div class="content1"></div> -->
            <div class="content2"></div>


        </div>

        <span class="border"></span>
        <div class="middle">
            <h2>Insert a New Department </h2>
            <button type="button" name="id" id="id" data-toggle="modal" data-target="#add_data_Modal" class="butn">New Department +</button>
        </div>
        <span class="border"></span>
        <div class="right">
            <h2> Search about Employees Who Work in Departments</h2>
            <img src="search.png" alt="search" width="70" height="70">


            <form class="form-inline active-pink-3 active-pink-4">
                <i class="fas fa-search" aria-hidden="true"></i>
                <span> <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Department Name" aria-label="Search"> <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Search </button> </span>

            </form>
        </div>
    </div>
    <div id="add_data_Modal" class="modal fade">
        <div class="insertCard" style="color:white">
            <div class="modal-header">
                <button style="color:yellow; font-size:40px" type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <form method="post" id="insert_form">
                    <label>Enter department number</label>
                    <br>
                    <input style="color: black;" type="text" id="number" name="number">
                    <br />
                    <label>Enter department name</label>
                    <br>
                    <input style="color: black;" type="text" id="depName" name="depName">
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
                    alert("Department number is required");
                } else if ($('#depName').val() == '') {
                    alert("Department name is required");
                } else {
                    $.ajax({
                        url: "dept_insert.php",
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
            $("#btn1").on('click', function() {
                $('.content1').toggleClass('active');
                if ($(".content1").is(":visible")) {

                    var ajax = new XMLHttpRequest();
                    ajax.open("GET", "deptA_db.php", true);

                    ajax.send();

                    ajax.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            var data = JSON.parse(this.responseText);
                            console.log(data);

                            var tableContentHtml = '<table><tr><th>Department Name</th><th>First Name</th> <th>Last Name</th> </tr>';

                            for (var a = 0; a < data.length; a++) {
                                var dept_name = data[a].dept_name;
                                var first_name = data[a].first_name;
                                var last_name = data[a].last_name;
                                tableContentHtml += '<tr><td>' + dept_name + '</td>' + '<td>' + first_name + '</td>' + '<td>' + last_name + '</td></tr>';
                            }
                            tableContentHtml += '</table>';
                            $(tableContentHtml).appendTo(".content1");
                        }

                    }
                };

            });

            $("#btn2").on('click', function() {
                $('.content2').toggleClass('active');
                if ($(".content2").is(":visible")) {

                    var ajax = new XMLHttpRequest();
                    ajax.open("GET", "deptB_db.php", true);
                    ajax.send();

                    ajax.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            var data = JSON.parse(this.responseText);
                            console.log(data);

                            var tableContentHtml = '<table><tr><th>Department Name</th> <th>Salary</th> </tr>';

                            for (var a = 0; a < data.length; a++) {
                                var dept_name = data[a].dept_name;
                                var salary = data[a].sumSalary;
                                tableContentHtml += '<tr><td>' + dept_name + '</td>' + '<td>' + salary + '</td></tr>';
                            }
                            tableContentHtml += '</table>';
                            $(tableContentHtml).appendTo(".content2");
                        }

                    }
                };

            });
        });
    </script>
</body>

</html>