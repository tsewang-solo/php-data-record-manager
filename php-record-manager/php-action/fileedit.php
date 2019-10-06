<?php
include 'dbh.php';

if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error(); }




if(isset($_POST['idr'])){

$fid = $_POST['idr'];  
$query = "SELECT * FROM file_info WHERE file_no='$fid'";
$result= mysqli_query($con, $query);
while($row = mysqli_fetch_array($result))
{
$filn = $row["file_no"];
$film = $row["file_name"];
$deprt= $row["department"];
$yer= $row["year"];
}

}

mysqli_close($con);


?>




<h4 class="text-primary">Update file <?php echo $filn; ?></h4><hr>

    <div class="row">
      <form id="file_info_form" action="php-action/fileupdate.php" class="form-horizontal">
        <fieldset>

      <div class="form-group">
        <label for="Student" class="col-sm-2 control-label">File_no:</label>
          <div class="col-sm-6">
           <textarea class="form-control" name="fno" id="fno" rows="1"><?php echo $filn; ?></textarea>
          </div>
      </div>

      <div class="form-group">
        <label for="Matric_no" class="col-sm-2 control-label">File_name: </label>
          <div class="col-sm-6">
       <textarea class="form-control" name="fnm" id="dpt" rows="1"><?php echo $film; ?></textarea>
          </div>
      </div>

      <div class="form-group">
        <label for="Email" class="col-sm-2 control-label">Department: </label>
          <div class="col-sm-6">
   <textarea class="form-control" name="dpt" id="rno" rows="1"><?php echo $deprt; ?></textarea>
          </div>
      </div>

      <div class="form-group">
        <label for="Username" class="col-sm-2 control-label">Year: </label>
          <div class="col-sm-6">
        <textarea class="form-control" name="yr" id="rm" rows="1"><?php echo $yer; ?></textarea>
          </div>
      </div>

    <div class="form-group">
    <label for="Username" class="col-sm-2 control-label"></label>
    <div class="col-sm-6">
    <button type="button" class="btn btn-info btn-sm" onclick="file_info_update()">save</button>
    </div>
    </div>

    </fieldset>
    </form>
    </div>



<script>

function file_info_update(){
var form=$("#file_info_form");
$.ajax({
        type:"POST",
        url:form.attr("action"),
        data:form.serialize(),
        success: function(response){
  $("#myscreenout").html(response);
        }
    });  
   alert("updated");  
}


</script>
