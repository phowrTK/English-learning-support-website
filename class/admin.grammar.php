<?php 
include_once'Db.class.php';
class admingr
{
	protected $db;
	public function __construct()
	{
		$this->db=new Database();
	}
	public function show_grammar(){
		$limit = 6;  
		if (isset($_GET["page"])) {  
			$pn  = $_GET["page"];  
		}  
		else {  
			$pn=1;  
		};   
		$start_from = ($pn-1) * $limit;   
		$query="SELECT grammar.*,level.namelv
		FROM grammar 
		INNER JOIN level ON level.idlv=grammar.idlv LIMIT ".$start_from.",".$limit."
		";
		$result=mysqli_query($this->db->link,$query);
		return $result;
	}
	public function show_grammar_by_id($idgr){
		$query="SELECT grammar.*,level.namelv
		FROM grammar
		INNER JOIN level ON level.idlv=grammar.idlv 
		WHERE idgr='$idgr'";
		$result=mysqli_query($this->db->link,$query);
		return $result;
	}
	public function deletegr($idgr){
		$query= "DELETE FROM grammar WHERE idgr='$idgr'";
		$result= mysqli_query($this->db->link,$query);
		if ($result) {
			header('location:crud_grammar.php');
		}
		return $result;


	}
	public function selectgr($searchgr){
		$limit = 6;  
	if (isset($_GET["page"])) {  
		$pn=$_GET["page"];  
	}else {  
		$pn=1;  
	};   
	$start_from = ($pn-1) * $limit;   
		$query="SELECT * FROM grammar ".$searchgr." LIMIT ".$start_from.",".$limit." ";
		$result=mysqli_query($this->db->link,$query);
		return $result;
	}
	public function get_profile_byidgr($idgr){
		$query="SELECT * FROM grammar where idgr='$idgr'";
		$result=mysqli_query($this->db->link,$query);
		return $result;
	}
	public function insertgr($datagr,$files){

		$name=mysqli_real_escape_string($this->db->link,$datagr['name']);
		$idlv=mysqli_real_escape_string($this->db->link,$datagr['idlv']);
		$content=mysqli_real_escape_string($this->db->link,$datagr['content']);
		
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
			$query="INSERT INTO grammar(name,idlv,content,image)VALUES('$name','$idlv','$content','$unique_image')";
			$result=mysqli_query($this->db->link,$query);
			if ($result) {
			 //move_uploaded_file($image, '/upload');
				header('location:../admin/crud_grammar.php');
			}
		}
		
		return $result;
	}
	public function updategr($idgr,$datagr,$files){
		$name=mysqli_real_escape_string($this->db->link,$datagr['name']);
		$level=mysqli_real_escape_string($this->db->link,$datagr['idlv']);
		$content=mysqli_real_escape_string($this->db->link,$datagr['content']);
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
				$query="UPDATE grammar SET name='$name',idlv='$level',content='$content' WHERE idgr='$idgr' ";
				
			}else{
				move_uploaded_file($image_tmp,$uploaded_image); 
				$query="UPDATE grammar SET name='$name',idlv='$level',content='$content',image='$unique_image' WHERE idgr='$idgr' ";

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
		$query="SELECT * FROM grammar";
		$result=mysqli_query($this->db->link,$query);
		return $result;
	}	

	
}















?>