<?php 

include "db.php"; 

if(isset($_POST['add'])){
    
    $todo_user_id = $_POST['user_id'];
    $todo_content = $_POST['content'];
    $todo_created_at = $_POST['created_at'];
    $todo_expiry_date = $_POST['expiry_date'];
//    $todo_created_by = $_POST['created_user'];
    
    $query = "INSERT INTO todos(user_id, content, expiry_date,)";
        
    $query.= "VALUES({$todo_user_id}, '{$todo_content}', now(), ) ";
    
    $create_todo_query = mysqli_query($connection, $query);
        
        if(!$create_todo_query )
            {
                die("QUARY FAILED" . mysqli_error($connection));
            }else{
            header("Location: http://localhost/d1/todo_m_index.php");
        }
       
}




if(isset($_POST['add_u'])){
    
    $todo_user_id = $_POST['user_id'];
    $todo_content = $_POST['content'];
    $todo_expiry_date = $_POST['expiry_date'];
    $todo_created_by = $_POST['created_user'];
    
    $query1 = "INSERT INTO todos(user_id, content, expiry_date, created_user)";
        
    $query1.= "VALUES({$todo_user_id}, '{$todo_content}', now(), {$todo_created_by} ) ";
    
    $create_todo_query = mysqli_query($connection, $query1);
        
        if(!$create_todo_query )
            {
                die("QUARY FAILED" . mysqli_error($connection));
            }else{
            header("Location: http://localhost/d1/todo_index.php?todo_index&ut_id={$todo_user_id}");
        }
        
    
}




?>