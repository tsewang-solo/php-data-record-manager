<?php
session_start();
include 'php-action/dbh.php';
$usn=$_SESSION["username"];
if(empty($usn)){
  header("location:login.php");
}

$usn=$_SESSION["username"];
$query = "SELECT * FROM users where username='$usn'";
$result = mysqli_query($con, $query);
while($row = mysqli_fetch_array($result))
{

$img='<img src="'.$row["img"].'" class="headeruserimg">';
$name = $row["name"];
$gender= $row["gender"];
$email = $row["email"];
$username = $row["username"];
$password = $row["password"];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Page Title</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>



<script src="js/plugin/edit table/jquery.tabledit.min.js"></script>
<script src="js/process.js"></script>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/footer.css">



<style>
/* Style the body */
body {
  font-family: Arial;
  margin: 0;
}

/* Header/Logo Title */
.header {
  padding:1em;
  text-align:;
  color: white;
  font-size:20px;
  background-image: linear-gradient(-270deg, #1abc9c,#8080ff);
}
.headerimg{
height:100px;
width:100px;
}


.fdt2{
height:55px;
width:100%;
margin-top:1em; 
}

span{color:orange;}

</style>
<script type="text/javascript">

function folderlist(){
$("#mainpage").load('folder-manager/index.php');
}


function myprofile(){
$("#mainpage").load('php-action/profile.php');
}


function printDiv() {
     var printContents = document.getElementById('myscreenout').innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
     originalContentss.close();
}



function search(){

var form=$("#qfrm");
$.ajax({
        type:"POST",
        url:form.attr("action"),
        data:form.serialize(),
        success: function(response){
  $("#myscreenout").html(response);
        }
    });       
}


</script>
</head>
<body>

<div class="header">


<div class="headmenuholder">
<div class="headmenuleft"><a href="index.php"><img class="headerimg" src="img/yak.png"></a></div>
<div class="headmenuright">
  
  
        <div class="dropdown">
          <p data-toggle="dropdown" style="font-size:14px;"> <?php echo $name; ?> <?php echo $img; ?></p>
          <ul class="dropdown-menu">
            <li><a href="#" onclick="myprofile()"> My profile <span class="glyphicon glyphicon-cog pull-right"></span></a></li>
            <li class="divider"></li>
            <li><a href="#">User stats <span class="glyphicon glyphicon-stats pull-right"></span></a></li>
            <li class="divider"></li>
            <li><a href="#">Messages <span class="badge pull-right"> 42 </span></a></li>
            <li class="divider"></li>
            <li><a href="logout.php">Sign Out <span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
          </ul>
        </div>
     
</div>


</div>
</div>




<div class="content">

<a href="admin.php"><button class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-chevron-left"> back</i></button></a> 


<div class="main" id="mainpage">


  <div class="simpleframe">
  <h4 class="text-primary"> My folder</h4>

  <div class="table-responsive" id="folder_table">  </div>
  <div align="right"><button type="button" name="create_folder" id="create_folder" class="btn btn-success btn-sm">Create</button></div>

  </div>



<div id="folderModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title"><span id="change_title">Create Folder</span></h4>
   </div>
   <div class="modal-body">
    <p>Enter Folder Name
    <input type="text" name="folder_name" id="folder_name" class="form-control" /></p>
    <br />
    <input type="hidden" name="action" id="action" />
    <input type="hidden" name="old_name" id="old_name" />
    <input type="button" name="folder_button" id="folder_button" class="btn btn-info" value="Create" />
    
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>



<div id="uploadModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Upload File</h4>
   </div>
   <div class="modal-body">
    <form method="post" id="upload_form" enctype='multipart/form-data'>
     <p>Select Image
     <input type="file" name="upload_file" /></p>
     <br />
     <input type="hidden" name="hidden_folder_name" id="hidden_folder_name" />
     <input type="submit" name="upload_button" class="btn btn-info" value="Upload" />
    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<div id="filelistModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">File List</h4>
   </div>
   <div class="modal-body" id="file_list">
    
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>


<div id="fileviewModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">File view</h4>
   </div>
   <div class="modal-body" id="div_file_view">
    <textarea editable="false" style="width:100%;height:500px;" id="pre_file_view"></textarea>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>




</div>

<script>
$(document).ready(function(){
 
 load_folder_list();
 
 function load_folder_list()
 {
  var action = "fetch";
  $.ajax({
   url:"action.php",
   method:"POST",
   data:{action:action},
   success:function(data)
   {
    $('#folder_table').html(data);
   }
  });
 }
 
 $(document).on('click', '#create_folder', function(){
  $('#action').val("create");
  $('#folder_name').val('');
  $('#folder_button').val('Create');
  $('#folderModal').modal('show');
  $('#old_name').val('');
  $('#change_title').text("Create Folder");
 });
 
 $(document).on('click', '#folder_button', function(){
  var folder_name = $('#folder_name').val();
  var old_name = $('#old_name').val();
  var action = $('#action').val();
  if(folder_name != '')
  {
   $.ajax({
    url:"action.php",
    method:"POST",
    data:{folder_name:folder_name, old_name:old_name, action:action},
    success:function(data)
    {
     $('#folderModal').modal('hide');
     load_folder_list();
     alert(data);
    }
   });
  }
  else
  {
   alert("Enter Folder Name");
  }
 });
 
 $(document).on("click", ".update", function(){
  var folder_name = $(this).data("name");
  $('#old_name').val(folder_name);
  $('#folder_name').val(folder_name);
  $('#action').val("change");
  $('#folderModal').modal("show");
  $('#folder_button').val('Update');
  $('#change_title').text("Change Folder Name");
 });
 
 $(document).on("click", ".delete", function(){
  var folder_name = $(this).data("name");
  var action = "delete";
  if(confirm("Are you sure you want to remove it?"))
  {
   $.ajax({
    url:"action.php",
    method:"POST",
    data:{folder_name:folder_name, action:action},
    success:function(data)
    {
     load_folder_list();
     alert(data);
    }
   });
  }
 });
 
 $(document).on('click', '.upload', function(){
  var folder_name = $(this).data("name");
  $('#hidden_folder_name').val(folder_name);
  $('#uploadModal').modal('show');
 });
 
 $('#upload_form').on('submit', function(){
  $.ajax({
   url:"upload.php",
   method:"POST",
   data: new FormData(this),
   contentType: false,
   cache: false,
   processData:false,
   success: function(data)
   { 
    load_folder_list();
    alert(data);
   }
  });
 });
 
 $(document).on('click', '.view_image', function(){
  var file_name = $(this).data("name");
  var action = "view_images";
  $.ajax({
   url:"action.php",
   method:"POST",
   data:{action:action, file_name:file_name},
   success:function(data)
   {
    $('#div_file_view').html(data);
    $('#fileviewModal').modal('show');
   }
  });
 });

  $(document).on('click', '.view_file', function(){
  var file_name = $(this).data("name");
  var action = "view_files";
  $.ajax({
   url:"action.php",
   method:"POST",
   data:{action:action, file_name:file_name},
   success:function(data)
   {
    $('#pre_file_view').html(data);
    $('#fileviewModal').modal('show');
   }
  });
 });


  $(document).on('click', '.view_folder', function(){
  var folder_name = $(this).data("name");
  var action = "fetch_files";
  $.ajax({
   url:"action.php",
   method:"POST",
   data:{action:action, folder_name:folder_name},
   success:function(data)
   {
    $('#folder_table').html(data);
   }
  });
 });
 
 $(document).on('click', '.remove_file', function(){
  var path = $(this).attr("id");
  var action = "remove_file";
  if(confirm("Are you sure you want to remove this file?"))
  {
   $.ajax({
    url:"action.php",
    method:"POST",
    data:{path:path, action:action},
    success:function(data)
    {
     alert(data);
     $('#filelistModal').modal('hide');
     load_folder_list();
    }
   });
  }
 });

$(document).on('blur', '.change_file_name', function(){
  var folder_name = $(this).data("folder_name");
  var old_file_name = $(this).data("file_name");
  var new_file_name = $(this).text();
  var action = "change_file_name";
  $.ajax({
   url:"action.php",
   method:"POST",
   data:{folder_name:folder_name, old_file_name:old_file_name, new_file_name:new_file_name, action:action},
   success:function(data)
   {
    alert(data);
   }
  });
 });
 
});
</script>
























</div>

  <div class="footer">
      <div class="con">
              <a href='#'><i class="fa fa-twitch fa-3x fa-fw"></i></a>
              <a href='#'><i class="fa fa-facebook fa-3x fa-fw"></i></a>
              <a href='#'><i class="fa fa-twitter fa-3x fa-fw"></i></a>
              <a href='#'><i class="fa fa-youtube-play fa-3x fa-fw"></i></a>
              <a href='#'><i class="fa fa-rss fa-3x fa-fw"></i></a>
              <a href='#'><i class="fa fa-vine fa-3x fa-fw"></i></a>
              <a href='#'><i class="fa fa-flickr fa-3x fa-fw"></i></a>
              <a href='#'><i class="fa fa-linkedin fa-3x fa-fw"></i></a>
      </div>
      <div class="con">
    <h4> this site currently under maintainance </h4>

<p>© All right Reversed.tsewang project</p>  
      </div>
    </div>




</body>
</html>