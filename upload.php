<?php

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
		$this->load->view('upload_form', array('error' => ' ' ));
	}

	function do_upload()
	{
		$config['upload_path'] = 'C:\MAMP\htdocs\ci\application\uploads';
		$config['allowed_types'] = 'gif|jpg|png|pdf|ppt';
		$config['file_name'] = $this->input->post('file_name');

		$this->load->library('upload', $config);



		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_form', $error);
		}
		else
		{
			$course_id = $this->uri->segment(3);
        	$this->load->model('course_model');
			$this->course_model->do_upload($course_id,$config['file_name']);

			$data = array('upload_data' => $this->upload->data());

			$temp = $this->uri->segment(3);
			redirect("course/show_course_detail_for_teacher/$temp");
		}
	}

	function download(){
		$this->load->helper('download');
        $file_name = $this->uri->segment(3);
				
        $link = "C:/MAMP/htdocs/ci/application/uploads/";
        $link .= $file_name;

		$data = file_get_contents($link); // Read the file's contents
		$name = $file_name;


		force_download($name, $data);
	}
}
?>