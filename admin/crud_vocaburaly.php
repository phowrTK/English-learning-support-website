<?php
ob_start();
require_once '../class/Db.class.php';
include '../class/admin.vocabulary.php';
include 'header.php';

?>
<?php 
$admintv=new admintv();


?>
<?php 
if (isset($_GET['delidtv'])) {
  $idtv=$_GET['delidtv'];
  $delidtv=$admintv->deletetv($idtv);
  header('location:crud_vocaburaly.php');
}
?>
<?php 

if (isset($_POST['search'])) {
  $searchtv="WHERE name LIKE '%".$_POST['name']."%'";

}else{
  $searchtv="";

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
            <a href="insert_vocabulary.php" class="btn btn-success" style="margin-right: 650px;" ><i class="plus"></i> New Vocabulary</a>
            <style>
              input[type=submit] {
                border: none;
                background-color: blue;
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
            <th>Image</th>
            <th>Action</th>
          </tr>
        </thead>
        <?php 
        $showtv=$admintv->selecttv($searchtv);
        if ($showtv) {
          while ($data=mysqli_fetch_array($showtv)) {
           ?>
           <tbody id="userData">

            <tr>
              <td><?php echo $data['name'] ?></td>
              <td><?php echo $data['idlv'] ?></td>
              <td><?php  
              echo $content=substr($data['content'],0,275);
              ?>...<a href="../list_vocabulary.php?id=<?php echo $data['idtv'] ?>">[Xêm Thêm]</a></td></td>
              <td><img style="width: 60px; height: 70px" src="../admin/uploads/<?php echo $data['image'] ?>" alt=""></td>
              <td>
                <a href="updata_vocabulary.php?id=<?php echo $data['idtv'] ?>" class="btn btn-warning">edit</a>
                <a href="?delidtv=<?php echo $data['idtv'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete?');">delete</a>
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
      $query = $admintv->countpage();   
      $total_records = mysqli_num_rows($query);   
      $total_pages = ceil($total_records / 6);   
      $pagLink = "";                         
      for ($i=1; $i<=$total_pages; $i++) {  
       $pagLink .= "<li class='list-group-item'><a href='crud_vocaburaly.php?page="
       .$i."'>".$i."</a></li>"; 
     }  
     echo $pagLink;   
     ?> 
   </div>
 </div>
</div>
<?php include 'footer.php'; 
ob_end_flush();
?>








