<?php
require_once 'Header.php';
?>

<h1>User <?=$user['name']?></h1>
<ul>
   <li>id: <?=$user['id']?></li>
   <li>name: <?=$user['name']?></li>
   <li>password: <?=$user['password']?></li>
</ul>