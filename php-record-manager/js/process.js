

//insert multiple record
x=1;
function hackme(){
var sql="INSERT INTO file_dt(file_no, page_no, r_department, reference_no, remark, mydate) VALUES ('$fno','$pno','$rdpt','$rno','$rm','$dte')";
for(var i=0;5>i;i++){
setTimeout(function(){ 
var form="#fm"+x;
var formx="#fmx";
$('#fmx').append("<input type='hidden' name='idr' value='"+sql+"'/>");
var fm = $(form).serialize() + '&' + $(formx).serialize();
  $.ajax({  
           url:"uploaddt.php",  
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

//form reset by id
function fmset(id){
var x="fm"+id;
  document.getElementById(x).reset();
}
  

<!--select update row to update-->
function upd(id){
var value={'idr':id};
$.ajax({
    type:"POST",
     url:"updater.php",
   data:value,
 success:function(response){        
  $("#rpanel").html(response);
}
});
}

