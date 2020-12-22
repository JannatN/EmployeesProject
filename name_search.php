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
        $space = '';

        // $query = "SELECT emp_no, first_name, last_name
        // FROM employees
        // WHERE first_name LIKE '$str1' OR last_name LIKE '$str1' OR CONCAT(first_name, last_name) 
        // limit $x";

        $f = $_POST['search'];
        $token = strtok($f, " ");
        $first = $token;
        $token = strtok(" ");
        $last = $token;

        $query = "SELECT * FROM employees WHERE
         (first_name = '$first' AND  last_name = '$last') OR first_name = '$f' OR last_name='$f' limit $x";

        $result = mysqli_query($connect, $query);
        if (mysqli_num_rows($result) > 0) {
            $output .= '
        <div class="table-responsive">
        <table class="table table bordered">
            <tr>
            <th>First Name</th>
            <th>last Name</th>
            <th>Department</th>
            </tr>
        ';
            while ($row = mysqli_fetch_array($result)) {
                $output .= '
        <tr>
            <td>' . $row["emp_no"] . '</td>
            <td>' . $row["first_name"] . '</td>
            <td>' . $row["last_name"] . '</td>


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