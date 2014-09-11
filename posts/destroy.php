<?php
require_once "../config.php";
require_once "../database.php";

if (!isset($_GET['id']) or empty($_GET['id'])) {
    exit ("No post is specified.");
}

$query = sprintf('DELETE FROM posts WHERE posts.id = %s;', $_GET['id']);
$db->sql->query($query);
header("Location: index.php");
?>
