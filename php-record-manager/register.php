 <?php  
 $connect = mysqli_connect("localhost", "root", "", "tsewang");  
 session_start();  
 if(isset($_SESSION["username"]))  
 {  
      header("location:entry.php");  
 }  
 if(isset($_POST["register"]))  
 {  
      if(empty($_POST["username"]) && empty($_POST["password"]))  
      {  
           echo '<script>alert("All Fields are required")</script>';  
      }  
      else {  
           $name = mysqli_real_escape_string($connect, $_POST["name"]); 
           $username = mysqli_real_escape_string($connect, $_POST["username"]);  
           $password = mysqli_real_escape_string($connect, $_POST["password"]);  
           $password = md5($password);  
           $gender = mysqli_real_escape_string($connect, $_POST["gender"]); 
           $email = mysqli_real_escape_string($connect, $_POST["emailId"]); 

$query = "INSERT INTO users (name, username, password, gender, email) VALUES('$name','$username', '$password', '$gender', '$email')";  

           if(mysqli_query($connect, $query))  
           {  
                echo '<script>alert("Registration Done")</script>';  
           }  
           else{

            echo '<script>alert("Registration failed")</script>';  
           }
      }  
 }  
 else{

    echo '<script>alert("both field are dead")</script>'; 
 }

 ?>  




<!DOCTYPE html>  
<html>  
<head>  
<title>Webslesson Tutorial | PHP Login Registration Form with md5() Password Encryption</title>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

<style>
/* Style the body */
body {
  font-family: Arial;
  margin: 0;
}

/* Page Content */
.content {
  padding:2em;
}

.loginframe{
text-align:center; 
width:600px; 
margin:auto;
padding:1em;  
border:0.5px solid gray;
border-radius:5px; 
}

.loginimg{

height:300px;
width:300px;
margin:1em; 
}

.loginform{
width:600px;
margin:auto; 
padding: 1em;
}



</style>
</head>  

<body>  
        
<div class="content">
<div class="loginframe">
<h3>Register here</h3>  


<div class="loginform">
  

<form class="form-horizontal" ng-app="" name="myForm" method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="Name">Name</label>  
  <div class="col-md-8">
  <input id="name" name="name" type="text" placeholder="Name" class="form-control input-md" required="">
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="Name">UserName</label>  
  <div class="col-md-8">
  <input name="username" id="username" type="text" placeholder="username" class="form-control input-md" required="">
    
  </div>
</div>


<!-- Password input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="passwordinput">Password</label>
  <div class="col-md-8">
  <input type="password" class="form-control" placeholder="password" name="password" ng-model="user.password"   ng-minlength="5" 
                   ng-maxlength="10"  ng-required="true"/>


            <span class="help-block" 
                  ng-show="((myForm.password.$error.minlength ||
                           myForm.password.$error.maxlength) && 
                           myForm.password.$dirty) ">
                           password number should be within 10 digit or number
            </span>
<p class="help-block" ng-if="loginForm.password.$invalid && loginForm.password.$dirty">Please Enter at least 8 characters</p>
  </div>
</div>






<div class="form-group">
  <label class="col-md-3 control-label" for="gender">Gender</label>
  <div class="col-md-4"> 
    <label class="radio-inline" for="gender-0">
      <input type="radio" name="gender" id="gender-0" value="Male" checked="checked">
      Male
    </label> 
    <label class="radio-inline" for="gender-1">
      <input type="radio" name="gender" id="gender-1" value="Female">
      Female
    </label>
  </div>
</div>



<!-- Text input-->
<div class="form-group">
<label class="col-md-3 control-label" for="emailId">Email Id</label>  
<div class="col-md-8">
<input type="email" placeholder="user@domain.com" class="form-control input-md" required="" id="emailId" name="emailId" ng-model="text">
   <span class="help-block" ng-show="myForm.emailId.$error.email">Not a valid e-mail address</span>  
  </div>
</div>




<!-- Button -->
<div class="form-group">
  <label class="col-md-2 control-label" for="submit"></label>
  <div class="col-md-4">
    <button type="submit" name="register" value="Register" class="btn btn-success">Submit</button>
  </div>
</div>
  <p align="center"><a href="login.php">Login</a></p>  
</fieldset>
</form>





</div>


</div>


</div>





</body>  
</html>  








 



