<?php


class Course extends CI_Controller{

    //ready
	function display_course_list_of_student(){
		$this->load->model('course_model');

		$data['rows'] = $this->course_model->display_course_list_of_student($this->session->userdata('username'));
		$this->load->view('course_select_page_student',$data);

	}
	//ready
	function display_all_courses(){
		$this->load->model('course_model');
		$data = new stdCLass();
		$data->all_available_courses = $this->course_model->display_all_courses();
		$this->load->view('all_available_courses',$data);		
	}
    //ready
	function display_course_list_of_teacher(){
		$this->load->model('course_model');

		$data['rows'] = $this->course_model->display_course_list_of_teacher($this->session->userdata('username'));
		$this->load->view('course_select_page_teacher',$data);

	}
    
    //ready
	function show_course_detail_for_teacher(){
		
		$this->load->model('course_model');
		$data = new stdCLass();
		$data->course_detail_page = $this->course_model->show_course_detail($this->uri->segment(3));
		$data->course_teachers = $this->course_model->show_course_teachers($this->uri->segment(3));
		$data->course_students = $this->course_model->show_course_registered_students($this->uri->segment(3));
		$data->course_forum = $this->course_model->show_course_forum_posts($this->uri->segment(3));
		$data->uploaded_course_files = $this->course_model->show_uploaded_course_files($this->uri->segment(3));
		$this->load->view('full_course_page',$data);
	}
    //ready
   	function show_course_detail_for_student(){
		$this->load->model('course_model');
		$data = new stdCLass();
		$data->course_detail_page = $this->course_model->show_course_detail($this->uri->segment(3));
		$data->course_teachers = $this->course_model->show_course_teachers($this->uri->segment(3));
		$data->course_students = $this->course_model->show_course_registered_students($this->uri->segment(3));
		$data->course_forum = $this->course_model->show_course_forum_posts($this->uri->segment(3));
		$data->uploaded_course_files = $this->course_model->show_uploaded_course_files($this->uri->segment(3));
		$this->load->view('full_course_page',$data);	}
	//ready
    function show_course_detail_for_non_registered_member(){
 		$this->load->model('course_model');
		$data = new stdCLass();
		$data->course_detail_page = $this->course_model->show_course_detail($this->uri->segment(3));
		$data->course_teachers = $this->course_model->show_course_teachers($this->uri->segment(3));
		$this->load->view('full_course_page_non_registered_member',$data);   	
    }
    //ready
	function add_a_forum_post(){
		$this->load->model('course_model');

		$course_id = $this->uri->segment(3);
        $teacher_id = $this->session->userdata('member_id');
		$forum_post = $this->input->post('forum_post');

		$q = $this->course_model->add_a_forum_post($course_id,$teacher_id,$forum_post);

		if($q){
			$temp = $this->uri->segment(3);
			redirect("course/show_course_detail_for_teacher/$temp");
		}
		else{
			$temp = $this->uri->segment(3);
			redirect("course/show_course_detail_for_teacher/$temp");		
		}		
	}
    //ready
	function delete_a_forum_post(){
		$this->load->model('course_model');

        $entry_no = $this->uri->segment(3);
        $course_id = $this->uri->segment(4);


		$q = $this->course_model->delete_a_forum_post($entry_no,$course_id);

		if($q){
			$temp = $this->uri->segment(4);
			redirect("course/show_course_detail_for_teacher/$temp");
		}		
	}



}
