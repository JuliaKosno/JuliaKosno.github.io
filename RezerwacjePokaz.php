<!DOCTYPE html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title> RezerwacjePokaz</title>
		<link rel="stylesheet" 
			type="text/css"
			href="index1.css"
			/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css_fa/all.css">
		<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Raleway:ital@1&display=swap" rel="stylesheet">

	</head>
<body>
<? php
$string = file_get_contents(" rezerwacje.json ") ; 
if ( $string ) {
$arr = json_decode ( $string , true ) or die (" Niewłaściwy
plik JSON !") ;
echo "<table >\n" ;
echo "<tr ><th > Imię </th > <th > Nazwisko </th > <th >Email </
th ></tr >\n" ;
foreach ( $arr as $row ) {
echo "<tr >\n" ;
echo "<td > { $row [' imie ']} </td >" ;
 echo "<td > { $row [' nazwisko ']} </td >" ;
 echo "<td > { $row [' email ']} </td >\n" ;
 echo " </tr >\n" ;
 }
 echo " </table >\n" ;
 }
 ?>
</body>
