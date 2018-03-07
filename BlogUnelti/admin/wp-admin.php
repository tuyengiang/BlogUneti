<?php require_once("../inc/ketnoi.php"); 
		checklogin();
?>
<?php require_once("../inc/plugins.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Trang quản trị | Đại học kinh tế kỹ thuật công nghiệp</title>
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
			<div class="blog-main-left">
				<div class="list-title">
					<div class="title"> <i class="fa fa-user"></i>  Thông tin </div>
				</div>
				<div class="info-content">

					<?php 
						if(isset($_SESSION["user"])){
							
							$id=$_SESSION["user"];
							$sql="SELECT * FROM taikhoan WHERE username='{$id}'";
							$query=mysqli_query($conn,$sql);
							$row=mysqli_fetch_array($query,MYSQLI_ASSOC);
						}

						$user=$row["id"];
					 ?>
					<div class="info-img">
							<img src="../images/<?php echo $row['images']; ?>"><br>
					</div>
					<a href='wp-info.php'><?php echo $row["hoten"]; ?></a>
				</div>
			</div>
			<div class="blog-main-right">
				<div class="list-title">
					<div class="title"><i class="fa fa-bars"></i> Bài viết của <font color="yellow" ><?php echo $row["hoten"]; ?></font></div>
				</div><!--list-title-->

				<?php 
					$page=empty($_GET["page"]) ? 1 :($_GET["page"]);

              		$totalposts=get_total_post();

              		$startfrom= ($page -1) * $postpage; // bien chay 
               // tran chay tu 1, nhung limit trong ysal lai chay tu page 0 den -1
              		$totalpage=round($totalposts/$postpage); // lay ve tong so trang
					$sql="SELECT post.*,category.id as cid,category.title as ctitle,taikhoan.id as tid,taikhoan.hoten FROM post,category,taikhoan WHERE post.cat_id=category.id AND post.user_id=taikhoan.id AND taikhoan.id=$user ORDER BY post.id DESC LIMIT $startfrom,$postpage";
					$query=mysqli_query($conn,$sql);
					while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)):
				 ?>
				<div class="main-right-content">
					<div class="main-right-content-img">
						<a href="#"><img src="../images/<?php echo $row['images']; ?>"></a>
					</div><!--main-right-content-img-->

					<div class="main-right-content-nd">
						<div class="main-right-content-nd-title">
							<a href="../single.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
						</div><!--main-right-content-nd-title-->
						<div class="info">
								<i class="fa fa-folder"></i> <?php echo $row["ctitle"]; ?>
								-
								<font color="gray"><i class="fa fa-clock-o"></i> <?php
										$time_ago=strtotime($row["date_time"]);
										echo time_stamp($time_ago);
								 ?></font>
						</div><!--info-->
						<div class="main-right-content-nd-excerpt">
							<p><?php echo $row['excerpt']; ?></p>
						</div><!--main-right-content-nd-excerpt-->
					</div><!--main-right-content-nd-->
				</div><!--main-right-content-->
			<?php endwhile; ?>
			<?php if($totalpage > 0) : ?>
				<div class="next">
					<div class="back"><a href="xem-them.php">Xem Thêm <i class="fa fa-angle-double-right"></i></a></div><!--back-->
				</div><!--next-->
			<?php endif; ?>
			</div>
		</div><!--blog-main-->
		<div style="clear:left;"></div>
		<div style="clear:right"></div>
		<div id="gop-y">
			<div class="list-title"> <i class="fa fa-envelope"></i> Hòm thư góp ý của bạn</div>
			<form class="form-plus">
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