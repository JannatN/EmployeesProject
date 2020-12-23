<?php
$conn =  mysqli_connect("localhost", "root", "", "employees") or die("FAILEEED");

mysqli_select_db($conn, "employees") or die("could not connect to db");
// if (!empty($_POST)) {
$output = '';
$number = mysqli_real_escape_string($conn, $_POST["number"]);
$birthDate = mysqli_real_escape_string($conn, $_POST["birthDate"]);
$fname = mysqli_real_escape_string($conn, $_POST["fname"]);
$lname = mysqli_real_escape_string($conn, $_POST["lname"]);
$gender = mysqli_real_escape_string($conn, $_POST["gender"]);
$hireDate = mysqli_real_escape_string($conn, $_POST["hireDate"]);

$dept = mysqli_real_escape_string($conn, $_POST["dept"]);
$dept_num = mysqli_real_escape_string($conn, $_POST["num"]);

$from = mysqli_real_escape_string($conn, $_POST["from"]);
$to = mysqli_real_escape_string($conn, $_POST["to"]);

$salary = mysqli_real_escape_string($conn, $_POST["salary"]);
$salaryFrom = mysqli_real_escape_string($conn, $_POST["salaryFrom"]);
$salaryTo = mysqli_real_escape_string($conn, $_POST["salaryTo"]);

$title = mysqli_real_escape_string($conn, $_POST["title"]);
$titleFrom = mysqli_real_escape_string($conn, $_POST["titleFrom"]);
$titleTo = mysqli_real_escape_string($conn, $_POST["titleTo"]);

$query = "INSERT INTO employees(emp_no, birth_date, first_name, last_name, gender, hire_date)  
VALUES('$number', '$birthDate', '$fname', '$lname', '$gender', '$hireDate')";

$query1 = "INSERT INTO departments(dept_no, dept_name)  
VALUES('$dept_num', '$dept')";

$query4 = "INSERT INTO dept_emp(emp_no, dept_no, from_date, to_date)  
VALUES('$number', '$dept_num', '$from', '$to')";

$query2 = "INSERT INTO salaries(emp_no, salary, from_date, to_date)  
VALUES('$number', '$salary', '$salaryFrom', '$salaryTo')";

$query3 = "INSERT INTO titles(emp_no, title, from_date, to_date)  
VALUES('$number', '$title', '$titleFrom', '$titleTo')";


if (mysqli_query($conn, $query) && mysqli_query($conn, $query1) && mysqli_query($conn, $query4) && mysqli_query($conn, $query2) && mysqli_query($conn, $query3)) {
    if (!empty($result) && $result->num_rows > 0) {
        for ($i = 0; $i < 100; $i++) {
            $row = mysqli_fetch_array($result);
        }
    }
}
