<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Admin</a>
            </div>
           
            <ul class="nav navbar-right top-nav">
               <li><a href="/d1/login.php">Login Page</a></li>
      
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Baturay Koç <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    
                    <li>
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Backup</a>
                    </li>
                    
                    <li>
                        <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Conversations</a>
                    </li>
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Departments <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="./departments.php">View Departments</a>
                            </li>
                            <li>
                                <a href="departments.php?source=add_department">Add Departments</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="todos.php"><i class="fa fa-fw fa-wrench"></i> Todo's</a>
                    </li>
                
                      <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#user_dropdown"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="user_dropdown" class="collapse">
                            <li>
                                <a href="./users.php">View Users</a>
                            </li>
                            <li>
                                <a href="users.php?source=add_user">Add Users</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            
        </nav>