<?php require_once("inc/ketnoi.php"); ?>
<?php require_once("inc/plugins.php"); ?>
<?php 
	$id=$_GET["id"];
	$sql="SELECT *FROM post WHERE id='{$id}'";
	$query=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($query,MYSQLI_ASSOC);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $row["title"]; ?>| Đại học kinh tế kỹ thuật công nghiệp</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="js/slick/slick-1.8.0/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="js/slick/slick-1.8.0/slick/slick-theme.css">
	<script src="js/jquery.js"></script>
	<script src="js/slick/slick-1.8.0/slick/slick.min.js"></script>
	<script src="js/jmain.js"></script>
</head>
<body>
	<div id="header">
		<div class="header-top">
			<div style="height:30px;margin-top:0" class="header-content">
				<ul>
					<li><a href="#"><i class="fa fa-envelope"></i> nguyentuyengiangbn@gmail.com</a></li>
					
					<li style="float:right;width:12%;">
						
							<?php
									 if(isset($_SESSION["user"])){
											$id=$_SESSION["user"];
											$sql="SELECT * FROM taikhoan WHERE username='{$id}'";
											$query=mysqli_query($conn,$sql);
											$row=mysqli_fetch_array($query,MYSQLI_ASSOC);
											echo " <center><img src='images/".$row['images']."'><a href='admin/wp-admin.php'>  ".$row["hoten"]."</a></center><br>";
									}else{
										echo "";
									}

							?>
					</li>
				</ul>
			</div><!--header-contetnt-->
			
		</div><!--header-top-->
		<div class="header-content">
		
			<div class="logo">
				<a href="index.php" title="Blog Uneti | Đại học kinh tế kỹ thuật công nghiệp"><img src="images/logo.png"></a>
			</div><!--logo-->
			<div id="menu">
		<div class="menu-nav">
			<ul>
				<li><a href="index.php">Trang chủ</a></li>
				<li><a href="#">Lập trình <i class="fa fa-angle-down"></i> </a>
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
				<li><a href="#">Thành viên <i class="fa fa-angle-down"></i></a>
					<ul class="sub-menu">
						<li><a href="dang-nhap.php">Đăng nhập</a></li>
						<li><a href="yeu-cau.php">Cấp tài khoản</a></li>
					</ul>
				</li>
				<li style="float:right;width:3%"><i class="fa fa-search"></i></li>

			</ul>
		</div><!--menu-nav-->
	</div><!--menu-->
		</div><!--header-content-->
	</div><!--header-->
	
	<div id="wapper">
		<div id="blog-main" style="margin-top:110px;">
				<?php 
					$id1=$_GET["id"];
					$sql1="SELECT post.*,category.id as cid,category.title ctitle FROM post,category WHERE post.cat_id=category.id AND post.id='{$id1}'";
					$query1=mysqli_query($conn,$sql1);
					while($row1=mysqli_fetch_array($query1,MYSQLI_ASSOC)):
	 			?>
				
				<div class="single-content">
					<div class="single-info" style="font-size:15px;">
							Trang chủ <i class="fa fa-angle-right"></i>
							<?php 
								echo $row1["ctitle"];
							?>
							<i class="fa fa-angle-right"></i>
							<?php 
								echo $row1["title"];
							 ?>
					
					</div><!--single-info-->
					<div class="main-content-category">
						<a href="category-list.php?id=<?php echo $row1["cid"]; ?>" title="<?php echo $row['ctitle']; ?>"><?php echo $row1["ctitle"]; ?></a>
					</div><!--main-content-category-->
					<div class="single-title"><?php echo $row1["title"]; ?></div>

					<h5 style="margin:10px 0 10px 0;"><i class="fa fa-clock-o"></i> <?php 
						$time_ago=strtotime($row1["date_time"]);
						echo time_stamp($time_ago);
					?></h5>

					<div class="single-content-left">
						<p style="margin:0 0 10px 0; font-size:18px;font-family:'Time New Roman'"><?php echo $row1["content"]; ?></p>
					</div><!--single-content-left-->

					<?php endwhile; ?>

					<div class="single-content-right">
						<div class="list-title">
							<div class="title">Quảng cáo blog</div><!--title-->

						</div>
					</div><!--single-content-right-->
				</div>
				<div style="clear:left"></div>
				<div style="clear:right"></div>
		</div><!--blog-main-->
		
		<div class="list-title" style="margin-top:20px">
			<div class="title"><i class="fa fa-bars"></i> Bạn có biết ?</div>
		</div>
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
		
	</div><!--wapper-->

	<?php require_once("inc/bottom.php"); ?>

</body>
</html>