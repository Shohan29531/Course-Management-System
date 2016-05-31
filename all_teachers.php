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
      height: 180%;
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
      <?php if($this->session->userdata('member_type') == 'student'):?>
           <li><a href="index.php/site/students_area">Home</a></li>
      <?php elseif($this->session->userdata('member_type') == 'teacher'):?>
      	   <li><a href="index.php/site/teachers_area">Home</a></li>
      <?php else:?> <li><a href="index.php/site/admins_area">Home</a></li>	   
     <?php endif;?>  
        <li><a href="index.php/login/about_page">About</a></li>
        <li><a href="index.php/login/contact_info">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="http://localhost/ci/index.php/site/log_out"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">

    </div>
    <div class="col-sm-8 text-left"> 

<body>

<h1><?php echo 'Faculty Members of CSE, BUET  : ';?></h1>
		<legend></legend>
	
	<?php if ($all_teachers):?>	
	<?php foreach($all_teachers as $r) : ?> 


			<?php
			$full_name = $r->first_name;
			$full_name .= ' '; 
			$full_name .= $r->last_name; 
			?>
		 <h3><?php echo anchor("site/view_teacher_profile_not_by_himself/$r->member_id" ,$full_name)?></h3>


	<?php endforeach; ?>
	<?php else: echo 'No registered teachers';?>

	<?php endif?>
		<legend></legend>

    </div>
    <div class="col-sm-2 sidenav">
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Where there is a will, there is a way</p>
</footer>

</body>
</html>













































