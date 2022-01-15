
<?php 
session_start();
include 'connect.php';
include 'class/crud.php';
$ad= new admin();

?>




<!DOCTYPE html>
<html lang="en">

<head>
	<title>ESUPPRO; Website Học Tiếng Anh Online</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700|Indie+Flower" rel="stylesheet">


	<link rel="stylesheet" href="fonts/icomoon/style.css">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.fancybox.min.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
	<link rel="stylesheet" href="css/aos.css">

	<!-- MAIN CSS -->
	<link rel="stylesheet" href="css/style.css">

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


	<div class="site-wrap" id="home-section">

		<div class="site-mobile-menu site-navbar-target">
			<div class="site-mobile-menu-header">
				<div class="site-mobile-menu-close mt-3">
					<span class="icon-close2 js-menu-toggle"></span>
				</div>
			</div>
			<div class="site-mobile-menu-body"></div>
		</div>



		<header class="site-navbar site-navbar-target" role="banner">

			<div class="container mb-3">
				<div class="d-flex align-items-center">
					<div class="site-logo mr-auto">
						<a href="index.php">ESUPPRO<span class="text-primary">.</span></a>
					</div>
					<div class="site-quick-contact d-none d-lg-flex ml-auto ">
						<div class="d-flex site-info align-items-center mr-5">
							<span class="block-icon mr-3"><span class="icon-map-marker text-yellow"></span></span>
							<span>72A Chu Van An, HCM City <br> VIETNAM</span>
						</div>
						<div class="d-flex site-info align-items-center">
							<span class="block-icon mr-3"><span class="icon-clock-o"></span></span>
							<span>Hoạt động tất cả mọi ngày trong tuần.<br>Works every day of the week.</span>
						</div>

					</div>
				</div>
			</div>


			<div class="container">
				<div class="menu-wrap d-flex align-items-center">
					<span class="d-inline-block d-lg-none"><a href="#" class="text-black site-menu-toggle js-menu-toggle py-5"><span class="icon-menu h3 text-black"></span></a></span>



					<nav class="site-navigation text-left mr-auto d-none d-lg-block" role="navigation">
						<ul class="site-menu main-menu js-clone-nav mr-auto ">
							<li class="active"><a href="index.php" class="nav-link">Trang Chủ</a></li>
							<li><a href="course.php" class="nav-link">Khóa Học</a></li>
							<li><a href="skill.php" class="nav-link">Kỹ Năng</a></li>
							<li><a href="grammar.php" class="nav-link">Ngữ Pháp</a></li>
							<li><a href="vocabulary.php" class="nav-link">Từ Vựng</a></li>
							
						</ul>
					</nav>

					<div class="top-social ml-auto">

						<a href="#"><span class="icon-facebook text-teal"></span></a>
						<a href="#"><span class="icon-twitter text-success"></span></a>

					</div>
					<nav class="site-navigation text-left mr-auto d-none d-lg-block" role="navigation">
						<ul class="site-menu main-menu js-clone-nav mr-auto " >

							<?php if (isset($_SESSION['login'])) :  ?>
								<?php 
								$id=$_SESSION['profile']['id'];
								$get_profile_byid=$ad->get_profile_byid($id);
								if ($get_profile_byid) {
									while ($data=mysqli_fetch_array($get_profile_byid)) {
										?>
										<?php if ($_SESSION['profile']['level']==1) { ?>
											<li >
												<a href="admin/admin.php">Admin</a>
											</li>
											<li class="profile">
												<a href="profile.php"><?php echo  $data['name']  ?></a>
											</li>
											<li >
												<a href="logout.php">Logout</a>
											</li>
										<?php }else{ ?>
											<li class="profile">
												<a href="profile.php"><?php echo  $data['name']  ?></a>
											</li>
											<li >
												<a href="logout.php">Logout</a>
											</li>
											<?php 
										}
									}
									?>

								<?php } ?>	
								
								<?php else : ?>
									<li class="login">
										<a href="login.php">Login</a>
									</li>
									<li >
										<a href="account.php">Register</a>
									</li>
								<?php endif; ?>
							</ul>
						</nav>
					</div>
				</div>
			</header>
			<div class="ftco-blocks-cover-1">

				<div class="site-section-cover overlay">
					<div class="container">
						<div class="row align-items-center ">
							<div class="col-md-5 mt-5 pt-5">
								<span class="text-cursive h5 text-red">Welcome To Our Website</span>
								<h1 class="mb-3 font-weight-bold text-teal">ESUPPRO - A GIFT JUST FOR YOU</h1>
								<p>Luôn đồng hành cùng bạn</p>
								<p class="mt-5"><a href="#" class="btn btn-primary py-4 btn-custom-1">Learn More</a></p>
							</div>
							<div class="col-md-6 ml-auto align-self-end">
								<img src="images/kid_transparent.png" alt="Image" class="img-fluid">

							</div>
						</div>
					</div>
				</div>
			</div>


