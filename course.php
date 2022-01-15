<?php 

include 'header.php'; 
require_once 'class/Db.class.php';
include 'class/admin.course.php';
$adminkh=new adminkh();
?>
<?php if (isset($_SESSION['profile'])) :  ?>
<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="images/qc1.png" alt="Image" class="img-fluid">
      </div>
      <div class="col-md-5 ml-auto pl-md-5">
        <span class="text-cursive h5 text-red">Khóa Học</span>
        <h3 class="text-black">Khóa học cho tất cả mọi người</h3>
        <p><span>Ở đây. Có tất cả mọi tài liệu học tiếng anh dành cho tất cả mọi lứa tuổi.</span><span>Có các level khác nhau từ cơ bản đến nâng cao phù hợp với mọi người</span></p>

        <p class="mt-5"><a href="#" class="btn btn-warning py-4 btn-custom-1">More About Course</a></p>
      </div>
    </div>
  </div>
</div>
<div class="site-section bg-teal">
  <div class="container">
    <div class="row justify-content-center text-center mb-5 section-2-title">
      <div class="col-md-6">
        <span class="text-cursive h5 text-red">COURSE</span>
        <h3 class="text-white text-center">KHÓA HỌC</h3>
        <p class="mb-5">Hãy chọn cho bạn một khóa học và cải thiện kiến thức của mình nhé!</p>
      </div>
    </div>
    <div class="row align-items-stretch">
      <?php 

      $showkh=$adminkh->show_course();
      if ($showkh) {
        while ($data=mysqli_fetch_array($showkh)) {
         ?>
          
      <div class="col-lg-4 col-md-6 mb-5">
        <div class="post-entry-1 h-100 person-1 teal">
          
          
         <img class="img-fluid" style="width: 175px; height: 175px" src="admin/uploads/<?php echo $data['image'] ?>" alt=""> 
          <div class="post-entry-1-contents">
            <span class="meta"><?php echo $data['namelv'] ?></span>
            <h2><?php echo $data['name'] ?></h2>
            <p><?php  
              echo $content=substr($data['content'],0,25);
             ?>...<a href="list_course.php?id=<?php echo $data['idkh'] ?>">[Xêm Thêm]</a></p> <span></span>
             
          </div>
        </div>
      </div>
      <?php 
    }
  }
  ?>
    </div>
    <ul style="margin-left: 500px" class="pagination"> 
      <?php   
      $query = $adminkh->countpage();   
      $total_records = mysqli_num_rows($query);   
      $total_pages = ceil($total_records / 6);   
      $pagLink = "";                         
      for ($i=1; $i<=$total_pages; $i++) {  
       $pagLink .= "<li class='list-group-item'><a href='course.php?page="
       .$i."'>".$i."</a></li>"; 
     }  
     echo $pagLink;   
     ?> 
   </ul> 
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