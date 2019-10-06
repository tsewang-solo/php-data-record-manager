<?php  
include 'dbh.php';
$input = filter_input_array(INPUT_POST);

$fno = mysqli_real_escape_string($con, $input["file_no"]);
$yr = mysqli_real_escape_string($con, $input["year"]);
$fnm = mysqli_real_escape_string($con, $input["file_name"]);
$dpt = mysqli_real_escape_string($con, $input["department"]);
$pno = mysqli_real_escape_string($con, $input["page_no"]);
$rdpt= mysqli_real_escape_string($con, $input["r_department"]);
$rno = mysqli_real_escape_string($con, $input["reference_no"]);
$rm = mysqli_real_escape_string($con, $input["remark"]);
$mydate = mysqli_real_escape_string($con, $input["mydate"]);

if($input["action"] === 'edit')
{
 $query = "
 UPDATE file_dt 
 SET   
 page_no = '".$pno."',
 r_department = '".$rdpt."', 
 reference_no = '".$rno."', 
 remark = '".$rm."',
 mydate = '".$mydate."'
 WHERE id = '".$input["id"]."'
 ";

 mysqli_query($con, $query);
}

if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM file_dt 
 WHERE id = '".$input["id"]."'
 ";
 mysqli_query($con, $query);
}

echo json_encode($input);

?>




