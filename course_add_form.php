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
      height: 250%;
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
        <li><a href="index.php/site/admins_area">Home</a></li>
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
<h1>Add a Course</h1>

<fieldset>
  <legend> <font color="red"> Asterisk(*) Marked fileds must not be empty</legend>
    <div id ="login_form">
  <?php
    echo form_open('course/do_course_addition');?>
    <sp2><?php echo "* Course ID :";?></sp2> 
  <?php echo form_input('course_id', set_value('course_id' , NULL));?>
    <sp2><?php echo "* Course Name :";?></sp2> 
    <?php echo form_input('course_name', set_value('course_name' , NULL));?>
    <sp2><?php echo "* Level_Term :";?></sp2> 
    <?php echo form_input('level_and_term', set_value('level_and_term' , NULL));?>
    <sp2><?php echo "* Number of Credits :";?></sp2> 
    <?php echo form_input('number_of_credits', set_value('number_of_credits' , NULL));?>
    <sp2><?php echo "Course Description :";?></sp2> 

    <?php $data = array(
              'name'        => 'course_description',
              'id'          => 'course_description',
              'value'       => '',
              'rows'        => '20',
              'cols'        => '45',
            );?>

     <div id = "text_input">
    <?php echo form_textarea($data);?>  
    <?php echo form_submit('submit', 'Confirm');?>

    <?php
    echo validation_errors('<p class="error">'); 
    ?>
</div>
</fieldset>
<h1><?php echo anchor('site/courses_with_ids','See Current Courses?')?></h1>
      <hr>
    </div>
    <div class="col-sm-2 sidenav">
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>"An eye for an eye will make everyone blind" - Mahatma Gandhi</p>
</footer>

</body>
</html>






