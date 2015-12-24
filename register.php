<!DOCTYPE HTML>
<!--
	Read Only by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<?php include 'data/php/sesioa.php';?>
	<head>
		<title>Liburutegia</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Header -->
			<section id="header">
				<?php
					showProfile();
					mainMenua();
				?>
				<footer>
					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
						<li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
					</ul>
				</footer>
			</section>

		<!-- Wrapper -->
			<div id="wrapper">
				<!-- Main -->
					<div id="main">
							<section id="one">
								<div class="container">
									<h3>Erregistratu</h3>
									<form method="post" action="#">
										<div class="row uniform">
											<div class="12u"><input type="text" name="nick" id="nick" placeholder="Nick" /></div>
										</div>
										<div class="row uniform">
											<div class="12u"><input type="text" name="izena" id="izena" placeholder="Izena" /></div>
										</div>
										<div class="row uniform">
											<div class="12u"><input type="text" name="abizenak" id="abizenak" placeholder="Abizenak" /></div>
										</div>
										<div class="row uniform">
											<div class="12u"><input type="password" name="pasahitza1" id="pasahitza1" placeholder="Pasahitza" /></div>
										</div>
										<div class="row uniform">
											<div class="12u"><input type="password" name="pasahitza2" id="pasahitza2" placeholder="Sartu pasahitz berdina" /></div>
										</div>
										<div class="row uniform">
											<div class="12u"><input type="text" name="eposta" id="eposta" placeholder="Eposta" /></div>
										</div>
										<div class="row uniform">
											<div class="12u">
												<ul class="actions">
													<li><input type="submit" class="special" value="Erregistratu" /></li>
													<li><input type="reset" value="Reset" /></li>
												</ul>
											</div>
										</div>
									</form>
									<?php
										
									?>
								</div>
							</section>

					</div>

				<!-- Footer -->
					<section id="footer">
						<div class="container">
							<ul class="copyright">
								<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
							</ul>
						</div>
					</section>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollzer.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>