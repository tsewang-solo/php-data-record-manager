<?php
session_start();
include 'dbh.php';
$usn=$_SESSION["username"];
$query = "SELECT * FROM users where username='$usn'";
$result = mysqli_query($con, $query);
while($row = mysqli_fetch_array($result))
{

$img='<img src="'.$row["img"].'" height="250" width="250" id="profileimg" onerror="altimage();">';
$name = $row["name"];
$gender= $row["gender"];
$email = $row["email"];
$username = $row["username"];
$password = $row["password"];
}
?>



<div class="simpleframe">
<div class="mainprofile" style="display:flex; ">
<div class="left" style="width:300px;float:left;">
<?php echo $img; ?>   
</div>

<div class="left" style="width:100%;float:right;padding-left:1em;">
 
<h3 style="color:#12B3E1;margin:12px;"><?php echo $name; ?></h3><hr style="color:black;">    

<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="Name">Gender</label>  
  <div class="col-md-10">
 <p class="text-info"><?php echo $gender; ?></p>    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="Name">email</label>  
  <div class="col-md-10">
 <p class="text-info"><?php echo $email; ?></p>    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="Name">Username</label>  
  <div class="col-md-10">
<p class="text-info"><?php echo $username; ?></p>    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label " for="Name">Password</label>  
  <div class="col-md-10">
 <p class="text-info"><?php echo $password; ?></p> 
  </div>
</div>


<!-- Button -->
<div class="form-group">
  <label class="col-md-2 control-label" for="submit"></label>
  <div class="col-md-10">
    <button type="submit" name="editprofile" value="editprofile" class="btn btn-success btn-sm">Edit profile</button>
  </div>
</div>

</fieldset>

</div>
</div>
</div>

<script type="text/javascript">
function altimage(){
document.getElementById('profileimg').src="user/profile.png";
}    

</script>
