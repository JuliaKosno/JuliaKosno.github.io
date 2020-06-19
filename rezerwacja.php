<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title> Rezerwacja </title>
		<link rel="stylesheet"
			type="text/css"
			href="index1.css"
			/>
	</head>
    <body >
 
<?php
if (!empty ( $_REQUEST["email"]) && !empty ( $_REQUEST["imie"]) && !empty ( $_REQUEST["nazwisko"]) && !empty ( $_REQUEST["wydarzenie"]) && !empty ( $_REQUEST["data"])) {
$email = $_REQUEST["email"] ;
$imie = $_REQUEST["imie"] ;
$nazwisko = $_REQUEST["nazwisko"] ;
$wydarzenie = $_REQUEST["wydarzenie"] ;
$data = $_REQUEST["data"] ;
} else die (" Niepoprawnie wypełniony formularz!") ;
/>
<?php
$string = file_get_contents("rezerwacje.json") ;
 if ( $string )
 $arr = json_decode ( $string , true ) or die (" Niewłaściwy plik JSON !") ;
 else
 $arr = array () ;
 array_push ( $arr , array ("imie" => $imie ,"nazwisko" => $nazwisko , "email" => $email, "wydarzenie" => $wydarzenie, "data" => $data ));
 $string = json_encode($arr) ;
 if( file_put_contents("rezerwacje.json ", $string ))
 echo "Dodane!" ;
 else
 die ("Błąd!") ;
?>

<?php
	$string = file_get_contents("rezerwacje.json") ; 
	if ( $string ) {
		$arr = json_decode($string,true) or die (" Niewłaściwy plik JSON !") ;
		echo "<table >\n" ;
		echo "<tr ><th > Imię </th > <th > Nazwisko </th > <th >Email </th ></tr >\n" ;
		foreach ( $arr as $row ) {
			echo "<tr >\n" ;
			echo "<td > { $row [' imie ']} </td >" ;
			echo "<td > { $row [' nazwisko ']} </td >" ;
			echo "<td > { $row [' email']} </td >" ;
			echo "<td > { $row [' wydarzenie ']} </td >" ;
			echo "<td > { $row [' data ']} </td >\n" ;
			echo " </tr >\n" ;
		 }
		echo " </table >\n" ;
	 }
 ?>

</body>
</html>
