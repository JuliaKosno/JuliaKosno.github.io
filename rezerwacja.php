<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title> Rezerwacja </title>
		<link rel="stylesheet"
			type="text/css"
			href="index1.css"
			/>
		<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Raleway:ital@1&display=swap" rel="stylesheet">
	</head>
    <body style="text-align: center; background-color: #414042;">
    	<header>
    			<div id="page-title">
    					Jest Mi Szaro
    			</div>
    			<nav>
    				<input type="checkbox" id="check">
    				<label for="check" class="checkbt">
    					<i class="fas fa-bars"></i>
    				</label>
    				<div class="nav-bar">
    					<ul id="nav-list">
    						<li><a  href="index.html">Home </a></li>
    						<li><a href="Omnie.html">O mnie</a></li>
    						<li><a href="Gallery.html">Galeria</a></li>
    						<li><a class="active" href="Formularz.html">Terminy</a></li>
    						<li><a href="Regulamin.html">Regulamin</a></li>
    					</ul>
    				</div>
    			</nav>
    		</header>
<?php
if (! empty ( $_REQUEST [" email "]) && ! empty ( $_REQUEST [" imie "
]) && ! empty ( $_REQUEST [" nazwisko "]) && ! empty ( $_REQUEST [" wydazrzenie "])&& ! empty ( $_REQUEST [" data "])) {
$email = $_REQUEST [" email "] ;
$imie = $_REQUEST [" imie "] ;
$nazwisko = $_REQUEST [" nazwisko "] ;
$wydarzenie = $_REQUEST ["wydarzenie"] ;
$data = $_REQUEST ["data"] ;
} else die (" Niepoprawnie wypełniony formularz!") ;

$string = file_get_contents (" rezerwacje.json ") ;
 if ( $string )
 $arr = json_decode ( $string , true ) or die (" Niewłaściwy plik JSON !") ;
 else
 $arr = array () ;
 array_push ( $arr , array (" imie " => $imie ," nazwisko " => $nazwisko , " email " => $email, " wydarzenie " => $wydarzenie, " data " => $data ));
 $string = json_encode ( $arr ) ;
 if( file_put_contents (" rezerwacje.json ", $string ))
 echo " Dodane !" ;
 else
 die ("Błąd!") ;
?>
    	</body>
</html>