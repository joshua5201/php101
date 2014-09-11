<?php
require_once "../config.php";
require_once "../database.php";

if (!isset($_GET['id']) or empty($_GET['id'])) {
    exit ("No post is specified.");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Post #<?php echo $_GET['id']?></title>
</head>
<body>
<h1>Post #<?php echo $_GET['id']?></h1>
<hr>
<?php
$query = sprintf("SELECT posts.* FROM posts WHERE posts.id = %s;", $_GET['id']);
$res = $db->sql->query($query);
if ($res) {
    $post = $res->fetch_assoc();
    printf("<h3>%s</h3>", $post['title']);
    printf("<p>%s</p>", $post['content']);
    printf("<p>Created at %s | Updated at %s </p>", $post['created_at'], $post['updated_at']);
}
?>
</body>
</html>
