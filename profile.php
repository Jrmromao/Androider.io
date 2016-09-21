<?php
require_once 'CORE/init.php';
if(Input::exists()){
    if(Token::check(Input::get('token'))){
       $user = new User();
            $topic = new Topic();

                $topic->creat(array(
                        'topic_name'=>Input::get('topic_title'),
                          'topic_date' => date("Y-m-d H:i:s"),
                          'topic_by'=>escape($user->data()->users_username)
                    ));
                Redirect::to('profile.php');
    }
}

if(isset($_POST['submit_update'])){

$users_username = $_POST['users_username'];
$user_group = $_POST['user_group'];

$sql = "UPDATE users
SET column1=value1,column2=value2,...
WHERE some_column=some_value;";

$result = $conn->query($sql);
  
			   if(!$result) {
               die('Could not update data: ' . mysql_error());
            }
            echo "Updated data successfully\n";
					 
}
	
?>
<?php include("TEMPLATE/header.html")?>
  
  <!-- ======== @Region: body ======== -->
  <body class="page page-header-old-full header-old">

 <header>
  

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
                  <a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
                  <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
                  <a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a>
                  <a href="https://plus.google.com/"><i class="fa fa-google-plus"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="navbar">
          <div class="container" data-toggle="clingify">
            <!-- mobile collapse menu button - data-toggle="toggle" = default BS menu - data-toggle="jpanel-menu" = jPanel Menu -->
            <a class="navbar-btn" data-toggle="jpanel-menu" data-target=".navbar-collapse"> <span class="bar"></span> <span class="bar"></span> <span class="bar"></span> <span class="bar"></span> </a>

            <!--user menu-->
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
    </header>
             



<!-- ======== @Region: #content ======== -->
<div id="content">
  <div class="container">
    <!-- Sign Up form -->




<?php $user = new User();
				 if($user->isLoggedIn()){?>
<h3>Hey <?php echo escape($user->data()->users_username);?></h3>
    <br><img src="img/default/default.png" width="250" height="300" alt="default photo"/><br>
    
    <br>
<p>Full Name: <?php echo escape($user->data()->users_name);?></p>
<p>You are: <?php  switch (escape($user->data()->users_group)) {
    case 'value':
        case 'Administrator':
        echo 'Administrator';
      ?>

      <h3>Add a Topic</h3>
      <form action="" method="POST" >
    <div class="field">
       <input type="text" name="topic_title" id="topic_subject">
    </div>  
			<?php
       $user = new User();
				 if($user->isLoggedIn()){     
            ?>
		     <input type="hidden" name="token" value="<?php echo Token::generate();?>">
             <input type="submit" class="btn btn-primary" value="Submit">
				<?php
                 }else{
                      echo '<a href="signup.php" class="btn btn-primary">Sign Up</a>'; 
					  echo '<a href="login.php" class="btn btn-primary" >Login</a>';
                 }
				?>
       </form>
      <?php

             break;
        case 'User':
            echo 'Single User';
           	 break;
			case 'Moderator':
				echo 'You are Moderator';
			break;
    default:
       echo 'Not a valide user';
  
                 } }
                    else{
                        echo '<h2>You Must be Logged In</h2>';
                        echo '<a href="login.php" class="btn btn-primary" >Login</a>';
	?>
	<?php } ?>
		

     
  

  </div>
</div>
</div>



<?php include("TEMPLATE/footer.html")?>