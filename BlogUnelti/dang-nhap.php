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
<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập vào cplane | Đại học kinh tế kỹ thuật công nghiệp</title>
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
		

		<div id="blog-main" style="margin-top:110px">
			<div class="tieu-de">
				<div class="tieu-de-trai"></div>
				<div class="tieu-de-giua">Đăng nhập</div>				
				<div class="tieu-de-phai"></div>
			</div><!--tieu-de-->

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

		</div><!--blog-main-->
		<div style="clear:left"></div>
		<div style="clear:right"></div>

	</div><!--wapper-->
	<?php require_once("inc/bottom.php"); ?>
</body>
</html>