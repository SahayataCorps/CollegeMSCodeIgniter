<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		//$this->load->view('welcome_message');
		echo "<h1>This is Code</h1>";
	}
	public function second()
	{
		$this->load->view("secondPage");
		$this->load->view("welcome_message");
	
	}
	public function workers()
	{
		$details = array(
			array('name' => 'Adarsh',
				  'age'=>21,
				   'phone'=>9983778869),
			array('name' => 'Shivam', 
					'age'=>20,
				    'phone'=>7598754565)
					   );

		$this->load->view("workers", ["det"=>$details]);
	}
	public function home()
	{
		$this->load->view("home.php");
	}
}
