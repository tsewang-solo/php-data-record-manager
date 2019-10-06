<div class="simpleframe">
<?php

include 'dbh.php';

echo 
"<table class='table table-hover table-bordered' id='editable_table-user'>
  <thead>
  <tr><th>id</th>
   <th>img</th>
      <th>name</th>
      <th>gender</th>
      <th>email</th>
      <th>username</th>
      <th>password</th>
      <th>tag</th>
      </tr></thead>
      <tbody>";  

$result = mysqli_query($con,"SELECT * FROM users");

if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['id']. "</td>";
   echo "<td>" . $row['img'] . "</td>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['gender'] . "</td>";
  echo "<td>" . $row['email'] . "</td>";
  echo "<td>" . $row['username'] . "</td>";
  echo "<td>" . $row['password'] . "</td>";
  echo "<td>" . $row['tag'] . "</td>";
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

?>

</div>



<script>  
$(document).ready(function(){  
  $('#editable_table-user').Tabledit({
  url:'php-action/useraction.php',
  columns:{
  identifier:[0, "id"],
  editable:[[1, 'img'], [2, 'name'], [3, 'gender'], [4, 'email'], [5, 'username'], [6, 'password'], [7, 'tag']]
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





