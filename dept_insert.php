<?php
$conn =  mysqli_connect("localhost", "root", "", "employees") or die("FAILEEED");

mysqli_select_db($conn, "employees") or die("could not connect to db");
// if (!empty($_POST)) {
$output = '';
$number = mysqli_real_escape_string($conn, $_POST["number"]);
$deptName = mysqli_real_escape_string($conn, $_POST["depName"]);

$query = "INSERT INTO departments(dept_no, dept_name)  
VALUES('$number', '$deptName')";

if (mysqli_query($conn, $query)) {
    echo 'You Insert: <br>';

    $output .= '<label class="text-success">Data Inserted</label>';
    $select_query = "SELECT dept_no , dept_name FROM departments ORDER BY dept_no DESC";
    $result = mysqli_query($conn, $select_query);
    $output .= '<table class="table table-bordered">  
                     <tr>  
                        <th width="70%">Department Name</th>  
                        <th width="30%">View</th>  
                    </tr> ';
    if (!empty($result) && $result->num_rows > 0) {
        for ($i = 0; $i < 20; $i++) {
            $row = mysqli_fetch_array($result);
            $output .= '
                        <tr>  
                                <td>' . $row["dept_no"] . '</td>  
                                <td><input type="button" name="view" value="view"
                                 id="' . $row["dept_name"] . '" 
                                    class="btn btn-info btn-xs view_data" /></td>  
                        </tr> ';
        }
        $output .= '</table>';
    }
}
echo $output;


?>