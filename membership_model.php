<?php

class Membership_model extends CI_Model{

	function validate()
	{   
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', $this->input->post('password'));
		$query = $this->db->get('members');

		if($query->num_rows() == 1){
			return true;
		}
		else
			return false;

	}

     //mysql function used here
	function get_member_type()
	{
		/*$this->db->select('member_type');
		$this->db->from('members');
		$this->db->where('username',$this->input->post('username'));

     	$q = $this->db->get();

        return $q->row()->member_type;*/
        $sql = "select get_member_type(?) as result";
		$query = $this->db->query($sql, array( $this->input->post('username')));
		$result = $query->row()->result;
		return $result;
     }
     
     function get_first_name(){



     	//SET @p0='1205031'; CALL `get_member_type`(@p0, @p1); SELECT @p1 AS `MMT`;

     	$this->db->query("SET @p0=?;",$this->input->post('username'));
     	$this->db->query("CALL `get_member_type`(@p0, @p1);");
     	$q =$this->db->query("SELECT @p1 AS `MMT`;");

     	return $q->result()[0]->MMT;    
		/*$this->db->select('first_name');
		$this->db->from('members');
		$this->db->where('username',$this->input->post('username'));

     	$q = $this->db->get();*/ 

      	
     }
      function get_last_name(){
		$this->db->select('last_name');
		$this->db->from('members');
		$this->db->where('username',$this->input->post('username'));

     	$q = $this->db->get();

        return $q->row()->last_name;     	
     }

	function create_member()
	{
		$new_member_insert_data = array(
			'member_id' => $this->input->post('member_id'),
			'member_type' => $this->input->post('member_type'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email' => $this->input->post('email'),
			'blood_group' => $this->input->post('blood_group'),
			'contact_number' => $this->input->post('contact_number')
	
			);
		$new_s_insert_data = array(
			'student_id' => $this->input->post('member_id'),	
			);
		$new_t_insert_data = array(
			'teacher_id' => $this->input->post('member_id'),	
			);
		$new_a_insert_data = array(
			'admin_id' => $this->input->post('member_id'),	
			);


		$insert = $this->db->insert('members', $new_member_insert_data);

		if(!$insert) return $insert;

		if($this->input->post('member_type')=='student') 
			$this->db->insert('students', $new_s_insert_data);
		else if($this->input->post('member_type')=='teacher')
			$this->db->insert('teachers', $new_t_insert_data);
		else if($this->input->post('member_type')=='admin')
			$this->db->insert('admins', $new_a_insert_data);
		return $insert;
	}
	function get_student_info(){
	   $this->db->select('*');
       $this->db->from('members');
       $this->db->where('username',$this->session->userdata('username'));

       $this->db->join('students', 'students.student_id = members.member_id');


       $q = $this->db->get();

		if($q->num_rows() > 0){

		 foreach ($q->result() as $row)
         {
       	  $data[] = $row;
         } 
         return $data;
     }
 }

     function get_teacher_info(){
	   $this->db->select('*');
       $this->db->from('members');
       $this->db->where('username',$this->session->userdata('username')); 

       $this->db->join('teachers', 'teachers.teacher_id = members.member_id');

       $q = $this->db->get();

		if($q->num_rows() > 0){

		 foreach ($q->result() as $row)
         {
       	  $data[] = $row;
         } 
         return $data;
     }

    }

    function update_student_info(){
		$new_member_update_data = array(
			'level_and_term' => $this->input->post('level_and_term'),
			'hall' => $this->input->post('hall'),
			'adviser_id' => $this->input->post('adviser_id')
			);
		$for_member_table = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email' => $this->input->post('email'),
			'blood_group' => $this->input->post('blood_group'),
			'contact_number' => $this->input->post('contact_number')
			);

 		$sql = "Select member_id from members where username = ?";
		$q = $this->db->query($sql,$this->session->userdata('username'));
		$this->db->where('student_id', $q->row()->member_id);
        $update = $this->db->update('students',$new_member_update_data);

        $sql = "Select member_id from members where username = ?";
		$q = $this->db->query($sql,$this->session->userdata('username'));
		$this->db->where('member_id', $q->row()->member_id);
        $update2 = $this->db->update('members',$for_member_table);

        if($update and $update2) 
        	return $update;
        else if($update or $update2) {
        	if($update) 
        		return $update;
        	else 
        		return $update2;
        }
        else 
        	return NULL;
    }
    function update_teacher_info(){
		$new_member_update_data = array(
			'room_number' => $this->input->post('room_number'),
			'designation' => $this->input->post('designation')
			);
		$for_member_table = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email' => $this->input->post('email'),
			'blood_group' => $this->input->post('blood_group'),
			'contact_number' => $this->input->post('contact_number')
			);
 		$sql = "Select member_id from members where username = ?";
		$q = $this->db->query($sql,$this->session->userdata('username'));
		$this->db->where('teacher_id', $q->row()->member_id);
        $update = $this->db->update('teachers',$new_member_update_data);

        $sql = "Select member_id from members where username = ?";
		$q = $this->db->query($sql,$this->session->userdata('username'));
		$this->db->where('member_id', $q->row()->member_id);
        $update2 = $this->db->update('members',$for_member_table);

        if($update and $update2) 
        	return $update;
        else if($update or $update2) {
        	if($update) 
        		return $update;
        	else 
        		return $update2;
        }
        else 
        	return NULL;
    }

    function view_student_profile_not_by_himself(){
	   $this->db->select('*');
       $this->db->from('members');
       $this->db->where('member_id',$this->uri->segment(3));

       $this->db->join('students', 'students.student_id = members.member_id');


       $q = $this->db->get();

		if($q->num_rows() > 0){

		 foreach ($q->result() as $row)
         {
       	  $data[] = $row;
         } 
         return $data;
     }
 }

 function view_teacher_profile_not_by_himself(){	   
 	   $this->db->select('*');
       $this->db->from('members');
       $this->db->where('member_id',$this->uri->segment(3));

       $this->db->join('teachers', 'teachers.teacher_id = members.member_id');


       $q = $this->db->get();

		if($q->num_rows() > 0){

		 foreach ($q->result() as $row)
         {
       	  $data[] = $row;
         } 
         return $data;
     }

 }


}