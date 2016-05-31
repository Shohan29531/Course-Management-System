 <?php $this->load->view('includes/header'); ?>
<body>
<h1><font color="#9E6365"><?php echo 'Course Details   : ';?></h1>
	<legend></legend>
	<font color="black">
<?php foreach($course_detail_page as $r) : ?> 

   	 <h3><?php echo 'Course ID           : '; echo $r->course_id; ?></h3>
	 <h3><?php echo 'Course Name         : '; echo $r->course_name; ?></h3>         
	 <h3><?php echo 'Credit hours        : '; echo $r->number_of_credits; ?></h3>
	 <h3><?php echo 'Level and Term    		 : '; echo $r->level_and_term; ?></h3>
	 <h2><?php echo 'Course Description   		 : ';?></h2>
	 <h4><?php echo $r->course_description; ?></h4>
<?php endforeach; ?> 

</body>

</html>
