<?php

$departments = mysqli_query($connection, "SELECT * FROM departments ");

    if(isset($_POST['create_user']))
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
        $user_password = $_POST['password'];
        $user_is_manager = $_POST['is_manager'];
        $user_is_active = $_POST['is_active'];
        $user_created_at = date('d-m-y');
        $user_updated_at = date('d-m-y');
        
        move_uploaded_file($user_image_temp, "../images/$user_image");

        function isValidEmail($user_email){

        if(filter_var($user_email, FILTER_VALIDATE_EMAIL)){
        return true;
        }
        else {
                return false;
       }
       }

        if(isValidEmail($user_email)){
               
        $hash = "$1$1055moya$";
        
        $user_password = crypt($user_password, $hash);
            
        
        $query = "INSERT INTO users(department_id, name, last_name, email, phone, address, image, birthdate, hiredate, gender, password, is_manager, is_active, created_at, updated_at)";
        
        $query.= "VALUES({$user_department_id}, '{$user_name}', '{$user_last_name}', '{$user_email}', '{$user_phone}', '{$user_address}', '{$user_image}', now(), now(), '{$user_gender}', '$user_password', {$user_is_manager}, {$user_is_active}, now(), now() ) ";
        
        $create_user_query = mysqli_query($connection, $query);
        
        if(!$create_user_query )
            {
                die("QUARY FAILED" . mysqli_error($connection));
            }else{
            header("Location: http://localhost/d1/admin/users.php?added=1");
        }
    }
            
        else {
            echo 'Email is not valid!';
        }
    }
?>    

<form method="post" enctype="multipart/form-data">

<div class="form-group">
                <label>Department</label>
                <select name="department_id" class="form-control">
                  <option value="">Select</option>
                  <?php
                    while($dep = mysqli_fetch_assoc($departments)){
                        ?>
                        <option value="<?=$dep['id']?>"><?=$dep['department_name']?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
    
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name">
    </div>
    
   <div class="form-group">
       <label for="last_name">Last Name</label>
       <input type="text" class="form-control" name="last_name">
   </div>
   
   <div class="form-group">
       <label for="email">Email</label>
       <input type="text" class="form-control" name="email">
   </div>
    
    <div class="form-group">
       <label for="phone">Phone Number</label>
       <input type="text" class="form-control" name="phone">
   </div>
    
    <div class="form-group">
       <label for="address">Address</label>
       <input type="text" class="form-control" name="address">
   </div>
   
   <div class="form-group">
       <label for="iamge">User Image</label>
       <input type="file" name="image">       
   </div>
   
   <div class="form-group">
   <label for="gender">Gender</label>
   <br>
   <select name="gender" id="">
       
       <option value="Male">Male</option>
       <option value="Female">Female</option>
       
   </select>
    </div>
    
    <div class="form-group">
       <label for="password">Password</label>
       <input type="text" class="form-control" name="password">
   </div>
    
    <div class="form-group">
       <label for="is_manager">Is Manager?</label>
       <input type="hidden" name="is_manager" value="0">
       <input type="checkbox" value="1" class="checkbox" name="is_manager">
   </div>
    
    <div class="form-group">
       <label for="is_active">Is Active?</label>
       <input type="hidden" name="is_active" value="0">
       <input type="checkbox" value="1" class="checkbox" name="is_active">
   </div>   
   
   <div class="form-group">
        <button type="submit" class="btn btn-primary" name="create_user">Create User</button>
    </div> 
<!--
  <div class="form-group">
      <input type="submit" class="btn btn-primary" name="create_user" value="Create User">
  </div>
-->
  
</form>


