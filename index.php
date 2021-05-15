    <?php
    $jsondata = '';
    $siteloc = "https://www.themealdb.com/api/json/v1/1/categories.php";
    //testing for connection to website
    if (@fsockopen('www.themealdb.com', 80)) {
        $start = fopen($siteloc, "r");
        $rawdata = stream_get_contents($start);
        fclose($start);
        $jsondata = json_decode($rawdata);
    } else {
        //Put a alert
        echo "Not able to connect!";
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <title>Food</title>

        <link rel="stylesheet" href="style.css" />
        <!-- Load icon library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>

        <header>
            <a href="#" class="logo">Food<span>.</span></a>
            <!-- <div class="menuToggle" onclick="toggleMenu();"></div> -->
            <ul class="navigation">
                <li>
                    <a href="#banner">Home</a>
                </li>
                <li>
                    <a href="#about">About</a>
                </li>
                <li>
                    <a href="#menu">Menu</a>
                </li>
                <!-- drop down -->
                <!-- <div class="dropdown">
              <button class="dropbtn">Dropdown
                <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-content">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
              </div>
            </div> -->
                <!-- drop down -->
                <li>
                    <a href="#expert">Expert</a>
                </li>
                <li>
                    <a href="#testimonials">Testimonials</a>
                </li>
                <li>
                    <a href="#contact">Contact</a>
                </li>
            </ul>
        </header>





        <!--
        <video autoplay muted loop id="myVideo">
          <source src="img/vd3.mp4" type="video/mp4">
          Your browser does not support HTML5 video.
        </video>
       -->
        <!-- section for banner -->

        <section class="banner" id="banner">
            <div class="content">

                <!-- for image slider -->
                <!-- <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                  <img src="img/img1.jpg " class="d-block w-200000" >
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                  <img src="img/menu2.jpg" class="d-block w-50">
                </div>
                <div class="carousel-item">
                  <img src="img/menu1.jpg" class="d-block w-100" >
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div> -->
                <!-- <h2>Always Choose Good</h2> -->
                <!-- etxt -->
                <h2 class="ml9">
                    <span class="text-wrapper">
                        <span class="letters">Always Choose Good!</span>
                    </span>
                </h2>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eos
                    blanditiis velit quidem error sint laboriosam. Voluptatibus eum harum
                    sit nam repudiandae ab! Corporis, culpa repudiandae? Reprehenderit,
                    fuga. Sunt, vero nesciunt.
                </p>

                <div class="search">

                    <div class="search-container">
                        <form action="./viewbyname.php" method="get">
                            <input type="text" placeholder="Search...The Recipies..." name="search" size="40" required>
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>

                </div>

        </section>


        <!-- SECTION FOR ABOUT US -->

        <section class="about" id="about">
            <div class="row">
                <div class="col50">
                    <h2 class="titleText"><span>A</span>bout Us</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto
                        fugiat, eos cumque facere repudiandae quia quos vitae est corrupti,
                        ut quo deserunt nisi numquam ea voluptatum voluptas asperiores
                        delectus cum velit deleniti tempora assumenda! Placeat, aspernatur.
                        Unde sapiente repellat quidem? <br><br> ipsum dolor sit,
                        amet consectetur adipisicing elit. Iure mollitia aperiam voluptatum
                        reiciendis. Tenetur, ipsa? Laborum quasi, exercitationem, minima at
                        tempora placeat aperiam quisquam quas ipsum tenetur maxime
                        voluptatem dignissimos?
                    </p>
                </div>
                <div class="col50">
                    <div class="imgBx">
                        <!-- image hover -->
                        <div class="img-hover-zoom--brightness">
                            <img src="img/img1.jpg">
                        </div>
                        <!-- /// -->
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION FOR MENU -->

        <section class="menu" id="menu">

            <div class="title">
                <h2 class="titleText">Our<span>M</span>enu</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
            </div>

            <div class="content menu__box disp">
                <?php
                if ($jsondata != '') {
                    foreach ($jsondata->categories as $item) {
                        //To display every item recive from json file
                        echo '<div class="box ">
                    <div class="imgBx">
                    <div class="img-hover-zoom--quick-zoom ">
                    <a id="foodlink" href="./viewbycat.php?v='.$item->strCategory.'" >
                         <img src="' . $item->strCategoryThumb . '" alt="' .$item->strCategoryThumb. '">
                         </div>
                    </div>
                    <div class="text">
                        <h3>' . $item->strCategory . '</h3>
                     </a>
                        </div>
                  </div>';
                    }
                } else {
                    echo '<h2>Could Not able to load items</h2>'; //can be edited
                }

                ?>

            </div>
            <!-- VIEW ALL BUTTON GIVEN SAME CLASS NAME "btn" -->

            <div class="title">
                <a href="#menu" id="btnview" class="btn">View All</a>
            </div>
        </section>

        <!-- SECTION FOR EXPERTS -->

        <section class="expert" id="expert">
            <div class="title">
                <h2 class="titleText">Our kitchen <span>E</span>xpert</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
            </div>
            <div class="content">
                <div class="box">
                    <div class="imgBx">


                    <div class="container-a1">
		<ul class="caption-style-1">
			<li>
            <img src="img/expert1.jpg">
				<div class="caption">
					<div class="blur"></div>
					<div class="caption-text">
						<h1>Amazing Caption</h1>
						<p>Whatever It Is - Always Awesome</p>
					</div>
				</div>
			</li>
			
			
			
		</ul>
	</div> 
                    <!-- <div class="img-hover-zoom--brightness">
                        <img src="img/expert1.jpg">
                    </div> -->

                    
                    </div>
                    <div class="text">
                        <h3>Someone Famous</h3>
                    </div>
                </div>
<!-- ///////////////////// -->

                <div class="box">
                    <div class="imgBx">

                   
                    <div class="container-a1">
		<ul class="caption-style-1">
			<li>
            <img src="img/expert2.jpg">
				<div class="caption">
					<div class="blur"></div>
					<div class="caption-text">
						<h1>Amazing Caption</h1>
						<p>Whatever It Is - Always Awesome</p>
					</div>
				</div>
			</li>
			
			
			
		</ul>
	</div> 

                    </div>
                    <div class="text">
                        <h3>Someone Famous</h3>
                    </div>
                </div>
<!-- ///////////////////////////////////// -->
<div class="box">
                    <div class="imgBx">

                   
                    <div class="container-a1">
		<ul class="caption-style-1">
			<li>
            <img src="img/expert3.jpg">
				<div class="caption">
					<div class="blur"></div>
					<div class="caption-text">
						<h1>Amazing Caption</h1>
						<p>Whatever It Is - Always Awesome</p>
					</div>
				</div>
			</li>
			
			
			
		</ul>
	</div> 

                    </div>
                    <div class="text">
                        <h3>Someone Famous</h3>
                    </div>
                </div>
                <!-- ///////////////// -->
<!--            
<div class="box">
                    <div class="imgBx">
<div class="container-a1">
		<ul class="caption-style-1">
			<li>
            <img src="img/expert4.jpg">
				<div class="caption">
					<div class="blur"></div>
					<div class="caption-text">
						<h1>Amazing Caption</h1>
						<p>Whatever It Is - Always Awesome</p>
					</div>
				</div>
			</li>
			
			
			
		</ul>
	</div>      -->

                    <!-- <div class="img-hover-zoom--brightness">
                        <img src="img/expert4.jpg">
                        </div> -->

                    <!-- </div>
                    <div class="text">
                        <h3>Someone Famous</h3>
                    </div>
                </div>
            </div>

        </section> -->

        <!-- SECTION FOR TESTIMONIALS -->


        <section class="testimonials" id="testimonials">
            <div class="title white">
                <h2 class="titleText">They <span>S</span>aid About Us</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
            </div>
            <div class="content">
                <div class="box">
                    <div class="imgBx">
                        <img src="img/testi1.jpg">
                    </div>
                    <div class="text">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam illum nisi sit harum dolorem aliquam ipsum. Ex facere velit asperiores?
                        <h3>Someone Famous</h3>
                        </p>
                    </div>
                </div>
                <!-- //// -->
                <div class="box">
                    <div class="imgBx">
                        <img src="img/testi2.jpg">
                    </div>
                    <div class="text">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam illum nisi sit harum dolorem aliquam ipsum. Ex facere velit asperiores?
                        <h3>Someone Famous</h3>
                        </p>
                    </div>
                </div>
                <!-- ///// -->
                <div class="box">
                    <div class="imgBx">
                        <img src="img/testi3.jpg">
                    </div>
                    <div class="text">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam illum nisi sit harum dolorem aliquam ipsum. Ex facere velit asperiores?
                        <h3>Someone Famous</h3>
                        </p>
                    </div>
                </div>
            </div>

        </section>

        <!-- section for contact us -->

        <section class="contact" id="contact">
            <div class="title">
                <h2 class="titleText"><span>C</span>ontact Us</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
            </div>
            <div class="contactForm">
                <h3>Send Message</h3>
                <form name="frmContact" id="frmContact" method="post" enctype="multipart/form-data" action="./ContactusSubmission.php" onsubmit="return validateContactForm()">
                    <div class="inputBox">
                        <input type="text" name="Name" placeholder="Enter Your Name*" required>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="Email" placeholder="Enter Your Email*" required>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="subject" placeholder="Enter Subject*" required>
                    </div>
                    <div class="inputBox">
                        <textarea placeholder="Enter Your Message Here*" name="content" rows=6 required></textarea>
                    </div>
                    <div class="inputBox">
                        <input type="submit" name="send" value="Send">
                    </div>
                </form>
            </div>
        </section>

        <!-- for copyright -->
        <div class="copyrightText">
            <p>Copyright 2021 <a href="#">Institute Of Technolgy Korba</a>.All right Reserved</p>
        </div>






        <script type="text/javascript">
            // for making sticky nav scrolling
            window.addEventListener("scroll", function() {
                const header = document.querySelector('header');
                header.classList.toggle("sticky", window.scrollY > 0);
            });

            // Open the full screen search box
            function openSearch() {
                document.getElementById("myOverlay").style.display = "block";
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <script src="main.js"></script>
    </body>

    </html>






    <!-- tuts -->
    <!--
<body>
  <div class="container">
    <div class="slides">
      <img src="img/sl1.jpg" alt="">
    </div>

    <div class="slides">
      <img src="img/sl3.jpg" alt="">
    </div>

    <div class="slides">
      <img src="img/sl4.jpg" alt="">
    </div>
    <div class="slides">
      <img src="img/bg.jpg" alt="">
    </div>
  </div>
  <div class="slide-controls">
    <button></button>
  </div>
</body> -->