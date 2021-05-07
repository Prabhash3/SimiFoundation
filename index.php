<?php 
include_once('conn.php'); 
$query="select * from blog"; 
$result=mysqli_query($con,$query); 
?> 



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="generator" content="HTML Tidy for Windows (vers 14 October 2008), see www.w3.org" />
        <!-- Required meta tags-->
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="au theme template" />
        <meta name="author" content="Hau Nguyen" />
        <meta name="keywords" content="au theme template" />
        <!-- Title Page-->
        <title>Dashboard | Simmi Foundation</title>
        <!-- Fontfaces CSS-->
        <link href="css/font-face.css" rel="stylesheet" media="all" type="text/css" />
        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all" type="text/css" />
        <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all" type="text/css" />
        <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all" type="text/css" />
        <!-- Bootstrap CSS-->
        <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all" type="text/css" />
        <!-- Vendor CSS-->
        <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all" type="text/css" />
        <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all" type="text/css" />
        <link href="vendor/wow/animate.css" rel="stylesheet" media="all" type="text/css" />
        <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all" type="text/css" />
        <link href="vendor/slick/slick.css" rel="stylesheet" media="all" type="text/css" />
        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all" type="text/css" />
        <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all" type="text/css" />
        <!-- Main CSS-->
        <link href="css/theme.css" rel="stylesheet" media="all" type="text/css" />
        <link href="css/styless.css" rel="stylesheet" media="all" type="text/css" />
    </head>
    <body class="animsition">
        <div class="page-wrapper">
            <!-- HEADER MOBILE-->
            <!-- PAGE CONTAINER-->
            <div class="page-container">
                <!-- HEADER DESKTOP-->
               
                <!-- HEADER DESKTOP-->
                <!-- MAIN CONTENT-->
                <div class="main-content">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row col-md-12 overview-wrap">
                                <h2 class="title-1">Blogs</h2>
                                <a href="addblog.php">
                                    <button class="au-btn au-btn-icon au-btn--blue">
                                        <a href="addblog.php">add blogs</a>
                                    </button>
                                </a>
                            </div>
                            
                                <h2 class='screen-reader-text'>Posts list</h2>
                                <table class="wp-list-table widefat fixed striped posts">
                                    <thead>
                                        <tr>
                                            <td id='cb' class='manage-column column-cb check-column'>
                                                <label class="screen-reader-text" for="cb-select-all-1">Select All</label>
                                                <input id="cb-select-all-1" type="checkbox" />
                                            </td>
                                            <th scope="col" id='title' class='manage-column column-title column-primary sortable desc'>
                                                <a href="http://mstutorials.c1.biz/wp-admin/edit.php?orderby=title&amp;order=asc">
                                                    <span>Blog Title</span>
                                                </a>
                                            </th>
                                            <th scope="col" id='author' class='manage-column column-author'>Author</th>
                                      
                                            <th scope="col" id='tags' class='manage-column column-tags'>Description</th>
                                      
                                            <th scope="col" id='date' class='manage-column column-date sortable asc'>
                                                <a href="http://mstutorials.c1.biz/wp-admin/edit.php?orderby=date&amp;order=desc">
                                                    <span>Date</span>
                                                </a>
                                            </th>
                                          
                                        </tr>
                                    </thead>
                                    
                                    <tbody id="the-list">

                                    <?php while($rows=mysqli_fetch_assoc($result)) 
		{                           $bid =  $rows['bid']; 
                                 
		?> 
                                        <tr id="post-142" class="iedit author-self level-0 post-142 type-post status-publish format-standard has-post-thumbnail hentry category-techinical-videos tag-artificial-general-intelligence tag-artificial-intelligence tag-artificial-intelligence-explained tag-artificial-intelligence-movie tag-artificial-intelligence-projects tag-artificial-intelligence-python tag-artificial-intelligence-review tag-artificial-intelligence-robot tag-artificial-intelligence-stocks tag-artificial-intelligence-training tag-artificial-intelligence-tutorials tag-future-of-artificial-intelligence tag-rise-of-artificial-intelligence tag-what-is-artificial-intelligence">
                                            <th scope="row" class="check-column">
  
    
                        
                                        
                                            <td class="title column-title has-row-actions column-primary page-title" data-colname="Title">
                                                <div class="locked-info"></div>
                                                <strong>
                                                    <a class="row-title" contentEditable='true' href="" aria-label="“Artificial Intelligence in Tamil | Part ~ 2” (Edit)"><?php echo $rows['bname']; ?></a>
                                                </strong>
                                          
                                                <div class="row-actions">
                                                <span class='edit'>
                                                <a href="edit.php?id=<?php echo $bid;  ?>" aria-label="Edit “Artificial Intelligence in Tamil | Part ~ 2”">Edit</a> |</span> 
                                                
                                                <span class='trash'>
                                                <a href="delete.php?id=<?php echo $bid;  ?>" class="submitdelete" aria-label="Move “Artificial Intelligence in Tamil | Part ~ 2” to the Trash">Delete</a> </span> 
                                                
                                            </td>
                                            <td class='author column-author' data-colname="Author">
                                                <a href=""><?php echo $rows['author']; ?></a>
                                            </td>
                                           
                                            <td class='tags column-tags' data-colname="Tags">
                                            <a href=""><?php echo $rows['descr']; ?></a> 
                                           
                                           
                                          
                                            <td class='date column-date' data-colname="Date">Published
                                            <br />
                                            <span title="2019/09/21 12:29:58 pm"><?php echo $rows['date']; ?></span></td>
                                           
                                        </tr>

                                        <?php 
               } 
          ?> 

                                      
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td class='manage-column column-cb check-column'>
                                                <label class="screen-reader-text" for="cb-select-all-2">Select All</label>
                                                <input id="cb-select-all-2" type="checkbox" />
                                            </td>
                                            <th scope="col" id='title' class='manage-column column-title column-primary sortable desc'>
                                                <a href="http://mstutorials.c1.biz/wp-admin/edit.php?orderby=title&amp;order=asc">
                                                    <span>Blog Title</span>
                                                </a>
                                            </th>
                                            <th scope="col" id='author' class='manage-column column-author'>Author</th>
                                      
                                            <th scope="col" id='tags' class='manage-column column-tags'>Description</th>
                                      
                                            <th scope="col" id='date' class='manage-column column-date sortable asc'>
                                                <a href="http://mstutorials.c1.biz/wp-admin/edit.php?orderby=date&amp;order=desc">
                                                    <span>Date</span>
                                                </a>
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table></form>
                            </div>
                            <div class="row"></div>
                            <div class="col-lg-3"></div>
                        </div>
                        <div class="row"></div>
                    </div>
                    <div class="row col-md-12 copyright">
                        <p>Simmi Foundation | 2021</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT-->
        <!-- END PAGE CONTAINER-->
        <!-- Jquery JS-->
        <script src="vendor/jquery-3.2.1.min.js" type="text/javascript"></script>
        <!-- Bootstrap JS-->
        <script src="vendor/bootstrap-4.1/popper.min.js" type="text/javascript"></script>
        <script src="vendor/bootstrap-4.1/bootstrap.min.js" type="text/javascript"></script>
        <!-- Vendor JS       -->
        <script src="vendor/slick/slick.min.js" type="text/javascript"></script>
        <script src="vendor/wow/wow.min.js" type="text/javascript"></script>
        <script src="vendor/animsition/animsition.min.js" type="text/javascript"></script>
        <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js" type="text/javascript"></script>
        <script src="vendor/counter-up/jquery.waypoints.min.js" type="text/javascript"></script>
        <script src="vendor/counter-up/jquery.counterup.min.js" type="text/javascript"></script>
        <script src="vendor/circle-progress/circle-progress.min.js" type="text/javascript"></script>
        <script src="vendor/perfect-scrollbar/perfect-scrollbar.js" type="text/javascript"></script>
        <script src="vendor/chartjs/Chart.bundle.min.js" type="text/javascript"></script>
        <script src="vendor/select2/select2.min.js" type="text/javascript"></script>
        <!-- Main JS-->
        <script src="js/main.js" type="text/javascript"></script>
        <!-- end document-->
    </body>
</html>