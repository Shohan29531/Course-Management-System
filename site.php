<?php


class Site extends CI_Controller{

	function _consruct(){
		parent::CI_Controller();
		$this->is_logged_in(); 
	}

	function members_area(){
		$is_logged_in = $this->session->userdata('is_logged_in');

		if($is_logged_in == true){
		$data['main_content'] = 'members_area';
		$this->load->view('includes/template',$data);
		}
		else
		{
		$data['main_content'] = 'not_view_able';
		$this->load->view('includes/template',$data);
		}

	}

	function students_area(){
		$is_logged_in = $this->session->userdata('is_logged_in');

		if($is_logged_in == true)
		{

		$this->load->model('course_model');
		$data = new stdCLass();
		$data->all_available_courses = $this->course_model->display_all_courses(); 
		$data->all_teachers = $this->course_model->display_all_teachers();
		$this->load->view('general_home_page',$data);
		
		}
		else
		{
		$data['main_content'] = 'not_view_able';
		$this->load->view('includes/template',$data);
		}

	}

	function display_all_teachers(){
		$this->load->model('course_model');
		$data = new stdCLass();
		$data->all_teachers = $this->course_model->display_all_teachers();
		$this->load->view('all_teachers',$data);
	}


	function teachers_with_ids(){
		$this->load->model('course_model');
		$info['rows'] = $this->course_model->display_all_teachers();
		$this->load->view('teachers_with_their_ids',$info);
	}

	function courses_with_ids(){
		$this->load->model('course_model');
		$info['rows'] = $this->course_model->display_all_courses();
		$this->load->view('courses_with_ids',$info);
	}

	function teachers_area(){
		$is_logged_in = $this->session->userdata('is_logged_in');

		if($is_logged_in == true)
		{

		$this->load->model('course_model');
		$data = new stdCLass();
		$data->all_available_courses = $this->course_model->display_all_courses();
		$data->all_teachers = $this->course_model->display_all_teachers();
		$this->load->view('general_home_page',$data);
		
		}
		else
		{
		$data['main_content'] = 'not_view_able';
		$this->load->view('includes/template',$data);
		}

	}
	function admins_area(){
		$is_logged_in = $this->session->userdata('is_logged_in');

		if($is_logged_in == true){
		$data['main_content'] = 'admins_area';
		$this->load->view('includes/template',$data);
		}
		else
		{
		$data['main_content'] = 'not_view_able';
		$this->load->view('includes/template',$data);
		}

	}
	function is_logged_in(){
		$is_logged_in = $this->session->userdata('is_logged_in');

		if(!isset($is_logged_in) || $is_logged_in!= true){
			echo 'You don\'t have permission to access this page. <a href="../login">Login</a>';
			die();
		}
	}

	function log_out()
	{
	    $user_data = $this->session->all_userdata();
	        foreach ($user_data as $key => $value) {
	            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
	                $this->session->unset_userdata($key);
	            }
	        }  
	    $this->session->sess_destroy();
	    redirect('login');
	}
	function view_student_profile()
	{
		$this->load->model('membership_model');
		$info['rows'] = $this->membership_model->get_student_info();
		$this->load->view('student_profile_view',$info);
	}

	function view_teacher_profile(){
		$this->load->model('membership_model');
		$info['rows'] = $this->membership_model->get_teacher_info();
		$this->load->view('teacher_profile_view',$info);

	}

	function update_student_info(){
		$this->load->model('membership_model');
    	$q['rows'] = $this->membership_model->get_student_info();
    	$this->load->view('update_student_info',$q);
	}

	function do_update_student(){
		$this->load->model('membership_model');
		$q = $this->membership_model->update_student_info();

		if($q){
			$data['main_content'] = 'update_successful';
    	    $this->load->view('includes/template', $data);
		}
		else
		{
			$data['main_content'] = 'non_members';
    	    $this->load->view('includes/template', $data);
		}
	}
	function update_teacher_info(){
		$this->load->model('membership_model');
    	$q['rows'] = $this->membership_model->get_teacher_info();
    	$this->load->view('update_teacher_info',$q);
	}

	function do_update_teacher(){
		$this->load->model('membership_model');
		$q = $this->membership_model->update_teacher_info();

		if($q){
			$data['main_content'] = 'update_successful2';
    	    $this->load->view('includes/template', $data);
		}
	}
	function view_student_profile_not_by_himself(){
		$this->load->model('membership_model');
		$info['rows'] = $this->membership_model->view_student_profile_not_by_himself();
		//$data['main_content'] = ;
		$this->load->view('student_profile_view',$info);		
	}

	function view_teacher_profile_not_by_himself(){
		$this->load->model('membership_model');
		$info['rows'] = $this->membership_model->view_teacher_profile_not_by_himself();
		//$data['main_content'] = ;
		$this->load->view('teacher_profile_view',$info);	
	}

}