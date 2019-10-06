<?php  
include 'dbh.php';
$input = filter_input_array(INPUT_POST);

$nm= mysqli_real_escape_string($con, $input["name"]);
$gn= mysqli_real_escape_string($con, $input["gender"]);
$em= mysqli_real_escape_string($con, $input["email"]);
$usn= mysqli_real_escape_string($con, $input["username"]);
$pwd= mysqli_real_escape_string($con, $input["password"]);
$tg= mysqli_real_escape_string($con, $input["tag"]);
$img= mysqli_real_escape_string($con, $input["img"]);

if($input["action"] === 'edit')
{
 $query = "
 UPDATE users 
 SET   
 name = '".$nm."',
 gender = '".$gn."', 
 email = '".$em."', 
 username = '".$usn."',
 password = '".$pwd."',
 tag = '".$tg."',
 img = '".$img."'
 WHERE id = '".$input["id"]."'
 ";

 mysqli_query($con, $query);
}

if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM users
 WHERE id = '".$input["id"]."'
 ";
 mysqli_query($con, $query);
}

echo json_encode($input);

?>