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
                        
                        <?php 
                        
                        if(isset($_GET['source']))
                        {
                            $source = $_GET['source'];
                        }
                        else
                        {
                            $source = '';
                        }
                        
                        switch($source)
                        {
                                case 'add_department';
                                include "includes/add_dep.php";
                                break;
                                
                                case 'edit_dep';
                                include "includes/edit_dep.php";
                                break;
                                
                                default:
                                
                                include "includes/view_all_departments.php";
                                
                                break;
                        }
                        
                        ?>
                        
                        
                    </div>
                </div>
                

            </div>
            

        </div>
        

<?php include "includes/admin_footer.php" ?>