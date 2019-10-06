<?php
include 'dbh.php';
$fino='';
$rdpt='';
$pno='';

$query = "SELECT distinct file_no FROM file_info ORDER BY file_no ASC";
$result = mysqli_query($con, $query);
while($row = mysqli_fetch_array($result))
{
 $fino .= '<option value="'.$row["file_no"].'">'.$row["file_no"].'</option>';
}
?>


<div class="fdt" >

<div style="width:20%;float:left;">
<form action="php-action/searchdata.php" method="POST"  name="qfrm" id="qfrm"> 
      <div class="input-group col-md-12">
        <input type="text" class="form-control searchbar" placeholder="Search" id="srchval" name="srchval">
        <div class="input-group-btn" >
        <button class="btn btn-default" type="button" name="qsrch" onclick="search()"><span class="glyphicon glyphicon-search"></span>
        </button>
    </div>
  </div>
</form>
</div>


<div style="width:75%;float:right;text-align:right;">

<div class="row">
<form action="php-action/fsearchdata.php" method="POST" id="filtersrch">
<div class="col-lg-3">
<div class="input-group">
    <span class="input-group-addon">ཡིག་ཨང་།</span>
    <select  class="form-control action" name="fno" id="fno"><?php echo $fino; ?></select>
</div>
</div>

<div class="col-lg-5">
<div class="input-group">
    <span class="input-group-addon">འབྲེལ་ཆགས་ལས་ཁུངས་།</span>
    <select class="form-control action" name="rdpt" id="rdpt"></select>
</div> 
</div>

<div class="col-lg-2">
<div class="input-group">
    <span class="input-group-addon">དཀར་ཆག་།</span>
    <select class="form-control action2" name="rno" id="rno" onchange="filtering();"></select>
</div> 
</div>

<div class="col-lg-2">
 <div class="input-group">
    <span class="input-group-addon fa fa-sort"></span>
    <select class="form-control" name="srt" id="srt" onchange="filtering();">
    <option value="id">ID</option> 
	  <option value="file_no">ཡིག་སྣོད་ཀྱི་ཨང་།</option>  
	  <option value="page_no">ཡིག་ཨང་།</option>  
	  <option value="r_department">འབྲེལ་ཆགས་ལས་ཁུངས་།</option>   
	  <option value="reference_no">དཀར་ཆག་།</option>  
    </select>
</div>
</div>



</form>
</div>

</div>

</div>


<div class="simpleframe" id="myscreenout"><h4 style="color:red;">select file-view or the eye icon to see the content of file record</h4></div>


<script>
  var fno;
$(document).ready(function(){
 $('.action').change(function(){
  if($(this).val() != ''){
   var action = $(this).attr("id");
   var query = $(this).val();
   var result = '';
   if(action == "fno"){
   fno=query;
    result = 'rdpt';
   }

   else{
     result = 'rno';
   }
   $.ajax({
    url:"php-action/fetch.php",
    method:"POST",
    data:{action:action, query:query, fno:fno},
    success:function(data){
     $('#'+result).html(data);
    }
   });

  var form=$("#filtersrch");
$.ajax({
        type:"POST",
        url:form.attr("action"),
        data:form.serialize(),
        success: function(response){
  $("#myscreenout").html(response);

        }
    });

}

 });
});

function filtering(){
var form=$("#filtersrch");
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