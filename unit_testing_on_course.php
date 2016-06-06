<?php

class Unit_testing_on_course extends CI_Controller {
    //ready
	function display_course_list_of_student(){
		$this->load->model('course_model');

        $result =$this->course_model->display_course_list_of_student('1205027');
        echo $this->unit->report($result);
        return gettype($result);
	}
	//ready
	function display_all_courses(){
		$this->load->model('course_model');

		$result = $this->course_model->display_all_courses();
        echo $this->unit->report($result);
        return gettype($result);				
	}
    //ready
	function display_course_list_of_teacher(){
		$this->load->model('course_model');

		$result = $this->course_model->display_course_list_of_teacher('905002');
        echo $this->unit->report($result);
        return gettype($result);

	}
    //ready
	function show_course_detail_for_teacher(){
		
		$this->load->model('course_model');
		$course_id = 'CSE_324';
		$data = new stdCLass();
		$data->course_detail_page = $this->course_model->show_course_detail($course_id);
		$data->course_teachers = $this->course_model->show_course_teachers($course_id);
		$data->course_students = $this->course_model->show_course_registered_students($course_id);
		$data->course_forum = $this->course_model->show_course_forum_posts($course_id);
		$data->uploaded_course_files = $this->course_model->show_uploaded_course_files($course_id);
	    /*echo $this->unit->report($data->course_detail_page);
	    echo $this->unit->report($data->course_teachers);
	    echo $this->unit->report($data->course_students);
	    echo $this->unit->report($data->course_forum);
	    echo $this->unit->report($data->uploaded_course_files);*/

        $count = 0;
        if(gettype($data->course_detail_page) == 'array') $count =$count +1; echo $count;
        if(gettype($data->course_teachers) == 'array' or $data->course_teachers == NULL) $count =$count +1;echo $count;
        if(gettype($data->course_students) == 'array' or $data->course_students == NULL) $count =$count +1;echo $count;
        if(gettype($data->course_forum) == 'array' or $data->course_forum == NULL) $count =$count +1;echo $count;
        if(gettype($data->uploaded_course_files) == 'array' or $data->uploaded_course_files == NULL) $count =$count +1;echo $count;

        if($count = 5) return true;
        else return false;

	}
    //ready
	function show_course_detail_for_student(){
		
		$this->load->model('course_model');
		$course_id = 'CSE_321';
		$data = new stdCLass();
		$data->course_detail_page = $this->course_model->show_course_detail($course_id);
		$data->course_teachers = $this->course_model->show_course_teachers($course_id);
		$data->course_students = $this->course_model->show_course_registered_students($course_id);
		$data->course_forum = $this->course_model->show_course_forum_posts($course_id);
		$data->uploaded_course_files = $this->course_model->show_uploaded_course_files($course_id);
	    /*echo $this->unit->report($data->course_detail_page);
	    echo $this->unit->report($data->course_teachers);
	    echo $this->unit->report($data->course_students);
	    echo $this->unit->report($data->course_forum);
	    echo $this->unit->report($data->uploaded_course_files);*/

        $count = 0;
        if(gettype($data->course_detail_page) == 'array') $count =$count +1; echo $count;
        if(gettype($data->course_teachers) == 'array' or $data->course_teachers == NULL) $count =$count +1;echo $count;
        if(gettype($data->course_students) == 'array' or $data->course_students == NULL) $count =$count +1;echo $count;
        if(gettype($data->course_forum) == 'array' or $data->course_forum == NULL) $count =$count +1;echo $count;
        if(gettype($data->uploaded_course_files) == 'array' or $data->uploaded_course_files == NULL) $count =$count +1;echo $count;

        if($count = 5) return true;
        else return false;

	}

    //ready
    function show_course_detail_for_non_registered_member(){
 		$this->load->model('course_model');
		$data = new stdCLass();
		$course_id = 'CSE_321';
		$data->course_detail_page = $this->course_model->show_course_detail($course_id);
		$data->course_teachers = $this->course_model->show_course_teachers($course_id);

	    /*echo $this->unit->report($data->course_detail_page);
	    echo $this->unit->report($data->course_teachers);*/

        $count = 0;
        if(gettype($data->course_detail_page) == 'array') $count =$count +1; echo $count;
        if(gettype($data->course_teachers) == 'array' or $data->course_teachers == NULL) $count =$count +1;echo $count;

        if($count = 2) return true;
        else return false;
    }
    //ready
    function add_a_forum_post(){
		$this->load->model('course_model');

		$course_id = 'CSE_324';
        $teacher_id = '905002';
		$forum_post = 'We will move on';

		$q = $this->course_model->add_a_forum_post($course_id,$teacher_id,$forum_post);

		if($q){
			//$temp = 'CSE_324';
			//redirect("course/show_course_detail_for_teacher/$temp");
			return true;
		}
		else{
			//$temp = 'CSE_324';
			//redirect("course/show_course_detail_for_teacher/$temp");	
			return false;	
		}		
	}
    //ready
	function delete_a_forum_post(){
		$this->load->model('course_model');

        $entry_no = '4';
        $course_id = 'CSE_324';


		$q = $this->course_model->delete_a_forum_post($entry_no,$course_id);

		if($q){
			//$temp = 'CSE_324';
			//redirect("course/show_course_detail_for_teacher/$temp");
			return true;
		}
		else{
			return false;
		}		
	}


	
	function index()
	{
		$this->load->library('unit_test');
		//$this->unit->run($this->test_create_catagory(), 1, 'test_create_catagory');
		//$this->unit->run($this->display_course_list_of_student(),'array','display_course_list_of_student');
		//$this->unit->run($this->display_all_courses(),'array','display_all_courses');
		//$this->unit->run($this->display_course_list_of_teacher(),'array','display_course_list_of_teacher');
		//$this->unit->run($this->show_course_detail_for_student(),true,'show_course_detail_for_student');
		//$this->unit->run($this->show_course_detail_for_teacher(),true,'show_course_detail_for_teacher');

		//$this->unit->run($this->show_course_detail_for_non_registered_member(),true,'show_course_detail_for_non_registered_member');

		$this->unit->run($this->add_a_forum_post(),true,'add_a_forum_post');
		//$this->unit->run($this->delete_a_forum_post(),true,'delete_a_forum_post');


		//$this->unit->run($this->test_delete_catagory(), 1, 'test_delete_catagory');
		//$this->unit->run($this->test_update_catagory(), 1, 'test_update_catagory');

		//-----------------my code-------------
		//$this->unit->run($this->test_validate(), true, 'test_validate');
		//$this->unit->run($this->test_is_user_existed(), true, 'test_is_user_existed');
		//$this->unit->run($this->test_get_specific_order_info(), 'object', 'get_specific_order_info');
		//$this->unit->run($this->test_create_member(), 1, 'test_create_member');
		//$this->unit->run($this->test_get_order_date(), '2015-12-23', 'test_get_order_date');
		echo $this->unit->report();
	}



	
}
