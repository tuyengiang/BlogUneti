<div id="menu">
		<div class="menu-nav">
			<ul>
				<li style="width:5%;"><a href="../index.php"><i class="fa fa-home"></i></a></li>
				<li><a href="#">Lập trình <i class="fa fa-caret-down"></i> </a>
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
				<li style="float:right;width:15%;">
						
						<?php
								 if(isset($_SESSION["user"])){
										$id=$_SESSION["user"];
										$sql="SELECT * FROM taikhoan WHERE username='{$id}'";
										$query=mysqli_query($conn,$sql);
										$row=mysqli_fetch_array($query,MYSQLI_ASSOC);
										echo " <center><img src='../images/".$row['images']."'><a href='admin/wp-admin.php'>  ".$row["hoten"]."</a></center><br>";
								}else{
									echo "";
								}

						?>
					</li>
			</ul>
		</div><!--menu-nav-->
	</div><!--menu-->