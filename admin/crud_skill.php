<?php
ob_start();
require_once '../class/Db.class.php';
include '../class/admin.skill.php';
include 'header.php';

?>
<?php 
$adminsk=new adminsk();


?>
<?php 
if (isset($_GET['delidsk'])) {
  $idsk=$_GET['delidsk'];
  $delidsk=$adminsk->deletesk($idsk);
  header('location:crud_skill.php');
}
?>
<?php 

if (isset($_POST['search'])) {
  $searchsk="WHERE name LIKE '%".$_POST['name']."%'";

}else{
  $searchsk="";

}




?>


<!-- /////////////////////////////////////aaaaaaaaaaaaaaaaaaaa -->

<div class="container-fluid">

  <div class="container">
    <h2></h2>

    <!-- Display status message -->




    <div class="row">
      <div class="col-md-12 head">

        <!-- Add link -->
        <div class="float-right">

          <form action="" method="post">
            <a href="insert_skill.php" class="btn btn-success" style="margin-right: 700px;" ><i class="plus"></i> New Skill</a>
            <style>
              input[type=submit] {
                border: none;
                backskound-color: blue;
                color: white
              }
            </style>
            <td>
              <input type="text" name="name">
              <input type="submit" name="search" value="Search" >
            </td>
          </form>
        </div>
      </div>

      <!-- List the users -->
      <table class="table table-striped table-bordered">
        <thead class="thead-dark">
          <tr>

            <th>Name</th>
            <th>IDlevel</th>
            <th>Content</th>
            <th>Media</th>
            <th>Action</th>
          </tr>
        </thead>
        <?php 
        $showsk=$adminsk->selectsk($searchsk);
        if ($showsk) {
          while ($data=mysqli_fetch_array($showsk)) {


           ?>
           <tbody id="userData">

            <tr>
              <td><?php echo $data['name'] ?></td>
              <td><?php echo $data['idlv'] ?></td>
              <td><?php  
              echo $content=substr($data['content'],0,275);
              ?>...<a href="../list_course.php?id=<?php echo $data['idkh'] ?>">[X??m Th??m]</a></td></td>
              <td>
                <audio controls>
                  <source src="./media/<?php echo $data['media']?>"  type="audio/mp3">
                  </audio>
                </td>
                <td>
                  <a href="updata_skill.php?id=<?php echo $data['idsk'] ?>" class="btn btn-warning">edit</a>
                  <a href="?delidsk=<?php echo $data['idsk'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete?');">delete</a>
                </td>
              </tr>
              <?php 
            }
          }
          ?>
        </tbody>
      </table>
      <ul style="margin-left: 500px" class="pagination"> 
      <?php   
      $query = $adminsk->countpage();   
      $total_records = mysqli_num_rows($query);   
      $total_pages = ceil($total_records / 6);   
      $pagLink = "";                         
      for ($i=1; $i<=$total_pages; $i++) {  
       $pagLink .= "<li class='list-group-item'><a href='crud_skill.php?page="
       .$i."'>".$i."</a></li>"; 
     }  
     echo $pagLink;   
     ?> 
   </ul> 
    </div>
  </div>
</div>


<?php include 'footer.php'; 
ob_end_flush();
?>








