<?php

    if(isset($_POST['create_department']))
    {
        $department_name = $_POST['department_name'];
        $department_description = $_POST['description'];
        $department_is_active = $_POST['is_active'];
        $department_created_at = date('d-m-y');    
        $department_updated_at = date('d-m-y');
        
        $query = "INSERT INTO departments(department_name, description, is_active, created_at, updated_at)";
        
        $query.= "VALUES('{$department_name}', '{$department_description}', {$department_is_active}, now(), now() ) ";
        
        $create_department_query = mysqli_query($connection, $query);
        
        if(!$create_department_query )
            {
                die("QUARY FAILED" . mysqli_error($connection));
            }else{
            header("Location: http://localhost/d1/admin/departments.php?added=1");
        }
    }

?>    

<form action="" method="post">    

    <div class="form-group">
        <label for="title">Department Name</label>
        <input type="text" class="form-control" name="department_name">
    </div>
    
    <div class="form-group">
       <label for="post_content">Description</label>
       <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
   </div>
   
   <div class="form-group">
       <label for="is_active">Is Active?</label>
       <input type="hidden" name="is_active" value="0">
       <input type="checkbox" value="1" class="checkbox" name="is_active">
   </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary" name="create_department">Create Department</button>
    </div> 
  
</form>