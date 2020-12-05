    <?php

    $conn =  mysqli_connect("localhost", "root", "", "employees") or die("FAILEEED");
    // print " Connection Success !";

    mysqli_select_db($conn, "employees") or die("could not connect to db");
    // print "Employees db is selected ";
    $result_array = array();

    $query1 = "SELECT dept_name, 
    first_name,
    last_name
    FROM employees, departments, dept_manager
    WHERE departments.dept_no = dept_manager.dept_no
    AND dept_manager.emp_no = employees.emp_no";

    $result = $conn->query($query1);

    if ($result->num_rows > 0) {
        for ($i = 0; $i < 10; $i++) {
            $row = $result->fetch_assoc();
            array_push($result_array, $row);
        }
    }
    // header('Content-type: application/json');
    header("Content-Type: application/json;charset=utf-8");

    echo json_encode($result_array);

    mysqli_close($conn);
    ?>
<!-- 
-- AND  employees.emp_no = titles.emp_no
-- AND  departments.dept_no = dept_emp.dept_no 
-- AND dept_emp.emp_no = employees.emp_no "; -->
