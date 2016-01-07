//Erantzuna jasotzeko objektua
XMLHttpRequestObject = new XMLHttpRequest();
	
function loginEgiaztatzen(){
	var eposta= document.getElementById("nick").value;
	var pasahitza= document.getElementById("pasahitza").value;
	
	XMLHttpRequestObject.onreadystatechange=function(){
		if (XMLHttpRequestObject.readyState==4){
			$(document).ready( function() {$('#mezua').delay(1000).fadeIn();});			
			document.getElementById("mezua").innerHTML=XMLHttpRequestObject.responseText;
			$(document).ready( function() {$('#mezua').delay(1000).fadeOut();});		
		}
	}
	
	XMLHttpRequestObject.open("POST", "php/loginEgiaztatzen.php", true);
	XMLHttpRequestObject.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	XMLHttpRequestObject.send("nick="+eposta+"&pasahitza="+pasahitza);
}

function liburuakIkusi(){
	XMLHttpRequestObject.onreadystatechange=function(){
		if (XMLHttpRequestObject.readyState==4){	
			document.getElementById("liburuak").innerHTML=XMLHttpRequestObject.responseText;		
		}
	}
	
	XMLHttpRequestObject.open("POST", "php/liburuakIkusi.php", true);
	XMLHttpRequestObject.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	XMLHttpRequestObject.send();
}

//Logeatuta bazaude index.html ko menuak eskuragai ez egoteko eta alderantziz,
// logeatuta egon ezean erabiltzaileak.htmlko menuak eskuragai ez egoteko
/*
function erabiltzailearenNickaErakutsi(page){
	XMLHttpRequestObject.onreadystatechange=function(){
		if (XMLHttpRequestObject.readyState==4){
			var nick=XMLHttpRequestObject.responseText;
			if(page!="index" && page!="login" && page!="register"){
				if(nick=="none"){
					window.location.href = "index.html";
				}else{
					document.getElementById("erabNick").value=nick;
				}
			}else{
				if(nick!="none"){
					window.location.href = "erabiltzailea.html";
				}
			}
		}
	}
	
	XMLHttpRequestObject.open("POST", "php/erabiltzailearenNickaErakutsi.php", true);
	XMLHttpRequestObject.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	XMLHttpRequestObject.send();
}*/