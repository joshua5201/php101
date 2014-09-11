<?php

require_once "../config.php";
require_once "../database.php";


if (!isset($_GET['id']) && !isset($_POST['title'])) {
    exit("No post is specified.");
}
if ($_GET['id']) {
$query = sprintf("SELECT posts.* FROM posts WHERE posts.id = %s;", $_GET['id']);
$res = $db->sql->query($query); 
if ($res) {
    $post = $res->fetch_assoc();
}
}

if (isset($_POST['title'])) {
    $db->sql->query("use test;");
    $notice = "";
    if (empty($_POST['title'])) {
        $notice = '<p style="color:red;">Title is required</p>';
    } else {
        $query = sprintf('UPDATE posts SET title=\'%s\', content=\'%s\' where id=\'%s\';',
            $_POST['title'], $_POST['content'], $post['id']);
        if (!$db->sql->query($query)) {
            exit("Error: ".$db->sql->error);
        }
    }
    header("Location: index.php");
}
function hold_value($attr)
{
    if (isset($_POST[$attr])) {
        echo $_POST[$attr];
    } else {
        echo $post[$attr];
    }
}

?>
<!DOCTYPE html>
<html>
<head>
<head>
<title>Edit Post #<?php echo $_GET['id']?></title>
<meta charset="utf-8">
</head>
<body>
<h1>Edit Post #<?php echo $_GET['id'] ?></h1>
<form action="edit.php", method="post">
<p>
<label>title</title><br>
<input type="text" name="title" value="<?php hold_value('title')?>;"></input>
</p>
<p>
<label>content</title><br>
<input type="textarea" name="content" value="<?php hold_value('content');?>"></input>
</p>
<?php echo $notice; ?>
<p>
<input type="submit" value="Update Post"></input>
</p>
</form>
</body>
</head>
</html>
