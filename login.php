<?php 
require_once 'CORE/init.php';

if(Input::exists()){
    if(Token::check(Input::get('token'))){
        
        $validate = new Validate();
         $validation =  $validate->check($_POST, array(
           'users_username' => array('required' => true),
           'password' => array('required' => true)
        ));
        
        if($validate->passed()){
            //log user in
            
            $user = new User();
            
            
            $remember = (Input::get('remember')==='on') ? true : false;
            $login = $user->login(Input::get('users_username'),Input::get('password'), $remember);
            
            if($login){
              Redirect::to('index.php');
            }
            
            else{
				
				
				?>
				<script>alert(" <?php echo 'ERROR- Login Fail'; ?>");</script>
				
				<?php
              
            }
            
        }else{
            foreach ($validation->errors() as $error) {
				
				
				?>
				<script>alert(" <?php echo $error;?>");</script>
				
				<?php
				
               
            }
        }
    }

}


?><?php include("TEMPLATE/header.html")?>
  
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
                  <a href="#" class="dropdown-toggle" id="more-drop" data-toggle="dropdown" data-hover="dropdown">Forum</a> 
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
        <?php include("FROMS\login.html");?>
  </div>
  </div>
  <?php include("TEMPLATE/footer.html")?>