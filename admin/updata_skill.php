<!-- PHP insert code will be here -->
<?php 
include '../class/admin.skill.php';

$adminsk=new adminsk();
// if (isset($_GET['idsk'])) {
//     $idsk=$_GET['idsk'];
// }
if (isset($_GET['id'])) {
 $id=$_GET['id'];
} 
if (isset($_POST['submit'])) {
  $update_skill=$adminsk->updatesk($id,$_POST,$_FILES);
}



?>




<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Register</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-media"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">UPDATE!</h1>
              </div>
              <form class="user" method="post" enctype="multipart/form-data">

                <?php 
                if (isset($update_skill)) {
                  echo $update_skill;
                }
                ?>
                <table class='table table-hover table-responsive table-bordered'>
                  <?php

                  $show_idsk=$adminsk->show_skill_by_id($id);
                  if($show_idsk) {
                    while($datask=mysqli_fetch_array($show_idsk)) {


                      ?>


                      <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <h6>Name</h6>
                          <input type='text' name='name' class='form-control' placeholder="Enter Name" value="<?php echo $datask['name'] ?>" />
                        </div>
                        <div class="col-sm-6">
                          <h6>Level</h6>
                          <select name="idlv" >
                            <option value="">Chon Level</option>
                            <?php  
                            $show_level=$adminsk->show_level();
                            if ($show_level) {
                              while ($data=mysqli_fetch_array($show_level)) {                              
                               ?>
                               <option selected value="<?php echo $data['idlv']; ?>"><?php echo $data['namelv']; ?></option>
                               <?php 
                             }
                           }
                           ?>
                         </select>
                       </div>
                     </div>
                     <div class="form-group">
                      <h6>Content</h6>
                      <textarea name='content' class='form-control' value="<?php echo $datask['content'] ?>"><?php echo $datask['content'] ?></textarea>
                    </div>
                    <div class="form-group row">                             
                      <div class="col-sm-6">
                        <h6>Media</h6>
                        <input type="file" class=" form-control-user" name="media" id="exampleInputPassword" placeholder="media">
                        <audio controls>
                          <source src="media/<?php echo $datask['media']?>"  type="audio/mp3">
                          </audio>

                        </div>
                      </div>
                      <input type='submit' value='Save' name="submit" class='btn btn-primary' />
                      <a href='crud_skill.php' class='btn btn-danger'>Back</a>



                      <?php 
                    }
                  } 
                  ?>

                </table>
              </form>



            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>












