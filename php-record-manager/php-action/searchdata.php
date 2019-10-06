<?php
sleep(1);  

include 'dbh.php';
// Check connection
$x=5;
$fno=$_POST["srchval"];

if (isset($_POST["count"])) {
$count=$_POST["count"];
echo $count;
} 
else{
$count=0;  
}
$x=$x+$count;
  if (empty($_POST["srchval"])) {
   echo "<div class='alert alert-danger alert-dismissible fade in'>
       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
       <strong>Alert!</strong><label>Enter a search value.</label>
       </div>";
  } 

 else {
echo 
"<table class='table table-hover table-bordered' id='editable_table' number-per-page='20' current-page='0' style='background-color:white;'>
  <thead>
  <tr><th>id:</th>
      <th>ཡིག་སྣོད་ཀྱི་ཨང་།</th>
      <th>ཡིག་སྣོད་ཀྱི་མིང་།</th>
      <th>ལས་ཁུངས་།</th>
      <th>་ལོ་ཁམས་།</th>
      <th>ཡིག་ཨང་།</th>
      <th>འབྲེལ་ཆགས་ལས་ཁུངས་།</th>
      <th>དཀར་ཆག་།</th>
      <th>ཟུར་བརྗོད་།</th>
      <th>Date</th>
      </tr></thead>
      <tbody>";  

$result = mysqli_query($con,"SELECT * FROM file_dt join file_info on file_dt.file_no=file_info.file_no WHERE file_info.file_no like '%$fno%' or file_info.year like '%$fno%' or file_info.file_name like '%$fno%' or file_info.department like '%$fno%' or file_dt.page_no like '%$fno%' or file_dt.r_department like '%$fno%' or file_dt.reference_no like '%$fno%' or file_dt.remark like '%$fno%' limit $x");

if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['id']. "</td>";
  echo "<td>" . $row['file_no'] . "</td>";
  echo "<td>" . $row['file_name'] . "</td>";
  echo "<td>" . $row['department'] . "</td>";
  echo "<td>" . $row['year'] . "</td>";
  echo "<td>" . $row['page_no'] . "</td>";
  echo "<td>" . $row['r_department'] . "</td>";
  echo "<td>" . $row['reference_no'] . "</td>";
  echo "<td>" . $row['remark'] . "</td>";
  echo "<td>" . $row['mydate'] . "</td>";
  echo "</tr>";
  }
}

else{ 
            echo "<br>";
            echo "there is no such record in the file or the file is missing";           
        }

echo"</tbody>".
    "</table>".
    "</div>";

mysqli_close($con);           

  }
?>
 

<hr>

<button name="" id="btn-more" onclick="loadmore()" class="btn btn-default btn-sm">Load more</button>