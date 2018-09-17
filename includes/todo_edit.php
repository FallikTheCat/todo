<!DOCTYPE html>

<?php include "db.php"; ?>

<html>
<head>
   
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
   
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   
   <link rel="stylesheet" href="https://maxcdn.bootsrapcdn.com/bootstap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   
  
    <link href="../css/bootstrap.min.css" rel="stylesheet">  
   
    <link href="/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 
       
    <title>Todos</title>        
</head>
<body>
   
   
                           <?php 
        
                            if(isset($_GET['t_id']))
                            {
                                $the_todo_id = $_GET['t_id'];
                            }
                            
                            $query = "SELECT * FROM todos WHERE id = $the_todo_id ";
                            $select_todos = mysqli_query($connection, $query);
                                 
                                 if($select_todos)
                                 {
                                    while($row = mysqli_fetch_assoc($select_todos))
                                    {
                                        $todo_id = $row['id'];
                                        $todo_user_id =   $row['user_id'];
                                        $todo_content =   $row['content'];
                                        $todo_created_at =   $row['created_at'];
                                        $todo_expiry_date =   $row['expiry_date'];
                                    }
                                 }

                            ?>
                            
                            
                            <?php

if(isset($_POST['update_todo']))
{
    $todo_user_id = $_POST['user_id'];
    $todo_content = $_POST['content'];
    $todo_expiry_date = $_POST['expiry_date'];
                                  
    $query = "UPDATE todos Set user_id = {$todo_user_id}, content = '${todo_content}', expiry_date = now() WHERE id = {$todo_id} ";
    $update_query = mysqli_query($connection, $query);
    if(!$update_query )
    {
      die("QUARY FAILED" . mysqli_error($connection));
    }else{
            header("Location: http://localhost/d1/todo_m_index.php");
        }
}    
                                
?>
    
                            
   
   
    
    <div class="container">
        <div class="row"  style="margin-top: 70px;">
            <center><h1>Edit Todo List</h1></center>
            
            <div class="col-md-10 col-md-offset-1">                
    
        <form method="post">
            <div class="form-group">
                <label>User Id</label>
                <input type="text" required name="user_id" class="form-control" value="<?php echo $todo_user_id; ?>">
            </div>
            <div class="form-group">
                <label>Content</label>
                <input type="text" required name="content" class="form-control"  value="<?php echo $todo_content; ?>">
            </div>
            <div class="form-group">
                <label>Expiry Date</label>
                <input type="text" required name="expiry_date" class="form-control"  value="<?php echo $todo_expiry_date; ?>">
            </div>
            <input type="submit" name="update_todo" value="Update" class="btn btn-success">&nbsp;
            <a href="../todo_m_index.php" class="btn btn-warning">Back</a>
        </form>
                
  <tbody>   
    <tr>
      
                           
                            
      
    </tr>
  </tbody>
                
            </div>
        </div>
    </div>
    
</body>
</html>