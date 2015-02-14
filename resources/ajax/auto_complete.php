<?php 
function connect() {
    return new PDO('mysql:host=localhost;dbname=health', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

$pdo = connect();

$keyword = '%'.$_POST['food_input'].'%';
$keyword = strtolower($keyword);
$sql = "SELECT * FROM foods WHERE name COLLATE UTF8_GENERAL_CI LIKE (:keyword) AND saved = 'on' ORDER BY id ASC LIMIT 0, 10";

$query = $pdo->prepare($sql);
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list = $query->fetchAll();
foreach ($list as $rs) {
	// put in bold the written text
	$name = str_replace(strtolower($_POST['food_input']), '<b>'.strtolower($_POST['food_input']).'</b>', strtolower($rs['name']));
	// add new option
    echo '<li class="food_search_item" onclick="set_item(\''.str_replace("'", "\'", $rs['name']).'\')">'.$name.'</li>';
}

?>