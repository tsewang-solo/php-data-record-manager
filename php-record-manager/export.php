<?php  
      //export.php  
 if(isset($_POST["export"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "", "tsewang");  
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=data.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('ID', 'Name', 'Address', 'Gender', 'Designation', 'Age'));  
      $query = "SELECT * FROM file_dt join file_info on file_dt.file_no=file_info.file_no WHERE file_info.file_no like '%$fno%' or file_info.year like '%$fno%' or file_info.file_name like '%$fno%' or file_info.department like '%$fno%' or file_dt.page_no like '%$fno%' or file_dt.r_department like '%$fno%' or file_dt.reference_no like '%$fno%' or file_dt.remark like '%$fno%' limit $x";  
      $result = mysqli_query($connect, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?>  