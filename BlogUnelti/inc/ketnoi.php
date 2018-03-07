<?php 
	session_start();
	$conn=mysqli_connect("localhost","root","root","Web_club");
	if($conn){
		mysqli_set_charset($conn,"utf8");
	}else{
		die("Không kết nối được csdl").mysqli_error($conn);
	}

	function checklogin(){
		global $_SESSION;
		if(empty($_SESSION["user"])){
			header("location:dang-nhap.php");
		}
	}

	$postpage=9;
	function get_total_post(){
		global $conn;
		$sql="SELECT COUNT(id) AS total FROM post";
		$rs=mysqli_query($conn,$sql);
		$total=mysqli_fetch_array($rs,MYSQLI_ASSOC);
		return $total["total"];
	}
 ?>