<?php require_once("../inc/ketnoi.php"); 
		checklogin();
?>
<?php require_once("../inc/plugins.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Thông tin tài khoản | Đại học kinh tế kỹ thuật công nghiệp</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="../css/awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../js/slick/slick-1.8.0/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="../js/slick/slick-1.8.0/slick/slick-theme.css">
	<script src="../js/jquery.js"></script>
	<script src="../js/slick/slick-1.8.0/slick/slick.min.js"></script>
	<script src="j../s/jmain.js"></script>
</head>
<body>	
	<?php require_once("../inc/header.php");?>
	<div id="wapper">
		<div id="lua-chon">
			<div class="lua-chon-content">
				<a href="wp-create-posts.php"><i class="fa fa-plus"></i></a><br>
				<a href="wp-create-posts.php">Thêm bài viết mới</a>
			</div><!--lua-chon-content-->
			<div class="lua-chon-content">
				<a href="wp-create-category.php"><i class="fa fa-plus"></i></a><br>
				<a href="wp-create-category.php">Thêm chuyên mục</a>
			</div><!--lua-chon-content-->
			<div class="lua-chon-content">
				<a href="wp-create-list.php"><i class="fa fa-bars"></i></a><br>
				<a href="wp-create-list.php">Danh sách bài viết</a>
			</div><!--lua-chon-content-->
			<div class="lua-chon-content">
				<a href="wp-user.php"><i class="fa fa-user"></i></a><br>
				<a href="wp-user.php">Quản lý tài khoản</a>
			</div><!--lua-chon-content-->
			<div class="lua-chon-content">
				<a href="wp-setting.php"><i class="fa fa-cog"></i></a><br>
				<a href="wp-setting.php">Cài đặt</a>
			</div>
			<div class="lua-chon-content">
				<a href="wp-logout.php"><i class="fa fa-sign-out "></i></a><br>
				<a href="wp-logout.php">Đăng xuất</a>
			</div>
		</div><!--lua-chon-->
		<div id="blog-main">
				<?php 
					if(isset($_SESSION["user"])){
						$user=$_SESSION["user"];
						$sql="SELECT * FROM taikhoan WHERE username='{$user}'";
						$query=mysqli_query($conn,$sql);
						$row=mysqli_fetch_array($query,MYSQLI_ASSOC);
					}

				 ?>
				 <div class="list-title"><i class="fa fa-user"></i> Thông tin tài khoản : <font color="yellow"><?php echo $row["username"]; ?></font>
				 </div><!--list-title-->

				 <div class="blog-info">
						<div class="blog-info-img">
							<img src="../images/<?php echo $row['images'];?>" alt="">
						</div><!--blog-info-img-->

						<p>Họ tên: <?php echo "<a href='wp-info.php'>". $row["hoten"]."</a>"; ?><p>

				 </div><!--blog-info-->
		</div><!--blog-main-->
		<div style="clear:left;"></div>
		<div style="clear:right"></div>
		<div id="gop-y">
			<div class="list-title"> <i class="fa fa-envelope"></i> Hòm thư góp ý của bạn</div>
			<form class="form-login">
				<label>
					<h4>Email</h4>
					<input type="email" placeholder="Nhập email của bạn">
				</label>
				<label>
					<h4>Nội dung đóng góp</h4>
					<textarea placeholder="Nhập nội dung đóng góp"></textarea>
				</label>
				<br>
				<center><button type="submit">Gửi đóng góp</button></center>
			</form>
		</div><!--gop-y-->
	</div><!--wapper-->
	<?php require_once("../inc/bottom.php"); ?>

</body>
</html>