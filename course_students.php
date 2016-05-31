<body>
<h1><font color="#9E6365"><?php echo 'Course Students   : ';?></h1>
         <font color="black">

		<legend></legend>

		<?php if ($course_students):?>	
		<?php foreach($course_students as $r) : ?> 


				<?php
				$full_name = $r->first_name;
				$full_name .= ' '; 
				$full_name .= $r->last_name; 
				?>
			 <h3><?php echo anchor("site/view_student_profile_not_by_himself/$r->member_id" ,$full_name)?></h3>


		<?php endforeach; ?> 
	    <h3><?php else: echo 'No enrolled students';?></h3>

		<?php endif?>
	<legend></legend>
</body>

</html>