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
											echo " <center><img src='../images/".$row['images']."'><a href='wp-admin.php'>  ".$row["hoten"]."</a></center><br>";
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
				<a href="../index.php" title="Blog Uneti | Đại học kinh tế kỹ thuật công nghiệp"><img src="../images/logo.png"></a>
			</div><!--logo-->
			<div id="menu">
		<div class="menu-nav">
			<ul>
				<li><a href="../index.php">Trang chủ</a></li>
				<li><a href="../lap-tinh.php">Lập trình <i class="fa fa-angle-down"></i> </a>
					<ul class="sub-menu">
						<?php 
							$sql="SELECT * FROM category";
							$query=mysqli_query($conn,$sql);
							while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)):
				 		?>
							<li><a href="../category-list.php?id=<?php echo $row["id"]; ?>"><?php echo $row["title"];?></a>
							</li>
						<?php endwhile; ?>
						
					</ul>
				</li>
				<li><a href="#">Tài liệu</a></li>
				<li><a href="#">Tin tức</a></li>
				<li><a href="#">Liên hệ</a></li>
				<li><a href="#">Thành viên <i class="fa fa-angle-down"></i></a>
					<ul class="sub-menu">
						<li><a href="../dang-nhap.php">Đăng nhập</a></li>
						<li><a href="../yeu-cau.php">Cấp tài khoản</a></li>
					</ul>
				</li>
				<li style="float:right;width:3%"><i class="fa fa-search"></i></li>

			</ul>
		</div><!--menu-nav-->
	</div><!--menu-->
		</div><!--header-content-->
	</div><!--header-->