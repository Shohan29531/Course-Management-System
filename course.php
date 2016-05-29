<?php


class Course extends CI_Controller{

	function display_course_list_of_student(){
		$this->load->model('course_model');

		$data['rows'] = $this->course_model->display_course_list_of_student();
		$this->load->view('course_select_page_student',$data);

	}
	function display_all_courses(){
		$this->load->model('course_model');
		$data = new stdCLass();
		$data->all_available_courses = $this->course_model->display_all_courses();
		$this->load->view('all_available_courses',$data);		
	}

	function display_course_list_of_teacher(){
		$this->load->model('course_model');

		$data['rows'] = $this->course_model->display_course_list_of_teacher();
		$this->load->view('course_select_page_teacher',$data);

	}

	function add_a_course(){
		$data['main_content'] = 'course_add_form';
		$this->load->view('includes/template',$data);
	}

	function do_course_addition(){
		$this->load->model('course_model');

		$q = $this->course_model->add_a_course();

		if($q){
			$data['main_content'] = 'course_addition_successful';
    	    $this->load->view('includes/template', $data);
		}

	}

	function assign_teacher_to_a_course(){
		$data['main_content'] = 'teacher_assign_form';
		$this->load->view('includes/template',$data);		
	}

	function do_assign_teacher_to_a_course(){
		$this->load->model('course_model');

		$q = $this->course_model->assign_teacher_to_a_course();

		if($q){
			$data['main_content'] = 'teacher_assignment_successful';
    	    $this->load->view('includes/template', $data);
		}
		


	}

	function show_course_detail_for_teacher(){
		
		$this->load->model('course_model');
		$data = new stdCLass();
		$data->course_detail_page = $this->course_model->show_course_detail();
		$data->course_teachers = $this->course_model->show_course_teachers();
		$data->course_students = $this->course_model->show_course_registered_students();
		$data->course_forum = $this->course_model->show_course_forum_posts();
		$data->uploaded_course_files = $this->course_model->show_uploaded_course_files();
		$this->load->view('full_course_page',$data);
	}

   	function show_course_detail_for_student(){
		$this->load->model('course_model');
		$data = new stdCLass();
		$data->course_detail_page = $this->course_model->show_course_detail();
		$data->course_teachers = $this->course_model->show_course_teachers();
		$data->course_students = $this->course_model->show_course_registered_students();
		$data->course_forum = $this->course_model->show_course_forum_posts();
		$data->uploaded_course_files = $this->course_model->show_uploaded_course_files();
		$this->load->view('full_course_page',$data);
	}
    function show_course_detail_for_non_registered_member(){
 		$this->load->model('course_model');
		$data = new stdCLass();
		$data->course_detail_page = $this->course_model->show_course_detail();
		$data->course_teachers = $this->course_model->show_course_teachers();
		$this->load->view('full_course_page_non_registered_member',$data);   	
    }

	function add_a_forum_post(){
		$this->load->model('course_model');

		$q = $this->course_model->add_a_forum_post();

		if($q){
			$temp = $this->uri->segment(3);
			redirect("course/show_course_detail_for_teacher/$temp");
		}
		else{
			$temp = $this->uri->segment(3);
			redirect("course/show_course_detail_for_teacher/$temp");		
		}		
	}

	function delete_a_forum_post(){
		$this->load->model('course_model');

		$q = $this->course_model->delete_a_forum_post();

		if($q){
			$temp = $this->uri->segment(4);
			redirect("course/show_course_detail_for_teacher/$temp");
		}		
	}



}