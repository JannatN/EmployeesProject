<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departments</title>
    <link rel="stylesheet" href="dept.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
            padding: 10px;
            color: black;
            /* display: none; */
        }
    </style>

</head>

<body>
    <header>Welcome in Departments Section </header><br>
    <div>
        <p>Show Department with names of managers: <button class="btn" id="btn1" type="submit">Show</button> </p>
        <div class="content1"></div>
        <p>Show departments names with the amount of employees’ salaries <button class="btn" id="btn2" type="submit">Show</button>
        </p>
        <div class="content2"></div>

        <p>Search for a department and show the employees-names who belong to it <button class="btn">Search</button>
        </p>

        <button class="btn">New Department +</button>

    </div>


    <script>
        $(document).ready(function() {
            $("#btn1").on('click', function() {
                $('.content1').toggleClass('active');
                if ($(".content1").is(":visible")) {

                    var ajax = new XMLHttpRequest();
                    ajax.open("GET", "dept_db.php", true);
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
                    ajax.open("GET", "dept_db.php", true);
                    ajax.send();

                    ajax.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            var data = JSON.parse(this.responseText);
                            console.log(data);

                            var tableContentHtml = '<table><tr><th>Department Name</th> <th>Salary</th> </tr>';

                            for (var a = 0; a < data.length; a++) {
                                var dept_name = data[a].dept_name;
                                var salary = data[a].salary;
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