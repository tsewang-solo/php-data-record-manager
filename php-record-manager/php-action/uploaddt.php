<?php
include 'dbh.php';

$fno=$_POST['fno'];
$fnm=$_POST['fnm'];
$yr=$_POST['yr'];
$dpt=$_POST['dpt'];

$pno=$_POST['pno'];
$rno=$_POST['rno'];
$rdpt=$_POST['rdpt'];
$rm=$_POST['rm'];
$dte=$_POST['dte'];
$sql2=$_POST['sql'];

$me='hahaha not working for you, coz i did not recieve any value from the added row field';
   
if(! $con ) { die('Could not connect: ' . mysql_error());}
   
if(isset($_POST['pno'])){

if($pno=="" || $rdpt=="" || $rno=="" || $rm==""){

 echo "<div class='alert alert-danger alert-dismissible fade in'>
       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
       <strong>Alert!</strong> Enter all the required file data in order to upload the data.
       </div>";
       echo $pno;
       echo $idr;

}
else{

   $sql="INSERT INTO file_dt(file_no, page_no, r_department, reference_no, remark, mydate)
   VALUES ('$fno','$pno','$rdpt','$rno','$rm','$dte')";
 
if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));

  }   
   echo "<div class='alert alert-success'><strong>Sucess!</strong> file data upload successful</div>";
          echo $rno;
   mysql_close($con);
}

}

else {


if($fno=="" || $fnm=="" || $yr=="" || $dpt==""){

 echo "<div class='alert alert-danger alert-dismissible fade in'>
       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
       <strong>Alert!</strong> Enter all the required file info in order to upload the data.
       </div>";
   echo $idr;
}

else{

   $sql="INSERT INTO file_info(file_no, file_name, year, department)
   VALUES ('$fno','$fnm','$yr','$dpt')";
 
if (!mysqli_query($con,$sql))
  {
    echo "<div class='alert alert-danger'><strong>error!</strong>\nfile no $fno already exist</div>";
  die('Error: ' . mysqli_error($con));

  }   
   echo "<div class='alert alert-success'><strong>Sucess!</strong>\nfile no $fno upload successful</div>";

   mysql_close($con);
}

}

?>