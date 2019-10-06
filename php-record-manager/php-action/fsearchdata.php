<?php
include("dbh.php");
$fno=$_POST['fno'];
if (mysqli_connect_errno())
  { echo "Failed to connect to MySQL: " . mysqli_connect_error(); }
echo'<table id="" class="table" style="border:none;margin-top:1em;font-size:16px;">';
$result= mysqli_query($con,"SELECT * FROM file_info WHERE file_no='$fno' limit 1");
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result))
  {
         echo '<tr >
           <td style="border:none; width:15%; color:blue;"> ཡིག་སྣོད་ཀྱི་ཨང་། </td>
           <td style="border: none; width:65%;">'. $row["file_no"] .'</td>
           <td style="border: none; width:10%;color:blue;"> ལོ་ཁམས་། </td>
           <td style="border: none; width:10%;"">'. $row["year"] .'</td>
           </tr>
           <tr class="text-default">
           <td style="border: none; width:15%;color:blue;"> ཡིག་སྣོད་ཀྱི་མིང་། </td>
           <td style="border: none; width:40%;">'. $row["file_name"] . '</td>
           </tr>
           <tr class="text-default">
           <td style="border: none; width:10%;color:blue;"> ལས་ཁུངས་། </td>
           <td style="border: none; width:40%;">'. $row["department"] .'</td>
           </tr>'; 
  }
}

echo '</table>

<table id="editable_table" class="table table-bordered" style="font-size:16px;">
<thead>
      <tr>
       <th style="display:none;">ID</th>
       <th> ཡིག་ཨང་། </th>
       <th> འབྲེལ་ཆགས་ལས་ཁུངས་། </th>
       <th> དཀར་ཆག་། </th>
       <th> ཟུར་བརྗོད་། </th>
      </tr>
     </thead>
     <tbody>';

 $srt=$_POST['srt'];

if (mysqli_connect_errno())
  { echo "Failed to connect to MySQL: " . mysqli_connect_error(); }

if(isset($_POST['fno']) && empty($_POST['rdpt']) && empty($_POST['rno'])){
   $fno=$_POST['fno'];
   


$query = "SELECT * FROM file_dt where file_no='$fno' order by $srt asc";
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0){
     while($row = mysqli_fetch_array($result))
     {
echo '<tr>
       <td style="display:none;">'.$row["id"].'</td>
       <td>'.$row["page_no"].'</td>
       <td>'.$row["r_department"].'</td>
       <td>'.$row["reference_no"].'</td>
       <td>'.$row["remark"].'</td>
       </tr>';
     }
   }
}


if(isset($_POST['rdpt']) && empty($_POST['rno'])){
   $rdpt=$_POST['rdpt'];
   


$query = "SELECT DISTINCT * FROM file_dt where file_no='$fno' and r_department='$rdpt' order by $srt asc";
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0){
     while($row = mysqli_fetch_array($result))
     {
echo '<tr>
       <td style="display:none;">'.$row["id"].'</td>
       <td>'.$row["page_no"].'</td>
       <td>'.$row["r_department"].'</td>
       <td>'.$row["reference_no"].'</td>
       <td>'.$row["remark"].'</td>
       </tr>';
     }
   }
}




if(isset($_POST['rno'])){
  $fno=$_POST['fno'];
   $rno=$_POST['rno'];
 $rdpt=$_POST['rdpt'];

$query = "SELECT DISTINCT * FROM file_dt where file_no='$fno' and r_department='$rdpt' and reference_no='$rno' order by $srt asc";
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0){
     while($row = mysqli_fetch_array($result))
     {
echo '<tr>
       <td style="display:none;">'.$row["id"].'</td>
       <td>'.$row["page_no"].'</td>
       <td>'.$row["r_department"].'</td>
       <td>'.$row["reference_no"].'</td>
       <td>'.$row["remark"].'</td>
       </tr>';
     }
   }
}



  mysqli_close($con);

?>

</tbody>
</table>



