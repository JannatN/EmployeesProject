<?php
$connect = mysqli_connect("localhost", "root", "", "employees");
mysqli_select_db($connect, "employees") or die("could not connect to db");

$output = '';
if (isset($_POST["submit"])) {
    // $search = mysqli_real_escape_string($connect, $_POST["search"]);
    $str1 = $_POST["search"];
    $select = $_POST["selected"];
    switch ($select) {
        case 'searchBy':
            echo 'Please select from options';
            break;
        case 'dept':
            $query = "SELECT first_name, last_name,departments.dept_name 
        FROM employees, departments, dept_emp
        Where dept_emp.emp_no =employees.emp_no 
        AND departments.dept_no =dept_emp.dept_no
        AND departments.dept_name LIKE '$str1' limit 100";

            $result = mysqli_query($connect, $query);
            if (mysqli_num_rows($result) > 0) {
                $output .= '
                <div class="table-responsive">
                <table class="table table bordered">
                    <tr>
                    <th>First Name</th>
                    <th>last Name</th>
                    
                    </tr>
                ';
                while ($row = mysqli_fetch_array($result)) {
                    $output .= '
                <tr>
                    <td>' . $row["first_name"] . '</td>
                    <td>' . $row["last_name"] . '</td>
                </tr>
                ';
                }
                echo $output;
            } else
                echo 'Data Not Found';
            break;
        case 'name':
            $query = "SELECT first_name, last_name
                FROM employees 
        WHERE first_name LIKE '$str1' OR last_name  LIKE '$str1' limit 100";

            $result = mysqli_query($connect, $query);
            if (mysqli_num_rows($result) > 0) {
                $output .= '
           <div class="table-responsive">
           <table class="table table bordered">
               <tr>
               <th>First Name </th>
               <th>last  Name
               </th>
               
               </tr>
           ';
                while ($row = mysqli_fetch_array($result)) {
                    $output .= '
               <tr>
                   <td>' . $row["first_name"] . '</td>
                   <td>' . $row["last_name"] . '</td>
               </tr>
               ';
                }
                echo $output;
            } else
                echo 'Data Not Found';
            break;
            case 'title':
                $query = "SELECT DISTINCT employees.first_name, employees.last_name, 
                titles.emp_no,departments.dept_name 
                FROM titles, employees,dept_emp, departments 
                WHERE titles.emp_no =employees.emp_no 
                AND employees.emp_no = dept_emp.emp_no
                 AND dept_emp.dept_no = departments.dept_no
                 AND titles.title LIKE '$str1'
                  ORDER by titles.from_date DESC LIMIT 100
                ";
    
                $result = mysqli_query($connect, $query);
                if (mysqli_num_rows($result) > 0) {
                    $output .= '
               <div class="table-responsive">
               <table class="table table bordered">
                   <tr>
                   <th>First Name </th>
                   <th>last Name</th>
                   <th>last Name</th>
                   <th>last Name</th>

                   
                   
                   </tr>
               ';
                    while ($row = mysqli_fetch_array($result)) {
                        $output .= '
                   <tr>
                       <td>' . $row["first_name"] . '</td>
                       <td>' . $row["last_name"] . '</td>
                       <td>' . $row["emp_no"] . '</td>
                       <td>' . $row["dept_name"] . '</td>
                   </tr>
                   ';
                    }
                    echo $output;
                } else
                    echo 'Data Not Found';
                break;
    }
}
