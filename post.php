<?php
require_once 'CORE/init.php';
		$pid = $_GET['pid'];

				 $user = new User();
				 if(!$user->isLoggedIn()){

				  Redirect::to('forum.php');
				 }


if(Input::exists()){
    if(Token::check(Input::get('token'))){
         $user = new User();
            $reply = new Reply();
                $reply->addReply(array(
                        'reply_text'=>Input::get('reply_text'),
                          'reply_date' => DATE( 'Y-M-d, H:i'),
                          'reply_by'=>escape($user->data()->users_username),
						  'post_id'=>$pid,
						  'reply_by'=>escape($user->data()->users_username)

				    ));
    		}
}


		if(isset($_POST['submit'])){

		$DELsql ="DELETE FROM posts WHERE post_id ={$pid}";
		$DELsql2 ="DELETE FROM reply WHERE post_id ={$pid}";

			if ((mysqli_query($conn, $DELsql)) && (mysqli_query($conn, $DELsql2))) {
				 Redirect::to('forum.php');
				
			} else {
				
				?>
				<script>alert("ERROR - Post not deleted");</script>
				<?php
			}
}
$rID ="";
?>
<?php include("TEMPLATE/header.html")?>

  
  <!-- ======== @Region: body ======== -->
  <body class="page page-header-old-full header-old">
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
				
		///=====================call a stored procedure=====================//
		///*----------->*/$sqlZ ="CALL get_posts('$pid')";//<-----------------
		$sqlZ = "SELECT * FROM posts WHERE post_id ={$pid}";
		 
				$result = $conn->query($sqlZ) or die(mysql_error());
				if ($result->num_rows ==1) {
					while($row = $result->fetch_assoc()) 
					{ 	?>
							
		<table class="table_pots">
                   <tr>
                        <th colspan="3" style="text-align:left";>Date Posted: <?php echo $row['post_date'];?></th>
                        
                        <?php 
						if($user->isLoggedIn()){    
							if(escape($user->data()->users_group=='Administrator'))
							{?>
							<th>
                            <form action="" method="post">
                            <input type="submit" value="DELETE" class="admin_sunmit" name="submit" />
                            </form>
                            
                            </th>
							<?php } 

						 }
						?>
                        
                          
                   </tr>
                   
                               <td><br><strong>Question Asked By: <?php  echo strtoupper($row['post_by']);?></strong><hr><div id="post_content">
                               <strong><?php  echo $row['post_title'];?> </strong><br><br>
                                <?php echo $row['post_content'];?> </div></td>
                              </tr>
        				   </table>
		<?php
		
		//=======================ADD VIEW====================//
		$old_views = $row['post_views'];
		$new_views = $old_views+1;
		
		$sqlV = "update posts set post_views = {$new_views} where post_id ={$pid}";
		
		//===========CALL STORED PROCEDURE=================//
		///*--------->*/  $sqlV = "call add_view ($new_views},{$pid})";
		
		
		$resv = $conn->query($sqlV);

                        }
					}
					
					//===========CALL STORED PROCEDURE=================//
					/*--------->*/ $sql2 ="call get_reply({$pid})";	

				//$sql2 ="SELECT * FROM reply WHERE post_id ={$pid}";

				$result2 = $conn->query($sql2) or die(mysql_error());
				
				if ($result->num_rows ==1) {
        
					while($row2 = $result2->fetch_assoc()) 
					{ 
					$rID = $row2['reply_id'];
	
									?>
							<table class="table_pots">
                            	<tr>
                                	<th colspan="2" style="text-align:left";>Reply Date:<?php echo $row2['reply_date'];?></th>
                            </th>
						
                   </tr>
                                <tr><div class="user">
                                    <td><br><strong><?php echo  strtoupper($row2['reply_by']) ?> Says:</strong><div class="reply_text"> <br><?php echo $row2['reply_text'];?></div><br></td>
                                    </td></div>
                                </tr>
                            </table>
							<?php
                        }
				}
        ?>

<form method="post" action="">
  <div class="field">
             <h3>Add a reply: </h3>
             <textarea name="reply_text" rows="10" for="reply_text" class="form-control" id="reply_text" required></textarea>
    </div> 
    <br>
    	 	<?php
       $user = new User();
				 if($user->isLoggedIn()){  
            ?>
		     <input type="hidden" name="token" value="<?php echo Token::generate();?>" />
             <input type="submit" class="btn btn-primary" value="Submit">
				<?php
                 }else{
					  $replyNum = 1;
                      echo '<a href="signup.php" class="btn btn-primary">Sign Up</a>'; 
					  echo '<a href="login.php" class="btn btn-primary" >Login</a>';
                 }
				?>
</form>
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
