<?php
//fetch.php
include 'dbh.php';
if(isset($_POST["action"])){
 $output = '';


 if($_POST["action"] == "fno"){
  $fno=$_POST["fno"];
  $query = "SELECT distinct r_department FROM file_dt WHERE file_no = '$fno'";
  $result = mysqli_query($con, $query);
   $output .= '<option value="">All</option>';
  while($row = mysqli_fetch_array($result)){

   $output .= '<option>'.$row["r_department"].'</option>';

  }
 }

 if($_POST["action"] == "rdpt"){
  $fno=$_POST["fno"];
  $query = "SELECT distinct reference_no FROM  file_dt WHERE r_department= '".$_POST["query"]."' and file_no = '$fno'";
  $result = mysqli_query($con, $query);
   $output .= '<option value="">ALL</option>';
  while($row = mysqli_fetch_array($result)){
   $output .= '<option>'.$row["reference_no"].'</option>';
  }

 }
 echo $output;
}
?>