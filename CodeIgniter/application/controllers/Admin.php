<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		echo "RETRY";
		$this->load->view("home");
	}
	public function register()
	{	
		$this->load->model('queries');
		$rows = $this->queries->getRoles();
		$genders = $this->queries->getGenders();
		$this->load->view("admin/Admin_Register",['roles'=>$rows,'genders'=>$genders]);
	}

	public function signup()
	{
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('email','Email Id','required');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('role','Role','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('confirmpass','Confirm Password','required');
		if($this->form_validation->run())
		{	$this->load->model('queries');
			$data = $this->input->post();
			/*echo "<pre>";
			print_r($data);
			echo "</pre>";
			echo ;
			*/
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
					$this->session->set_flashdata("message","Admin Created");
				}
				else
				{
					$this->session->set_flashdata("wrongmessage", "Failed to Create Admin");
				}
				
				
				}
				return redirect("Admin/register");
			}
			else
			{
				$this->session->set_flashdata("wrongmessage", "Password and Confirm Password Should be Same");
				return redirect("Admin/register");
			}
		}
		else
		{   
			$this->register();
		}
	}

	public function login_page()
	{
 	if($this->session->userdata('user_id'))
 	{		return redirect('Dashboard/index');
 		
 	}else{
		$this->load->view("admin/Admin_Login");
 	}
	}

	public function login()
	{
		$this->form_validation->set_rules("email", "Email", "required");
		$this->form_validation->set_rules("password", "Password", "required");
		if($this->form_validation->run())
		{
			$this->load->model('queries');
			$data = $this->input->post();
			$email = $data['email'];
			$retData = $this->queries->getPassword($email, sha1($data['password']));
			if(isset($retData[0]))
			{	echo "login";
				$sessionData = array(
					'user_id' => $retData[0]->user_id,
					'username' => $retData[0]->username,
					'email' => $retData[0]->email,
					'role' => $retData[0]->role
				);
				$this->session->set_userdata($sessionData);
				$this->session->set_flashdata("message","Login Successful");
				return redirect('Dashboard/index');
			}
			else{echo "login failed";
				 $this->session->set_flashdata("wrongmessage","Login Failed");
				 return redirect('admin/login_page');
			}
			

		}
		else
		{
			$this->login_page();
		}
	}

	}
?>