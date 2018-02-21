<?php require_once("inc/ketnoi.php"); ?>
<?php require_once("inc/plugins.php"); ?>
<?php 
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$user=$_POST["username"];
		$password=md5($_POST["password"]);

		if($user==null || $password==null){
			echo "<script language='javascript'>";
			echo "alert('Bạn chưa nhập tên đăng nhập !!!');";
			echo "</script>";
		}else{
			$sql="SELECT username,password FROM taikhoan WHERE username='{$user}' AND password='{$password}'";
			$query=mysqli_query($conn,$sql);
			$row=mysqli_fetch_array($query,MYSQLI_ASSOC);
			if($row==0){
				echo "<script language='javascript'>";
				echo "alert('Tài khoản hoặc mật khẩu không đúng !!!');";
				echo "</script>";
			}else{
				$_SESSION["user"]=$user;
				header("location:admin/wp-admin.php");
			}
		}
	}

 ?>
 <?php
 		$id=$_GET["id"];
 		$sql="SELECT * FROM category WHERE id='{$id}'";
 		$query=mysqli_query($conn,$sql);
 		$row=mysqli_fetch_array($query,MYSQLI_ASSOC);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $row['title']; ?>| Đại học kinh tế kỹ thuật công nghiệp</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="js/slick/slick-1.8.0/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="js/slick/slick-1.8.0/slick/slick-theme.css">
	<script src="js/jquery.js"></script>
	<script src="js/slick/slick-1.8.0/slick/slick.min.js"></script>
	<script src="js/jmain.js"></script>
</head>
<body>
	<div id="header"><div class="header-content">
		<div class="header-info">
			<div class="tab">
				<ul>
					<li><a href="#"><i class="fa fa-facebook"></i></a></li>
					<li style="background:#4099FF;"><a href="#"><i class="fa fa-twitter"></i></a></li>
					<li style="background:#D34836;"><a href="#"><i class="fa fa-google-plus"></i></a></li>
					<li style="background:#8E44AD;"><a href="#"><i class="fa fa-retweet"></i></a></li>
				</ul>
			</div>
		</div><!--header-info-->
		<div class="logo">
			<a href="#" title="Blog Uneti | Đại học kinh tế kỹ thuật công nghiệp"><img src="images/logo.png"></a>
		</div><!--logo-->
		<div class="header-search">
			<form method="post" class="form-search">
				<input type="search" name="search" placeholder="Bạn tìm gì nào?">
				<button type="submit" class="btn-search"><i class="fa fa-search"></i></button>
			</form>
		</div><!--header-search-->
	</div>
	</div><!--header-->
	
	<div id="menu">
		<div class="menu-nav">
			<ul>
				<li style="width:5%;"><a href="index.php"><i class="fa fa-home"></i></a></li>
				<li><a href="#">Lập trình <i class="fa fa-caret-down"></i> </a>
					<ul class="sub-menu">
						<?php 
							$sql="SELECT * FROM category";
							$query=mysqli_query($conn,$sql);
							while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)):
				 		?>
							<li><a href="category-list.php?id=<?php echo $row["id"]; ?>"><?php echo $row["title"];?></a>
							</li>
						<?php endwhile; ?>
						
					</ul>
				</li>
				<li><a href="#">Tài liệu</a></li>
				<li><a href="#">Tin tức</a></li>
				<li><a href="#">Liên hệ</a></li>
				<li style="float:right;width:15%;">
						
						<?php
								 if(isset($_SESSION["user"])){
										$id=$_SESSION["user"];
										$sql="SELECT * FROM taikhoan WHERE username='{$id}'";
										$query=mysqli_query($conn,$sql);
										$row=mysqli_fetch_array($query,MYSQLI_ASSOC);
										echo " <img src='images/nen.jpg'> <a href='admin/wp-admin.php'>". $row["hoten"]."</a>";
								}else{
									echo "";
								}

						?>
					</li>
			</ul>
		</div><!--menu-nav-->
	</div><!--menu-->
	
	<div id="wapper">
		<div id="slider">
			<div id="blog-slider">
				<?php 
					$sql="SELECT * FROM post";
					$query=mysqli_query($conn,$sql);
					while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)):
				?>
				<div class="slider-content">
					<div class="slider-content-img">
						<a href="#"><img src="images/<?php echo $row['images']; ?>"></a>
					</div><!--slider-content-img-->
					<div class="slider-content-title">
						<a href="single.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
					</div><!--slider-content-title-->
				</div><!--slider-content-->
			<?php endwhile; ?>
				
			</div><!--blog-slider-->
	</div><!--slider-->
		<div id="blog-main">
			<div class="blog-main-left">

				<div class="left-category">
				
					<div class="list-title">
						<i class="fa fa-user"></i> Đăng nhập
					</div><!--list-title-->
					<?php 
						if(isset($_SESSION["user"])){
							$id=$_SESSION["user"];
							$sql="SELECT * FROM taikhoan WHERE username='{$id}'";
							$query=mysqli_query($conn,$sql);
							$row=mysqli_fetch_array($query,MYSQLI_ASSOC);
							echo " <center><img src='images/nen.jpg'><br><br> <a href='admin/wp-admin.php'>". $row["hoten"]."</a></center><br>";
							
						}else{
					 ?>
						<form method="post" class="form-login">
							<label>
								<h4>Tên đăng nhập</h4>
								<input type="text" name="username" placeholder="Nhập tên đăng nhập">
							</label>
							<label>
								<h4>Mật khẩu</h4>
								<input type="password" name="password" placeholder="Nhập mật khẩu">
							</label><br>
							<button type="submit">Đăng nhập</button>
					</form>
					 <?php } ?>
				</div><!--left-category-->

				

				<div class="left-category">
					<div class="list-title">
						<i class="fa fa-play"></i> Video dạy học
					</div><!--list-title-->
					
				</div><!--left-category-->
			</div><!--blog-main-left-->

			<div class="blog-main-right">
				<?php 
					$id=$_GET["id"];
			 		$sql="SELECT * FROM category WHERE id='{$id}'";
			 		$query=mysqli_query($conn,$sql);
			 		$row=mysqli_fetch_array($query,MYSQLI_ASSOC);

				 ?>
				<div class="list-title">
					<i class="fa fa-bars"></i> Bài viết danh mục <font color="yellow"><?php echo $row["title"]; ?> </font>
					<div class="back"><a href="wp-admin.php">Xem Thêm <i class="fa fa-angle-double-right"></i></a></div><!--back-->
				</div><!--list-title-->
				<?php 
					$page=empty($_GET["page"]) ? 1 :($_GET["page"]);

              		$totalposts=get_total_post();

              		$startfrom= ($page -1) * $postpage; // bien chay 
               // tran chay tu 1, nhung limit trong ysal lai chay tu page 0 den -1
              		$totalpage=round($totalposts/$postpage); // lay ve tong so trang
					$sql="SELECT post.*,category.id as cid,category.title as ctitle,taikhoan.id as tid,taikhoan.hoten FROM post,category,taikhoan WHERE post.cat_id=category.id AND post.user_id=taikhoan.id AND category.id=$id ORDER BY post.id DESC LIMIT $startfrom,$postpage";
					$query=mysqli_query($conn,$sql);
					while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)):
				 ?>
				<div class="main-right-content">
					<div class="main-right-content-img">
						<a href="#"><img src="images/<?php echo $row['images']; ?>"></a>
					</div><!--main-right-content-img-->

					<div class="main-right-content-nd">
						<div class="main-right-content-nd-title">
							<a href="single.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
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
				
			</div><!--blog-main-right-->
		</div><!--blog-main-->
		<div style="clear:left"></div>
		<div style="clear:right"></div>

	</div><!--wapper-->
	<?php require_once("inc/bottom.php"); ?>
</body>
</html>