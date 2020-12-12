<?php

$conn =  mysqli_connect("localhost", "root", "", "employees") or die("FAILEEED");
// print " Connection Success !";

mysqli_select_db($conn, "employees") or die("could not connect to db");
// print "Employees db is selected ";
?>
<?php
$result_array = array();

$query1 = "SELECT departments.dept_name, employees.first_name, employees.last_name
 FROM departments, dept_manager, employees 
 WHERE employees.emp_no = dept_manager.emp_no 
 AND dept_manager.dept_no = departments.dept_no ";

$result = $conn->query($query1);

if (!empty($result) && $result->num_rows > 0) {
    // while ($row = mysqli_fetch_assoc($result)) {
    for ($i = 0; $i <= 23; $i++) {
        $row = $result->fetch_assoc();
        array_push($result_array, $row);
    }
}
header("Content-Type: application/json;charset=utf-8");

echo json_encode($result_array);

?>

<?php
// echo '-----------------------------------';
// $result_array = array();

// $query2 = "SELECT departments.dept_name, 
//             SUM(salary)
// FROM departments, salaries, dept_emp
// WHERE departments.dept_no = dept_emp.dept_no 
// AND dept_emp.emp_no = salaries.emp_no
// GROUP BY  departments.dept_name ";

// $result = $conn->query($query2);

// if (!empty($result) && $result->num_rows > 0) {
//     // while ($row = mysqli_fetch_assoc($result)) {
//     for ($i = 0; $i <= 8; $i++) {
//         $row = $result->fetch_assoc();
//         array_push($result_array, $row);
//     }
// }
// header("Content-Type: application/json;charset=utf-8");

// echo json_encode($result_array);

// mysqli_close($conn);
?>