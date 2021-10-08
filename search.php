<?php 
define("DB_HOST","localhost");
define("DB_NAME","blog");
define("DB_USER","root");
define("DB_PASSWORD","");
define("PREFIX","");	
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$mysqli -> query("SET NAMES 'utf8'") or die ("Ошибка соединения с базой!");
if(!empty($_POST["referal"])){
$referal = trim(strip_tags(stripcslashes(htmlspecialchars($_POST["referal"]))));
$referal = preg_replace("/[^АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯабвгдеёжзийклмнопрстуфхцчшщъыьэюя0-9]/", " ", $_POST['referal']);
$db_referal = $mysqli -> query("SELECT * from ".PREFIX."search_2 WHERE slovo LIKE '%$referal%'")
or die('Ошибка №'.__LINE__.'<br>Обратитесь к администратору сайта, сообщив номер ошибки.');
while ($row = $db_referal -> fetch_array()) {echo "\n<li>".$row["slovo"]."</li>";}}
?>