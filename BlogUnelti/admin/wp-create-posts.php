<?php require_once("../inc/ketnoi.php"); 
		checklogin();
?>
<?php
	if(isset($_SESSION["user"])){
		$id=$_SESSION["user"];
			$sql="SELECT * FROM taikhoan WHERE username='{$id}'";
			$query=mysqli_query($conn,$sql);
			$user=mysqli_fetch_array($query,MYSQLI_ASSOC);
	}
	$user_id=$user["id"];
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$hienthi=$_POST["hienthi"];
		$title=$_POST["title"];
		$content=$_POST["content"];
		$excerpt=$_POST["excerpt"];
		$images=$_FILES["images"]["name"];
		$cat_id=$_POST["cat_id"];

		$sql="INSERT INTO $hienthi (title,content,excerpt,images,cat_id,user_id)
			VALUES('{$title}','{$content}','{$excerpt}','{$images}','{$cat_id}','{$user_id}')";
		$query=mysqli_query($conn,$sql);
		if(!empty($images)){
			
			move_uploaded_file($_FILES["images"]["tmp_name"],"/var/www/html/BlogUneti/BlogUnelti/images/".$_FILES["images"]["name"]);
		}
		if($query){
			echo "<script language='javascript'>";
			echo "alert('Thêm bài viết thành công!!!');";
			echo "</script>";
		}else{
			// echo "<script language='javascript'>";
			// echo "alert('Thêm bài viết thất bại!!!');";
			// echo "</script>";
			// 
			echo "That bai" .mysqli_error($conn);
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Trang thêm bài viết mới | Đại học kinh tế kỹ thuật công nghiệp</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="../css/awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../js/slick/slick-1.8.0/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="../js/slick/slick-1.8.0/slick/slick-theme.css">
	<script src="../js/jquery.js"></script>
	<script src="../js/slick/slick-1.8.0/slick/slick.min.js"></script>
	<script src="../js/tinymce1/tinymce/js/tinymce/tinymce.min.js"></script>

	<script src="j../s/jmain.js"></script>
	<script>
		tinymce.init({
		  selector: 'textarea',
		  elements : "textarea_full",
		  height: 300,
		  theme: 'modern',
		  plugins: 'image code',
		  toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | image | code',
		  image_advtab: true,
		  templates: [
		    { title: 'Test template 1', content: 'Test 1' },
		    { title: 'Test template 2', content: 'Test 2' }
		  ],
		  content_css: [
		    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
		    '//www.tinymce.com/css/codepen.min.css'
		  ]
	 	});
	</script>
</head>
<body>
	<?php require_once("../inc/header.php") ?>
	<div id="wapper">
		
		<?php require_once("../inc/luachon.php"); ?>
		<div id="blog-main">
			<div class="blog-main-left">
				<div class="list-title">
						<div class="title"><i class="fa fa-user"></i> Thông tin</div>
				</div>
				<div class="info-content">
					<div class="info-img">
						<img src="../images/nen.jpg"><br>
					</div>
					<?php 
						if(isset($_SESSION["user"])){
							
							$id=$_SESSION["user"];
							$sql="SELECT * FROM taikhoan WHERE username='{$id}'";
							$query=mysqli_query($conn,$sql);
							$row=mysqli_fetch_array($query,MYSQLI_ASSOC);

							echo "<a href='wp-info.php'>". $row["hoten"]."</a>";
						}
					 ?>
				</div>

			</div><!--blog-main-left-->

			<div class="blog-main-right">
				<div class="list-title">
					<div class="title"><i class="fa fa-plus"></i> Thêm bài viết mới</div>
				</div>	

				<form method="post" class="form-plus" enctype="multipart/form-data">
					<label>
						<h4>Tên bài viết</h4>
						<input  name="title" placeholder="Nhập tên bài viết" class="input-text">
					</label>
					<label>
						<h4>Nội dung miêu tả</h4>
						<textarea name="excerpt" id="textarea_full"></textarea>
					</label>
					<label>
						<h4>Nội dung bài</h4>
						<textarea name="content" id="textarea_full"></textarea>
					</label>
					<label>
						<h4>Ảnh đại diện</h4>
						<input type="file" src="<?php echo $images; ?>" name="images" name="img">
					</label>
					<label>
						<h4>Chuyên mục</h4>
						<select name="cat_id">
							<option> --- Chọn danh mục ---</option>
							<?php 
								$sql="SELECT * FROM category";
								$query=mysqli_query($conn,$sql);
								while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)):
							 ?>
								<option value="<?php echo $row['id']; ?>"><?php echo $row['title']; ?></option>
							<?php endwhile; ?>
						</select>
					</label>
					<label>
						<h4>Hiển thị</h4>
						<select name="hienthi">
							<option> --- Hiển thị ---</option>
							<option value="post">Bài viết mới</option>
							<option value="post_hot">Bài viết hot</option>

						</select>

					</label>
					<br><br>
					<center><button type="submit">Thêm bài viết</button></center>
					<br>

				</form>
			</div><!--blog-main-right-->
		
		</div><!--blog-main-->
		<div style="clear:left;"></div>
		<div style="clear:right"></div>
	</div><!--wapper-->
	
	<?php require_once("../inc/bottom.php") ?>

</body>
</html>