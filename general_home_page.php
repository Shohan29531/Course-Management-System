



<!DOCTYPE html>
<html lang="en">
<head>
  <title>cse, buet</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #000000;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
  <?php $this->load->view('includes/header'); ?>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php/login/view_logo">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php/login/about_page">About</a></li>
        <li><a href="index.php/login/contact_info">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="http://localhost/ci/index.php/site/log_out"><span
         class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">

    </div>
    <div class="col-sm-8 text-left"> 




<?php if($this->session->userdata('member_type') == 'student'):?>
           <?php $this->load->view('students_area'); ?>
     <?php elseif($this->session->userdata('member_type') == 'teacher'):
           $this->load->view('teachers_area');?>
     <?php elseif($this->session->userdata('member_type') == 'admin'):
           $this->load->view('admins_area'); ?>
    <?php  endif;?>  


<?php if($this->session->userdata('member_type') != 'admin'):?>

     <h1><?php echo anchor('site/display_all_teachers','Faculty Members');
     //$this->load->view('all_available_courses',$all_available_courses);?></h1>
     <h1><?php echo anchor('course/display_all_courses',"Courses in Dept. of CSE, BUET ");?></h1>
   <?php endif;?>

<?php $this->load->view('includes/footer'); ?>

      <hr>
    </div>
    <div class="col-sm-2 sidenav">
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>He who goes soonest has the least to pay</p>
</footer>

</body>
</html>
