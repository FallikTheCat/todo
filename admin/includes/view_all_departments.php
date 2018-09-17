           <table class="table table-condensed table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Department Name</th>
                                    <th>Description</th>
                                    <th>Is Active?</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Edit Department</th>
                                    <th>Delete Department</th>
                                </tr>
                            </thead>
                             <tbody>
                            
                            <?php 
                                 
                                 $delete_value = 0;
                            
                            $query = "SELECT * FROM departments ORDER BY id DESC";
                            $select_departments = mysqli_query($connection, $query);
                                 
                                 if($select_departments)
                                 {
                                    while($row = mysqli_fetch_assoc($select_departments))
                                    {
                                        $department_id = $row['id'];
                                        $department_name =   $row['department_name'];
                                        $department_description =   $row['description'];
                                        $department_is_active =   $row['is_active'];
                                        $department_created_at =   $row['created_at'];
                                        $department_updated_at =   $row['updated_at'];
                                    
                                        echo "<tr>";
                                        echo "<td>$department_id</td>";
                                        echo "<td>$department_name</td>";
                                        echo "<td>$department_description</td>";
                                        echo "<td>$department_is_active</td>";
                                        echo "<td>$department_created_at</td>";
                                        echo "<td>$department_updated_at</td>";
                                        echo "<td><a href='departments.php?source=edit_dep&d_id={$department_id}'>Edit</a></td>";
                                        echo "<td><a href='departments.php?deleted={$department_id}'>Delete</a></td>";
                                        echo "</tr>";
                                    }
                                 }

                            ?>
                            
                        </tbody>
                        </table>
                        
                        
                        
<?php if(isset($_GET['deleted'])) { ?>           
    <script src="../node/sweetalert/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <script type="text/javascript">
        $().ready(function(){
             swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
             })
                .then((willDelete) => {
            if (willDelete) {                    
                
                    swal("Poof! Your imaginary file has been deleted!", {
                    icon: "success",
                    });
                
            } else { 
                swal("Your imaginary file is safe!");            
            }
        });
     });
    </script>
<?php } ?>
                        
                        
                        
                        
                        
                        
                        
                        
                        


<?php 

if($delete_value > 0)
{
    $the_department_id = $_GET['deleted'];
    
    $query = "DELETE FROM departments WHERE id = {$the_department_id}";
    $delete_query = mysqli_query($connection, $query);

//   header("Location: http://localhost/d1/admin/departments.php");

}

?>




<?php if(isset($_GET['added'])) { ?>           
        <script src="../node/sweetalert/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
        <script type="text/javascript">
            $().ready(function(){
                swal("Done!", "Department created.", "success");
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
                    title: 'Department Updated.',
                    showConfirmButton: false,
                    timer: 1500
                    })
            });
        </script>
<?php } ?>
