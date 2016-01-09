//Erantzuna jasotzeko objektua
XMLHttpRequestObject = new XMLHttpRequest();

//Login egiaztatzen
function loginEgiaztatzen(){
	var eposta= document.getElementById("nick").value;
	var pasahitza= document.getElementById("pasahitza").value;
	
	XMLHttpRequestObject.onreadystatechange=function(){
		if ((XMLHttpRequestObject.readyState==4)&&(XMLHttpRequestObject.status==200)){
			$(document).ready( function() {$('#mezua').delay(1000).fadeIn();});			
			document.getElementById("mezua").innerHTML=XMLHttpRequestObject.responseText;
			$(document).ready( function() {$('#mezua').delay(1000).fadeOut();});		
		}
	}
	
	XMLHttpRequestObject.open("POST", "php/loginEgiaztatzen.php", true);
	XMLHttpRequestObject.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	XMLHttpRequestObject.send("nick="+eposta+"&pasahitza="+pasahitza);
}

//XML fitxategian dauden liburuak erakutsi
function liburuakIkusi(){
	XMLHttpRequestObject.onreadystatechange=function(){
		if ((XMLHttpRequestObject.readyState==4)&&(XMLHttpRequestObject.status==200)){	
			document.getElementById("liburuak").innerHTML=XMLHttpRequestObject.responseText;		
		}
	}
	
	XMLHttpRequestObject.open("POST", "php/liburuakIkusi.php", true);
	XMLHttpRequestObject.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	XMLHttpRequestObject.send();
}

//Liburu bat sartu aurretik konprobatu ea sartu nahi den ISBN aurretik XML fitxategian existitzen den
//Existitzen ez bada -> XML-n sartu
//Existitzen da -> mezu bat itzuli existitzen dela jakinaraziz.
function isbnKonprobatzen(isbn,resetEmanDa){
	if(resetEmanDa != 0){
		XMLHttpRequestObject.onreadystatechange = function(){
			if ((XMLHttpRequestObject.readyState==4)&&(XMLHttpRequestObject.status==200 )){
				var existitzenDa = XMLHttpRequestObject.responseText;
				$(document).ready( function() {$('#mezua').delay(1000).fadeIn();});	
				if(existitzenDa==0){
					document.getElementById("mezua").innerHTML="<p style='color:red'>Existitzen da!</p>";
					$(document).ready( function() {$('#mezua').delay(1000).fadeOut();});
					document.getElementById("sartubtn").disabled= true;
				}else if(existitzenDa==1){
					document.getElementById("mezua").innerHTML="<p style='color:green'>Ez da existitzen</p>";
					$(document).ready( function() {$('#mezua').delay(1000).fadeOut();});
					document.getElementById("sartubtn").disabled= false;
					document.getElementById("sartubtn").style.style.backgroundColor = "#4acaa8";	
				}
			}
		}
		XMLHttpRequestObject.open("GET","php/isbnKonprobatu.php?ISBN="+isbn.value, true);
		XMLHttpRequestObject.send();
	}else{
		document.getElementById("sartubtn").disabled= false;
		document.getElementById("sartubtn").style.style.backgroundColor = "#4acaa8";
	}
}

function sartuLiburua(){
	var isbn=document.getElementById('isbn').value;
	var hizkuntza=document.getElementById('hizkuntza');
	var selectedHizkuntza = hizkuntza.options[hizkuntza.selectedIndex].value;
	var izenburua=document.getElementById('izenburua').value;
	var egilea=document.getElementById('egilea').value;
	var portada=document.getElementById('portada').value;
	var argitaletxea=document.getElementById('argitaletxea').value;
	var urtea=document.getElementById('urtea').value;
	var gaia=document.getElementById('gaia').value;
	var sinopsia=document.getElementById('sinopsia').value;
	
	
	XMLHttpRequestObject.onreadystatechange=function(){
		if ((XMLHttpRequestObject.readyState==4)&&(XMLHttpRequestObject.status==200)){		
			alert(XMLHttpRequestObject.responseText);	
		}
	}
	
	XMLHttpRequestObject.open("POST", "php/liburuaSartu.php", true);
	XMLHttpRequestObject.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	XMLHttpRequestObject.send("isbn="+isbn+"&hizkuntza="+selectedHizkuntza+"&izenburua="+izenburua+"&egilea="+egilea+"&portada="+portada+"&argitaletxea="+argitaletxea+"&urtea="+urtea+"&gaia="+gaia+"&sinopsia="+sinopsia);
}

//Liburutegian dauden liburuen izenburuak eta haien hizkuntza "combobox" baten erakutsi
function cb_liburuakKargatu(){
	XMLHttpRequestObject.onreadystatechange = function(){
		if ((XMLHttpRequestObject.readyState==4)&&(XMLHttpRequestObject.status==200 )){
			document.getElementById('liburuak').innerHTML=XMLHttpRequestObject.responseText;
		}
	}
	XMLHttpRequestObject.open("GET","php/cb_liburuakKargatu.php");
	XMLHttpRequestObject.send();
}

//cb_liburuako defektuzko balioa aukeratzen bada Baloratu botoia ez gaitu.
function aukeratuLiburua(liburua){
		if(liburua.value == '-'){
			document.getElementById('baloratubtn').disabled = true;
		}else{
			document.getElementById('baloratubtn').disabled = false;
		}
}

//baloratubtn botoia sakatzerakoan baloratzeko egingo den prozesua funtzio honetan emango da.
function liburuaBaloratu(){
	var liburuak=document.getElementById('liburuak');
	var selectedLiburua = liburuak.options[liburuak.selectedIndex].value;
	var balorazioa = document.getElementById('balorazioa').value;
		XMLHttpRequestObject.onreadystatechange=function(){
		if ((XMLHttpRequestObject.readyState==4)&&(XMLHttpRequestObject.status==200)){		
			alert(XMLHttpRequestObject.responseText);	
		}
	}
	
	XMLHttpRequestObject.open("POST", "php/liburuaBaloratu.php", true);
	XMLHttpRequestObject.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	XMLHttpRequestObject.send("selectedLiburua="+selectedLiburua+"&balorazioa="+balorazioa);

	
	
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