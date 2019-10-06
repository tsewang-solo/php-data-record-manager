<?php

$folder_extensions_array=array('');
$image_extensions_array = array('jpg','png','jpeg','gif');
$media_extensions_array = array('mp3','mp4','3gp','3aa');
$textfile_extensions_array=array('pdf','doc','txt','html','css','php','js','java','c','c#','json','log','sql');
$compression_extensions_array=array('7zip','zip','rar');
$software_extensions_array=array('exe','apk');





function format_file_size($size)
{
 if ($size >= 1073741824){
  $size = number_format($size / 1073741824, 2) . ' GB';
 }
    elseif ($size >= 1048576){
        $size = number_format($size / 1048576, 2) . ' MB';
    }

    elseif ($size >= 1024) {
        $size = number_format($size / 1024, 2) . ' KB';
    }

    elseif ($size > 1){
        $size = $size . ' bytes';
    }

    elseif ($size == 1){
        $size = $size . ' byte';
    }

    else {
        $size = '0 bytes';
    }
 return $size;
}



function get_folder_size($folder_name){
 $total_size = 0;
 $file_data = scandir($folder_name);
 foreach($file_data as $file)
 {
  if($file === '.' or $file === '..')
  {
   continue;
  }
  else
  {
   $path = $folder_name . '/' . $file;
   $total_size = $total_size + filesize($path);
  }
 }
 return format_file_size($total_size);
}


if(isset($_POST["action"]))
{
 if($_POST["action"] == "fetch")
 {
  $folder = array_filter(glob('*'), 'is_dir');
  
  $output = '
  <table class="table table-hover">
   <tr style="background-color:gray;color:white;height:60px;">
    <th><span class="glyphicon glyphicon-list"></span></th>
    <th>Folder Name</th>
    <th>Total File</th>
    <th>Size</th> 
    <th>action</th>
   </tr>
   ';
  
  if(count($folder) > 0){
   
  foreach($folder as $name){
    $output .= '
     <tr style="width:10%;">
      <td><span class="glyphicon glyphicon-folder-close" style="font-size:26px;"></span></td>     
      <td>'.$name.'</td>
      <td>'.(count(scandir($name)) - 2).'</td>
      <td>'.get_folder_size($name).'</td>
      <td><button type="button" name="update" data-name="'.$name.'" class="update btn btn-warning btn-sm">
      <i class="glyphicon glyphicon-edit"></i></button>

      <button type="button" name="delete" data-name="'.$name.'" class="delete btn btn-danger btn-sm">
      <i class="glyphicon glyphicon-trash"></i></button>

      <button type="button" name="upload" data-name="'.$name.'" class="upload btn btn-info btn-sm">
      <i class="glyphicon glyphicon-cloud-upload"></i></button>
    
    <button type="button" name="view_folder" data-name="'.$name.'" class="view_folder btn btn-default btn-sm">
    <i class="glyphicon glyphicon-triangle-right"></i></button></td>
     </tr>';
   }
  }

  else{
   $output .= '<tr><td colspan="6">No Folder Found</td></tr>';
  }

  $output .= '</table>';
  echo $output;
 }

 
 if($_POST["action"] == "create")
 {
  if(!file_exists($_POST["folder_name"])) 
  {
   mkdir($_POST["folder_name"], 0777, true);
   echo 'Folder Created';
  }
  else
  {
   echo 'Folder Already Created';
  }
 }


 if($_POST["action"] == "change")
 {
  if(!file_exists($_POST["folder_name"]))
  {
   rename($_POST["old_name"], $_POST["folder_name"]);
   echo 'Folder Name Change';
  }
  else
  {
   echo 'Folder Already Created';
  }
 }
 

 if($_POST["action"] == "delete")
 {
  $files = scandir($_POST["folder_name"]);
  foreach($files as $file)
  {
   if($file === '.' or $file === '..')
   {
    continue;
   }
   else
   {
    unlink($_POST["folder_name"] . '/' . $file);
   }
  }
  if(rmdir($_POST["folder_name"]))
  {
   echo 'Folder Deleted';
  }
 }


 
 if($_POST["action"] == "fetch_files"){
  $file_data = scandir($_POST["folder_name"]);
  $lastpath=$_POST["folder_name"];

  $output = '<div class="fdt2">
  <button data-name="../new project." class="view_folder btn btn-default btn-sm"><i class="glyphicon glyphicon-tasks"> root</i></button>
  <button data-name="'.$lastpath.'" class="view_folder btn btn-default btn-sm"><i class="glyphicon glyphicon-menu-left"> back</i></button>
  <button data-name="'.$lastpath.'" class="view_folder btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"> folder</i></button>
  </div>
  <table class="table table-bordered table-striped">
  <tr><td><span class="glyphicon glyphicon-folder-open"> '.$lastpath.' </span></td></tr>
  <tr>
  <th>Image</th>
  <th>File Name</th>
  <th>File Size</th>
  <th>extension</th>
  <th>Delete</th>
   </tr>
  ';
     

  foreach($file_data as $file)
  {
   if($file === '.' or $file === '..')
   {
    continue;
   }
   else
   {
    $path = $_POST["folder_name"] . '/' . $file;
    $extension = pathinfo($path, PATHINFO_EXTENSION);
    $sz= filesize($path);
  
if(in_array($extension, $image_extensions_array)){
    $output .= '
    <tr>
     <td><img src="'.$path.'" class="img-thumbnail" height="40" width="40" /></td>
     <td contenteditable="true" data-folder_name="'.$_POST["folder_name"].'"  data-file_name = "'.$file.'" class="change_file_name">'.$file.'</td>
     <td>'.format_file_size($sz).'</td>
     <td>'.$extension.'</td>
     <td> <button name="remove_file" class="remove_file btn btn-danger btn-sm" id="'.$path.'">
    <i class="glyphicon glyphicon-trash"></i></button>
    
    <button class="view_image btn btn-default btn-sm" data-name="'.$path.'" type="button" name="view_image"><i class="glyphicon glyphicon-eye-open"></i></button></td>

     </td>
    </tr>
    ';
}


if(in_array($extension, $textfile_extensions_array)){
    $output .= '
    <tr>
     <td><span class="glyphicon glyphicon-file" style="font-size:26px;"></span></td>
     <td contenteditable="true" data-folder_name="'.$_POST["folder_name"].'"  data-file_name = "'.$file.'" class="change_file_name">'.$file.'</td>
     <td>'.format_file_size($sz).'</td>
     <td>'.$extension.'</td>
     <td><button name="remove_file" class="remove_file btn btn-danger btn-sm" id="'.$path.'">
    <i class="glyphicon glyphicon-trash"></i></button>
    
    <button class="view_file btn btn-default btn-sm" data-name="'.$path.'" type="button" name="view_file"><i class="glyphicon glyphicon-eye-open"></i></button></td>
    </tr>
    ';
}


if(in_array($extension, $compression_extensions_array)){
    $output .= '
    <tr>
     <td><span class="glyphicon glyphicon-compressed" style="font-size:26px;"></span></td>
     <td contenteditable="true" data-folder_name="'.$_POST["folder_name"].'"  data-file_name = "'.$file.'" class="change_file_name">'.$file.'</td>
     <td>'.format_file_size($sz).'</td>
     <td>'.$extension.'</td>
     <td><button name="remove_file" class="remove_file btn btn-danger btn-sm" id="'.$path.'">
    <i class="glyphicon glyphicon-trash"></i></button>
    
    <button class="view_files btn btn-default btn-sm" data-name="'.$path.'"><i class="glyphicon glyphicon-eye-open"></i></button></td>
    </tr>
    ';
}


if(in_array($extension, $folder_extensions_array)){
    $output .= '
    <tr>
     <td><span class="glyphicon glyphicon-folder-close" style="font-size:26px;"></span></td>
     <td contenteditable="true" data-folder_name="'.$_POST["folder_name"].'"  data-file_name = "'.$file.'" class="change_file_name">'.$file.'</td>
     <td>'.get_folder_size($path).'</td>
     <td>'.$extension.'</td>
     <td><button name="remove_file" class="remove_file btn btn-danger btn-sm" id="'.$file.'">
    <i class="glyphicon glyphicon-trash"></i></button>
     <button type="button" name="upload" data-name="'.$path.'" class="upload btn btn-info btn-sm">
      <i class="glyphicon glyphicon-cloud-upload"></i></button>
     <button type="button" name="view_folder" data-name="'.$path.'" class="view_folder btn btn-default btn-sm">
    <i class="glyphicon glyphicon-triangle-right"></i></button></td>
    </tr>
    ';
}



   }

  }
  $output .='</table>';
  echo $output;
 }
 


 if($_POST["action"] == "view_images"){
  $file_src= $_POST["file_name"];
  $output = '<img src="'.$file_src.'" alt="no image found" style="height:300px;width:300px; max-height:400px:max-width:450px;">';
  echo $output;
 }

  if($_POST["action"] == "view_files"){
  $file_src= $_POST["file_name"];

  $file = file_get_contents($file_src, true);
  echo $file;
 }




 if($_POST["action"] == "remove_file"){
  if(file_exists($_POST["path"])){
   unlink($_POST["path"]);
   echo 'File Deleted';
  }
 }

 
 if($_POST["action"] == "change_file_name"){
  $old_name = $_POST["folder_name"] . '/' . $_POST["old_file_name"];
  $new_name = $_POST["folder_name"] . '/' . $_POST["new_file_name"];
  if(rename($old_name, $new_name))
  {
   echo 'File name change successfully';
  }
  else
  {
   echo 'There is an error';
  }
 }
}
?>
