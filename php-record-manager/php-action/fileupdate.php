<?php
include 'dbh.php';
$fno=$_POST['fno'];
$fnm=$_POST['fnm'];
$dpt=$_POST['dpt'];
$yr=$_POST['yr'];


if (mysqli_connect_errno()) { echo "Failed to connect to MySQL: " . mysqli_connect_error(); }

if(empty($_POST['fno']) && empty($_POST['fnm']) && empty($_POST['dpt']) && empty($_POST['yr'])){

	    echo "<div class='alert alert-danger alert-dismissible fade in'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Alert</strong><label>all the field are required.</label>
            </div>";   
}

else{

$sql="UPDATE file_info SET file_no='$fno', file_name='$fnm', department='$dpt', year='$yr' WHERE file_no='$fno'";

if (!mysqli_query($con,$sql)){ die('Error: ' . mysqli_error($con)); }
 
          echo "<div class='alert alert-danger alert-dismissible fade in'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Success </strong><label>file no=$fno \nsuccessfully updated wow.</label>
            </div>";  
}
mysqli_close($con);


?>