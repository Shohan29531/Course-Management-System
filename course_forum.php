  <?php $this->load->view('includes/header'); ?>
<body>
<h1><font color="#9E6365"><?php echo 'Course Forum : ';?></h1>
	<legend></legend>
	<font color="black">
	<div id="teacher_student_list">
	<?php if ($course_forum):?>
			<?php foreach($course_forum as $r) : ?> 
                <?php if($r->forum_post):?>
				     <h3><?php echo 'Post :';?></h3>
					 <h4><?php echo $r->forum_post; ?></h4>
			    <?php endif ?>		 			
		    <?php endforeach; ?> 

	<h3><?php else: echo 'No forum Posts';?></h3>

	<?php endif?>
</div>
</body>

</html>