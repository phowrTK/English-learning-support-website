<?php 

include 'header.php'; 
include 'class/admin.grammar.php';
$admingr=new admingr();
if (isset($_GET['id'])) {
 $id=$_GET['id'];
 
} 

?>
<?php if (isset($_SESSION['profile'])) :  ?>
  <div class="site-section bg-teal">
    <div class="container">

      <div class="row align-items-stretch">
        <?php
        $show_idgr=$admingr->show_grammar_by_id($id);
        if($show_idgr) {
          while($datagr=mysqli_fetch_array($show_idgr)) {
            ?>
            <div class="row" >
              <img class="img-fluid" style="width: 450px; height: 300px; margin-left: 350px; " src="admin/uploads/<?php echo $datagr['image'] ?>" alt=""> 
              <div class="post-entry-1 h-100 ">
               <div class="post-entry-1-contents">
                <span class="meta" style="margin-left: 535px; color: red;"><?php echo $datagr['namelv'] ?></span>
                <h1 style="text-align: center;"><?php echo $datagr['name'] ?></h1><br>
                <p style="text-align: left;">
                  <?php echo $datagr['content'] ?>
                </p>
                <a style="margin-left:500px;" href='grammar.php' class='btn btn-danger'>Back</a>
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