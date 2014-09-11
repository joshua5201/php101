<?php

require_once "../config.php";
require_once "../database.php";

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Listing Posts</title>
</head>
<body>
<h1>Listing Posts</h1>
<hr>
<a href="new.php">New Post</a>
<table>
<tr>
<th>ID</th>
<th>Title</th>
<th>Created at</th>
<th>Updated at</th>
<th></th>
<th></th>
</tr>
<?php

$res = $db->sql->query("select posts.* from posts order by id asc;");
if ($res){
    while ($post = $res->fetch_assoc()) {
        echo '<tr>';
        printf('<td>%s</td>', $post['id']);
        printf('<td><a href="edit.php?id=%s">%s</a></td>', $post['id'], $post['title']);
        printf('<td>%s</td>', $post['created_at']);
        printf('<td>%s</td>', $post['updated_at']);
        printf('<td><a href="edit.php?id=%s">Edit</td>', $post['id']);
        printf('<td><a href="destroy.php?id=%s">Destroy</a></td>', $post['id']);
        echo '</tr>';
    }
}
?>
</table>
</body>
</html>
