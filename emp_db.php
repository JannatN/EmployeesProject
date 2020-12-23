<?php
session_start();
?>
<?php
$conn =  mysqli_connect("localhost", "root", "", "employees") or die("FAILEEED");

mysqli_select_db($conn, "employees") or die("could not connect to db");
?>
<?php

$result_array = array();
// if (isset($_POST['selected'])) {
    // $x = $_POST['selected'];

    $query = "SELECT DISTINCT  employees.emp_no, employees.first_name, employees.last_name,salaries.salary ,titles.title,departments.dept_name
    FROM employees , salaries ,titles,dept_emp ,departments
    WHERE employees.emp_no = salaries.emp_no
     AND dept_emp.emp_no = employees.emp_no 
     AND departments.dept_no = dept_emp.dept_no
     AND titles.emp_no = employees.emp_no 
     AND salaries.to_date = titles.to_date
    LIMIT 100";

    ini_set('memory_limit', '-1');


    $result = $conn->query($query);

    if (!empty($result) && $result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $row = $result->fetch_assoc();
            array_push($result_array, $row);
        }
    }
    header("Content-Type: application/json;charset=utf-8");

    echo json_encode($result_array);

?>

