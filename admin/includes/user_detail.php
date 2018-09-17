                        <table class="table table-responsive table-condensed table-bordered">
                            <thead>
                                <tr>
                                    <th>User Id</th>
                                    <th>Given Todos</th>
                                    <th>Done Todos</th>
                                    <th>Not Done Todos</th>
                                    <th>Todos %?</th>
                                </tr>
                            </thead>
                             <tbody>
                        
                     
<?php 

if(isset($_GET['d_id']))
{
    $the_user_detail_id = $_GET['d_id'];
}
                              
    $query = "SELECT * FROM todos WHERE user_id = {$the_user_detail_id} ";
    $todo_detail_query = mysqli_query($connection, $query);
                                                     
    if(!$todo_detail_query )
    {
      die("TODO QUARY FAILED" . mysqli_error($connection));
    }
                    
    $row = mysqli_fetch_assoc($todo_detail_query);
    
    $detail_user_id = $row['user_id'];
    $detail_user_todos = 0;
    $detail_user_todo_is_done = 0;
    $detail_user_todo_is_not_done = 0;
    
            
        while($row = mysqli_fetch_assoc($todo_detail_query)){
            $detail_user_id = $row['user_id'];
            $detail_user_todos++; 
            $detail_todo_is_done = $row['is_done'];
            
                if($detail_todo_is_done == 1){
                    $detail_user_todo_is_done++;
                }else{
                    $detail_user_todo_is_not_done++;
                } 
            }
                                 
        $detail_percentage = $detail_user_todo_is_done/$detail_user_todos * 100;
    
        
            echo "<tr>";
            echo "<td>$detail_user_id</td>";
            echo "<td>$detail_user_todos</td>";
            echo "<td>$detail_user_todo_is_done</td>";
            echo "<td>$detail_user_todo_is_not_done</td>";
            echo "<td>%$detail_percentage</td>";
            echo "</tr>"; 
                                 
    
?>

                        </tbody>
                        </table>
                        <br>
                        
                       
                      <table class="table table-responsive table-condensed table-bordered">
                            <thead>
                                <tr>
                                    <th>User Id</th>
                                    <th>Message Sent</th>
                                    <th>Message Written</th>
                                    <th>Message Read</th>
                                    <th>Message Not Read</th>
                                </tr>
                            </thead>
                             <tbody>
                             
                             </tbody>
                        </table>                        
                        
  <button type="button" data-target="#myModal" data-toggle="modal" class="btn btn-primary">More Details</button>
                <hr>                      
                        
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">More Details</h4>
      </div>
      <div class="modal-body">
      
      <?php
          
                                $query = "SELECT * FROM todos WHERE user_id = $detail_user_id ";
                                $detail_todos = mysqli_query($connection, $query);
                                    
                        ?>
                                   
                        <table class="table table-condensed table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>User Id</th>
                                    <th>Content</th>
                                    <th>Is Done?</th>
                                    <th>Created By</th>
                                    <th>Created at</th>
                                    <th>Expiry Date</th>
                                </tr>
                            </thead>
                             <tbody>            
                                    
                        <?php            
                                 
                                 if($detail_todos)
                                 {
                                    while($row = mysqli_fetch_assoc($detail_todos))
                                    {
                                        $todo_id = $row['id'];
                                        $todo_user_id = $row['user_id'];
                                        $todo_content =   $row['content'];
                                        $todo_is_done = $row['is_done'];
                                        $todo_created_user = $row['created_user'];
                                        $todo_created_at =   $row['created_at'];
                                        $todo_expiry_date =   $row['expiry_date'];
                                    
                                        echo "<tr>";
                                        echo "<td>$todo_id</td>";
                                        echo "<td>$todo_user_id</td>";
                                        echo "<td>$todo_content</td>";
                                        echo "<td>$todo_is_done</td>";
                                        echo "<td>$todo_created_user</td>";
                                        echo "<td>$todo_created_at</td>";
                                        echo "<td>$todo_expiry_date</td>";
                                        echo "</tr>";
                                    }
                                 }
                                
                        ?>
      
      </tbody>
                        </table>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>             