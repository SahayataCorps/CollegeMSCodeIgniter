<?php

class Queries extends CI_Model
{

	public function getRoles()
	{
		$roles = $this->db->get('role');
		if($roles->num_rows() >0)
		{
			return $roles->result();
		}
	}

	public function getGenders()
	{
		$genders = $this->db->get('genders');
		if($genders->num_rows() > 0)
		{
			return $genders->result();
		}
	}

	public function insertUsers($data)
	{	

		return $this->db->insert('users', $data);
	}

	public function getPassword($email, $password)
	{
		$data = $this->db->get_where('users', array('email' =>$email, 'password'=>$password, 'role'=>'admin'));
		return $data->result();
	}

	public function isEmailExist($email, $table='users' ,$studentId = 0)
	{	if($studentId==0){
		$data = $this->db->get_where($table, array('email' =>$email));}
		else
		{
			$data = $this->db->get_where($table, array('email' =>$email, 'studentId !='=>$studentId));
		}
		$data = $data->result();
		if(isset($data[0]))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}

	public function addCollege($data)
	{	
		return $this->db->insert("colleges",$data);
	}

	public function getColleges()
	{
		$data = $this->db->get("colleges");
		return $data->result();
	}


	public function insertstudents($data)
	{	

		return $this->db->insert('student', $data);
	}

	public function getCoadmin()
	{
		$this->db->select("colleges.collegeId, collegename, branch ,username ,email , gender , role");
		$this->db->from("colleges");
		$this->db->join("users","colleges.collegeId = users.collegeId");
		$data = $this->db->get();
		return $data->result();
	}

	public function getStudents($collegeId)
	{
		$this->db->select("colleges.collegeId, collegename, branch, studentId, username, email, gender, course");
		$this->db->from("colleges");
		$this->db->join("student","colleges.collegeId = student.collegeId");
		$this->db->where("colleges.collegeId = ".$collegeId);
		$data = $this->db->get();
		return $data->result();
	}

	public function getCollegeName($collegeId)
	{
		$this->db->select("collegeName, branch");
		$this->db->from("colleges");
		$this->db->where("collegeId = ".$collegeId);
		$data = $this->db->get();
		return $data->result();
	}

	public function editGetStudent($studentId)
	{
		$this->db->select("colleges.collegeId, collegename, branch, studentId, username, email, gender, course");
		$this->db->from("colleges");
		$this->db->join("student","colleges.collegeId = student.collegeId");
		$this->db->where("studentId = ".$studentId);
		$data = $this->db->get();
		return $data->result();	
	}

	public function updateStudent($data, $studentId)
	{	$this->db->where("studentid",$studentId);
		return $this->db->update("student",$data);

	}

	public function deleteStudent($studentId)
	{
		$this->db->where('studentId',$studentId);
		return $this->db->delete("student");
	}

}

?>