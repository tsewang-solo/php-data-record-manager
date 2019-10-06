
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


function editfile(id){
  alert();
var value={'idr':id, 'edit':'edi'};
$.ajax({
    type:"POST",
     url:"fileedit.php",
   data:value,
 success:function(response){        
  $("#tdatalayout").html(response);
}
});

}


function filedetail(id){
var value={'fno':id};
$.ajax({
    type:"POST",
     url:"php-action/fsearchdata1.php",
   data:value,
 success:function(response){        
  $("#rightframe").html(response);
}
});
}