<?php
		session_start();
		include'logic.php';

		if(isset($_GET['id'])){
		$data_v = Video::cargar_data_video($_GET['id']);

		$data_imagen = $data_v->ruta_imagen;
		$categoria = $data_v->categoria;
		$descripcion =$data_v->descripcion;
		$titulo = $data_v->titulo;
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $titulo; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:image" content="https://videosegg.com/<?php echo $data_imagen; ?>">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo $categoria; ?>" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' media="all" />
<!-- //bootstrap -->
<link href="css/dashboard.css" rel="stylesheet">
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' media="all" />
<script src="js/jquery-1.11.1.min.js"></script>
<!--start-smoth-scrolling-->
<!-- fonts -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
<!-- //fonts -->
</head>
  <body>
  	<input type="hidden" id="id_post" value="<?php echo $_GET['id']; ?>">
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><h1><img src="images/logo.png" alt="" /></h1></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
			<div class="top-search">
				<form class="navbar-form navbar-right">
					<input type="text" class="form-control" placeholder="Search...">
					<input type="submit" value=" ">
				</form>
			</div>  
			<div class="header-top-right">
				<div class="file">
					<a href="upload.html">Upload</a>
				</div>	
				<div class="signin">
					<a href="#small-dialog2" class="play-icon popup-with-zoom-anim">Sign Up</a>
					<!-- pop-up-box -->
									<script type="text/javascript" src="js/modernizr.custom.min.js"></script>    
									<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
									<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
									<!--//pop-up-box -->
									<div id="small-dialog2" class="mfp-hide">
										<h3>Create Account</h3> 
										<div class="social-sits">
											<div class="facebook-button">
												<a href="#">Connect with Facebook</a>
											</div>
											<div class="chrome-button">
												<a href="#">Connect with Google</a>
											</div>
											<div class="button-bottom">
												<p>Already have an account? <a href="#small-dialog" class="play-icon popup-with-zoom-anim">Login</a></p>
											</div>
										</div>
										<div class="signup">
											<form>
											<input type="text" class="email" placeholder="Mobile Number" maxlength="10" pattern="[1-9]{1}\d{9}" title="Enter a valid mobile number" />
											</form>
											<div class="continue-button">
												<a href="#small-dialog3" class="hvr-shutter-out-horizontal play-icon popup-with-zoom-anim">CONTINUE</a>
											</div>
										</div>
										<div class="clearfix"> </div>
									</div>	
									<div id="small-dialog3" class="mfp-hide">
										<h3>Create Account</h3> 
										<div class="social-sits">
											<div class="facebook-button">
												<a href="#">Connect with Facebook</a>
											</div>
											<div class="chrome-button">
												<a href="#">Connect with Google</a>
											</div>
											<div class="button-bottom">
												<p>Already have an account? <a href="#small-dialog" class="play-icon popup-with-zoom-anim">Login</a></p>
											</div>
										</div>
										<div class="signup">
											<form method="post">
										    <input type="text" class="email" placeholder="Email" required="required" pattern="([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?" title="Enter a valid email"/>
												<input type="password" placeholder="Password" required="required" pattern=".{6,}" name="usuario"  title="Minimum 6 characters required" autocomplete="off" />
												<input type="text" class="email" placeholder="Mobile Number" maxlength="10" pattern="[1-9]{1}\d{9}" title="Enter a valid mobile number" name="password" />
												<input type="submit"  value="Sign Up"/>
											</form>
										</div>
										<div class="clearfix"> </div>
									</div>	
									<div id="small-dialog7" class="mfp-hide">
										<h3>Create Account</h3> 
										<div class="social-sits">
											<div class="facebook-button">
												<a href="#">Connect with Facebook</a>
											</div>
											<div class="chrome-button">
												<a href="#">Connect with Google</a>
											</div>
											<div class="button-bottom">
												<p>Already have an account? <a href="#small-dialog" class="play-icon popup-with-zoom-anim">Login</a></p>
											</div>
										</div>
										<div class="signup">
											<form action="upload.html">
												<input type="text" class="email" placeholder="Email" required="required" pattern="([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?" title="Enter a valid email"/>
												<input type="password" placeholder="Password" required="required" pattern=".{6,}" title="Minimum 6 characters required" autocomplete="off" />
												<input type="submit"  value="Sign In"/>
											</form>
										</div>
										<div class="clearfix"> </div>
									</div>	
									<div id="small-dialog4" class="mfp-hide">
										<h3>Feedback</h3> 
										<div class="feedback-grids">
											<div class="feedback-grid">
												<p>Suspendisse tristique magna ut urna pellentesque, ut egestas velit faucibus. Nullam mattis lectus ullamcorper dui dignissim, sit amet egestas orci ullamcorper.</p>
											</div>
											<div class="button-bottom">
												<p><a href="#small-dialog" class="play-icon popup-with-zoom-anim">Sign in</a> to get started.</p>
											</div>
										</div>
									</div>
									<div id="small-dialog5" class="mfp-hide">
										<h3>Help</h3> 
											<div class="help-grid">
												<p>Suspendisse tristique magna ut urna pellentesque, ut egestas velit faucibus. Nullam mattis lectus ullamcorper dui dignissim, sit amet egestas orci ullamcorper.</p>
											</div>
											<div class="help-grids">
												<div class="help-button-bottom">
													<p><a href="#small-dialog4" class="play-icon popup-with-zoom-anim">Feedback</a></p>
												</div>
												<div class="help-button-bottom">
													<p><a href="#small-dialog6" class="play-icon popup-with-zoom-anim">Lorem ipsum dolor sit amet</a></p>
												</div>
												<div class="help-button-bottom">
													<p><a href="#small-dialog6" class="play-icon popup-with-zoom-anim">Nunc vitae rutrum enim</a></p>
												</div>
												<div class="help-button-bottom">
													<p><a href="#small-dialog6" class="play-icon popup-with-zoom-anim">Mauris at volutpat leo</a></p>
												</div>
												<div class="help-button-bottom">
													<p><a href="#small-dialog6" class="play-icon popup-with-zoom-anim">Mauris vehicula rutrum velit</a></p>
												</div>
												<div class="help-button-bottom">
													<p><a href="#small-dialog6" class="play-icon popup-with-zoom-anim">Aliquam eget ante non orci fac</a></p>
												</div>
											</div>
									</div>
									<div id="small-dialog6" class="mfp-hide">
										<div class="video-information-text">
											<h4>Video information & settings</h4>
											<p>Suspendisse tristique magna ut urna pellentesque, ut egestas velit faucibus. Nullam mattis lectus ullamcorper dui dignissim, sit amet egestas orci ullamcorper.</p>
											<ol>
												<li>Nunc vitae rutrum enim. Mauris at volutpat leo. Vivamus dapibus mi ut elit fermentum tincidunt.</li>
												<li>Nunc vitae rutrum enim. Mauris at volutpat leo. Vivamus dapibus mi ut elit fermentum tincidunt.</li>
												<li>Nunc vitae rutrum enim. Mauris at volutpat leo. Vivamus dapibus mi ut elit fermentum tincidunt.</li>
												<li>Nunc vitae rutrum enim. Mauris at volutpat leo. Vivamus dapibus mi ut elit fermentum tincidunt.</li>
												<li>Nunc vitae rutrum enim. Mauris at volutpat leo. Vivamus dapibus mi ut elit fermentum tincidunt.</li>
											</ol>
										</div>
									</div>
									<script>
											$(document).ready(function() {
											$('.popup-with-zoom-anim').magnificPopup({
												type: 'inline',
												fixedContentPos: false,
												fixedBgPos: true,
												overflowY: 'auto',
												closeBtnInside: true,
												preloader: false,
												midClick: true,
												removalDelay: 300,
												mainClass: 'my-mfp-zoom-in'
											});
																											
											});
									</script>	
				</div>
				<div class="signin">
					<a href="#small-dialog" class="play-icon popup-with-zoom-anim">Sign In</a>
					<div id="small-dialog" class="mfp-hide">
						<h3>Login</h3>
						<div class="social-sits">
							<div class="facebook-button">
								<a href="#">Connect with Facebook</a>
							</div>
							<div class="chrome-button">
								<a href="#">Connect with Google</a>
							</div>
							<div class="button-bottom">
								<p>New account? <a href="#small-dialog2" class="play-icon popup-with-zoom-anim">Signup</a></p>
							</div>
						</div>
						<div class="signup">
							<form>
								<input type="text" class="email" placeholder="Enter email / mobile" required="required" pattern="([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?"/>
								<input type="password" placeholder="Password" required="required" pattern=".{6,}" title="Minimum 6 characters required" autocomplete="off" />
								<input type="submit"  value="LOGIN"/>
							</form>
							<div class="forgot">
								<a href="#">Forgot password ?</a>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
        </div>
		<div class="clearfix"> </div>
      </div>
    </nav>
        <div class="col-sm-3 col-md-2 sidebar">
			<div class="top-navigation">
				<div class="t-menu">MENU</div>
				<div class="t-img">
					<img src="images/lines.png" alt="" />
				</div>
				<div class="clearfix"> </div>
			</div>
				<div class="drop-navigation drop-navigation">
				  <ul class="nav nav-sidebar">
					<li class="active"><a href="index.php" class="home-icon"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
					<li><a href="cam.html" class="user-icon"><span class="glyphicon glyphicon-home glyphicon-blackboard" aria-hidden="true"></span>Sexo En Vivo</a></li>
					<li><a href="history.html" class="sub-icon"><span class="glyphicon glyphicon-home glyphicon-hourglass" aria-hidden="true"></span>History</a></li>
					<li><a href="#" class="menu1"><span class="glyphicon glyphicon-film" aria-hidden="true"></span>Categorias<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></a></li>
						<ul class="cl-effect-2">
							<li><a href="index.php?categoria=jovenes">Jovenes</a></li>                                   
							<li><a href="index.php?categoria=Amateur">Amateur</a></li>
							<li><a href="index.php?categoria=Lesbianas">Lesbianas</a></li>
							<li><a href="index.php?categoria=trios">Trios</a></li>                                             
							<li><a href="index.php?categoria=Anal">Anal</a></li>
							<li><a href="index.php?categoria=Latina">Latinas</a></li> 
				            <li><a style="font-size:14px;" href="categorias.php">Ver Mas...</a></li>
						</ul>
						<!-- script-for-menu -->
						<script>
							$( "li a.menu1" ).click(function() {
							$( "ul.cl-effect-2" ).slideToggle( 300, function() {
							// Animation complete.
							});
							});
						</script>
			
						<!-- script-for-menu -->
						<script>
							$( "li a.menu" ).click(function() {
							$( "ul.cl-effect-1" ).slideToggle( 300, function() {
							// Animation complete.
							});
							});
						</script>
					
					<li><a href="news.html" class="news-icon"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>Soporte</a></li>
				  </ul>
				  <!-- script-for-menu -->
						<script>
							$( ".top-navigation" ).click(function() {
							$( ".drop-navigation" ).slideToggle( 300, function() {
							// Animation complete.
							});
							});
						</script>
					<div class="side-bottom">
						<div class="side-bottom-icons">
							<ul class="nav2">
								<li><a href="#" class="facebook"> </a></li>
								<li><a href="#" class="facebook twitter"> </a></li>
								<li><a href="#" class="facebook chrome"> </a></li>
								<li><a href="#" class="facebook dribbble"> </a></li>
							</ul>
						</div>
						<div class="copyright">
							<p>Copyright © 2018 VideosEgg. All Rights Reserved.</p>
						</div>
					</div>
				</div>
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="show-top-grids">
				<div class="col-sm-8 single-left">
					<?php

						Video::cargar_video($_GET['id']);

					?>
					<div class="song-grid-right">
						<div class="share">
							<h5>Share this</h5>
							<ul>
								
								<li><a href="#" class="icon whatsapp-icon">Whatsapp</a></li>
								<li><a href="#" class="icon like">Like</a></li>
								<li><a href="#" class="icon comment-icon">Dislike</a></li>
								<li class="view">200 Views</li>
							</ul>
						</div>
					</div>
					<div class="clearfix"> </div>
					<div class="published">
						<script src="jquery.min.js"></script>
							<script>
								$(document).ready(function () {
									size_li = $("#myList li").size();
									x=1;
									$('#myList li:lt('+x+')').show();
									$('#loadMore').click(function () {
										x= (x+1 <= size_li) ? x+1 : size_li;
										$('#myList li:lt('+x+')').show();
									});
									$('#showLess').click(function () {
										x=(x-1<0) ? 1 : x-1;
										$('#myList li').not(':lt('+x+')').hide();
									});
								});
							</script>
							<div class="load_more">	
								<ul id="myList">
									<li>
										<h4><?php echo $titulo; ?></h4>
										<?php echo  "<p>$descripcion</p>"; ?>
									</li>
									<li>
							
										<div class="load-grids">
											<div class="load-grid">
												<p>Category</p>
											</div>
											<div class="load-grid">
												<a href="movies.html">Entertainment</a>
											</div>
											<div class="clearfix"> </div>
										</div>
									</li>
								</ul>
							</div>
					</div>
					<div class="all-comments">
						<div class="all-comments-info">
							<a href="#">Comentarios (8,657)</a>
							<div class="box">
								<form>
									
									<textarea placeholder="Message" required=" "></textarea>
									<input type="submit" value="Enviar">
									<div class="clearfix"> </div>
								</form>
							</div>
							<div class="all-comments-buttons">
								<ul>
									<li><a href="#" class="top">Comentarios Recientes</a></li>
									
									<li><a href="#" class="top my-comment">Mis Comentarios</a></li>
								</ul>
							</div>
						</div>
						<div class="media-grids" id="comentarios">
							<div class="media">
								<h5>Tom Brown</h5>
								<div class="media-left">
									<a href="#">
										
									</a>
								</div>
								<div class="media-body">
									<p>Maecenas ultricies rhoncus tincidunt maecenas imperdiet ipsum id ex pretium hendrerit maecenas imperdiet ipsum id ex pretium hendrerit</p>
									<span>View all posts by :<a href="#"> Admin </a></span>
								</div>
							</div>
							<div class="media">
								
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4 single-right">
					<h3>Up Next</h3>
					
						
							<?php

								Video::cargar_relacion($categoria);
							?>

					
				</div>
				<div class="clearfix"> </div>
			</div>
			<!-- footer -->
			<div class="footer">
				<div class="footer-grids">
					<div class="footer-top">
						<div class="footer-top-nav">
							<ul>
								<li><a href="about.html">About</a></li>
								<li><a href="press.html">Press</a></li>
								<li><a href="copyright.html">Copyright</a></li>
								<li><a href="creators.html">Creators</a></li>
								<li><a href="#">Advertise</a></li>
								<li><a href="developers.html">Developers</a></li>
							</ul>
						</div>
						<div class="footer-bottom-nav">
							<ul>
								<li><a href="terms.html">Terms</a></li>
								<li><a href="privacy.html">Privacy</a></li>
								<li><a href="#small-dialog4" class="play-icon popup-with-zoom-anim">Send feedback</a></li>
								<li><a href="privacy.html">Policy & Safety </a></li>
								<li><a href="try.html">Try something new!</a></li>
							</ul>
						</div>
					</div>
					<div class="footer-bottom">
						<ul>
							<li class="languages">
								<select class="form-control bfh-countries" data-country="US">
									<option value="">Select Language</option>
									<option>Spanish</option>
									<option>French</option>
									<option>German</option>
									<option>Italian</option>
									<option>Chinese</option>
									<option>Tagalog</option>
									<option>Polish</option>
									<option>Korean</option>
									<option>Vietnamese</option>
									<option>Portuguese</option>
									<option>Japanese</option>
									<option>Greek</option>
									<option>Arabic</option>
									<option>Hindi (urdu)</option>
									<option>Russian</option>
									<option>Yiddish</option>
									<option>Thai (laotian)</option>
									<option>Persian</option>
									<option>French Creole</option>
									<option>Armenian</option>
									<option>Navaho</option>
									<option>Hungarian</option>
									<option>Hebrew</option>
									<option>Dutch</option>
									<option>Mon-khmer (cambodian)</option>
									<option>Gujarathi</option>
									<option>Ukrainian</option>
									<option>Czech</option>
									<option>Pennsylvania Dutch</option>
									<option>Miao (hmong)</option>
									<option>Norwegian</option>
									<option>Slovak</option>
									<option>Swedish</option>
									<option>Serbocroatian</option>
									<option>Kru</option>
									<option>Rumanian</option>
									<option>Lithuanian</option>
									<option>Finnish</option>
									<option>Panjabi</option>
									<option>Formosan</option>
									<option>Croatian</option>
									<option>Turkish</option>
									<option>Ilocano</option>
									<option>Bengali</option>
									<option>Danish</option>
									<option>Syriac</option>
									<option>Samoan</option>
									<option>Malayalam</option>
									<option>Cajun</option>
									<option>Amharic</option>
								</select>
							</li>
							<li class="languages">
								<select class="form-control bfh-countries">
									<option value="">Select Country</option>
									<option value="AFG">Afghanistan</option>
									<option value="ALA">Åland Islands</option>
									<option value="ALB">Albania</option>
									<option value="DZA">Algeria</option>
									<option value="ASM">American Samoa</option>
									<option value="AND">Andorra</option>
									<option value="AGO">Angola</option>
									<option value="AIA">Anguilla</option>
									<option value="ATA">Antarctica</option>
									<option value="ATG">Antigua and Barbuda</option>
									<option value="ARG">Argentina</option>
									<option value="ARM">Armenia</option>
									<option value="ABW">Aruba</option>
									<option value="AUS">Australia</option>
									<option value="AUT">Austria</option>
									<option value="AZE">Azerbaijan</option>
									<option value="BHS">Bahamas</option>
									<option value="BHR">Bahrain</option>
									<option value="BGD">Bangladesh</option>
									<option value="BRB">Barbados</option>
									<option value="BLR">Belarus</option>
									<option value="BEL">Belgium</option>
									<option value="BLZ">Belize</option>
									<option value="BEN">Benin</option>
									<option value="BMU">Bermuda</option>
									<option value="BTN">Bhutan</option>
									<option value="BOL">Bolivia, Plurinational State of</option>
									<option value="BES">Bonaire, Sint Eustatius and Saba</option>
									<option value="BIH">Bosnia and Herzegovina</option>
									<option value="BWA">Botswana</option>
									<option value="BVT">Bouvet Island</option>
									<option value="BRA">Brazil</option>
									<option value="IOT">British Indian Ocean Territory</option>
									<option value="BRN">Brunei Darussalam</option>
									<option value="BGR">Bulgaria</option>
									<option value="BFA">Burkina Faso</option>
									<option value="BDI">Burundi</option>
									<option value="KHM">Cambodia</option>
									<option value="CMR">Cameroon</option>
									<option value="CAN">Canada</option>
									<option value="CPV">Cape Verde</option>
									<option value="CYM">Cayman Islands</option>
									<option value="CAF">Central African Republic</option>
									<option value="TCD">Chad</option>
									<option value="CHL">Chile</option>
									<option value="CHN">China</option>
									<option value="CXR">Christmas Island</option>
									<option value="CCK">Cocos (Keeling) Islands</option>
									<option value="COL">Colombia</option>
									<option value="COM">Comoros</option>
									<option value="COG">Congo</option>
									<option value="COD">Congo, the Democratic Republic of the</option>
									<option value="COK">Cook Islands</option>
									<option value="CRI">Costa Rica</option>
									<option value="CIV">Côte d'Ivoire</option>
									<option value="HRV">Croatia</option>
									<option value="CUB">Cuba</option>
									<option value="CUW">Curaçao</option>
									<option value="CYP">Cyprus</option>
									<option value="CZE">Czech Republic</option>
									<option value="DNK">Denmark</option>
									<option value="DJI">Djibouti</option>
									<option value="DMA">Dominica</option>
									<option value="DOM">Dominican Republic</option>
									<option value="ECU">Ecuador</option>
									<option value="EGY">Egypt</option>
									<option value="SLV">El Salvador</option>
									<option value="GNQ">Equatorial Guinea</option>
									<option value="ERI">Eritrea</option>
									<option value="EST">Estonia</option>
									<option value="ETH">Ethiopia</option>
									<option value="FLK">Falkland Islands (Malvinas)</option>
									<option value="FRO">Faroe Islands</option>
									<option value="FJI">Fiji</option>
									<option value="FIN">Finland</option>
									<option value="FRA">France</option>
									<option value="GUF">French Guiana</option>
									<option value="PYF">French Polynesia</option>
									<option value="ATF">French Southern Territories</option>
									<option value="GAB">Gabon</option>
									<option value="GMB">Gambia</option>
									<option value="GEO">Georgia</option>
									<option value="DEU">Germany</option>
									<option value="GHA">Ghana</option>
									<option value="GIB">Gibraltar</option>
									<option value="GRC">Greece</option>
									<option value="GRL">Greenland</option>
									<option value="GRD">Grenada</option>
									<option value="GLP">Guadeloupe</option>
									<option value="GUM">Guam</option>
									<option value="GTM">Guatemala</option>
									<option value="GGY">Guernsey</option>
									<option value="GIN">Guinea</option>
									<option value="GNB">Guinea-Bissau</option>
									<option value="GUY">Guyana</option>
									<option value="HTI">Haiti</option>
									<option value="HMD">Heard Island and McDonald Islands</option>
									<option value="VAT">Holy See (Vatican City State)</option>
									<option value="HND">Honduras</option>
									<option value="HKG">Hong Kong</option>
									<option value="HUN">Hungary</option>
									<option value="ISL">Iceland</option>
									<option value="IND">India</option>
									<option value="IDN">Indonesia</option>
									<option value="IRN">Iran, Islamic Republic of</option>
									<option value="IRQ">Iraq</option>
									<option value="IRL">Ireland</option>
									<option value="IMN">Isle of Man</option>
									<option value="ISR">Israel</option>
									<option value="ITA">Italy</option>
									<option value="JAM">Jamaica</option>
									<option value="JPN">Japan</option>
									<option value="JEY">Jersey</option>
									<option value="JOR">Jordan</option>
									<option value="KAZ">Kazakhstan</option>
									<option value="KEN">Kenya</option>
									<option value="KIR">Kiribati</option>
									<option value="PRK">Korea, Democratic People's Republic of</option>
									<option value="KOR">Korea, Republic of</option>
									<option value="KWT">Kuwait</option>
									<option value="KGZ">Kyrgyzstan</option>
									<option value="LAO">Lao People's Democratic Republic</option>
									<option value="LVA">Latvia</option>
									<option value="LBN">Lebanon</option>
									<option value="LSO">Lesotho</option>
									<option value="LBR">Liberia</option>
									<option value="LBY">Libya</option>
									<option value="LIE">Liechtenstein</option>
									<option value="LTU">Lithuania</option>
									<option value="LUX">Luxembourg</option>
									<option value="MAC">Macao</option>
									<option value="MKD">Macedonia, the former Yugoslav Republic of</option>
									<option value="MDG">Madagascar</option>
									<option value="MWI">Malawi</option>
									<option value="MYS">Malaysia</option>
									<option value="MDV">Maldives</option>
									<option value="MLI">Mali</option>
									<option value="MLT">Malta</option>
									<option value="MHL">Marshall Islands</option>
									<option value="MTQ">Martinique</option>
									<option value="MRT">Mauritania</option>
									<option value="MUS">Mauritius</option>
									<option value="MYT">Mayotte</option>
									<option value="MEX">Mexico</option>
									<option value="FSM">Micronesia, Federated States of</option>
									<option value="MDA">Moldova, Republic of</option>
									<option value="MCO">Monaco</option>
									<option value="MNG">Mongolia</option>
									<option value="MNE">Montenegro</option>
									<option value="MSR">Montserrat</option>
									<option value="MAR">Morocco</option>
									<option value="MOZ">Mozambique</option>
									<option value="MMR">Myanmar</option>
									<option value="NAM">Namibia</option>
									<option value="NRU">Nauru</option>
									<option value="NPL">Nepal</option>
									<option value="NLD">Netherlands</option>
									<option value="NCL">New Caledonia</option>
									<option value="NZL">New Zealand</option>
									<option value="NIC">Nicaragua</option>
									<option value="NER">Niger</option>
									<option value="NGA">Nigeria</option>
									<option value="NIU">Niue</option>
									<option value="NFK">Norfolk Island</option>
									<option value="MNP">Northern Mariana Islands</option>
									<option value="NOR">Norway</option>
									<option value="OMN">Oman</option>
									<option value="PAK">Pakistan</option>
									<option value="PLW">Palau</option>
									<option value="PSE">Palestinian Territory, Occupied</option>
									<option value="PAN">Panama</option>
									<option value="PNG">Papua New Guinea</option>
									<option value="PRY">Paraguay</option>
									<option value="PER">Peru</option>
									<option value="PHL">Philippines</option>
									<option value="PCN">Pitcairn</option>
									<option value="POL">Poland</option>
									<option value="PRT">Portugal</option>
									<option value="PRI">Puerto Rico</option>
									<option value="QAT">Qatar</option>
									<option value="REU">Réunion</option>
									<option value="ROU">Romania</option>
									<option value="RUS">Russian Federation</option>
									<option value="RWA">Rwanda</option>
									<option value="BLM">Saint Barthélemy</option>
									<option value="SHN">Saint Helena, Ascension and Tristan da Cunha</option>
									<option value="KNA">Saint Kitts and Nevis</option>
									<option value="LCA">Saint Lucia</option>
									<option value="MAF">Saint Martin (French part)</option>
									<option value="SPM">Saint Pierre and Miquelon</option>
									<option value="VCT">Saint Vincent and the Grenadines</option>
									<option value="WSM">Samoa</option>
									<option value="SMR">San Marino</option>
									<option value="STP">Sao Tome and Principe</option>
									<option value="SAU">Saudi Arabia</option>
									<option value="SEN">Senegal</option>
									<option value="SRB">Serbia</option>
									<option value="SYC">Seychelles</option>
									<option value="SLE">Sierra Leone</option>
									<option value="SGP">Singapore</option>
									<option value="SXM">Sint Maarten (Dutch part)</option>
									<option value="SVK">Slovakia</option>
									<option value="SVN">Slovenia</option>
									<option value="SLB">Solomon Islands</option>
									<option value="SOM">Somalia</option>
									<option value="ZAF">South Africa</option>
									<option value="SGS">South Georgia and the South Sandwich Islands</option>
									<option value="SSD">South Sudan</option>
									<option value="ESP">Spain</option>
									<option value="LKA">Sri Lanka</option>
									<option value="SDN">Sudan</option>
									<option value="SUR">Suriname</option>
									<option value="SJM">Svalbard and Jan Mayen</option>
									<option value="SWZ">Swaziland</option>
									<option value="SWE">Sweden</option>
									<option value="CHE">Switzerland</option>
									<option value="SYR">Syrian Arab Republic</option>
									<option value="TWN">Taiwan, Province of China</option>
									<option value="TJK">Tajikistan</option>
									<option value="TZA">Tanzania, United Republic of</option>
									<option value="THA">Thailand</option>
									<option value="TLS">Timor-Leste</option>
									<option value="TGO">Togo</option>
									<option value="TKL">Tokelau</option>
									<option value="TON">Tonga</option>
									<option value="TTO">Trinidad and Tobago</option>
									<option value="TUN">Tunisia</option>
									<option value="TUR">Turkey</option>
									<option value="TKM">Turkmenistan</option>
									<option value="TCA">Turks and Caicos Islands</option>
									<option value="TUV">Tuvalu</option>
									<option value="UGA">Uganda</option>
									<option value="UKR">Ukraine</option>
									<option value="ARE">United Arab Emirates</option>
									<option value="GBR">United Kingdom</option>
									<option value="USA">United States</option>
									<option value="UMI">United States Minor Outlying Islands</option>
									<option value="URY">Uruguay</option>
									<option value="UZB">Uzbekistan</option>
									<option value="VUT">Vanuatu</option>
									<option value="VEN">Venezuela, Bolivarian Republic of</option>
									<option value="VNM">Viet Nam</option>
									<option value="VGB">Virgin Islands, British</option>
									<option value="VIR">Virgin Islands, U.S.</option>
									<option value="WLF">Wallis and Futuna</option>
									<option value="ESH">Western Sahara</option>
									<option value="YEM">Yemen</option>
									<option value="ZMB">Zambia</option>
									<option value="ZWE">Zimbabwe</option>
								</select>
							</li>
							<li class="languages">
								<select class="form-control bfh-countries" data-country="US">
									<option value="">Safety Off</option>
									<option value="">Safety On</option>
								</select>
							</li>
							<li><a href="history.html" class="f-history">History</a></li>
							<li><a href="#small-dialog5" class="play-icon popup-with-zoom-anim f-history f-help">Help</a></li>
						</ul>
					</div>
				</div>
			</div>
			<!-- //footer -->
		</div>
		<div class="clearfix"> </div>
	
	<div class="drop-menu">
		<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu4">
		  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Regular link</a></li>
		  <li role="presentation" class="disabled"><a role="menuitem" tabindex="-1" href="#">Disabled link</a></li>
		  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another link</a></li>
		</ul>
	</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.min.js"></script>
    <script type="../js/ver_video.js"></script>
    <script type="text/javascript">
    	$('document').ready(function(){

    			leer_comentarios($('#id_post').val());

    	});

    </script>

    <?php

    	if(!isset($_POST['usuario'])){

    //	Video::login($_POST['usuario'],$_POST['clave']);

    }

    ?>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
  </body>
</html>