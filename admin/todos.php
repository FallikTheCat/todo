<?php include "includes/admin_header.php" ?>

    <div id="wrapper">

        
        <?php include "includes/admin_navigation.php" ?>
        

        <div id="page-wrapper">

            <div class="container-fluid">

                
                <div class="row">
                    <div class="col-lg-12">
                        
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Mr. ...</small>
                        </h1>
                               
<table class="table table-condensed table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>User Id</th>
                                    <th>Content</th>
                                    <th>Is Done?</th>
                                    <th>Done at</th>
                                    <th>Created By</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                </tr>
                            </thead>
                             <tbody>
                            
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
                                        $todo_is_done =   $row['is_done'];
                                        $todo_done_at =   $row['done_at'];
                                        $todo_created_user =   $row['created_user'];
                                        $todo_created_at =   $row['created_at'];
                                        $todo_updated_at =   $row['updated_at'];
                                    
                                        echo "<tr>";
                                        echo "<td>$todo_id</td>";
                                        echo "<td>$todo_user_id</td>";
                                        echo "<td>$todo_content</td>";
                                        echo "<td>$todo_is_done</td>";
                                        echo "<td>$todo_done_at</td>";
                                        echo "<td>$todo_created_user</td>";
                                        echo "<td>$todo_created_at</td>";
                                        echo "<td>$todo_updated_at</td>";
                                        echo "</tr>";
                                    }
                                 }

                            ?>
                            
                        </tbody>
                        
                        
                        
                        
                         
                        
                        
                        </table>
                        
                        <div class="container">
        
        <h1 class="page-header">
            <small>Search</small>
        </h1>

       <div class="row">
           <form method="post" action="todos.php">
              
               <div class="form-group">
                   <label for="id">User Id</label>
                     <br>
                      <div class="col-lg-2">
                      <input type="text" class="form-control" name="user_id" placeholder="Id"><br>
                      </div>
               </div><br><br>
               
               <div class="form-group">
                   <label for="is_done">Is Done?</label>
                      <br>
                      
                    <input type="radio" name="is_done" value="0" checked="true">Not yet
                    <input type="radio" name="is_done" value="1">Done
               </div>
               
               <div class="form-group">
                   <label for="created_at">From</label>
                      <br>
                       <div class="col-lg-2">
                    <input type="text" name="created_at" id="from" class="form-control" placeholder="From Date">
                   </div>
               </div>
               <br>
               
               <div class="form-group">
                   <label for="done_at">To</label>
                     <br>
                      <div class="col-lg-2">
                    <input type="text" name="done_at" id="to" class="form-control" placeholder="To Date">
                   </div>
               </div><br><br>
               
               <div class="form-group">
                  <input type="submit" class="btn btn-primary" name="submit" value="Search">
               </div><hr>
               
               
           </form>   
           
           
           
       </div>
   
   
    </div>   
                     
                            
                      
                      
                      <?php
                         
                       if(isset($_POST['submit'])){ 
                           
                           $todo_user_id = $_POST['user_id'];
                           $todo_is_done = $_POST['is_done'];
                           $todo_created_at = $_POST['created_at'];
                           $todo_done_at = $_POST['done_at'];
                           
                                $query = "SELECT * FROM todos WHERE ";
                           
                                if($todo_user_id != ""){
                                $query .= "user_id = $todo_user_id ";
                                }
                                   
                                if($todo_user_id == ""){
                                    $query .= "is_done = $todo_is_done ";
                                }else{
                                    $query .= "AND is_done = $todo_is_done ";
                                }
                           
                                if($todo_created_at != ""){
                                    $query .= "AND created_at = $todo_created_at ";
                                }
                           
                               if($todo_done_at != ""){
                                    $query .= "AND done_at = '$todo_done_at' ";
                            }
                               
                               $search_todo_query = mysqli_query($connection, $query) or die("QUARY FAILED " . mysqli_error($connection));
                                                                  
                               if(mysqli_num_rows($search_todo_query) > 0){
                                   
                                   
                                   ?>
                          
                          
                          <table class="table table-condensed table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>User Id</th>
                                    <th>Content</th>
                                    <th>Is Done?</th>
                                    <th>Done at</th>
                                    <th>Created By</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                </tr>
                            </thead>
                             <tbody>
                          
                                  <?php
                                   
                                   
                                   while($row = mysqli_fetch_assoc($search_todo_query)){
                                       
                                        $todo_id = $row['id'];
                                        $todo_user_id =   $row['user_id'];
                                        $todo_content =   $row['content'];
                                        $todo_is_done =   $row['is_done'];
                                        $todo_done_at =   $row['done_at'];
                                        $todo_created_user =   $row['created_user'];
                                        $todo_created_at =   $row['created_at'];
                                        $todo_updated_at =   $row['updated_at'];
                                    
                                        echo "<tr>";
                                        echo "<td>$todo_id</td>";
                                        echo "<td>$todo_user_id</td>";
                                        echo "<td>$todo_content</td>";
                                        echo "<td>$todo_is_done</td>";
                                        echo "<td>$todo_done_at</td>";
                                        echo "<td>$todo_created_user</td>";
                                        echo "<td>$todo_created_at</td>";
                                        echo "<td>$todo_updated_at</td>";
                                        echo "</tr>";
                                   }
                                   
                               }
                               else{
                                   echo "Records Not Found";
                               }
                           }
                        
                       
                        ?>
                        
                        </tbody>
                        
                        
                        
                        
                         
                        
                        
                        </table>
                      
            
                        
                    </div>
                </div>
                

            </div>
            

        </div>
        
        
        
        
                        
        
        

<?php include "includes/admin_footer.php" ?>