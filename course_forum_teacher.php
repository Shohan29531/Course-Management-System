  <?php $this->load->view('includes/header'); ?>
<body>

<h1><font color="#9E6365"><?php echo 'Course Forum : ';?></h1>
<font color="black">
  <div id="teacher_student_list">
  <?php if ($course_forum):?>
			<?php foreach($course_forum as $r) : ?> 
			<legend></legend>
				<?php if($r->course_id): ?>
			            <?php $temp = $r->course_id;?>
			    <?php endif ?>  
                <?php if($r->forum_post):?>
				     <h3><?php echo 'Post :';?></h3>
				     <h4><?php  echo $r->forum_post;  ?></h4>
				     <h4><?php echo anchor("course/delete_a_forum_post/$r->entry_no/$r->course_id",'Delete this forum post')?></h4>
			    <?php endif ?>		 		
		    <?php endforeach; ?> 

	<h3>
  <?php else: echo 'No forum Posts';?>
 </h3>

	<?php endif?>
    <?php
     $temp = $this->uri->segment(3);
     echo form_open("course/add_a_forum_post/$temp");?>
    <h3><?php echo 'Add a forum post :';?></h3>	
    <?php $data = array(
              'name'        => 'forum_post',
              'id'          => 'forum_post',
              'value'       => '',
              'rows'        => '20',
              'cols'        => '45',
            );?>

     <div id = "text_input">
     <h3><?php echo form_textarea($data);?>
     </div>
	
	<?php echo form_submit('submit','add');?></h3>
    <legend></legend>
  </div>
</body>

</html>