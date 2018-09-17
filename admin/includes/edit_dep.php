<?php 
    
if(isset($_GET['d_id']))
{
    $the_dep_id = $_GET['d_id'];
}
    

$query = "SELECT * FROM departments WHERE id = $the_dep_id ";
$select_departments = mysqli_query($connection, $query);
                                 
    while($row = mysqli_fetch_assoc($select_departments))
    {
        $department_id = $row['id'];
        $department_name =   $row['department_name'];
        $department_description =   $row['description'];
        $department_is_active =   $row['is_active'];
        $department_created_at =   $row['created_at'];
        $department_updated_at =   $row['updated_at'];
    }
?>

<?php

if(isset($_POST['update_department']))
{
    $department_name = $_POST['department_name'];
    $department_description = $_POST['description'];
    $department_is_active = $_POST['is_active'];
                                  
    $query = "UPDATE departments Set department_name = '{$department_name}', description = '${department_description}', is_active = '{$department_is_active}' WHERE id = {$department_id} ";
    $update_query = mysqli_query($connection, $query);
    if(!$update_query )
    {
      die("QUARY FAILED" . mysqli_error($connection));
    }else{
            header("Location: http://localhost/d1/admin/departments.php?updated=1");
        }
}    
                                
?>
    
<form method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="department_name">Department Name</label>
        <input value="<?php echo $department_name; ?>"type="text" class="form-control" name="department_name">
    </div>
  
    <div class="form-group">
       <label for="description">Description</label>
       <textarea class="form-control" name="description" id="" cols="30" rows="10"><?php echo $department_description; ?>
       </textarea>
   </div>
    
   <div class="form-group">
       <label for="is_active">Is Active?</label>
           <input type="checkbox" name="is_active" value="1" <?php if($department_is_active == 1){?>checked <?php } ?>>
   </div>   
   
  <div class="form-group">
        <button type="submit" class="btn btn-primary" name="update_department">Update</button>
    </div> 
  
</form>