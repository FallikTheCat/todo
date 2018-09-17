                   <table class="table table-responsive table-condensed table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Department Id</th>
                                    <th>Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Edit User</th>
                                    <th>Delete User</th>
                                    <th>User Detail</th>
                                </tr>
                            </thead>
                             <tbody>
                            
                            <?php 
                            
                            $query = "SELECT * FROM users ORDER BY id DESC";
                            $select_users = mysqli_query($connection, $query);
                                 
                                 if($select_users)
                                 {                                
                                    while($row = mysqli_fetch_assoc($select_users))
                                    {
                                        $user_id = $row['id'];
                                        $user_department_id = $row['department_id'];
                                        $user_name =   $row['name'];
                                        $user_last_name = $row['last_name'];
                                        $user_email =   $row['email'];
                                        $user_phone = $row['phone'];
                                        
                                        echo "<tr>";
                                        echo "<td>$user_id</td>";
                                        echo "<td>$user_department_id</td>";
                                        echo "<td>$user_name</td>";
                                        echo "<td>$user_last_name</td>";
                                        echo "<td>$user_email</td>";
                                        echo "<td>$user_phone</td>";
                                        echo "<td><a href='users.php?source=edit_user&u_id={$user_id}'>Edit</a></td>"; 
                                        echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
                                        echo "<td><a href='users.php?source=user_detail&d_id={$user_id}'>Detail</a></td>";
                                        echo "</tr>";
                                    }
                                 }

                            ?>
                            
                        </tbody>
                        </table>
                        
<?php 

if(isset($_GET['delete']))
{
    $the_user_id = $_GET['delete'];
    
    $query = "DELETE FROM users WHERE id = {$the_user_id}";
    $delete_query = mysqli_query($connection, $query);
}
?>

<?php if(isset($_GET['added'])) { ?>           
        <script src="../node/sweetalert/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
        <script type="text/javascript">
            $().ready(function(){
                swal("Done!", "User created.", "success");
            });
        </script>
<?php } ?>


<?php if(isset($_GET['updated'])) { ?>           
        <script src="../node/sweetalert/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
        <script type="text/javascript">
            $().ready(function(){
                swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'User Updated.',
                    showConfirmButton: false,
                    timer: 1500
                })
            });
        </script>
<?php } ?>
