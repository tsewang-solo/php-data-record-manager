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


.tabmain{
width:100%;
height:100%;
display:inline-flex; 
margin-top:1em; 
}

.leftframe{
width:600px;
height:1000px;
margin-right:8px;
padding:10px; 
float:left;
border:0.5px solid gray;
border-radius:5px;  
  overflow-y: scroll;
    scrollbar-width: none; /* Firefox */
    -ms-overflow-style: none;
}


.leftframe::-webkit-scrollbar { 
   width: 0;
    height: 0;
}
.rightframe{
width:100%;
height:1000px;
margin-left:8px;
padding:10px; 
float:right;
border:0.5px solid gray;
border-radius:5px; 
  overflow-y: scroll;
    scrollbar-width: none; /* Firefox */
    -ms-overflow-style: none; 
}



.rightframe::-webkit-scrollbar { 
   width: 0;
    height: 0;
}


.fdt2{
height:55px;
width:100%;
margin-top:1em; 
}



</style>
<script type="text/javascript">

function addfile(){
$("#mainpage").load('php-action/upload.php');
}

function refresh(){
$("#mainpage").load('php-action/base-table.php');
}

function user(){
$("#mainpage").load('php-action/user-table.php');
}

function filterbar(){
$("#mainpage").load('php-action/control-menu.php');
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


/* load more function */
var c=5;
function loadmore(){
document.getElementById("btn-more").innerHTML="<span class='glyphicon glyphicon-hourglass'> loading...</span>";  
var search=document.getElementById("srchval").value;
var value={'srchval':search, 'count':c};
$.ajax({
    type:"POST",
     url:"php-action/searchdata.php",
   data:value,
 success:function(response){        
  $("#myscreenout").html(response);
 document.getElementById("btn-more").innerHTML="load more";  
}
});
 c=c+5;
}

function filedetail(id){
var value={'fno':id};
$.ajax({
    type:"POST",
     url:"php-action/fsearchdata1.php",
   data:value,
 success:function(response){        
  $("#myscreenout").html(response);
}
});
}

function deletefile(id){
if(confirm("are you sure want to delete it ?")){
var value={'idr':id, 'delete':'del'};
$.ajax({
    type:"POST",
     url:"managefile.php",
   data:value,
 success:function(response){        
  $("#tdatalayout").html(response);
}
});
}
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
<div class="headmenuleft"><a href="admin.php"><img class="headerimg" src="img/yak.png"></a></div>
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

<a href="index.php"><button class="btn btn-default btn-sm">home</button></a>  
<a href="file manager.php"><button class="btn btn-default btn-sm">file manager</button></a> 
<a href="add.php"><button class="btn btn-default btn-sm">add data</button></a> 
<button class="btn btn-default btn-sm" onclick="refresh()">base table</button>
<button class="btn btn-default btn-sm" onclick="user()">user table</button>
<button class="btn btn-default btn-sm" onclick="filterbar()">filter menu</button>




<hr>


<div class="main" id="mainpage">




<div class="fdt" >
<div style="width:25%;float:left;">

  <form action="php-action/searchdata.php" method="POST"  name="qfrm" id="qfrm"> 
      <div class="input-group col-md-12">
        <input type="text" class="form-control searchbar" placeholder="Search" id="srchval" name="srchval">
        <div class="input-group-btn" >
        <button class="btn btn-primary" type="button" name="qsrch" onclick="search()"><span class="glyphicon glyphicon-search"></span>
        </button>
    </div>
  </div>
</form>

</div>


<div style="width:70%;float:right;text-align:right;">
<div class="btn-group" role="group" aria-label="second group">
<button class="btn btn-primary btn-sm" id="fldv" onclick="pdfload()"><i class="glyphicon glyphicon-eye-open"></i></button>
<button class="btn btn-primary btn-sm" id="" onclick="printDiv()"><i class="glyphicon glyphicon-print"></i></button> 
</div>
</div>


</div>



<div  class="simpleframe" id="myscreenout">

<?php

echo 
"<table class='table table-hover table-bordered' id='editable_table' number-per-page='20' current-page='0' style='background-color:white;'>
  <thead style='background-color:gray;'>
  <tr><th>Refrence no</th>
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

$result = mysqli_query($con,"SELECT * FROM file_dt join file_info on file_dt.file_no=file_info.file_no ");

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

else{  echo "<br>";
       echo "there is no such record in the file or the file is missing";           
        }

echo"</tbody>".
    "</table>";

mysqli_close($con);           
?>
</div>









<div class="fdt" >
<div style="width:25%;float:left;">
  <label>Show</label>
<select class ="btn btn-default" name="state" id="maxRows">
             <option value="1000">ALL Rows</option>
             <option value="5">5</option>
             <option value="10">10</option>
             <option value="20">20</option>
             <option value="50">50</option>
             <option value="10000">All</option>
            </select>
            <label>Rows</label>
<button id="" class="btn btn-primary btn-sm" onclick="sortTable(0)"><i class="glyphicon glyphicon-sort"></i></button>
</div>
<div  style="width:70%;float:right;text-align:right;">
<ul class="pagination" style="margin:0;padding:0;"><!-- Here the JS Function Will Add the Rows--></ul>
</div>
 
<script type="text/javascript" src="js/js.js"></script>
<script type="text/javascript"> getPagination('#editable_table');</script>

<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("editable_table");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>

</div>


</div>

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