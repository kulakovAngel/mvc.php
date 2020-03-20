<?php
require_once 'Header.php';
?>

<h1>Auth</h1>
<h2>Log In</h2>
<form method="post" action="/auth/login/">
    <input type="text" name="login" placeholder="login">
    <input type="password" name="password" placeholder="password">
    <input type="submit">
</form>
<h2>Sign In</h2>
<form method="post" action="/auth/signin/">
    <input type="text" name="login" placeholder="login">
    <input type="password" name="password" placeholder="password">
    <input type="submit">
</form>
<h2>Log Out</h2>
<a href="/auth/logout/">Log Out</a>