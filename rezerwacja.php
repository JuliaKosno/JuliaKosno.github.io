<!DOCTYPE HTML>
<html>
<head>
	<meta charset='utf-8' />
<style>
	table,th,td {border:1px solid black;}
</style>
</head>

<body>
<?php
if ( !empty($_REQUEST["imie"]) && !empty($_REQUEST["nazwisko"]) !empty($_REQUEST["email"]) && !empty($_REQUEST["wydarzenie"]) && !empty($_REQUEST["data"])) {
	$imie = $_REQUEST["imie"] ;
	$nazwisko = $_REQUEST["nazwisko"] ;
	$email = $_REQUEST["email"] ;
	$wydarzenie = $_REQUEST["wydarzenie"] ;
	$data = $_REQUEST["data"] ;
} else die("Brak danych wejsciowych!") ;

$string = file_get_contents("rezerwacje.json") ; 
if ($string) 
	$arr = json_decode($string, true) or die("Niewłaściwy plik JSON!") ;
else	
	$arr = array() ;
array_push($arr,array("imie" => $imie,"nazwisko" => $nazwisko, "email" => $email,  "wydarzenie" => $wydarzenie,  "data" => $data)) ;
$string = json_encode($arr) ;
if(file_put_contents("rezerwacje.json",$string)) 
	echo "Dodane!" ;
else
	die("Błąd!") ;
?>

</body>
</html>
