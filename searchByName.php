
<?php
$connect = mysqli_connect("localhost", "root", "", "employees");
$output = '';
if ((isset($_POST["submit"]))) {
    $selector = $_POST["selector"];
    $search = mysqli_real_escape_string($connect, $_POST["submit"]);
?>

<?php

if ($selector = "name") {
   $str = $_POST["search"];
   $query = "SELECT first_name, last_name
            FROM employees 
    WHERE first_name LIKE '$str' limit 100";

   $result = mysqli_query($connect, $query);
   if (mysqli_num_rows($result) > 0) {
       $output .= '
       <div class="table-responsive">
       <table class="table table bordered">
           <tr>
           <th>First </th>
           <th>last 
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
   } 
   // elseif(mysqli_num_rows($result) == 0 && $selector = "name") {
   //     echo 'Names Not Found';
   // }
}
else if($selector = "Search"){
   echo 'Please Select One!';
}
}