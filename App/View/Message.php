<section <?= $message['type'] === 'error' ? 'style="color: red; background: pink"' : 'style="color: green; background: lightgreen"'?> >
    <h5><?=$message['title']?></h5>
    <p><?=$message['content']?></p>
</section>