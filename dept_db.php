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

// if (!empty($_POST)) {
$output = '';
$dept_no = mysqli_real_escape_string($conn, $_POST["dept_no"]);
$dept_name = mysqli_real_escape_string($conn, $_POST["dept_name"]);


$query = $query = "INSERT INTO departments(dept_no, dept_name)  
VALUES('$dept_no', '$dept_name')";

if (mysqli_query($conn, $query)) {

    $output .= '<label class="text-success">Data Inserted</label>';
    $select_query = "SELECT first_name , emp_no FROM employees ORDER BY emp_no DESC";
    $result = mysqli_query($conn, $select_query);
    $output .= '<table class="table table-bordered">  
                     <tr>  
                        <th width="70%">Employee Name</th>  
                        <th width="30%">View</th>  
                    </tr> ';
    if (!empty($result) && $result->num_rows > 0) {
        for ($i = 0; $i < 20; $i++) {
            $row = mysqli_fetch_array($result);
            $output .= '
                        <tr>  
                                <td>' . $row["first_name"] . '</td>  
                                <td><input type="button" name="view" value="view"
                                 id="' . $row["emp_no"] . '" 
                                    class="btn btn-info btn-xs view_data" /></td>  
                        </tr> ';
        }
        $output .= '</table>';
    }
}
echo $output;


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