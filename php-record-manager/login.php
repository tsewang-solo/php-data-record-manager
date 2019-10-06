<?php  
 $connect = mysqli_connect("localhost", "root", "", "tsewang");  
 session_start();  
 if(isset($_SESSION["username"]))  
 {  
      header("location:index.php");  
 }  
 
 if(isset($_POST["login"])){
   
      if(empty($_POST["username"]) && empty($_POST["password"]))  
      {  
           header("location:login.php?Invalid= <p style='color:red;'>Enter both User Name and Password</p>");  
      }  
      else  
      {  
           $username = mysqli_real_escape_string($connect, $_POST["username"]);  
           $password = mysqli_real_escape_string($connect, $_POST["password"]);  
           $password = md5($password);  
           $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";  
           $result = mysqli_query($connect, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                $_SESSION['username'] = $username;  
                header("location:index.php");  
           }  
           else  
           {  
                header("location:login.php?Invalid=<p style='color:red;'>Please Enter Correct User Name and Password</p>"); 
           }  
      }  
 }  
?>  


<!DOCTYPE html>  
<html>  
<head>  
<title>login</title> 
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />



<style>

.form_style
  {
   width: 600px;
   margin: 0 auto;
  }

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
width:350px; 
padding:1em; 
margin:auto; 
border:0.5px solid gray;
border-radius:5px; 
}

.loginimg{

height:300px;
width:300px;
margin:1em; 
}

.loginform{
height:200px;
width:280px;
margin:auto; 
margin-top:2em;
}



</style>

<script type="text/javascript">

var app = angular.module('show_hide_password', []);

 app.controller('show_hide_password_controller', function($scope){

  $scope.inputType = 'password';
  $scope.showHideClass = 'glyphicon glyphicon-eye-open';

  $scope.showPassword = function(){
   if($scope.password_field != null)
   {
    if($scope.inputType == 'password')
    {
     $scope.inputType = 'text';
     $scope.showHideClass = 'glyphicon glyphicon-eye-close';
    }
    else
    {
     $scope.inputType = 'password';
     $scope.showHideClass = 'glyphicon glyphicon-eye-open';
    }
   }
  };

 });

</script>
</head>  

<body>  
        
<div class="content">
<div class="loginframe">
<img src="img/cta.jpg" class="loginimg">  


<div class="loginform" ng-app="show_hide_password" ng-controller="show_hide_password_controller">
<form  method="post" action="login.php">
<div class="form-group row">
  <div class="col-md-12">
  <input type="text" class="form-control" name="username" id="username" placeholder="username">
  </div>
  </div>

  <div class="form-group">
    <div class="input-group">
    <input type="{{inputType}}" name="password" class="form-control" ng-model="password_field" placeholder="Password" />
       <span class="input-group-addon">
        <span class="{{showHideClass}}" ng-click="showPassword()" style="cursor:pointer"></span>
       </span>
      </div>
     </div>


   <div class="form-group row">
  <div class="col-md-12">
<button type="submit"  name="login" value="Login" class="btn btn-primary col-md-12">Login</button>
<br><br> are you nerd?<a href="register.php"> Register here</a>
  </div>
  </div>



                          <div class="notify">
                                <?php if(@$_GET['Empty']==true)
                                { 
                                ?>
                                 <p><?php echo $_GET['Empty']; ?></p>                                
                                <?php
                                 }
                                  ?>
  
                             <?php 
                              if(@$_GET['Invalid']==true){
                             ?>
                               <p><?php echo $_GET['Invalid'] ?></p>                                
                             <?php
                             }
                              ?>

                       </div>

                     </form>



</div>


</div>

</div>





</body>  
</html>  