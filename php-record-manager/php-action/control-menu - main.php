<?php
include 'dbh.php';
$fino='';
$rdpt='';
$pno='';

$query = "SELECT distinct file_no FROM file_info ORDER BY file_no ASC";
$query2 = "SELECT distinct r_department FROM file_dt ORDER BY file_no ASC";
$query3 = "SELECT distinct page_no FROM file_dt  where file_no='$fno' and r_department='$rdpt' ORDER BY file_no ASC";

$result = mysqli_query($con, $query);
while($row = mysqli_fetch_array($result))
{
 $fino .= '<option value="$row[file_no]">'.$row["file_no"].'</option>';
}
?>








<div class="fdt" >
<div style="width:25%;float:left;">

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


<div style="width:70%;float:right;text-align:right;">
<div class="btn-group" role="group" aria-label="second group">
<button class="btn btn-default btn-sm" id="fldv" onclick="pdfload()"><i class="glyphicon glyphicon-eye-open"></i></button>
<button class="btn btn-default btn-sm" id="refresh" onclick="printDiv()"><i class="glyphicon glyphicon-print"></i></button> 
</div>
</div>


</div>









<div class="fdt" >

<div style="width:25%;float:left;">
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


<div style="width:70%;float:right;text-align:right;">
<form action="fsearchdata.php" method="POST" id="filtersrch">
<div class="input-group">
    <span class="input-group-addon" title="* Price" id="priceLabel">file no</span>
    <select id="searchbygenerals_currency" name="searchbygenerals[currency]" class="form-control"><?php echo $fino; ?></select>

    <span class="input-group-addon">-</span>
    <input type="number" id="searchbygenerals_priceTo" name="searchbygenerals[priceTo]" required="required" class="form-control" value="0">
  
    <span class="input-group-addon" style="width:0px; padding-left:0px; padding-right:0px; border:none;"></span>
    <select id="searchbygenerals_currency" name="searchbygenerals[currency]" class="form-control"><?php echo $fino; ?></select>

<span class="input-group-addon" style="width:0px; padding-left:0px; padding-right:0px; border:none;">sort by</span>
<select class="form-control" name="srt" id="srt" onchange="filtering();" >
<option value="id">ID</option> 
<option value="file_no">ཡིག་སྣོད་ཀྱི་ཨང་།</option>  
<option value="page_no">ཡིག་ཨང་།</option>  
<option value="r_department">འབྲེལ་ཆགས་ལས་ཁུངས་།</option>   
<option value="reference_no">དཀར་ཆག་།</option>  
</select>
</div>
</form>
</div>

   
</div>










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

<form action="control-menu.php" method="POST" id="filtersrch">
<div class="col-lg-2">
<div class="input-group">
    <span class="input-group-addon" title="* Price" id="priceLabel">ཡིག་ཨང་།</span>
    <select id="searchbygenerals_currency" name="searchbygenerals[currency]" class="form-control"><?php echo $fino; ?></select>
</div>
</div>

<div class="col-lg-5">
<div class="input-group">
    <span class="input-group-addon" title="* Price" id="priceLabel">འབྲེལ་ཆགས་ལས་ཁུངས་།</span>
    <select id="searchbygenerals_currency" name="searchbygenerals[currency]" class="form-control"><?php echo $rdpt; ?></select>
</div> 
</div>



<div class="col-lg-2">
<div class="input-group">
    <span class="input-group-addon" title="* Price" id="priceLabel">དཀར་ཆག་།</span>
    <select id="searchbygenerals_currency" name="searchbygenerals[currency]" class="form-control"><?php echo $pno; ?></select>
</div> 
</div>

<div class="col-lg-2">
 <div class="input-group">
    <span class="input-group-addon fa fa-sort" title="* Price" id="priceLabel"></span>
    <select id="searchbygenerals_currency" name="searchbygenerals[currency]" class="form-control">
    <option value="id">ID</option> 
	<option value="file_no">ཡིག་སྣོད་ཀྱི་ཨང་།</option>  
	<option value="page_no">ཡིག་ཨང་།</option>  
	<option value="r_department">འབྲེལ་ཆགས་ལས་ཁུངས་།</option>   
	<option value="reference_no">དཀར་ཆག་།</option>  
    s</select>
</div>
</div>


<div class="col-lg-1">
<div class="input-group">
<button type="submit" id="submit" name="submit" class="btn btn-primary btn-sm">save</button>
</div> 
</div>

</form>

</div>


</div>




</div>









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
    url:"fetch.php",
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
  $("#tdatalayout").html(response);

        }
    }); 
}

 });
});

</script>


<table class="table" id="tb2" style="border-spacing:0px 1px;border-collapse:separate;border:none;font-size:16px;"> 

<tbody>
<tr> 
<form action="fsearchdata.php" method="POST" id="filtersrch">
<td style="border:none;width:10%;"> ཡིག་སྣོད་ཀྱི་ཨང་། </td>
<td style="border:none;width:10%;"><select class="form-control action" name="fno" id="fno"><?php echo $fino; ?></select></td>
<td style="border:none;width:10%;"> འབྲེལ་ཆགས་ལས་ཁུངས་། </td>
<td style="border:none;width:30%;"><select class="form-control action" name="rdpt" id="rdpt" ></select></td>
<td style="border:none;width:6%;"> དཀར་ཆག་། </td>
<td style="border:none;width:10%;"><select class="form-control" name="rno" id="rno" onchange="filtering();" ></select></td>
<td style="border:none;width:10%;">བང་རིམ་འདི་ལ་།</td>
<td style="border:none;width:10%;"><select class="form-control" name="srt" id="srt" onchange="filtering();" >
<option value="id">ID</option> 
<option value="file_no">ཡིག་སྣོད་ཀྱི་ཨང་།</option>  
<option value="page_no">ཡིག་ཨང་།</option>  
<option value="r_department">འབྲེལ་ཆགས་ལས་ཁུངས་།</option>   
<option value="reference_no">དཀར་ཆག་།</option>  
</select>
</td> 
</form>   
</tr> 
</tbody>
</table>