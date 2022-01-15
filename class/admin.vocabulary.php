<?php 
include_once'Db.class.php';
class admintv
{
	protected $db;
	public function __construct()
	{
		$this->db=new Database();
	}
	public function show_vocabulary(){
		$limit = 6;  
		if (isset($_GET["page"])) {  
			$pn  = $_GET["page"];  
		}  
		else {  
			$pn=1;  
		};   
		$start_from = ($pn-1) * $limit;   
		$query="SELECT vocabulary.*,level.namelv
		FROM vocabulary 
		INNER JOIN level ON level.idlv=vocabulary.idlv LIMIT ".$start_from.",".$limit."
		";
		$result=mysqli_query($this->db->link,$query);
		return $result;
	}
	public function show_vocabulary_by_id($idtv){
		$query="SELECT vocabulary.*,level.namelv
		FROM vocabulary
		INNER JOIN level ON level.idlv=vocabulary.idlv 
		WHERE idtv='$idtv'";
		$result=mysqli_query($this->db->link,$query);
		return $result;
	}
	public function deletetv($idtv){
		$query= "DELETE FROM vocabulary WHERE idtv='$idtv'";
		$result= mysqli_query($this->db->link,$query);
		if ($result) {
			header('location:../admin/crud_vocaburaly.php');
		}
		return $result;


	}
	public function selecttv($searchtv){
		$limit = 6;  
	if (isset($_GET["page"])) {  
		$pn=$_GET["page"];  
	}else {  
		$pn=1;  
	};   
	$start_from = ($pn-1) * $limit;   
		$query="SELECT * FROM vocabulary ".$searchtv." LIMIT ".$start_from.",".$limit." ";
		$result=mysqli_query($this->db->link,$query);
		return $result;
	}
	public function get_profile_byidtv($idtv){
		$query="SELECT * FROM vocabulary where idtv='$idtv'";
		$result=mysqli_query($this->db->link,$query);
		return $result;
	}
	public function inserttv($datatv,$files){

		$name=mysqli_real_escape_string($this->db->link,$datatv['name']);
		$idlv=mysqli_real_escape_string($this->db->link,$datatv['idlv']);
		$content=mysqli_real_escape_string($this->db->link,$datatv['content']);
		
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
			$query="INSERT INTO vocabulary(name,idlv,content,image)VALUES('$name','$idlv','$content','$unique_image')";
			$result=mysqli_query($this->db->link,$query);
			if ($result) {
			 //move_uploaded_file($image, '/upload');
				header('location:../admin/crud_vocaburaly.php');
			}
		}
		
		return $result;
	}
	public function updatetv($idtv,$datatv,$files){
		$name=mysqli_real_escape_string($this->db->link,$datatv['name']);
		$level=mysqli_real_escape_string($this->db->link,$datatv['idlv']);
		$content=mysqli_real_escape_string($this->db->link,$datatv['content']);
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
				$query="UPDATE vocabulary SET name='$name',idlv='$level',content='$content' WHERE idtv='$idtv' ";
				
			}else{
				move_uploaded_file($image_tmp,$uploaded_image); 
				$query="UPDATE vocabulary SET name='$name',idlv='$level',content='$content',image='$unique_image' WHERE idtv='$idtv' ";

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
		$query="SELECT * FROM vocabulary";
		$result=mysqli_query($this->db->link,$query);
		return $result;
	}	

	
}















?>