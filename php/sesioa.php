<?php
	
	session_start();

	function mainMenua(){
		echo "<nav id='nav'>";
			echo "<ul>";
				//Erabiltzaile eta ez erabiltzaileantzat
				echo "<li><a href='index.php'>Hasiera</a></li>";
				if(isset($_SESSION['login'])){
					echo "<li><a href='liburuakIkusi.php'>Liburuak ikusi</a></li>";
					echo "<li><a href='liburuakBaloratu.php'>Liburuak baloratu</a></li>";
					echo "<li><a href='liburuakSartu.php'>Liburuak Sartu</a></li>";
					echo "<li><a href='logout.php'>Logout</a></li>";
				}else{
					echo "<li><a href='login.php'>Login</a></li>";
					echo "<li><a href='register.php'>Erregistratu</a></li>";
				}
			echo "</ul>";
		echo "</nav>";
		
	}

	function showProfile(){
		if(isset($_SESSION['login'])){
			echo "<header>";
				echo "<span class='image avatar'><img src='images/avatar.jpg' alt=''/></span>";
				echo "<h1 id='logo'><a href='#'>Ezaguna</a></h1>";
				echo "<br/>";
			echo "</header>";
		}else{
			echo "<header>";
				echo "<span class='image avatar'><img src='images/avatar.jpg' alt=''/></span>";
				echo "<h1 id='logo'><a href='#'>Ezezaguna</a></h1>";
				echo "<br/>";
			echo "</header>";	
		}
	}
?>