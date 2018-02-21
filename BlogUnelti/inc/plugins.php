<?php 
	function time_stamp($time){
		$cur_time=time();
		$time_elapsed=$cur_time-$time;
		$seconds=$time_elapsed;
		$minutes=round($time_elapsed/60);
		$minutes = round($time_elapsed / 60 );
		$hours = round($time_elapsed / 3600);
		$days = round($time_elapsed / 86400 );
		$weeks = round($time_elapsed / 604800);
		$months = round($time_elapsed / 2600640 );
		$years = round($time_elapsed / 31207680 );

		// seconds
		if($seconds<=60){
			echo "$seconds giây trước ";
		}

		// minutes
		else if($minutes<=60){
			if($minutes==1){
				echo "1 phút trước";
			}else{
				echo "$minutes phút trước";
			}
		}
		else if($hours<=24){
			if($hours==1){
				echo "1 giờ trước";
			}else{
				echo "$hours giờ trước";
			}
		}
		else if($days<=7){
			if($days==1){
				echo "1 ngày trước";
			}else{
				echo "$days ngày trước";
			}
		}
		else if($weeks<=4.3){
			if($days	==1){
				echo "1 tuần trước";
			}else{
				echo "$weeks tuần trước";
			}
		}
		else if($months<=12){
			if($months==1){
				echo "1 tháng trước";
			}else{
				echo "$months tuần trước";
			}
		}
		else{
			if($years==1){
				echo "1 năm trước";
			}else{
				echo "$years năm trước";
			}
		}
	} 
 ?>