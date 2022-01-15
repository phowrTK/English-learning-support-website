<?php 

session_start();

session_destroy(); // huy session co key la profile

header('location: index.php');



?>