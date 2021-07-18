<h1><?= $params['tag']->name ?></h1>

<?php foreach ( $params['tag']->getPosts() as $post): ?>
    <div class="card mb-3">
        <div class="card-body">
            <a href="/weuzySite/posts/<?= $post->id ?>" class="text-decoration-none">
                <?= $post->title ?>
            </a>
        </div>
    </div>
<?php endforeach ?>