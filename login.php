<?php


class Login extends CI_Controller{

 
	function index(){
		$data['main_content'] = 'login_form';
		$this->load->view('includes/template',$data);
	}

    function contacting_admins(){
        $this->load->view('contacting_admins');
    }
    
    function validate_credentials(){
    	$this->load->model('membership_model');
    	$query = $this->membership_model->validate();
        $member_type = $this->membership_model->get_member_type();

    	if($query)
    	{
    		$data =array(
    			'username' => $this->input->post('username'),
                'member_type' =>$this->membership_model->get_member_type(),
                'first_name' => $this->membership_model->get_first_name(),
                'last_name'  => $this->membership_model->get_last_name(),
    			'is_logged_in' => true);

    		$this->session->set_userdata($data);

            if($member_type == 'student')
    		        redirect('site/students_area');
            else if($member_type == 'teacher')
                    redirect('site/teachers_area'); 
            else if($member_type == 'admin')
                    redirect('site/admins_area'); 
            else    
                    echo 'invalid member type';                                          
    	}
    	else{
            echo 'Login Error.';
    		$this->index();
    	}
    }

    function signup(){

    	$data['main_content'] = 'signup_form';
    	$this->load->view('includes/template',$data);
    }

    function create_member(){

    	$this->load->library('form_validation');

    	$this->form_validation->set_rules('first_name','Name', 'trim|required');
    	$this->form_validation->set_rules('last_name','Last Name', 'trim|required');
    	//$this->form_validation->set_rules('email_address','Email Address', 'trim|required|valid_email');

    	$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
    	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
    	$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');


    	if($this->form_validation->run()==FALSE){
    		$this->signup();
    	}
    	else{
    		$this->load->model('membership_model');
    		if($query = $this->membership_model->create_member()){
    			$data['main_content'] = 'signup_successful';
    			$this->load->view('includes/template', $data);
    		}
    		else{
    			$this->load->view('signup_form');
    		}
    	}




    }

    function non_member_handler(){
        $data['main_content'] = 'non_members';
        $this->load->view('includes/template',$data);
    }
    function about_page(){
        $this->load->view('about_page');
    }
    function contact_info(){
        $this->load->view('contact_page');
    }
    function view_logo(){
        $this->load->view('logo');
    }

}