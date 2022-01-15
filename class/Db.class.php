<?php 
	/**
	 * 
	 */
	class Database
	{
	public	$host="localhost";
	public	$usesname="root";
	public	$password="";
	public	$db="doan";

	public $link;

		public function __construct()
		{
			$this->connect();
			
		}
	private function connect(){
			$this->link=mysqli_connect($this->host,$this->usesname,$this->password,$this->db);

		}
	}
	



 ?>