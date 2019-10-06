<div class="fdt" >
<div style="width:25%;float:left;">
<form action="php-action/searchdata.php" method="POST"  name="qfrm" id="qfrm"> 
      <div class="input-group col-md-12">
        <input type="text" class="form-control" placeholder="Search" id="srchval" name="srchval">
        <div class="input-group-btn" >
        <button class="btn btn-primary" type="button" name="qsrch" onclick="search()"><span class="glyphicon glyphicon-search"></span>
        </button>
    </div>
  </div>
</form>
</div>


<div style="width:70%;float:right;text-align:right;">
<div class="btn-group" role="group" aria-label="second group">
<button class="btn btn-primary" id="fldv" onclick="pdfload()"><i class="glyphicon glyphicon-eye-open"></i></button>
<button class="btn btn-primary" id="refresh" onclick="printDiv()"><i class="glyphicon glyphicon-print"></i></button> 
</div>
</div>

</div>




<div class="tabmain">
  
<div class="leftframe">
<table class="table" style="font-size:16px;">
  <thead>
      <tr>
        <th style="width:20px;"><span class="glyphicon glyphicon-th-list"></span></th>
        <th></th>
        <th></th>
        <th style="width:120px;"></th>
      </tr>
     </thead>
     <tbody>
<?php
include("dbh.php");
if (mysqli_connect_errno())
{ echo "Failed to connect to MySQL: " . mysqli_connect_error(); }

$result = mysqli_query($con,"SELECT * FROM file_info order by file_no ");

if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result))
  {
 echo '
<tr id="'.$row["file_no"].'">
<td><span class="glyphicon glyphicon-file" style="color:orange;font-size:20px"></span></td>
<td style="width:10%">'.$row["file_no"].'</td>
<td>'.$row["file_name"].'</td>
<td><div class="btn-group" role="group">
<button id="'.$row["file_no"].'" class="btn btn-default btn-sm" onclick="filedetail(id)"><i class="glyphicon glyphicon-eye-open"></i></button>
<button id="'.$row["file_no"].'" class="btn btn-default btn-sm" onclick="editfile(id)"><i class="glyphicon glyphicon-edit"></i></button>
<button id="'.$row["file_no"].'" class="btn btn-default btn-sm" onclick="deletefile(id)"><i class="glyphicon glyphicon-trash"></i></button>
</div></td>
</tr>';
  }
}

else{ 
            echo "<br>";
            echo "there is no such record in the file or the file is missing";           
        }
mysqli_close($con);
?>
</tbody>
</table>

</div>






<div class="rightframe" id="myscreenout"><h4 style="color:red;">select file-view or the eye icon to see the content of file record</h4></div>


</div>


<div class="fdt" >
<div style="width:25%;float:left;">
  <label>Show</label>
<select class ="btn btn-default" name="state" id="maxRows">
             <option value="1000">ALL Rows</option>
             <option value="5">5</option>
             <option value="10">10</option>
             <option value="15">15</option>
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
