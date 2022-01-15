<?php 


include 'header.php';


?>

<div class="row" style="margin-left: 700px">
	<?php if (isset($_SESSION['profile'])) :   ?>
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<a href="update.php?id=<?php echo $_SESSION['profile']['id'] ?>" class="btn btn-warning">edit</a>
				</div>
				<div class="panel-body">
					<table class="table table-hover table-bordered">
						<thead>
							<?php 
							$id=$_SESSION['profile']['id'];
							$get_profile_byid=$ad->get_profile_byid($id);
							if ($get_profile_byid) {
								while ($data=mysqli_fetch_array($get_profile_byid)) {
										# code...
									
									?>
									<tr>
										<th>Name</th>
										<td><?php echo $data['name'] ?></td>
									</tr>
									<tr>
										<th>Email</th>
										<td><?php echo $data['email'] ?></td>
									</tr>
									<tr>
										<th>Phone</th>
										<td><?php echo $data['phone'] ?></td>
									</tr>
									<tr>
										<th>address</th>
										<td><?php echo $data['address'] ?></td>
									</tr>
									
									<?php 
								}
							}
							?>
						</thead>

					</table>
				</div>
			</div>
		</div>
		<?php else : ?>
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Error: </strong> Bạn hãy đăng nhập...
			</div>

		<?php endif;  ?>

	</div>

	<?php 

	include 'footer.php';
	?>


