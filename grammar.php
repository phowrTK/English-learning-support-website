<?php 

include 'header.php'; 
require_once 'class/Db.class.php';
include 'class/admin.grammar.php';

$admingr=new admingr();

?>
<?php if (isset($_SESSION['profile'])) :  ?>
  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="images/qc3.png" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-5 ml-auto pl-md-5">
          <span class="text-cursive h5 text-red">GRAMMAR</span>
          <h3 class="text-black">Grammar English</h3>
          <p><span>Tại đây có tất cả các thì từ cơ bản đến nâng cao mà người học tiếng Anh cần trang bị cho bản thân.</span><span>Trạng từ, động từ khiếm khuyết cần thiết cho bạn sử dụng trong mọi trường hợp.</span></p>

          <p class="mt-5"><a href="#" class="btn btn-warning py-4 btn-custom-1">More About Grammar</a></p>
        </div>
      </div>
    </div>
  </div>
  <div class="site-section bg-teal">
    <div class="container">
      <div class="row justify-content-center text-center mb-5 section-2-title">
        <div class="col-md-6">
          <span class="text-cursive h5 text-red">GRAMMAR</span>
          <h3 class="text-white text-center">NGỮ PHÁP</h3>
          <p class="mb-5">Tập hợp các thì từ cơ bản tới nâng cao phù hợp với mọi level cho từng người!</p>
        </div>
      </div>
      <div class="row align-items-stretch">
        <?php 
        
        $showgr=$admingr->show_grammar();
        if ($showgr) {
          while ($data=mysqli_fetch_array($showgr)) {


           ?>
           
           <div class="col-lg-4 col-md-6 mb-5">
            <div class="post-entry-1 h-100 person-1 teal">
              
              
             <img class="img-fluid" style="width: 175px; height: 175px" src="admin/uploads/<?php echo $data['image'] ?>" alt=""> 
             <div class="post-entry-1-contents">
              <span class="meta"><?php echo $data['namelv'] ?></span>
              <h2><?php echo $data['name'] ?></h2>
              <p><?php  
              echo $content=substr($data['content'],0,18);
              ?>...<a href="list_grammar.php?id=<?php echo $data['idgr'] ?>">[Xêm Thêm]</a></p> <span></span>
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
      $query = $admingr->countpage();   
      $total_records = mysqli_num_rows($query);   
      $total_pages = ceil($total_records / 6);   
      $pagLink = "";                         
      for ($i=1; $i<=$total_pages; $i++) {  
       $pagLink .= "<li class='list-group-item'><a href='grammar.php?page="
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