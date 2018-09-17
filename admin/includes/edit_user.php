<?php 
    
if(isset($_GET['u_id']))
{
    $the_user_id = $_GET['u_id'];
}
    

$query = "SELECT * FROM users WHERE id = $the_user_id ";
$select_users_by_id = mysqli_query($connection, $query);
                                
while($row = mysqli_fetch_assoc($select_users_by_id))
    {
        $user_id = $row['id'];
        $user_department_id = $row['department_id'];
        $user_name = $row['name'];
        $user_last_name = $row['last_name'];
        $user_email = $row['email'];
        $user_phone = $row['phone'];
        $user_address = $row['address'];
        $user_image = $row['image'];
        $user_birthdate = $row['birthdate'];
        $user_hiredate = $row['hiredate'];
        $user_gender = $row['gender'];
        $user_is_manager = $row['is_manager'];
        $user_is_active = $row['is_active'];
        $user_created_at = $row['created_at'];
        $user_updated_at = $row['updated_at'];
    }
?>

<?php

if(isset($_POST['update_user']))
{
        $user_department_id = $_POST['department_id'];
        $user_name = $_POST['name'];
        $user_last_name = $_POST['last_name'];
        $user_email = $_POST['email'];
        $user_phone = $_POST['phone'];
        $user_address = $_POST['address'];
        
        $user_image = $_FILES ['image']['name'];
        $user_image_temp = $_FILES ['image']['tmp_name'];
    
        $user_birthdate = date('d-m-y');
        $user_hiredate = date('d-m-y');
        $user_gender = $_POST['gender'];
        $user_is_manager = $_POST['is_manager'];
        $user_is_active = $_POST['is_active'];
        $user_updated_at = $row['updated_at'];
    
    move_uploaded_file($user_image_temp, "../images/$user_image");
                                  
    $query = "UPDATE users Set department_id = '{$user_department_id}', name = '{$user_name}', last_name = '{$user_last_name}', email = '{$user_email}', phone = '{$user_phone}', address = '{$user_address}', image = '{$user_image}', birthdate = now(), hiredate = now(), gender = '{$user_gender}', is_manager = '{$user_is_manager}', is_active = '{$user_is_active}', updated_at = now() WHERE id = {$user_id} ";
    $update_query = mysqli_query($connection, $query);
    if(!$update_query )
    {
      die("QUARY FAILED" . mysqli_error($connection));
    }else{
            header("Location: http://localhost/d1/admin/users.php?updated=1");
        }
}    
                                
?>
    
<form method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="department_id">Department Id</label>
        <input value="<?php echo $user_department_id; ?>"type="text" class="form-control" name="department_id">
    </div>

    <div class="form-group">
        <label for="name">User Name</label>
        <input value="<?php echo $user_name; ?>"type="text" class="form-control" name="name">
    </div>
    
   <div class="form-group">
       <label for="last_name">Last Name</label>
       <input value="<?php echo $user_last_name; ?>" type="text" class="form-control" name="last_name">
   </div>
   
   <div class="form-group">
       <label for="email">Email</label>
       <input value="<?php echo $user_email; ?>"type="text" class="form-control" name="email">
   </div>
    
    <div class="form-group">
       <label for="phone">Phone</label>
       <input value="<?php echo $user_phone; ?>"type="text" class="form-control" name="phone">
   </div>
    
    <div class="form-group">
       <label for="address">Address</label>
       <input value="<?php echo $user_address; ?>"type="text" class="form-control" name="address">
   </div>
   

   <div class="form-group">
      <label for="image">Image:</label>
      <input type="file" src="../images/<?php echo $user_image; ?>" name="image">
   </div>
   
   <div class="form-group">
       <label for="birthdate">Birthdate</label>
       <input value="<?php echo $user_birthdate; ?>"type="text" class="form-control" name="birthdate">
   </div>
   
   <div class="form-group">
       <label for="hiredate">Hiredate</label>
       <input value="<?php echo $user_hiredate; ?>"type="text" class="form-control" name="hiredate">
   </div>
    
    <div class="form-group">
       <label for="gender">Gender</label>
       <input value="<?php echo $user_gender; ?>"type="text" class="form-control" name="gender">
   </div>
    
    <div class="form-group">
       <label for="is_manager">Is Manager?</label><br>
       <input type="checkbox" name="is_manager" value="1" <?php if($user_is_manager == 1){?>checked <?php } ?>>
   </div>
    
    <div class="form-group">
       <label for="is_active">Is Active?</label><br>
       <input type="checkbox" name="is_active" value="1" <?php if($user_is_active == 1){?>checked <?php } ?>>
   </div>
   
<!--
   <div class="form-group">
       <label for="is_active">Is Active?</label>
       <input type="checkbox" value="1" class="checkbox" name="is_active">
   </div>  
-->
    
    <div class="form-group">
       <label for="updated_at">Updated at</label>
       <input value="<?php echo $user_updated_at; ?>"type="text" class="form-control" name="updated_at">
   </div>
   
  <div class="form-group">
        <button type="submit" class="btn btn-primary" name="update_user">Update</button>
    </div> 
  
</form>