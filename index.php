<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title></title>
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="assets/css/lightbox.css">
	
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	
	<link rel="stylesheet" type="text/css" href="assets/css/main.css"/>
	<link rel="stylesheet" type="text/css" href="assets/css/responsive.css"/>
	
	
	
</head>
<body>
	<h3>
		<?php
			$path = 'files/';
			if(isset($_POST['submit'])){
				$num_of_files = count($_FILES['file']['name']);
				for($i=0; $i < $num_of_files; $i++){
					move_uploaded_file($_FILES['file']['tmp_name'][$i], $path.time().'_'.rand(1000,100000).$_FILES['file']['name'][$i]);
				}
			}
		?>
	</h3>
	
	<div class="fu_form container text-center">
		<h3>Testing File Upload</h3>
		<form method="POST" action="" enctype="multipart/form-data">
			<label>Your files:</label>
			<input id="upload_button" type="file" name="file[]" required multiple />
			<input id="submit_button" type="submit" name="submit" value="Upload" />
		</form>
	</div>
	
		<?php 
			$allfiles = scandir($path);
			echo '<div class="gallery_area container"><ul class="grid">';
			foreach($allfiles as $f){
				$pathinfo = pathinfo($path.$f);
				if($f != '.' && $f != '..'){
					if($pathinfo['extension']== 'jpg' || $pathinfo['extension']== 'gif' || $pathinfo['extension']== 'png' || $pathinfo['extension']== 'jpeg'){
					echo '<li class="image_container item" >
						<a class="zoom_btn" href="files/'.$f.'" data-lightbox="mygallery">
							<i class="fa fa-search"></i>
							</a>
						<img class="u_files" src="files/'.$f.'"/> 
						<a class="delete_btn" href="deletefile.php?filename='.$f.'">
							<i class="fa fa-trash delete_icon"></i>
						</a>
					</li>';
					}
				}
			}
			echo '</ul></div>';
			
		?>
	
	
	
	
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/lightbox-plus-jquery.js"></script>
	<script src="assets/js/web-animations.min.js"></script>
	<script src="assets/js/hammer.min.js"></script>
	<script src="assets/js/velocity.min.js"></script>
	<script src="assets/js/muuri.js"></script>
	
	
	
	<script src="assets/js/main.js" ></script>
	
</body>
</html>








