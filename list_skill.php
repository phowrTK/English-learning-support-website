<?php 

include 'header.php'; 
include 'class/admin.skill.php';
$adminsk=new adminsk();
if (isset($_GET['id'])) {
 $id=$_GET['id'];
 
} 

?>
<?php if (isset($_SESSION['profile'])) :  ?>
  <div class="site-section bg-teal">
    <div class="container">

      <div class="row align-items-stretch">
        <?php
        $show_idsk=$adminsk->show_skill_by_id($id);
        if($show_idsk) {
          while($datask=mysqli_fetch_array($show_idsk)) {
            ?>
            <div class="row" >
              <div class="post-entry-1 h-100 ">
               <div class="post-entry-1-contents">
                <h6 style="text-align: center; color: red;"><?php echo $datask['namelv'] ?></h6>
                <h1 style="text-align: center;"><?php echo $datask['name'] ?></h1><br>
                <audio controls>
                  <source  src="admin/media/<?php echo $datask['media']?>"  type="audio/mp3">
                  </audio><br>
                  <p style="text-align: left;">
                    <?php echo $datask['content'] ?>
                  </p>
                  <a style="margin-left:500px;" href='skill.php' class='btn btn-danger'>Back</a>
                </div>
              </div>
            </div>
            <?php 
          }
        }
        ?>

      </div>
    </div>
  </div>

  <?php else: ?>
    <div class="jumbotron">
      <div class="container">
        <h3>BẠN CẦN ĐĂNG NHẬP ĐỂ THỰC HIỆN CHỨC NĂNG NÀY!</h3>
        <p>Bạn Có Thể Đăng Nhập Tại Đây!</p>
        <p>
          <a class="btn btn-primary btn-lg" href="login.php">ĐĂNG NHẬP</a>
        </p>
      </div>
    </div>
  <?php endif; ?>
  <?php include 'footer.php'; ?>