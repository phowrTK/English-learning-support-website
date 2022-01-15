<?php
ob_start();
require_once '../class/Db.class.php';
include '../class/admin.grammar.php';
include 'header.php';
?>
<?php 
$admingr=new admingr();
?>
<?php 
if (isset($_GET['delidgr'])) {
  $idgr=$_GET['delidgr'];
  $delidgr=$admingr->deletegr($idgr);
  header('location:crud_grammar.php');
}
?>
<?php 
if (isset($_POST['search'])) {
  $searchgr="WHERE name LIKE '%".$_POST['name']."%'";
}else{
  $searchgr="";
}
?>
<!-- /////////////////////////////////////aaaaaaaaaaaaaaaaaaaa -->
<div class="container-fluid">
  <div class="container">
    <h2></h2>
    <div class="row">
      <div class="col-md-12 head">
        <div class="float-right">
          <form action="" method="post">
            <a href="insert_grammar.php" class="btn btn-success" style="margin-right: 650px;" ><i class="plus"></i>New Grammar</a>
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
        $showgr=$admingr->selectgr($searchgr);
        if ($showgr) {
          while ($data=mysqli_fetch_array($showgr)) {
           ?>
           <tbody id="userData">

            <tr>
              <td><?php echo $data['name'] ?></td>
              <td><?php echo $data['idlv'] ?></td>
              <td><?php  
              echo $content=substr($data['content'],0,250);
              ?>...<a href="../list_grammar.php?id=<?php echo $data['idgr'] ?>">[Xêm Thêm]</a></td></td>
              <td><img style="width: 60px; height: 70px" src="../admin/uploads/<?php echo $data['image'] ?>" alt=""></td>
              <td>
                <a href="updata_grammar.php?id=<?php echo $data['idgr'] ?>" class="btn btn-warning">edit</a>
                <a href="?delidgr=<?php echo $data['idgr'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete?');">delete</a>
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
      $query = $admingr->countpage();   
      $total_records = mysqli_num_rows($query);   
      $total_pages = ceil($total_records / 6);   
      $pagLink = "";                         
      for ($i=1; $i<=$total_pages; $i++) {  
       $pagLink .= "<li class='list-group-item'><a href='crud_grammar.php?page="
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








