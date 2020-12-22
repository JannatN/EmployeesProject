<?php
$connect = mysqli_connect("localhost", "root", "", "employees");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">


    <title>Document</title>
</head>

<body>
    <form method="post">
        <select name="selected" id="selected">
            <option value=0>Show</option>
            <option value=50>50</option>
            <option value=100>100</option>
            <option value=250>250</option>
            <option value=500>500</option>

        </select>
        <input type="text" id="search" name="search">
        <button type="submit" name="submit" id="submit">Search</button>
    </form>

    <?php
    if (isset($_POST["submit"]) && isset($_POST['selected'])) {
        $x = $_POST['selected'];
        $str1 = $_POST["search"];
        $output = '';
        $query = "SELECT DISTINCT titles.emp_no, employees.first_name, employees.last_name, 
                  titles.title 
        FROM titles, employees 
        WHERE titles.emp_no =employees.emp_no 
         AND titles.title LIKE '$str1'
         LIMIT $x";
           ini_set('memory_limit', '-1');

        $result = mysqli_query($connect, $query);
        if (mysqli_num_rows($result) > 0) {
            $output .= '
        <div class="table-responsive">
        <table class="table table bordered">
            <tr>           
             <th>Employee Number</th>
            <th>First Name</th>
            <th>last Name</th>
            <th>Title </th>
            </tr>
        ';
            while ($row = mysqli_fetch_array($result)) {
                $output .= '
        <tr>
            <td>' . $row["emp_no"] . '</td>
            <td>' . $row["first_name"] . '</td>
            <td>' . $row["last_name"] . '</td>
            <td>' . $row["title"] . '</td>


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