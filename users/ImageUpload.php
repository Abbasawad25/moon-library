<?php 

	$imgName = $_FILES['image']['name'];
	$imgTmpName =$_FILES['image']['tmp_name'];
	$imgSize = $_FILES['image']['size'];
	$imgError = $_FILES['image']['error'];
	$imgExt = explode('.', $imgName);
    
	$actualFileExt = strtolower(end($imgExt));
	$imgName = random_int(4,56). base64_encode("yk") . str_shuffle("oneplus") . rand(1,100000) ."." . $actualFileExt ;
	echo $imgName;
	$allowed = array('jpg','jpeg','png','pdf');

	if (in_array($actualFileExt, $allowed)) {
		if ($imgError === 0) {
			if ($imgSize < 5000000) {
				$fileDestination = '../upload/'. $imgName;
				move_uploaded_file($imgTmpName, $fileDestination);
				echo "شكر";
			} else {
				echo "حجم الملف كبير";
			}
		}else{
			echo "خطا برفع املف";
		}
	}else {
			echo "نوع غير معروف";
	}
	


 