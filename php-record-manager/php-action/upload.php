<?php
include 'dbh.php';

if (mysqli_connect_errno())
  { echo "Failed to connect to MySQL: " . mysqli_connect_error();}

$id=0;
$result = mysqli_query($con,"select distinct mydate FROM file_dt");
while($row = mysqli_fetch_array($result))
  {
  $adate[$id]="$row[mydate]";
  $id++;
  }
$i=0;
$result = mysqli_query($con,"select distinct file_no FROM file_info");
while($row = mysqli_fetch_array($result))
  {
  $afno[$i]="$row[file_no]";
  $i++;
  }



$result2 = mysqli_query($con,"SELECT COUNT(file_no) FROM file_info WHERE file_no='100c'");
$row = mysqli_fetch_array($result2);
$tt = $row[0];
mysqli_close($con);
?> 




<div  class="formframe" >

<div class="label-panel">ཡིག་སྣོད་ཀྱི་་དཔྱད་གཞི་འདི་ལ་</div>

<table class="table" style="border:none;font-size:18px;">  
<form method="POST" action="php-action/uploaddt.php" name="ffrm" id="ffrm">

<tr> 
<td style="border:none;width:10%;">ཡིག་སྣོད་ཀྱི་ཨང་།</td>
<td style="border:none;width:30%;">ཡིག་སྣོད་ཀྱི་མིང་།</td>
<td style="border:none;width:30%;">ལས་ཁུངས་།</td>
<td style="border:none;width:10%;">ལོ་ཁམས་།</td> 
<td style="border:none;width:10%;"></td>
</tr> 

<tr> 
<td style="border:none;width:10%;">
   <input type="text" name="fno" id="fno" class="form-control" autocomplete="off" placeholder="ཡིག་སྣོད་ཀྱི་ཨང་།" /> 
</td>

<td style="border:none;width:30%;">  
  <input type="text" name="fnm" id="fnm" class="form-control" autocomplete="off" placeholder="ཡིག་སྣོད་ཀྱི་མིང་།" /> 
</td>

<td style="border:none;width:30%;">
<input  type="text" name="dpt" id="dpt" class="form-control" autocomplete="off" placeholder="ལས་ཁུངས་།" />  
</td>

<td style="border:none;width:15%;">
<input type="text" name="yr" id="yr" class="form-control" autocomplete="off" placeholder="ལོ་ཁམས་།" />
</td> 

<td style="border:none;width:15%;">
 <button class="btn btn-primary btn-sm" type="button" onclick="upld()">Save</button>
 <button class="btn btn-primary btn-sm" type="button" onclick="reset()">Reset</button>
</td>

</tr>  
</form>            
</table>

</div>










<div  class="formframe" >
<div class="label-panel">ཡིག་སྣོད་ཀྱི་་བསྡུས་ཐོ་འདི་ལ་</div>
<table class="table" style="width:30%;border:none;font-size:18px;"> 
<tr> 
<form class="map-test" action="uploaddt.php" method="POST"  id="fmx"> 
<td style="border:none;width:40%;">
<select class="form-control" name="fno" id="fno" >
<option value='' disabled selected>ཡིག་སྣོད་ཀྱི་ཨང་།</option>
<?php $arrlength = count($afno);
for($x = 0; $x<$arrlength; $x++) { echo "<option>".$afno[$x]."</option>";} ?> 
</select>   
</td>
<td style="border:none;width:40%;"><input type="date" class="form-control" name="dte" id="dte" placeholder="Date" class="textbox-n"></td>
<td style="border:none;width:20%;"><button class="btn btn-success" type="button" id="x" onclick="fmset(id)">reset</button></td>
</form>   
</tr>
</table> 
<hr>

<table class="table" id="dynamic_field" style="border-spacing:0px 5px;border-collapse:separate;border:none;font-size:18px;">  
<tr> 
<td style="border:none;width:10%;">ཡིག་ཨང་།</td>
<td style="border:none;width:30%;">འབྲེལ་ཆགས་ལས་ཁུངས་།</td>
<td style="border:none;width:20%;">དཀར་ཆག་།</td>
<td style="border:none;width:40%;">ཟུར་བརྗོད་།</td>
<td style="border:none;width:20%;"></td>    
</tr> 


<tr> 
<form class="map-test" action="uploaddt.php" method="POST"  id="fm1"> 
<td style="border:none;width:10%;"><input type="text" class="form-control" name="pno" id="pno" placeholder="ཡིག་ཨང་།"></td>
<td style="border:none;width:30%;"><input type="text" class="form-control" name="rdpt" id="rdpt" placeholder="འབྲེལ་ཆགས་ལས་ཁུངས་།"></td>
<td style="border:none;width:20%;"><input type="text" class="form-control" name="rno" id="rno" placeholder="དཀར་ཆག་།"></td>
<td style="border:none;width:40%;"><input type="text" class="form-control" name="rm" id="rm" placeholder="ཟུར་བརྗོད་།"></td>
<td style="border:none;width:20%;"><button class="btn btn-success" type="button" id="1" onclick="fmset(id)">reset</button></td>  
</form>   
</tr> 

<tr> 
<form class="map-test" action="uploaddt.php" method="POST"  id="fm2"> 
<td style="border:none;"><input type="text" class="form-control" name="pno" id="pno" placeholder="ཡིག་ཨང་།"></td>
<td style="border:none;"><input type="text" class="form-control" name="rdpt" id="rdpt" placeholder="འབྲེལ་ཆགས་ལས་ཁུངས་།"></td>
<td style="border:none;"><input type="text" class="form-control" name="rno" id="rno" placeholder="དཀར་ཆག་།"></td>
<td style="border:none;"><input type="text" class="form-control" name="rm" id="rm" placeholder="ཟུར་བརྗོད་།"></td>  
<td style="border:none;"><button class="btn btn-success" type="button" id="2" onclick="fmset(id)">reset</button></td>
</form>   
</tr> 

<tr> 
<form class="map-test" action="uploaddt.php" method="POST"  id="fm3"> 
<td style="border:none;"><input type="text" class="form-control" name="pno" id="pno" placeholder="ཡིག་ཨང་།"></td>
<td style="border:none;"><input type="text" class="form-control" name="rdpt" id="rdpt" placeholder="འབྲེལ་ཆགས་ལས་ཁུངས་།"></td>
<td style="border:none;"><input type="text" class="form-control" name="rno" id="rno" placeholder="དཀར་ཆག་།"></td>
<td style="border:none;"><input type="text" class="form-control" name="rm" id="rm" placeholder="ཟུར་བརྗོད་།"></td> 
<td style="border:none;"><button class="btn btn-success" type="button" id="3" onclick="fmset(id)">reset</button></td> 
</form>   
</tr> 

<tr> 
<form class="map-test" action="uploaddt.php" method="POST"  id="fm4"> 
<td style="border:none;"><input type="text" class="form-control" name="pno" id="pno" placeholder="ཡིག་ཨང་།"></td>
<td style="border:none;"><input type="text" class="form-control" name="rdpt" id="rdpt" placeholder="འབྲེལ་ཆགས་ལས་ཁུངས་།"></td>
<td style="border:none;"><input type="text" class="form-control" name="rno" id="rno" placeholder="དཀར་ཆག་།"></td>
<td style="border:none;"><input type="text" class="form-control" name="rm" id="rm" placeholder="ཟུར་བརྗོད་།"></td>
<td style="border:none;"><button class="btn btn-success" type="button" id="4" onclick="fmset(id)">reset</button></td>  
</form>   
</tr> 

<tr> 
<form class="map-test" action="uploaddt.php" method="POST"  id="fm5"> 
<td style="border:none;"><input type="text" class="form-control" name="pno" id="pno" placeholder="ཡིག་ཨང་།"></td>
<td style="border:none;"><input type="text" class="form-control" name="rdpt" id="rdpt" placeholder="འབྲེལ་ཆགས་ལས་ཁུངས་།"></td>
<td style="border:none;"><input type="text" class="form-control" name="rno" id="rno" placeholder="དཀར་ཆག་།"></td>
<td style="border:none;"><input type="text" class="form-control" name="rm" id="rm" placeholder="ཟུར་བརྗོད་།"></td>
<td style="border:none;"><button class="btn btn-success" type="button" id="5" onclick="fmset(id)">reset</button></td>  
</form>  


<tr>
<td  style="border:none;"><input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" onclick="hackme()"></td>
<td  style="border:none;"><input type="button" name="cancel" id="cancel" class="btn btn-info" value="cancel" ></td>
</tr> 

</table>



</div>

<div class="simpleframe" id="tdatalayout"></div>
<script type="text/javascript">
//upload file content using tw form
function upld(){
var form=$("#ffrm");
$.ajax({
        type:"POST",
        url:form.attr("action"),
        data:form.serialize(),
        success: function(response){
  $("#tdatalayout").html(response);
}
    }); 
}



//upload file content using tw form
function upld(){
var form=$("#ffrm");
$.ajax({
        type:"POST",
        url:form.attr("action"),
        data:form.serialize(),
        success: function(response){
  $("#tdatalayout").html(response);
}
    }); 
}
//insert multiple record
x=1;
function hackme(){
for(var i=0;5>i;i++){
setTimeout(function(){ 
var form="#fm"+x;
var formx="#fmx";
var fm = $(form).serialize() + '&' + $(formx).serialize();
  $.ajax({  
           url:"php-action/uploaddt.php",  
           method:"POST", 
           data:fm,  
            success:function(data){ 
            $("#tdatalayout").html(data);   
               }  
           });
x++;
  }, 300 * i);
x=1;
}
}

</script>