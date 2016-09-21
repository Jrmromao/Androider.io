<?php
require_once 'CORE/init.php';
	


?>

<?php include("TEMPLATE/header.html")?>
  
  <!-- ======== @Region: body ======== -->
  <body class="page page-header-old-full header-old">


 <header>
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
  <!-- ======== @Region: #highlighted ======== -->
    <div id="highlighted">
      <div class="inner">
        <!--Showshow-->
        <section class="flexslider-wrapper container">
          <div class="flexslider" data-slidernav="auto" data-transition="slide">
            <div class="slides">
              <!--Slide #1 with caption-->
              <div class="slide">
                <div class="slide-content">
                  <div class="row">
                    <div class="col-md-7">
                      <img src="img/slides/slide1.png" alt="Slide 1" data-animate-in="bounceInLeft" data-animate-delay="de-08" />
                    </div>
                    <div class="col-md-5 caption">
                      <h2 data-animate-in="bounceInRight">
                        AppStrap Bootstrap Theme
                      </h2>
                      <h4 data-animate-in="bounceInRight" data-animate-delay="de-02">
                        By <a href="http://themelize.me">Themelize.me</a>
                      </h4>
                      <p data-animate-in="bounceInRight" data-animate-delay="de-04">Perfect for your App, Web service or hosting company!</p>
                      <a href="#" class="btn btn-lg btn-primary" data-animate-in="bounceInRight" data-animate-delay="de-06">Buy Now</a> 
                    </div>
                  </div>
                </div>
              </div>
              <!--Slide #2 straight image 1170px wide x 350px high-->
              <div class="slide">
                <div class="slide-content container">
                  <div class="row text-center">
                    <img src="img/slides/slide2.png" alt="Slide 2" data-animate-in="fadeInUp" data-animate-delay="de-02" />
                  </div>
                </div>
              </div>
              <!--Slide #3 & so on below-->
            </div>
          </div>
        </section>
      </div>
    </div>

<!-- ======== @Region: #content ======== -->
<div id="content">
  <div class="container">
    <h2 class="title-divider">
      <span>Androider.IO</span>
      <small>We love to talk!</small>
  </h2>
    <div class="row">
      <!--Blog Roll Content-->
      <div class="col-md-9 blog-roll blog-list">
      
      
      <!----==================Blog Post 1===============================--->
            <div class="blog-post">
      
        <img src="img/PostIMG/blog/post1/image1.jpg" alt=""/>
        <h1>Report: Nintendo’s Miitomo has 4 million users, earns $280,000 per week</h1>
        
        <p>According to a new report, Nintendo’s first foray into the mobile app segment, social networking app Miitomo, has managed to accumulate 4 million users since it was released last month. The news comes via SurveyMonkey, who notes the following:
Since last week, over 2.6 million downloads have taken place between iOS and Android platforms, due in no small part to the app <a href="#">Read More</a></p>
        </div>
        
        
        
      <!----==================Blog Post 2===============================--->
            <div class="blog-post">
      
        <img src="img/PostIMG/blog/post2/img/img1.jpg"  alt=""/>
<h1><span>Google Calendar Goals – a new feature that will help you actually do what you wan</span>t</h1>
        
        <p>Some of you can’t live without Google Calendar. It’s a great way to organize your meetings, parties and other important events, especially for Android users who live by Google’s services. But what about those goals that live outside your strict routine? This is why Google Calendar has introduced Goals, a new service that will help you keep those objectives in target. <a href="#">Read More</a></p>
        </div>
        
        
        
      <!----==================Blog Post 3===============================--->
            <div class="blog-post">
      
        <img src="img/PostIMG/blog/post3/img/image1.jpg" alt=""/>
<h1>Google Photos now has manual backup</h1>
        
        <p>In a new version of Google Photos that has started rolling out today, you can now manually back up specific photos. To get in on this photo-saving action, just choose the photos you want, then tap the three-dots menus and choose “Back up now.” 

Now also seems like a good time to remind you that you can actually search Photos using emoji now. The feature first appeared on April 1st, and a lot of people wrote it off as an April Fools prank on the part of the search giant. It would appear that the joke is  <a href="#">Read More</a></p>
        </div>
        
          
      <!----==================Blog Post 4===============================--->
            <div class="blog-post">
      
        <img src="img/PostIMG/blog/post4/img/img1.jpg" alt=""/>
<h1>Opera Max souped up their tablet support, so now you save even more data</h1>
        
        <p>Back in the day when smartphones were really only kind of halfway-clever phones, Opera Mini became the go-to browser for many who were looking to cut through the hassle that was browsing the internet on a cellphone circa 2007. In the years since, Opera has continued to release mobile products that aim to be sleeker and leaner than the competition. Instead of focusing on bells and whistles, the company tends to build apps for data and RAM-concerned users. Their app Max is one of the best apps around for the data-conscious, and now video streaming on tablets just got kicked up a notch. <a href="#">Read More</a></p>
        </div>
        
        
      
        
      <!----==================Blog Post 5===============================--->
            <div class="blog-post">
      
<img src="img/PostIMG/blog/post5/img/image1.jpg" alt=""/>
<h1>5 best Android browsers of 2016</h1>
        
        <p>Web browsers are one of the most important apps on any device. Having the right features and performance while browsing the web can literally change your entire experience. Finding the right one can be difficult because there are so many options and the face of the web is changing all the time. Let’s take a look at the best Android browsers of 2016 (so far)! <a href="#">Read More</a></p>
        </div>
        
        
      
      
      
      
      
      
      
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
