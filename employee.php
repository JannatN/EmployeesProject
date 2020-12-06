<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
            padding: 10px;
            color: black;
            /* display: none; */
        }
    </style>

</head>

<body>
    <header>Welcome to Employees Section </header><br>
    <div id="external">
        <div class="left">
            <h2>View for Employees information</h2>
            <button class="butn" id="btn1" type="submit"> Employees General Info </button>
            <div class="content"></div>
        </div>
        <span class="border"></span>
        <div class="middle">
            <h2>Insert New Employees </h2>
            <button class="butn">New Employee +</button>
        </div>
        <span class="border"></span>
        <div class="right">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Search By </button> <img src="search.png" alt="search" width="70" height="70">
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Name</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>


            <!-- <p> Name <button type="submit" name="qe2">Search</button></p>
            <p>Department-Name <button>Search</button></p>
            <p>Title <button>Search</button></p>
            <p>Salary <button>Search</button></p> -->
            <form class="form-inline active-pink-3 active-pink-4">
                <i class="fas fa-search" aria-hidden="true"></i>
                <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search" aria-label="Search">
            </form>
        </div>


        <script>
            $(document).ready(function() {
                $("#btn1").on('click', function() {
                    $('.content').toggleClass('active');
                    if ($(".content").is(":visible")) {

                        var ajax = new XMLHttpRequest();
                        ajax.open("GET", "db.php", true);
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
                                $(tableContentHtml).appendTo(".content");
                            }

                        }
                    };

                });
            });
        </script>
</body>

</html>