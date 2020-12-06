<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>
    <link rel="stylesheet" href="employee.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



    <style>
        .content {
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
            padding: 10px;
            color: black;
            /* display: none; */
        }
    </style>

</head>

<body>
    <header>Welcome to Employees Section </header><br>
    <button class="btn" id="btn1" type="submit"> Employees General Info </button>
    <div class="content"></div>

    <h2>Search for Employee:</h2>
    <p>Search by Name <button class="btn" type="submit" name="qe2">Search</button></p>
    <p>Search by Department-Name <button class="btn">Search</button></p>
    <p>Search by Title <button class="btn">Search</button></p>
    <p>Search by Salary <button class="btn">Search</button></p>
    <button class="btn">New Employee +</button>

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