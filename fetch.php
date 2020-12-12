<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "employees");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT first_name, last_name FROM employees
  WHERE first_name LIKE '%".$search."%'
  OR last_name LIKE '%".$search."%' 
 ";
}
else
{
 $query = "
  SELECT first_name, last_name FROM employees ORDER BY first_name
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Customer Name</th>
     <th>lastNAme</th>
    
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["first_name"].'</td>
    <td>'.$row["last_name"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}
