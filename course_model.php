
<?php

 class Course_model extends CI_Model{

    function add_a_course(){		
    	 $new_course_insert_data = array(
			'course_id' => $this->input->post('course_id'),
			'course_name' => $this->input->post('course_name'),
			'level_and_term' => $this->input->post('level_and_term'),
			'number_of_credits' => $this->input->post('number_of_credits'),
            'course_description' => $this->input->post('course_description')
			);

		$insert = $this->db->insert('courses', $new_course_insert_data);
		return $insert;
    }
    function assign_teacher_to_a_course(){
        $new_course_insert_data = array(
            'course_id' => $this->input->post('course_id'),
            'teacher_id' => $this->input->post('teacher_id')
            );
        $insert = $this->db->insert('teaches', $new_course_insert_data);
        return $insert;       

    }

    function display_course_list_of_student(){

        //
		$this->db->select('member_id');
		$this->db->from('members');
		$this->db->where('username',$this->session->userdata('username'));
		$where_clause = $this->db->get_compiled_select();

		//
		$this->db->select('level_and_term');
		$this->db->from('students');
		$this->db->where("`student_id` = ($where_clause)", NULL, FALSE);	

		$where2 = $this->db->get_compiled_select();

        //
	    $this->db->select('course_id,course_name');
        $this->db->from('courses');
        $this->db->where("`level_and_term` = ($where2)", NULL, FALSE);	

        $q = $this->db->get();

		if($q->num_rows() > 0){

		 foreach ($q->result() as $row)
         {
       	  $data[] = $row;
         } 
         return $data;
     }
    }
    function display_all_courses(){
        $this->db->select('*');
        $this->db->from('courses');
        $q = $this->db->get();
        if($q->num_rows() > 0){

         foreach ($q->result() as $row)
         {
          $data[] = $row;
         } 
         return $data;
     }       
    }
    function display_course_list_of_teacher(){
    	//
		$this->db->select('member_id');
		$this->db->from('members');
		$this->db->where('username',$this->session->userdata('username'));
		$where_clause = $this->db->get_compiled_select();
		//
	    $this->db->select('course_id');
        $this->db->from('teaches');
        $this->db->where("`teacher_id` = ($where_clause)" , NULL, FALSE);	
        $where_clause2 = $this->db->get_compiled_select();

	    $this->db->select('course_id,course_name');
        $this->db->from('courses');
        $this->db->where("`course_id` IN ($where_clause2)" , NULL, FALSE);	

        $q = $this->db->get();

		if($q->num_rows() > 0){

		 foreach ($q->result() as $row)
         {
       	  $data[] = $row;
         } 
         return $data;
     }

    }
  
    function show_course_detail(){

		$this->db->select('*');
		$this->db->from('courses');
		$this->db->where('course_id',$this->uri->segment(3));

		$q = $this->db->get();
		if($q->num_rows() > 0){

		 foreach ($q->result() as $row)
         {
       	  $data[] = $row;
         } 
         return $data;
     }
 }
     function show_course_teachers(){
     	$this->db->select('teacher_id');
		$this->db->from('teaches');
		$this->db->where('course_id',$this->uri->segment(3));
		$where_clause = $this->db->get_compiled_select();

		$this->db->select('first_name,last_name,member_id');
		$this->db->from('members');
		$this->db->where("`member_id` IN ($where_clause)", NULL, FALSE);

		$q = $this->db->get();
		if($q->num_rows() > 0){

		 foreach ($q->result() as $row)
         {
       	  $data[] = $row;
         } 
         return $data;
     }

     }
     function display_all_teachers(){
        $this->db->select('member_id,first_name,last_name');
        $this->db->from('members');
        $this->db->where('member_type','teacher');

        $q = $this->db->get();
        if($q->num_rows() > 0){

         foreach ($q->result() as $row)
         {
          $data[] = $row;
         } 
         return $data;
     }        
     }

     function show_course_registered_students(){
        $this->db->select('level_and_term');
		$this->db->from('courses');
		$this->db->where('course_id',$this->uri->segment(3));
		$where_clause = $this->db->get_compiled_select();

		$this->db->select('student_id');
		$this->db->from('students');
		$this->db->where("`level_and_term` IN ($where_clause)", NULL, FALSE);
		$where_clause2 = $this->db->get_compiled_select();

		$this->db->select('first_name,last_name,member_id');
		$this->db->from('members');
		$this->db->where("`member_id` IN ($where_clause2)", NULL, FALSE);

		$q = $this->db->get();
		if($q->num_rows() > 0){

		 foreach ($q->result() as $row)
         {
       	  $data[] = $row;
         } 
         return $data;
     }	
     }

     function show_course_forum_posts(){
        $this->db->select('*');
		$this->db->from('course_forum');
		$this->db->where('course_id',$this->uri->segment(3));
		$q = $this->db->get();
		if($q->num_rows() > 0){

		 foreach ($q->result() as $row)
         {
       	  $data[] = $row;
         } 
         return $data;
     }
          else 
     		return NULL;	

     }

     function add_a_forum_post(){

        $this->db->select_max('entry_no');
        $query = $this->db->get('course_forum');  
        $q = $query->row()->entry_no ;
        $q = $q + 1;  
          $new_post_dec = array(
            'entry_no' =>  $q,
            'course_id' => $this->uri->segment(3),
            'forum_post' => $this->input->post('forum_post')
            );
        
        if(!$this->input->post('forum_post'))
        return FALSE;    
          
        $insert = $this->db->insert('course_forum', $new_post_dec);
        return $insert;         
     }

     function delete_a_forum_post(){
        $e_no = intval($this->uri->segment(3));
        $q = $this->db->delete('course_forum', array('entry_no' => $e_no,'course_id' => $this->uri->segment(4))); 
        return $q;       
     }



    function do_upload($course_id,$temp){

        $config['file_name'] = $temp;

        $new_file = array(
            'course_id' => $course_id,
            'file_name' => $temp
            );    
        $insert =$this->db->insert('course_materials', $new_file);
        return $insert;    

    }

    function show_uploaded_course_files(){
        $this->db->select('*');
        $this->db->from('course_materials');
        $this->db->where('course_id',$this->uri->segment(3));
        $q = $this->db->get();
        if($q->num_rows() > 0){

         foreach ($q->result() as $row)
         {
          $data[] = $row;
         } 
         return $data;
     }
          else 
            return NULL;          
}


}