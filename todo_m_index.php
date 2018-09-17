<!DOCTYPE html>

<?php include "includes/db.php";
$users = mysqli_query($connection, "SELECT * FROM users ");

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
                
                <form action="todo_index.php" method="post">
                    <input type="submit" class="btn btn-info" style="float: right;" value="Todo List"/>
                 </form>
                
                <form action="chat_index.php">
                    <input type="submit" class="btn btn-info" style="float: right; margin-right: 7px;" value="Chat"/>
                </form> 
                
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
                <label>User Name</label>
                <select name="user_id" class="form-control">
                  <option value="">Select</option>
                  <?php
                    while($user = mysqli_fetch_assoc($users)){
                        ?>
                        <option value="<?=$user['id']?>"><?=$user['name']?> <?=$user['last_name']?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Content</label>
                <input type="text" required name="content" class="form-control">
            </div>
            <div class="form-group">
                <label>Expiry Date</label>
                <input type="text" required name="expiry_date" class="form-control">
            </div>
            
            <input type="submit" name="add" value="Add" class="btn btn-success">
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
    </tr>
  </thead>
  <tbody>   
    <tr>
     
      
                           <?php 
                            
                            $query = "SELECT * FROM todos ";
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
                                    
                                        echo "<tr>";
                                        echo "<td>$todo_id</td>";
                                        echo "<td>$todo_user_id</td>";
                                        echo "<td>$todo_content</td>";
                                        echo "<td>$todo_created_at</td>";
                                        echo "<td>$todo_expiry_date</td>"; ?>
                                        <td><a href="includes/todo_edit.php?t_id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a></td>
                                        <td><a href="todo_m_index.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td> <?php
                                        echo "</tr>";
                                    }
                                 }

                            ?>
                            
      
    </tr>
  </tbody>
</table>
               
              <?php 

if(isset($_GET['delete']))
{
    $the_todo_id = $_GET['delete'];
    
    $query = "DELETE FROM todos WHERE id = {$the_todo_id}";
    $delete_query = mysqli_query($connection, $query);
}

?>
                 
                
            </div>
        </div>
    </div>
    
</body>
</html>