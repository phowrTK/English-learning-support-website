<?php 
include_once'Db.class.php';
class adminsk
{
	protected $db;
	public function __construct()
	{
		$this->db=new Database();
	}
	public function show_skill(){
		$limit = 6;  
		if (isset($_GET["page"])) {  
			$pn  = $_GET["page"];  
		}  
		else {  
			$pn=1;  
		};   
		$start_from = ($pn-1) * $limit;   
		$query="SELECT skill.*,level.namelv
		FROM skill 
		INNER JOIN level ON level.idlv=skill.idlv LIMIT ".$start_from.",".$limit."
		";
		$result=mysqli_query($this->db->link,$query);
		return $result;
	}
	public function show_skill_by_id($idsk){
		$query="SELECT skill.*,level.namelv
		FROM skill
		INNER JOIN level ON level.idlv=skill.idlv 
		WHERE idsk='$idsk'";
		$result=mysqli_query($this->db->link,$query);
		return $result;
	}
	public function deletesk($idsk){
		$query= "DELETE FROM skill WHERE idsk='$idsk'";
		$result= mysqli_query($this->db->link,$query);
		if ($result) {
			header('location:crud_skill.php');
		}
		return $result;


	}
	public function selectsk($searchsk){
		$limit = 6;  
	if (isset($_GET["page"])) {  
		$pn=$_GET["page"];  
	}else {  
		$pn=1;  
	};   
	$start_from = ($pn-1) * $limit;   
		$query="SELECT * FROM skill ".$searchsk." LIMIT ".$start_from.",".$limit." ";
		$result=mysqli_query($this->db->link,$query);
		return $result;
	}
	public function get_profile_byidsk($idsk){
		$query="SELECT * FROM skill where idsk='$idsk'";
		$result=mysqli_query($this->db->link,$query);
		return $result;
	}
	public function insertsk($datask,$files){
		$name=mysqli_real_escape_string($this->db->link,$datask['name']);
		$idlv=mysqli_real_escape_string($this->db->link,$datask['idlv']);
		$content=mysqli_real_escape_string($this->db->link,$datask['content']);
		$media_name = $files['media']['name'];
		$media_tmp = $files['media']['tmp_name'];
		$media_size=$files['media']['size'];
		$div=explode('.', $media_name);
		$file_ext=strtolower(end($div));
		$unique_media=substr(md5(time()), 0, 10).'.'.$file_ext;
		$uploaded_media="../admin/media/".$unique_media;
   		  // Cho phép kích thước tối đa của file là 5MB
		$maxsize = 5 * 1024 * 1024;
		if ($media_size>$maxsize) {
			$error="Kích Thước Quá Lớn !!";
			return $error;
		}else{
			move_uploaded_file($media_tmp,$uploaded_media);
			$query="INSERT INTO skill(name,idlv,content,media)VALUES('$name','$idlv','$content','$unique_media')";
			$result=mysqli_query($this->db->link,$query);
			if ($result) {
			 //move_uploaded_file($media, '/upload');
				header('location:../admin/crud_skill.php');
			}
		}
		
		return $result;
	}
	public function updatesk($idsk,$datask,$files){
		$name=mysqli_real_escape_string($this->db->link,$datask['name']);
		$level=mysqli_real_escape_string($this->db->link,$datask['idlv']);
		$content=mysqli_real_escape_string($this->db->link,$datask['content']);
		$media_name = $files['media']['name'];
		$media_tmp = $files['media']['tmp_name'];
		$media_size=$files['media']['size'];
		$div=explode('.', $media_name);
		$file_ext=strtolower(end($div));
		$unique_media=substr(md5(time()), 0, 10).'.'.$file_ext;
		$uploaded_media="../admin/media/".$unique_media;
   		  // Cho phép kích thước tối đa của file là 5MB
		$maxsize = 5 * 1024 * 1024;
		if ($media_size>$maxsize) {
			$error="Kích Thước Quá Lớn !!";
			return $error;
		}else{
			if ($media_name==null) {
				$query="UPDATE skill SET name='$name',idlv='$level',content='$content' WHERE idsk='$idsk' ";
				
			}else{
				move_uploaded_file($media_tmp,$uploaded_media);
				$query="UPDATE skill SET name='$name',idlv='$level',content='$content',media='$unique_media' WHERE idsk='$idsk'";

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
		$query="SELECT * FROM skill";
		$result=mysqli_query($this->db->link,$query);
		return $result;
	}	


	
}















?>