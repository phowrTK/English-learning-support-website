<?php 
/**
 * 
 */
include_once'Db.class.php';
class admin
{
	protected $db;
	public function __construct()
	{
		$this->db=new Database();
	}
	public function delete($id){
		$query= "DELETE FROM account WHERE id='$id'";
		$result= mysqli_query($this->db->link,$query);
		if ($result) {
			header('location:../admin/listadmin.php');
		}
		return $result;
	}
	public function select($search){
		$query="SELECT * FROM account ".$search." ";
		$result=mysqli_query($this->db->link,$query);
		return $result;
	}
	public function get_profile_byid($id){
		$query="SELECT * FROM account where id='$id'";
		$result=mysqli_query($this->db->link,$query);
		return $result;
	}
	public function insert($data){
		$name=mysqli_real_escape_string($this->db->link,$data['name']);
		$email=mysqli_real_escape_string($this->db->link,$data['email']);
		$phone=mysqli_real_escape_string($this->db->link,$data['phone']);
		$password=mysqli_real_escape_string($this->db->link,$data['password']);
		$password=md5($password);
		$address=mysqli_real_escape_string($this->db->link,$data['address']);
		$query="INSERT INTO account(name,email,phone,password,address)VALUES('$name','$email','$phone','$password','$address')";
		$result=mysqli_query($this->db->link,$query);
		if ($result) {
			header('location:../admin/listadmin.php');
		}
		return $result;
	}
	public function show_id_account($id){
		$query="SELECT * FROM account WHERE id='$id'";
		$result=mysqli_query($this->db->link,$query);
		 // if ($result) {
		 // 	$success='<span class="text-success">Update Success</span>';
		 // 	return $success;
		 // }else{
		 // 	$error='<span class="text-danger">Update Fail</span>';
		 // 	return $error;

		 // }
		return $result;
	}
	public function update($id,$data){
		$name=mysqli_real_escape_string($this->db->link,$data['name']);
		$email=mysqli_real_escape_string($this->db->link,$data['email']);
		$phone=mysqli_real_escape_string($this->db->link,$data['phone']);
		$address=mysqli_real_escape_string($this->db->link,$data['address']);
		$query="UPDATE account SET name='$name',email='$email',phone='$phone',address='$address' WHERE id='$id' ";
		$result=mysqli_query($this->db->link,$query);
		if ($result) {
			$success='<span class="text-success">Update Success </span>';
			return $success;
		}else{
			$error='<span class="text-danger">Update Fail</span>';
			return $error;
		}
		return $result;
	}
	public function countadmin(){
		$query="SELECT COUNT(*) FROM account";
		$result=mysqli_query($this->db->link,$query);
		return $result;
	}
	public function countcourse(){
		$query="SELECT COUNT(*) FROM course";
		$result=mysqli_query($this->db->link,$query);
		return $result;
	}
	public function countgrammar(){
		$query="SELECT COUNT(*) FROM grammar";
		$result=mysqli_query($this->db->link,$query);
		return $result;
	}
	public function countskill(){
		$query="SELECT COUNT(*) FROM skill";
		$result=mysqli_query($this->db->link,$query);
		return $result;
	}
	public function countvocabulary(){
		$query="SELECT COUNT(*) FROM vocabulary";
		$result=mysqli_query($this->db->link,$query);
		return $result;
	}
}
?>