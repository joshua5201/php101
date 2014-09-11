<?php

require_once "../config.php";
require_once "../database.php";

if (isset($_POST['title']))
{
    $db->sql->query("use test;");
    $notice = "";
    if (empty($_POST['title'])) {
        $notice = '<p style="color:red;">Title is required</p>';
    } else {
        $query = sprintf('INSERT INTO posts (title, content) VALUES (\'%s\', \'%s\')', $_POST['title'], $_POST['content']);
        if (!$db->sql->query($query)) {
            exit("Error: ".$db->sql->error);
        }
    }
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
<head>
<title>New Post</title>
<meta charset="utf-8">
</head>
<body>
<h1>New Post</h1>
<form action="new.php", method="post">
<p>
<label>title</title><br>
<input type="text" name="title" value="<?php if(isset($_POST['title'])) echo $_POST['title'];?>"></input>
</p>
<p>
<label>content</title><br>
<input type="textarea" name="content" value="<?php if(isset($_POST['content'])) echo $_POST['title'];?>"></input>
</p>
<?php echo $notice; ?>
<p>
<input type="submit" value="Create Post"></input>
</p>
</form>
</body>
</head>
</html>
