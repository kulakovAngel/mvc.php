<?php
$message ? require_once 'Message.php' : null;
?>
<header>
    <b>Auth: <?php echo "Hello, <span style='color: " . ($_SESSION['user']['name'] ? 'green' : 'red') . "'>" . ($_SESSION['user']['name'] ?? 'Guest') . '</span>'; ?></b>
    <nav>
        <ul>
            <li>
                <a href="/">Home</a>
            </li>
            <li>
                <a href="/users/get">All Users</a>
            </li>
            <li>
                <a href="/users/get/1">Vasa</a>
            </li>
            <li>
                <a href="/users/get/2">Ivan</a>
            </li>
            <li>
                <a href="/posts/get">All Posts</a>
            </li>
            <li>
                <a href="/posts/create">Create new Post</a>
            </li>
            <li>
                <a href="/auth/">Authorization</a>
            </li>
            <li>
                <a href="/auths/logout">Logout</a>
            </li>
        </ul>
    </nav>
</header>