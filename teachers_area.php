<fieldset>
	<legend>Available options</legend>

    <h1>
	<?php
    echo anchor('course/display_course_list_of_teacher','See My Courses');
    ?> </h1>

	<h1><?php echo anchor('site/view_teacher_profile','View my profile'); ?></h1>

</fieldset>
<?php
 $full_name = $this->session->userdata('first_name');
 $full_name .= ' '; 
 $full_name .= $this->session->userdata('last_name');
?>
<h3><?php echo 'You are logged in as '; 
 echo anchor('site/view_teacher_profile',$full_name); ?></h3>
 		<legend></legend>