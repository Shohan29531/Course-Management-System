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
      height: 150%;
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
        <li><a href="index.php/site/teachers_area">Home</a></li>
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

<?php $this->load->view('includes/header'); ?>
<body>

<div class="s_info">

<?php foreach($rows as $r) : ?> 

   <h1 class="lvl"><?php echo 'Teacher ID : '; echo $r->member_id; ?></h1>
   <sp class="lvl"><?php echo 'Member Category : ';?></sp><h2 class="lvl_h2"><?php echo $r->member_type; ?></h2>         
   <sp class="lvl"><?php echo 'First Name : ';?></sp><h2 class="lvl_h2"><?php echo $r->first_name; ?> </h2>
   <sp class="lvl"><?php echo 'Last Name : ';?></sp><h2 class="lvl_h2"><?php echo $r->last_name; ?></h2> 
   <sp class="lvl"><?php echo 'Username : ';?></sp><h2 class="lvl_h2"><?php echo $r->username; ?></h2>
   <sp class="lvl"><?php echo 'Blood Group : ';?></sp><h2 class="lvl_h2"><?php if($r->blood_group): echo  $r->blood_group; else: echo "-"; endif;  ?></h2> 
   <sp class="lvl"><?php echo 'E-mail ID : ';?></sp><h2 class="lvl_h2"><?php  if($r->email): echo $r->email; else: echo "-"; endif;?></h2>
   <sp class="lvl"><?php echo 'Contact Number : ';?></sp><h2 class="lvl_h2"><?php if($r->contact_number): echo $r->contact_number; else: echo "-"; endif; ?></h2>
   <sp class="lvl"><?php echo 'Room Number: ';?></sp><h2 class="lvl_h2"><?php if($r->room_number): echo $r->room_number; else: echo "-"; endif;?></h2>
   <sp class="lvl"><?php echo 'Designation : ';?></sp><h2 class="lvl_h2"><?php if($r->designation): echo $r->designation; else: echo "-"; endif; ?></h2>
   <sp class="lvl"><?php echo 'Department Name : ';?></sp><h2 class="lvl_h2"><?php echo $r->department_name; ?></h2>
</div>
 <?php endforeach; ?> 
 <?php if ($this->session->userdata('username') == $r->username):?>
            <h3><?php echo anchor('site/update_teacher_info','Update My Info'); ?></h3>    
  <?php endif ?> 
      <hr>
    </div>
    <div class="col-sm-2 sidenav">
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>In a world without fence, who needs doors?</p>
</footer>

</body>
</html>






 






