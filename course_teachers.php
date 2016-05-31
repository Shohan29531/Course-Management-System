<body>
<h1><font color="#9E6365"><?php echo 'Course Teachers  : ';?></h1>
		<legend></legend>
		<font color="black">

	<?php if ($course_teachers):?>	
		<?php foreach($course_teachers as $r) : ?> 


			<?php
			$full_name = $r->first_name;
			$full_name .= ' '; 
			$full_name .= $r->last_name; 
			?>
		 <h3><?php echo anchor("site/view_teacher_profile_not_by_himself/$r->member_id" ,$full_name)?></h3>


		<?php endforeach; ?>

		<h1><?php else: echo 'No registered teachers.';?></h1>

	<?php endif?>
	<legend></legend>
</body>

</html>

