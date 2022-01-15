<?php 
include_once'Db.class.php';
class adminkh
{
	protected $db;
	public function __construct()
	{
		$this->db=new Database();
	}
	public function show_course(){
		$limit = 6;  
	if (isset($_GET["page"])) {  
		$pn  = $_GET["page"];  
	}  
	else {  
		$pn=1;  
	};   
	$start_from = ($pn-1) * $limit;   
		$query="SELECT course.*,level.namelv
		FROM course 
		INNER JOIN level ON level.idlv=course.idlv LIMIT ".$start_from.",".$limit."
		";
		$result=mysqli_query($this->db->link,$query);
		return $result;
	}
	public function show_course_by_id($idkh){
		$query="SELECT course.*,level.namelv
		FROM course
		INNER JOIN level ON level.idlv=course.idlv 
		WHERE idkh='$idkh'";
		$result=mysqli_query($this->db->link,$query);
		return $result;
	}
	public function deletekh($idkh){
		$query= "DELETE FROM course WHERE idkh='$idkh'";
		$result= mysqli_query($this->db->link,$query);
		if ($result) {
			header('location: crud_course.php');
		}
		return $result;


	}
	public function selectkh($searchkh){
		$limit = 6;  
		if (isset($_GET["page"])) {  
			$pn=$_GET["page"];  
		}else {  
			$pn=1;  
		};   
		$start_from = ($pn-1) * $limit;   
		$query="SELECT * FROM course ".$searchkh." LIMIT ".$start_from.",".$limit." ";
		$result=mysqli_query($this->db->link,$query);
		return $result;
	}
	public function get_profile_byidkh($idkh){
		$query="SELECT * FROM course where idkh='$idkh'";
		$result=mysqli_query($this->db->link,$query);
		return $result;
	}
	
	public function insertkh($datakh,$files){
		$name=mysqli_real_escape_string($this->db->link,$datakh['name']);
		$idlv=mysqli_real_escape_string($this->db->link,$datakh['idlv']);
		$content=mysqli_real_escape_string($this->db->link,$datakh['content']);
		$image_name = $files['image']['name'];
		$image_tmp = $files['image']['tmp_name'];
		$image_size=$files['image']['size'];
		$div=explode('.', $image_name);
		$file_ext=strtolower(end($div));
		$unique_image=substr(md5(time()), 0, 10).'.'.$file_ext;
		$uploaded_image="../admin/uploads/".$unique_image;
   		  // Cho phép kích thước tối đa của file là 5MB
		$maxsize = 5 * 1024 * 1024;
		if ($image_size>$maxsize) {
			$error="Kích Thước Quá Lớn !!";
			return $error;
		}else{
			move_uploaded_file($image_tmp,$uploaded_image);
			$query="INSERT INTO course(name,idlv,content,image)VALUES('$name','$idlv','$content','$unique_image')";
			$result=mysqli_query($this->db->link,$query);
			if ($result) {
			 //move_uploaded_file($image, '/upload');
				header('location:../admin/crud_course.php');
			}
		}
		
		return $result;
	}
	public function updatekh($idkh,$datakh,$files){
		$name=mysqli_real_escape_string($this->db->link,$datakh['name']);
		$level=mysqli_real_escape_string($this->db->link,$datakh['idlv']);
		$content=mysqli_real_escape_string($this->db->link,$datakh['content']);
		$image_name = $files['image']['name'];
		$image_tmp = $files['image']['tmp_name'];
		$image_size=$files['image']['size'];
		$div=explode('.', $image_name);
		$file_ext=strtolower(end($div));
		$unique_image=substr(md5(time()), 0, 10).'.'.$file_ext;
		$uploaded_image="../admin/uploads/".$unique_image;
   		  // Cho phép kích thước tối đa của file là 5MB
		$maxsize = 5 * 1024 * 1024;
		if ($image_size>$maxsize) {
			$error="Kích Thước Quá Lớn !!";
			return $error;
		}else{
			if ($image_name==null) {
				$query="UPDATE course SET name='$name',idlv='$level',content='$content' WHERE idkh='$idkh' ";
			}else{
				move_uploaded_file($image_tmp,$uploaded_image); 
				$query="UPDATE course SET name='$name',idlv='$level',content='$content',image='$unique_image' WHERE idkh='$idkh' ";

			}
			
			$result=mysqli_query($this->db->link,$query);

			if ($result) {
				$success='<span class="text-success">Update Success </span>';
				return $success;
			}else{
				$error='<span class="text-danger">Update Fail</span>';
				return $error;

			}
		}
		return $result;
	}
	public function show_level(){
		$query="SELECT * FROM level";
		$result=mysqli_query($this->db->link,$query);
		return $result;
	}
	public function countpage(){
		$query="SELECT * FROM course";
		$result=mysqli_query($this->db->link,$query);
		return $result;
	}	


	
}















?>