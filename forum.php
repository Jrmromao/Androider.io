<?php
require_once 'CORE/init.php';

if(Input::exists()){
    if(Token::check(Input::get('token'))){
         $user = new User();
            $post = new Post();

                $post->creatPost(array(
                        'post_content'=>Input::get('post_content'),
                          'post_date' => date("Y-m-d, H:i:s"),
                          'post_topic'=> Input::get('topic_name'),
                          'post_by'=>escape($user->data()->users_username),
                          'post_title'=> Input::get('post_title')
                    ));
    }
}


?>
<?php include("TEMPLATE/header.html")?>
  
  <!-- ======== @Region: body ======== -->
  <body class="page page-header-old-full header-old">
   <a href="#content" class="sr-only">Skip to content</a> 
    
    <!-- ======== @Region: #navigation ======== -->
    <div id="navigation" class="wrapper">
      <div class="navbar-static-top navbar-full-width">

        <!--Header & Branding region-->
        <div class="header">
          <div class="header-inner container">
            <div class="row">
              <div class="col-md-8">
                <!--branding/logo-->
                <a class="navbar-brand" href="index.php" title="Home">
                  <h1>
                    <span>Androider</span>.IO
                  </h1>
                </a>
                <div class="slogan">Your Android hub</div>
              </div>
              
              <!--header rightside-->
              <div class="col-md-4">
                <!--social media icons-->
                <div class="social-media">
                  <!--@todo: replace with company social media details-->
                  <a href="#"><i class="fa fa-twitter"></i></a>
                  <a href="#"><i class="fa fa-facebook"></i></a>
                  <a href="#"><i class="fa fa-linkedin"></i></a>
                  <a href="#"><i class="fa fa-google-plus"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="navbar">
          <div class="container" data-toggle="clingify">
            <!-- mobile collapse menu button - data-toggle="toggle" = default BS menu - data-toggle="jpanel-menu" = jPanel Menu -->
            <a class="navbar-btn" data-toggle="jpanel-menu" data-target=".navbar-collapse"> <span class="bar"></span> <span class="bar"></span> <span class="bar"></span> <span class="bar"></span> </a>

            <div class="btn-group user-menu pull-right">
               
                 <?php 
				 
				 $user = new User();
				 if($user->isLoggedIn()){
				 echo '<a href="logout.php" class="btn btn-primary" >logout</a>';
				 }else{
					   echo '<a href="signup.php" class="btn btn-primary">Sign Up</a>'; 
					  echo '<a href="login.php" class="btn btn-primary" >Login</a>';
				 }
				 ?>
                 
   
            </div>
            <!--everything within this div is collapsed on mobile-->
            <div class="navbar-collapse collapse">
              <!--main navigation-->
              <ul class="nav navbar-nav">
                <li class="home-link">
                  <a href="index.php"><i class="fa fa-home"></i><span class="hidden">Home</span></a>
                </li>
                <li class="dropdown dropdown-full">
                  <a href="#" class="dropdown-toggle menu-item" id="megamenu-drop" data-toggle="dropdown" data-hover="dropdown">App's</a> 
                  <!-- Dropdown Menu - Mega Menu -->
                  <ul class="dropdown-menu mega-menu" role="menu" aria-labelledby="megamenu-drop">
                    <li role="presentation" class="dropdown-header">App's for everyone</li>
                    <li role="presentation">
                      <ul class="row list-unstyled" role="menu">
                        <li class="col-md-3" role="presentation">
                          <a role="menuitem" href="#"  class="img-link">
                            <img src="img/features/feature-1.png" alt="Feature 1" />
                          </a>
                          <a role="menuitem" href="#"  tabindex="-1" class="menu-item"><strong>Mobile Friendly</strong></a>
                         
                        </li>
                        <li class="col-md-3" role="presentation">
                          <a role="menuitem"href="#" class="img-link">
                            <img src="img/features/feature-2.png" alt="Feature 2" />
                          </a>
                          <a role="menuitem"href="#"  tabindex="-1" class="menu-item"><strong>24/7 Support</strong></a>
                         
                        </li>
                        <li class="col-md-3" role="presentation">
                          <a role="menuitem" href="features.htm" class="img-link">
                            <img src="img/features/feature-3.png" alt="Feature 3" />
                          </a>
                          <a role="menuitem"href="#"  tabindex="-1" class="menu-item"><strong>99% Uptime</strong></a>
                           
                        </li>
                        <li class="col-md-3" role="presentation">
                          <a role="menuitem" href="features.htm" class="img-link">
                            <img src="img/features/feature-4.png" alt="Feature 4" />
                          </a>
                          <a role="menuitem" href="#" tabindex="-1" class="menu-item"><strong>Upgrade Assistance</strong></a>
                       
                        </li>
                      </ul>
                    </li>
                  </ul>
                </li>
                
                   <li class="dropdown">
                  <a href="profile.php" >Profile</a> 
                </li>
                <li class="dropdown active">
                  <a href="forum.php">Forum</a> 
                </li>
              </ul>
            </div>
            <!--/.navbar-collapse -->
          </div>
        </div>
      </div>
    </div>
<!-- ======== @Region: #content ======== -->
<div id="content">
  <div class="container">
    <h2 class="title-divider">
      <span>Forum</span>
      <small>We love to talk!</small>
    </h2>
    <div class="row">
      <!--Blog Roll Content-->
      <div class="col-md-9 blog-roll blog-list">



<?php 

$Cquery = "SELECT * FROM posts";
$result = $conn->query($Cquery);


if ($result->num_rows > 0) {
?>
      <h3>Trending</h3>
		<table >
    			  <tr>
   					  <th>View Post</th>
                      <th>Topic Title</th>
                      <th>Post Topic</th>
                      <th>Date Posted</th>
                      <th>Views</th>
			    </tr>
					<?php
					
					$sql ='SELECT * FROM posts ORDER BY post_views DESC LIMIT 5';
					
					
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) 
									{       ?>    
                    <tr>
                        <td><?php   echo '<p><a href="post.php?pid='.$row['post_id'] . ' " >' .'<button type="button">view</button> </td> <td class="title">' . $row['post_title'] . '</a></p>';?></td>
                       	<td style="text-align:center;"><strong><?php echo $row['post_topic'];?></strong></td>
                        <td style="text-align:center;" ><?php  echo $row['post_date'];?></td>
                        <td style="text-align:center;" > <?php  echo $row['post_views'];?></td>
                  
                   </tr>
             <?php   }
}
?>
		</table>
<hr>
<br>
<br>
<br>
<h3>Recent Posts</h3>
		<table >
     			 <tr>
       					<th>View Post</th> 
                        <th>Topic Title</th>
                        <th>Post Topic</th>
                        <th>Date Posted</th>
                        <th>Views</th>
 				 </tr>
<?php
$sql1 ='SELECT * FROM posts LIMIT 50';

//$sql1 = "CALL posts_LIMIT()";
$result = $conn->query($sql1);
if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) 
                {       ?>    
                  <tr>
                        <td><?php   echo '<p><a href="post.php?pid='.$row['post_id'] . ' " >' .'<button type="button">view</button> </td> <td class="title">' . $row['post_title'] . '</a></p>';?></td>
                       	<td style="text-align:center;"><strong><?php echo $row['post_topic'];?></strong></td>
                        <td style="text-align:center;" ><?php  echo $row['post_date'];?></td>
                        <td style="text-align:center;" > <?php  echo $row['post_views'];?></td>
                 </tr>
             <?php   }
}
?>
	</table>
<hr>
   <h3>Add a Post</h3>
<form action="" method="post">
			
        <div id="field">
        <h4>Add a Topic</h4>
       		<select name="topic_name"  required>  
            <option></option>      
        <?php 
		
		$sql3 ="CALL vew_topics()";

$result3 = $conn->query($sql3);

if ($result3->num_rows > 0) {

    while($row3 = $result3->fetch_assoc()) 
                {    ?>
                <option><?php  echo $row3['topic_name'];?></option>
       <?php 

	   
				}
				
}
				?>
            </select>
        </div>


        <div id="field">
       		 <input type="text" name="post_title" class="form-control"  required placeholder="Title: ">
        </div>
        <div id="field">
        <textarea name="post_content" for="post_content" class="form-control" rows="10"id="post_content" required placeholder="Write a Post: "></textarea>
        </div>
        <br>
        
            <?php 
				 
				 $user = new User();
				 if($user->isLoggedIn()){?>
    		
             <input type="hidden" name="token" value="<?php echo Token::generate();?>">
             <input type="submit"  value="Add Post"  class="btn btn-primary">
		    <?php
				 }else{
					   echo '<a href="signup.php" class="btn btn-primary">Sign Up</a>'; 
					  echo '<a href="login.php" class="btn btn-primary" >Login</a>';
				 }  
			}else{
				?>
                
  <h3>Add the First Post</h3>
                            <form action="" method="post">
                                       <h4>Add a Topic</h4>	
                                    <div id="field">
                                        <select name="topic_name"  required>  
                                                    <option></option>      
                                                <?php 
                                                   // $sql3 ='SELECT * FROM topics';
												   
												   $sql3 = "CALL vew_topics()";
                                                    $result3 = $conn->query($sql3);
                                                    
                                                    if ($result3->num_rows > 0) {
                                                        while($row3 = $result3->fetch_assoc()) 
                                                                    {    ?>
                                                        <option><?php  echo $row3['topic_name'];?></option>
                                               <?php 
                                                    }
                                                }
                                    ?>
                                        </select>
                                    </div>
                                    
                                    <div id="field">
                                         <input type="text" name="post_title" class="form-control"  required placeholder="Title: ">
                                     </div>
                                     <div id="field">
                                          <textarea name="post_content" for="post_content" class="form-control" rows="10"id="post_content" required placeholder="Write a Post: "></textarea>
                                    </div>
                                    <br>
                                        <?php 
                                         $user = new User();
                                         if($user->isLoggedIn()){?>
                                         <input type="hidden" name="token" value="<?php echo Token::generate();?>">
                                         <input type="submit"  value="Add Post"  class="btn btn-primary">
                                        <?php
                                             }else{
                                                   echo '<a href="signup.php" class="btn btn-primary">Sign Up</a>'; 
                                                   echo '<a href="login.php" class="btn btn-primary" >Login</a>';
                                             }  
                                        }
                                             ?>
                              </form>
    
<hr>
      </div>
    
      <!--Sidebar-->
      <div class="col-md-3 sidebar sidebar-right">
    <?php include("TEMPLATE/sidebar.html");?>
      </div>
    </div>
  </div>
  <!--.container-->
</div>
    
<?php include("TEMPLATE/footer.html")?>

