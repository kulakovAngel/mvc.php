<?php
require_once 'Header.php';
?>

<h1>Users</h1>
<ul>
    <?php
    foreach ($users as $user) {
        echo "<li>{$user['id']}: {$user['name']}, password: {$user['password']}</li>";
    }
    ?>
</ul>