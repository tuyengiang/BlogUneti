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
										echo " <center><img src='images/".$row['images']."'><a href='admin/wp-admin.php'>  ".$row["hoten"]."</a></center><br>";
								}else{
									echo "";
								}

						?>
					</li>
			</ul>
		</div><!--menu-nav-->
	</div><!--menu-->
	
	<div id="wapper">
		<div id="blog-main">
				<?php 
					$id1=$_GET["id"];
					$sql1="SELECT post.*,category.id as cid,category.title ctitle FROM post,category WHERE post.cat_id=category.id AND post.id='{$id1}'";
					$query1=mysqli_query($conn,$sql1);
					while($row1=mysqli_fetch_array($query1,MYSQLI_ASSOC)):
	 			?>
				
				<div class="single-content">
					<div class="info" style="font-size:18px;">
							<font color="#ff3333" ><b>Home</b> <i class="fa fa-angle-right"></i>
							<?php 
								echo $row1["ctitle"];
							?>
							</font>
					
					</div><!--info-->
					<h1><?php echo $row1["title"]; ?></h1>
					<h5 style="margin:10px 0 10px 0;"><i class="fa fa-clock-o"></i> <?php 
						$time_ago=strtotime($row1["date_time"]);
						echo time_stamp($time_ago);
					?></h5>
					<div class="tab" style="width:40%;float:left">
						<ul>
							<li style="margin-left:0"><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li style="background:#191919;"><a href="#"><i class="fa fa-envelope"></i></a></li>
						</ul>
					</div>
					<div style="clear:left;"></div>
					<h1 style="margin-top:10px;border:1px dashed lightgray;"></h1>
					<p style="margin:20px 0 10px 0; font-size:18px;font-family:'Time New Roman'"><?php echo $row1["content"]; ?></p>
					<?php endwhile; ?>
				</div>
		</div><!--blog-main-->
		
		<div class="list-title"><i class="fa fa-bars"></i> Bạn có biết ?</div>
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
		<div style="clear:left"></div>
		<div style="clear:right"></div>
	</div><!--wapper-->

	<?php require_once("inc/bottom.php"); ?>

</body>
</html>