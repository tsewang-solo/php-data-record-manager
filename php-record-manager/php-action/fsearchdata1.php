<?php echo '<table class="table" style="border:none;margin-top:1em;">';

include("dbh.php");
   $fno=$_POST['fno'];
if (mysqli_connect_errno())
  { echo "Failed to connect to MySQL: " . mysqli_connect_error(); }
$result= mysqli_query($con,"SELECT * FROM file_info WHERE file_no='$fno' limit 1");
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result))
  {
         echo '<tr >
           <td style="border:none; width:5%; color:blue;"> ཡིག་སྣོད་ཀྱི་ཨང་། </td>
           <td style="border: none; width:70%;">'. $row["file_no"] .'</td>
           <td style="border: none; width:5%;color:blue;"> ལོ་ཁམས་། </td>
           <td style="border: none; width:10%;"">'. $row["year"] .'</td>
           </tr>
           <tr class="text-default">
           <td style="border: none; width:10%;color:blue;"> ཡིག་སྣོད་ཀྱི་མིང་། </td>
           <td style="border: none; width:40%;">'. $row["file_name"] . '</td>
           </tr>
           <tr class="text-default">
           <td style="border: none; width:10%;color:blue;"> ལས་ཁུངས་། </td>
           <td style="border: none; width:40%;">'. $row["department"] .'</td>
           </tr>'; 
  }
}

echo '</table>';
echo'
<table id="editable_table" class="table table-bordered table-hover">
<thead>
      <tr>
       <th>ID</th>
       <th> ཡིག་ཨང་། </th>
       <th> འབྲེལ་ཆགས་ལས་ཁུངས་། </th>
       <th> དཀར་ཆག་། </th>
       <th> ཟུར་བརྗོད་། </th>
        <th>ཚེ་གྲངས། </th>
      </tr>
     </thead>
     <tbody>';
 

$query = "SELECT * FROM file_dt where file_no='$fno' order by file_no";
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0){
     while($row = mysqli_fetch_array($result))
     {
echo '<tr>
       <td>'.$row["id"].'</td>
       <td>'.$row["page_no"].'</td>
       <td>'.$row["r_department"].'</td>
       <td>'.$row["reference_no"].'</td>
       <td>'.$row["remark"].'</td>
        <td>'.$row["mydate"].'</td>
       </tr>';
     }
   }


  mysqli_close($con);


echo '</tbody>
</table>';

?>


<script>  

$(document).ready(function(){  
     $('#editable_table').Tabledit({
      url:'php-action/action.php',
      columns:{
       identifier:[0, "id"],
        editable:[[1, 'page_no'], [2, 'r_department'], [3, 'reference_no'], [4, 'remark'], [5, 'mydate']]
      },
      restoreButton:false,
      onSuccess:function(data, textStatus, jqXHR)
      {
       if(data.action == 'delete')
       {
        $('#'+data.id).remove();
       }
      }
     });
});  



</script>





