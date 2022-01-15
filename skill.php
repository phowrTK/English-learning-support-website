<?php 

include 'header.php'; 
require_once 'class/Db.class.php';
include 'class/admin.skill.php';

$adminsk=new adminsk();

?>





<?php if (isset($_SESSION['profile'])) :  ?>
  

 

  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="images/qc2.png" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-5 ml-auto pl-md-5">
          <span class="text-cursive h5 text-red">SKILL</span>
          <h3 class="text-black">SKILL cải thiện bản thân.</h3>
          <p><span>Tài liệu giúp nâng cao kỹ năng giao tiếp tiếng Anh.</span><br><span>Cải thiện giao tiếp giúp bạn tự tin hơi khi giao tiếp băng Tiếng Anh. Còn đợi gì nữa, hãy lựa chọn level phù hợp với bản thân mình và trải nghiệm. </span></p>

          <p class="mt-5"><a href="#" class="btn btn-warning py-4 btn-custom-1">More About Skill</a></p>
        </div>
      </div>
    </div>
  </div>
  <div class="site-section bg-teal">
    <div class="container">
      <div class="row justify-content-center text-center mb-5 section-2-title">
        <div class="col-md-6">
          <span class="text-cursive h5 text-red">SKILL</span>
          <h3 class="text-white text-center">KỸ NĂNG</h3>
          <p class="mb-5">Nghe, đọc, nói là những cần thiết giúp bạn cải thiện khi giao tiếp băng tiếng anh!</p>
        </div>
      </div>
      <div class="row align-items-stretch">
        <?php 
        
        $showsk=$adminsk->show_skill();
        if ($showsk) {
          while ($data=mysqli_fetch_array($showsk)) {


           ?>
           
           <div class="col-lg-4 col-md-6 mb-5">
            <div class="post-entry-1 h-100 person-1 teal">
              
              
             
              <div class="post-entry-1-contents">
               <audio controls>
                <source  src="admin/media/<?php echo $data['media']?>"  type="audio/mp3">
                </audio>
                <span class="meta"><?php echo $data['namelv'] ?></span>
                <h2><?php echo $data['name'] ?></h2>
                <p><?php  
                echo $content=substr($data['content'],0,20);
                ?>...<a href="list_skill.php?id=<?php echo $data['idsk'] ?>">[Xêm Thêm]</a></p> <span></span>
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
      $query = $adminsk->countpage();   
      $total_records = mysqli_num_rows($query);   
      $total_pages = ceil($total_records / 6);   
      $pagLink = "";                         
      for ($i=1; $i<=$total_pages; $i++) {  
       $pagLink .= "<li class='list-group-item'><a href='skill.php?page="
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