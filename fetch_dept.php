<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "employees");
$output = '';
if (isset($_POST["submit"])) {
   $search = mysqli_real_escape_string($connect, $_POST["submit"]);
   $str = $_POST["search"];
   //    $query = " SELECT first_name, last_name FROM employees
   //   WHERE dept_name LIKE '%" . $search . "%'
   //   OR last_name LIKE '%" . $search . "%'";

   $query = "SELECT first_name, last_name,departments.dept_name 
            FROM employees, departments, dept_emp
            Where dept_emp.emp_no =employees.emp_no 
            AND departments.dept_no =dept_emp.dept_no
            AND departments.dept_name LIKE '$str'
            limit 100";

   $result = mysqli_query($connect, $query);
   if (mysqli_num_rows($result) > 0) {
      $output .= '
  <div class="table-responsive">
      <table class="table table bordered">
      <tr>
      <th>Department</th>
      <th>First Name</th>
      <th>Last Name</th>
      
      </tr>';
      while ($row = mysqli_fetch_array($result)) {
         $output .= '
      <tr>
      <td>' . $row["dept_name"] . '</td>
      <td>' . $row["first_name"] . '</td>
      <td>' . $row["last_name"] . '</td>
    
       </tr>';
      }
      echo $output;
   } else {
      echo 'Data Not Found';
   }
}
