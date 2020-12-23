<?php
$connect = mysqli_connect("localhost", "root", "", "employees");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Search By Salary</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .th {
            background-color: #854b3d;
            color: white;
            font-weight: 600;

        }


        tr:nth-child(even) {
            background-color: #ffd9b3;
        }


        .form-control {
            border: 2px solid #854b3d;
            width: 100%;
        }

        .btn {
            background-color: #854b3d;
            color: white;
            font-weight: 600;
            font-size: 1vw;
            padding: 1%;
            border: 2px solid #854b3d;
            border-radius: 20%;

        }

        .btn:hover {
            background-color: #854b3d;

        }

        .custom-select {
            width: 10%;
            margin: 1%;
            background-color: #854b3d;
            color: white;
            font-weight: 600;


        }
    </style>
</head>

<body>
    <form method="post">
        <select name="selected" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
            <option value=0>Show</option>
            <option value=50>50</option>
            <option value=100>100</option>
            <option value=250>250</option>
            <option value=500>500</option>
        </select>
        <!-- <select name="selected" id="selected">
                    <option value=0>Show</option>
                    <option value=50>50</option>
                    <option value=100>100</option>
                    <option value=250>250</option>
                    <option value=500>500</option>

                </select> -->
        <nav class="navbar navbar-expand-lg navbar-dark blue lighten-2 mb-4">

            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <form class="form-inline mr-auto">
                    <input class="form-control" type="text" aria-label="Search" id="range1" name="range1" placeholder="Enter First salary">

                    <input class="form-control" type="text" aria-label="Search" id="range2" name="range2" placeholder="Enter Second salary">
                    <button class="btn btn-mdb-color btn-rounded btn-sm my-0 ml-sm-2" type="submit" name="submit" id="submit">Search</button>
                </form>

            </div>
            <!-- Collapsible content -->

            <!-- Navbar brand -->

        </nav>

    </form>

    <?php
    if (isset($_POST["submit"]) && isset($_POST['selected'])) {
        $x = $_POST['selected'];
        $str1 = $_POST["range1"];
        $str2 = $_POST["range2"];

        $output = '';
        $query = "SELECT DISTINCT employees.emp_no, employees.first_name, employees.last_name, salaries.salary
        FROM salaries, employees 
        WHERE salaries.emp_no =employees.emp_no 
         AND salaries.salary BETWEEN '$str1' AND '$str2' 
        --  ORDER BY salaries.from_date DESC
         LIMIT $x";
        ini_set('memory_limit', '-1');

        $result = mysqli_query($connect, $query);
        if (mysqli_num_rows($result) > 0) {
            $output .= '
        <table class="table">
            <tr>      
            <thead class="th">     
             <th>Employee Number</th>
            <th>First Name</th>
            <th>last Name</th>
            <th>Salary </th>
            </tr>
            </thead>
        ';
            while ($row = mysqli_fetch_array($result)) {
                $output .= '
        <tr>
            <td>' . $row["emp_no"] . '</td>
            <td>' . $row["first_name"] . '</td>
            <td>' . $row["last_name"] . '</td>
            <td>' . $row["salary"] . '</td>


        </tr>
        ';
            }
            echo $output;
        } else
            echo 'Please Select Valid Data';
    }
    ?>
</body>

</html>