<?php
$user = 'user';
$password = '123';

function auth($loginF, $passwordF) {
    global $user;
    global $password;
    if ($loginF === $user && $passwordF === $password) {
        echo 'Авторизован!!';
        $auth = true;
        $_SESSION['login'] = $user;
        $_SESSION['password'] = $password;
    } else {
        echo 'Неверный логин или пароль((<br>';
        echo $uf . ', ' . $pf;
        $auth = false;
    }
    return $auth;
}


session_start();

if ($_POST['login'] && $_POST['password']) {
    $auth = auth($_POST['login'], $_POST['password']);
    
} elseif ($_SESSION['login'] && $_SESSION['password']) {
    $auth = auth($_SESSION['login'], $_SESSION['password']);
    
} else {
    echo 'Нужна авторизация!<br>';
    echo $uf . ', ' . $pf;
    $auth = false;
}



$html = <<<EOT
<form action="/" method="post">
    <input name="login">
    <input name="password">
    <input type="submit">
</form>
EOT;
echo $html;