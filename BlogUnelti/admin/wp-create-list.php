<?php require_once("../inc/ketnoi.php"); 
		checklogin();
?>
<?php require_once("../inc/plugins.php"); ?>
<?php 
	if(isset($_POST["delete"])){
		$id=$_POST["delete"];
		$sql="DELETE FROM post WHERE id='{$id}'";
		$query=mysqli_query($conn,$sql);
		if($query){
			echo "<script language='javascript'>";
			echo "alert('Xóa bài viết thành công!!!');";
			echo "</script>";
			
		}else{
			echo "<script language='javascript'>";
			echo "alert('Xóa bài viết thất bại!!!');";
			echo "</script>";
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Danh sách các bài viết blog | Đại học kinh tế kỹ thuật công nghiệp</title>
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
				<div class="list-title">
					<?php 
						if(isset($_SESSION["user"])){
							
							$id=$_SESSION["user"];
							$sql="SELECT * FROM taikhoan WHERE username='{$id}'";
							$query=mysqli_query($conn,$sql);
							$row=mysqli_fetch_array($query,MYSQLI_ASSOC);

						}
						$user=$row["id"];
					 ?>
					<div class="title"><i class="fa fa-bars"></i> Bài viết của <font color="yellow" ><?php echo $row["hoten"]; ?></font></div>
				</div><!--list-title-->
				<table>
					<thead>
						<th>STT</th>
						<th>HÌNH ẢNH</th>
						<th>TÊN BÀI VIẾT</th>
						<th>NỘI DUNG MIÊU TẢ</th>
						<th>DANH MỤC</th>
						<th>NGƯỜI VIẾT</th>
						<th>TÙY CHỌN</th>
					</thead>
					<tbody>
						<?php
							
							$sql="SELECT post.*,category.id as cid,category.title as ctitle,taikhoan.id as tid,taikhoan.hoten FROM post,category,taikhoan WHERE post.cat_id=category.id AND post.user_id=taikhoan.id AND taikhoan.id=$user ORDER BY post.id DESC ";
							$query=mysqli_query($conn,$sql);
							while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)):
				 		?>
						<tr>
							<td style="text-align:center;"><?php echo $row["id"] ;?></td>
							<td style="width:20%;"><img src="../images/<?php echo $row["images"] ;?>" ></td>
							<td><?php echo $row["title"] ;?></td>
							<td><?php echo $row["excerpt"] ;?></td>
							<td><?php echo $row["ctitle"] ;?></td>
							<td><?php echo $row["hoten"] ;?></td>
							<td>
								<a href="wp-edit-post.php?id=<?php echo $row['id']; ?>"> <button type="submit">Sửa</button></a>

								<form method="post" style="margin-top:10px;">
									<input type="hidden" name="delete" value="<?php echo $row['id']; ?>">
									<button type="submit" onclick="return confirm('Bạn có muốn xóa không ?');">Xóa</button>
								</form>
							</td>
						</tr>
					<?php endwhile; ?>
					</tbody>
				</table>
	</div><!--blog-main-->
	<div style="clear:left;"></div>
		<div style="clear:right"></div>
</div><!--wapper-->
<?php require_once("../inc/bottom.php"); ?>
</body>
</html>
