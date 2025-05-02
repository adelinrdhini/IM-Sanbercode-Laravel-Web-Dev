<?php 
require_once("animal.php");
require_once("ape.php");
require_once("frog.php");

$sheep = new animal ("Shaun");

echo "Name : ". $sheep->name . "<br>";
echo "Legs : ". $sheep->legs . "<br>";
echo "Cold blooded : ". $sheep->cold_blooded . "<br>";

echo "<br>";

$kodok = new frog ("buduk");

echo "Name : ". $kodok->name . "<br>";
echo "Legs : ". $kodok->legs . "<br>";
echo "Cold blooded : ". $kodok->cold_blooded . "<br>";
echo "Jump : ". $kodok->jump() . "<br>";

echo "<br>";

$sungkong = new ape ("kera sakti");

echo "Name : ". $sungkong->name . "<br>";
echo "Legs : ". $sungkong->legs . "<br>";
echo "Cold blooded : ". $sungkong->cold_blooded . "<br>";
echo "Yell : ". $sungkong->yell() . "<br>";


?>