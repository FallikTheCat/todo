<!DOCTYPE html>

<?php include "includes/db.php"; 

session_start();

if(!isset($_SESSION['id'])){            
    header ("Location: http://localhost/d1/login.php");
}

?>

<html>
<head>
   
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
   
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   
   <link rel="stylesheet" href="https://maxcdn.bootsrapcdn.com/bootstap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   
  
    <link href="css/bootstrap.min.css" rel="stylesheet">  
   
    <link href="/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 
       
    <title>Todos</title>        
</head>
<body>
    
    <div class="container">
      
      <form action="logout.php">
          <input type="submit" class="btn btn-danger" style="float: right; margin-right: 98px; margin-top: 10px;" value="Log Out"/>
      </form>  
      
       
        <div class="row"  style="margin-top: 70px;">
            <center><h1>Todo List</h1></center><br>
            
            <div class="col-md-10 col-md-offset-1">
                
                <table class="table">   
                                            
                    <form action="chat_index.php">
                        <input type="submit" class="btn btn-info" style="float: right;" value="Chat"/>
                    </form>    
                              
<?php 
                                      
$query = "SELECT * FROM users WHERE id = '" . $_SESSION['id'] . "' ";
$user_login_id = mysqli_query($connection, $query);

if($user_login_id)
{
    while($row = mysqli_fetch_assoc($user_login_id))
    {
        $is_manager = $row['is_manager'];

        $query = "SELECT * FROM users WHERE is_manager = $is_manager ";
        $user_m_todo = mysqli_query($connection, $query);

        if($user_m_todo)
        {  
            $row = mysqli_fetch_assoc($user_m_todo);
            
            if($row['is_manager'] > 0)
            {
                 ?> 
                     <form action="todo_m_index.php">
                         <input type="submit" class="btn btn-info" style="float: right; margin-right: 7px;" value="Todo Manager"/>
                     </form>
                  <?php
            }
            
        }
    }
}

?> 
                              
                
                               
                               
                <button type="button" data-target="#myModal" data-toggle="modal" class="btn btn-success">Add Todo</button>
                <hr>
                
                <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Todo</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="includes/todo_add.php">
           
           <div class="form-group">
                <label>User Id</label>
                <input type="text" required name="user_id" class="form-control" value="<?php echo $_SESSION["id"]; ?>" readonly>
            </div>           
            <div class="form-group">
                <label>Content</label>
                <input type="text" required name="content" class="form-control">
            </div>
            <div class="form-group">
                <label>Expiry Date</label>
                <input type="text" required name="expiry_date" class="form-control">
            </div>
            <div class="form-group">
                <label>Created by</label>
                <input type="text" required name="created_user" class="form-control" value="<?php echo $_SESSION["id"]; ?>" readonly>
            </div>  
            <input type="submit" name="add_u" value="Add" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>        
                              

                                            
                                                   
                                                                 
                               
                               
                               
                               
                                
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">User Id</th>
      <th scope="col">Content</th>
      <th scope="col">Created at</th>
      <th scope="col">Expiry Date</th>
      <th scope="col">Is Done?</th>
    </tr>
  </thead>
  <tbody>   
    <tr>
      
                           <?php 
                                
                                $query = "SELECT * FROM todos WHERE user_id = '" . $_SESSION['id'] . "' ";
                                $select_todos = mysqli_query($connection, $query);
                                 
                                 if($select_todos)
                                 {
                                    while($row = mysqli_fetch_assoc($select_todos))
                                    {
                                        $todo_id = $row['id'];                                        
                                        $todo_user_id = $row['user_id'];
                                        $todo_content =   $row['content'];
                                        $todo_created_at =   $row['created_at'];
                                        $todo_expiry_date =   $row['expiry_date'];
                                        $todo_is_done = $row['is_done'];
                                    
                                        echo "<tr>";
                                        echo "<td>$todo_id</td>";
                                        echo "<td>$todo_user_id</td>";
                                        echo "<td>$todo_content</td>";
                                        echo "<td>$todo_created_at</td>";
                                        echo "<td>$todo_expiry_date</td>"; 
                                        echo "<td>" ?><input type="checkbox" name="is_done" value="1" <?php if($todo_is_done == 1){?>checked <?php } ?>> <?php "</td>";
//                                        echo "<td>$todo_is_done</td>";
                                        echo "</tr>";
                                    }
                                 }
        
        
                                
        
        
                                
                                    
        
                                
        
        
        

                            ?>
                            
                            <?php 
        
                            if(isset($_POST['is_done'])){
        
                            $todo_update_is_done = $_POST['is_done'];
                                    
                            $query = "UPDATE todos Set is_done = '{$todo_update_is_done}' WHERE id = {$todo_id} ";
                            $update_todo_query = mysqli_query($connection, $query);
                            if(!$update_todo_query)
                            {
                                die("QUARY FAILED " . mysqli_error($connection));
                            }
                            }
        
        
                            ?>
                            
      
    </tr>
  </tbody>
</table>            
                
            </div>
        </div>
    </div>
    
</body>
</html>