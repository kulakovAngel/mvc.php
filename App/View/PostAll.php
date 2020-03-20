<?php
require_once 'Header.php';
?>

<h2>Create new:</h2>
<form method="post" action="/posts/create/" style="display: flex; flex-direction: column; margin: 12px">
    <input type="text" name="title" placeholder="title">
    <textarea name="content" placeholder="content"></textarea>
    <input type="submit">
</form>

<h1>Posts</h1>
<ul>
    <?php
    foreach ($posts as $post) {
        echo "<li><a href='/posts/update/{$post['id']}'><b>{$post['id']}, user:{$post['name']}</b></a>: {$post['title']}, content: {$post['content']}</li>";
    }
    ?>
</ul>