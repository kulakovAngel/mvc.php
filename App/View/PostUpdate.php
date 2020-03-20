<?php
require_once 'Header.php';
?>

<h1>Update the post:</h1>

<form method="post" action="/posts/update/<?=$post['id']?>" style="display: flex; flex-direction: column; margin: 12px">
    <input type="text" name="title" placeholder="title" value="<?=$post['title']?>">
    <textarea name="content" placeholder="content"><?=$post['content']?></textarea>
    <input type="submit" name="submit">
</form>