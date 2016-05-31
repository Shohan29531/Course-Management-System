<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Round About - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <base href="<?php echo base_url(); ?>">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <base href="<?php echo base_url(); ?>">
    <link href="css/round-about.css" rel="stylesheet">
        <base href="<?php echo base_url(); ?>">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle"
                 data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                    <?php if($this->session->userdata('is_logged_in')):
                            if($this->session->userdata('member_type') == 'student'):?>
                                      <a href="index.php/site/students_area">Home</a>
                            <?php elseif($this->session->userdata('member_type') == 'teacher'): ?> 
                                      <a href="index.php/site/teachers_area">Home</a> 
                            <?php else:?> <a href="index.php/site/admins_area">Home</a> 
                            <?php endif;?>  

                        <?php else:?> <a href="index.php/login">Home</a>
                    <?php endif;?> 
                    </li>
        <li class="active"><a href="index.php/login/about_page">About</a></li>
        <li><a href="index.php/login/contact_info">Contact</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Introduction Row -->
        <div class="row">
            <div class="col-lg-12">
                <h2>Welcome to the website</h2>
                <legend></legend>
                <h1 class="page-header">About Us</h1>

                <p>Everything in this website is the combined effort of the
                   three people mentioned below. It was built as a 
                   term project for the CSE 324 Software Development II project. Here,
                    you can not just sign up and open an account, only the admins
                    can add a member.
                    So, if you wish to join here, contact the admins via email.
                 </p>
            </div>
        </div>

        <!-- Team Members Row -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Our Team</h2>
            </div>


          <div class="col-lg-4 col-sm-6 text-center">
                 <img class="img-circle img-responsive img-center"
                 src="wall5.jpg" alt="Mountain View" style="width:250px;height:250px;">              
                <h3>Nazmus Saquib
                    <small>Adviser & Project Supervisor</small>
                </h3>
                <p>Lecturer, Dept. of CSE, BUET</p>
                    <p>Email address: saquib2527@gmail.com</p>
                   Contact Number:01676556677</p>  
                 <?php echo anchor("#","View Profile on facebook");?>
            </div>
            <div class="col-lg-4 col-sm-6 text-center">
                <img class="img-circle img-responsive img-center"
                 src="touhid2.jpg" alt="Mountain View" style="width:250px;height:250px;">
            </img>
                <h3>Touhidul Islam Shohan
                    <small>Designer</small>
                </h3>
                <p>Studying B.Sc. in Computer Science Engineering, 
                   Bangladesh University of Engineering and Technology</p>
                <?php echo anchor("https://www.facebook.com/touhidul.shohan","View Profile on facebook");?>   
            </div>
            <div class="col-lg-4 col-sm-6 text-center">
                <img class="img-circle img-responsive img-center"
                 src="hasib.jpg" alt="Mountain View" style="width:250px;height:250px;">
                <h3>Tasiful Islam Hasib
                    <small>Designer</small>
                </h3>
                <p>Studying B.Sc. in Computer Science Engineering, 
                   Bangladesh University of Engineering and Technology</p>            
                 <?php echo anchor("https://www.facebook.com/tasifulislam.hasib?fref=ts","View Profile on facebook");?>
            </div>
        </div>

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; cse.buet.ac.bd 2015</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
