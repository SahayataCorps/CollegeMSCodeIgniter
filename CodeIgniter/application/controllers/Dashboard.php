<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
 
 public function index()
 {	$data  = $this->queries->getCoadmin();
 	/*echo "<pre>";
 	print_r($data);
 	echo "</pre>";
 	*/$this->load->view("admin/dashboard",['data'=>$data]);
 	
 } 

 public function addCollege()
 {
 	$this->load->view("admin/addCollege");
 }

 public function createCollege()
 {
 	$this->form_validation->set_rules("collegename","Collge Name", "required");
 	$this->form_validation->set_rules("branch","Branch Name", "required");
 	if($this->form_validation->run()){
 	$data = $this->input->post();
 	$this->load->model("queries");
 	if($this->queries->addCollege($data)){
 	$this->session->set_flashdata("message","College Added");}
 	else{
 		 	$this->session->set_flashdata("wrongmessage","College Not Added");
 	
 	}
 	return redirect("Dashboard/addCollege");
 	}
 	else
 	{
 		$this->addCollege();
 	}
 }

 public function addCoadmin()
 {
 	
 	$colleges = $this->queries->getColleges();
 	$genders = $this->queries->getGenders();
 	$rows = $this->queries->getRoles();
 	$this->load->view("admin/addCoadmin",["colleges"=>$colleges,"genders"=>$genders, 'roles'=>$rows]);

 }

 public function createCoadmin()
 {
 		$this->form_validation->set_rules('username','Username','required');
 		$this->form_validation->set_rules('collegeId','College Name','required');
		$this->form_validation->set_rules('email','Email Id','required');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('role','Role','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('confirmpass','Confirm Password','required');
		if($this->form_validation->run())
		{	$data = $this->input->post();
			
			if($data['password'] == $data['confirmpass'])
			{	if($this->queries->isEmailExist($data['email']))
				{
					$this->session->set_flashdata("wrongmessage", "Email Id Exist");
						
				}
				else{
				$data['password'] = sha1($data['password']);
				$data['confirmpass'] = sha1($data['confirmpass']);
				
				if($this->queries->insertUsers($data))
				{
					$this->session->set_flashdata("message","Co Admin Created");
				}
				else
				{
					$this->session->set_flashdata("wrongmessage", "Failed to Create Co Admin");
				}
				
				
				}
				return redirect("Dashboard/addCoadmin");
			}
			else
			{
				$this->session->set_flashdata("wrongmessage", "Password and Confirm Password Should be Same");
				return redirect("Dashboard/addCoadmin");
			}
		}
		else{
			$this->addCoadmin();
		}
 }

 public function addStudent()
 {
 	$colleges = $this->queries->getColleges();
 	$genders = $this->queries->getGenders();
 	
 	$this->load->view("admin/addStudent",["colleges"=>$colleges,"genders"=>$genders]);
 }

 public function createstudent()
 {	$this->form_validation->set_rules('username','Username','required');
 		$this->form_validation->set_rules('collegeId','College Name','required');
		$this->form_validation->set_rules('email','Email Id','required');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('course','Course Name','required');

		if($this->form_validation->run())
		{	$data = $this->input->post();
			
				if($this->queries->isEmailExist($data['email']) || $this->queries->isEmailExist($data['email'],"student"))
				{
					$this->session->set_flashdata("wrongmessage", "Email Id Exist");
						
				}
				else{
				if($this->queries->insertStudents($data))
				{
					$this->session->set_flashdata("message","Student Added");
				}
				else
				{
					$this->session->set_flashdata("wrongmessage", "Failed to Add Student");
				}
				
				
				}
				return redirect("Dashboard/addStudent");
			
		}
		else{
			$this->addStudent();
		}

 }

 public function viewStudents($collegeId)
  {		$data = $this->queries->getStudents($collegeId);
  		$colleges = $this->queries->getCollegeName($collegeId);
  		foreach ($colleges as $college ) {
  		$collegeName = $college->collegeName." ".$college->branch;
  			
  		}
  		/*echo "<pre>";
  		print_r($collegeName);
  		echo "</pre>";*/
  		$this->load->view("admin/viewStudents",["data"=>$data,"collegeName"=>$collegeName]);
  }

  public function editStudent($studentId)
  {
  		$data = $this->queries->editGetStudent($studentId)[0];
  		$colleges = $this->queries->getColleges();
 		$genders = $this->queries->getGenders();
 	
  		$this->load->view("admin/editStudent",["data"=>$data, "colleges"=>$colleges,"genders"=>$genders]);

  }

  public function updateStudent($studentId)
  { $this->form_validation->set_rules('username','Username','required');
 		$this->form_validation->set_rules('collegeId','College Name','required');
		$this->form_validation->set_rules('email','Email Id','required');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('course','Course Name','required');

		if($this->form_validation->run())
		{	$data = $this->input->post();
			
				if($this->queries->isEmailExist($data['email']) || $this->queries->isEmailExist($data['email'],"student",$studentId))
				{
					$this->session->set_flashdata("wrongmessage", "Email Id Exist");
						
				}
				else{
				if($this->queries->updateStudent($data, $studentId))
				{
					$this->session->set_flashdata("message","Student Detail Updated");
				}
				else
				{
					$this->session->set_flashdata("wrongmessage", "Failed to Update Student");
				}
				
				
				}
				return redirect("Dashboard/index");
			
		}
		else{
			$this->editStudent($studentId);
		}


  }

  public function deleteStudent($collegeId, $studentId)
  {
  	if($this->queries->deleteStudent($studentId))
  	{
  		$this->session->set_flashdata("message","Student Deleted");
  	}
  	else
  	{
  		$this->session->set_flashdata("wrongmessage","Failed to Delete Student");
  	}
  	$this->viewStudents($collegeId);
  }

 public function __construct(){
	parent::__construct();
	$sessinfo = $this->session->userdata();
 	if(!isset($sessinfo['user_id']))
 	{		return redirect('Admin/login_page');
 		
 	}
 	$this->load->model('queries');
 }


}
