
<?php
// $result_array = array();

// $query1 = "SELECT DISTINCT employees.first_name, employees.last_name, departments.dept_name, salaries.salary, titles.title
//  FROM employees, departments, dept_emp, salaries, titles
//   WHERE employees.emp_no = dept_emp.emp_no 
//   AND dept_emp.dept_no = departments.dept_no 
//   AND employees.emp_no = titles.emp_no
//  AND employees.emp_no = salaries.emp_no";

// $result = $conn->query($query1);

// if (!empty($result) && $result->num_rows > 0) {
//     // while ($row = mysqli_fetch_assoc($result)) {
//     for ($i = 0; $i <= 100; $i++) {
//         $row = $result->fetch_assoc();
//         array_push($result_array, $row);
//     }
// }
// header("Content-Type: application/json;charset=utf-8");

// echo json_encode($result_array);

?>

<?php
$conn =  mysqli_connect("localhost", "root", "", "employees") or die("FAILEEED");
// print " Connection Success !";

mysqli_select_db($conn, "employees") or die("could not connect to db");
// print "Employees db is selected ";   if(!empty($_POST))
// if (!empty($_POST)) {
$output = '';
$number = mysqli_real_escape_string($conn, $_POST["number"]);
$birthDate = mysqli_real_escape_string($conn, $_POST["birthDate"]);
$fname = mysqli_real_escape_string($conn, $_POST["fname"]);
$lname = mysqli_real_escape_string($conn, $_POST["lname"]);
$gender = mysqli_real_escape_string($conn, $_POST["gender"]);
$hireDate = mysqli_real_escape_string($conn, $_POST["hireDate"]);

$query = $query = "INSERT INTO employees(emp_no, birth_date, first_name, last_name, gender, hire_date)  
VALUES('$number', '$birthDate', '$fname', '$lname', '$gender', '$hireDate')";

if (mysqli_query($conn, $query)) {
    echo 'You Insert: <br>';

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