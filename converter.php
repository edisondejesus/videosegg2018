 <!DOCTYPE html>
 <html>
 <head>
 	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description"   content="Dowanlod video  from to mp3 convert video mp3" charset="utf-8">
	<title>Conver your video to mp3</title>
 </head>
 <body>
 	<div class="container-fluid">
 			<div class="row" style="background:black; height:120px; color:white;"> 
 				<img src="assets/logo.png" style="height:50px; width:280px;margin-left:2%;   margin-top:2%;">
 			</div>
 			<div class="row">
 				<div class="col-md-3"></div>
 				<div class="col-md-5">
 					<h1>Insert url</h1>	
 					<form method="post" action="">
 						<input type="text" name="url_video" class="form-control"><br>
 						<input type="submit" name="convert" class="btn btn-primary" value="Convert to mp3">
 					</form>
 					<?php
 						if(isset($_POST['convert'])){


 							$video = $_POST['url_video'];

 							echo exec("youtube-dl -o archivo.mp4 https://www.youtube.com/watch?v=Y14ZLXOqQ6c&list=RDY14ZLXOqQ6c");
 							echo exec("ffmpeg  -i archivo.mp4 conver/archivo.mp3");



 						}


 					?>
 	

 				</div>
 				<div class="col-md-3">
 							<!-- JuicyAds v3.0 -->
							<div style="text-align:center">
							<script async src="//adserver.juicyads.com/js/jads.js"></script>
							<ins id="650448" data-width="308" data-height="298"></ins>
							<script>(adsbyjuicy = window.adsbyjuicy || []).push({'adzone':650448});</script>
							<!--JuicyAds END-->
 				<			/div>
 			</div>



 	</div>
 </body>
 </html>