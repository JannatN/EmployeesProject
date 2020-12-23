
<?php
$connect =  mysqli_connect("localhost", "root", "", "employees") or die("FAILEEED");

mysqli_select_db($connect, "employees") or die("could not connect to db");
?>
<?php

$result_array = array();

if (isset($_POST["submit"]) && isset($_POST['selected'])) {
    $x = $_POST['selected'];
    $output = '';


    $query = "SELECT DISTINCT  employees.emp_no, employees.first_name, employees.last_name,salaries.salary ,titles.title,departments.dept_name
    FROM employees , salaries ,titles,dept_emp ,departments
    WHERE employees.emp_no = salaries.emp_no
     AND dept_emp.emp_no = employees.emp_no 
     AND departments.dept_no = dept_emp.dept_no
     AND titles.emp_no = employees.emp_no 
     AND salaries.to_date = titles.to_date
    LIMIT $x";

    ini_set('memory_limit', '-1');


    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) > 0) {
        $output .= '
        <table class="table">
            <tr>
            <thead class="th">
            <th class="th">Employee Num</th>
            <th class="th">First Name</th>
            <th class="th">Last Name</th>
            <th class="th">Salary </th>
            <th class="th">Title</th>
            <th class="th">Department</th>
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
            <td>' . $row["title"] . '</td>
            <td>' . $row["dept_name"] . '</td>
        </tr>
        ';
        }
        echo $output;
    }
}
?>

