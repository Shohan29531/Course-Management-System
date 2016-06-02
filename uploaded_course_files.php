<body>
<h1><font color="#9E6365"><?php echo 'Uploaded Course Files   : ';?></h1>
			<legend></legend>
			<font color="black">

	<?php if ($uploaded_course_files):		
		 foreach($uploaded_course_files as $r) : ?> 

		   	 <h3><?php echo anchor("upload/download/$r->file_name",$r->file_name); ?></h3>
		<?php endforeach; ?> 
	<?php else: echo 'No Uploaded files yet.';?>
	<?php endif?>

	
	<legend></legend>
<?php if($this->session->userdata('member_type') == 'teacher'):
            $temp =$this->uri->segment(3);?>
           <h2><?php echo anchor("upload/index/$temp",'Upload a file'); ?></h2>
      <?php endif;?>   

</body>

</html>