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
      height: 280%;
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
        <li><a href="index.php/site/teachers_area">Home</a></li>
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
<h1>Info Update Page</h1>

<fieldset>
    <legend> <font color="red"> Asterisk(*) Marked fileds must not be empty</legend>
    <div id ="login_form">
<?php foreach($rows as $r) : ?> 
    <?php
    echo form_open('site/do_update_teacher');?>
    <sp2><?php echo "* First Name :";?></sp2>
    <?php echo form_input('first_name', set_value('first_name' , $r->first_name));?>
    <sp2><?php echo "* Last Name :";?></sp2>
    <?php echo form_input('last_name', set_value('last_name' , $r->last_name));  ?>
    <sp2><?php echo "* Username :";?></sp2>  
    <?php echo form_input('username', set_value('username' , $r->username));?>
    <sp2><?php echo "* Password :";?></sp2>  
    <?php echo form_input('password', set_value('password' , $r->password));?>
    <sp2><?php echo "Email ID :";?></sp2> 
    <?php if($r->email): echo form_input('email', set_value('email' , $r->email));
    else: echo form_input('email', set_value('email' , NULL));
    endif;?>
    <sp2><?php echo "Blood Group :";?></sp2> 
    <?php if($r->blood_group): echo form_input('blood_group', set_value('blood_group' , $r->blood_group));
    else: echo form_input('blood_group', set_value('blood_group' , NULL));
    endif;?>
    <sp2><?php echo "Contact Number :";?></sp2> 
    <?php if($r->contact_number): echo form_input('contact_number', set_value('contact_number' , $r->contact_number));
    else: echo form_input('contact_number', set_value('contact_number' , NULL));
    endif;?>

    <sp2><?php echo "Room Number :";?></sp2>
    <?php if($r->room_number): echo form_input('room_number', set_value('room_number' , $r->room_number));
    else: echo form_input('room_number', set_value('room_number' , NULL));
    endif;?>
    <sp2><?php echo "Designation :";?></sp2>    
    <?php if($r->designation): echo form_input('designation', set_value('designation' , $r->designation));
    else: echo form_input('designation', set_value('designation' , NULL));
    endif;?>
    <?php echo form_submit('submit', 'Update Info');?>
<?php endforeach;?>

    <?php

    echo validation_errors('<p class="error">'); 
    ?>
<div>
</fieldset>

      <hr>
    </div>
    <div class="col-sm-2 sidenav">
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Similarity between hell and heaven? They both start with "he"</p>
</footer>

</body>
</html>








  