<?php
$cars = array (
array("Volvo",22,18),
array("BMW",15,13),
array("Saab",5,2),
array("Land Rover",17,15)
);

$totalF = count($cars);
echo"el total de filas en el arreglo es:  ", $totalF . "<br>",
"<br>";
$totalE = count($cars, COUNT_RECURSIVE)- $totalF . "<br>";
echo" el total de elementos en el arreglo es: ", $totalE . "<br>";

$totalC = count($cars[0]);
echo" el total de columnas en el arreglo es:  ", $totalC;


for ($row = 0; $row < $totalF; $row++) {
echo "<p> <b>Row number $row</b></p>";
echo "<ul>";
for ($col = 0; $col < count (value: $cars[$col]); $col++) {
echo "<li>".$cars[$row][$col]."</li>";
}
echo "</ul>";
}

echo $cars[0][0].": In stock: ".$cars[0][1].", sold: ".$cars[0][2].".<br>";
echo $cars[1][0].": In stock: ".$cars[1][1].", sold: ".$cars[1][2].".<br>";
echo $cars[2][0].": In stock: ".$cars[2][1].", sold: ".$cars[2][2].".<br>";
echo $cars[3][0].": In stock: ".$cars[3][1].", sold: ".$cars[3][2].".<br>";




// Utilizar la funcion count(), para remplaza por una variable el valor de parada del ciclo for
?>