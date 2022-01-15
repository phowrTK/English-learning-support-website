<?php
ob_start();
require_once '../class/Db.class.php';
include '../class/crud.php';
include 'header.php';
?>
<?php 
$admin=new admin();
?>
<?php 
if (isset($_GET['delid'])) {
  $id=$_GET['delid'];
  $del=$admin->delete($id);
  header('location:listadmin.php');
}
?>
<?php 
if (isset($_POST['search'])) {
  $search="WHERE name LIKE '%".$_POST['name']."%'";
}else{
  $search="";
}
$show=$admin->select($search);
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

          <form action="listadmin.php" method="post">
            <a href="../insert.php" class="btn btn-success" style="margin-right: 700px;" ><i class="plus"></i> New User</a>
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
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Action</th>
          </tr>
        </thead>
        <?php 

        if ($show) {
          while ($data=mysqli_fetch_array($show)) {
           ?>
           <tbody id="userData">
            <tr>
              <td><?php echo $data['name'] ?></td>
              <td><?php echo $data['email'] ?></td>
              <td><?php echo $data['phone'] ?></td>
              <td><?php echo $data['address'] ?></td>
              <td>
                <a href="update.php?id=<?php echo $data['id'] ?>" class="btn btn-warning">edit</a>
                <a href="?delid=<?php echo $data['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete?');">delete</a>
              </td>
            </tr>
            <?php 
          }
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
</div>
<?php include 'footer.php'; 
ob_end_flush();
?>