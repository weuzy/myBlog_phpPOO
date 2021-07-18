<h1>Les derniers articles</h1>

<?php foreach ($params['posts'] as $post): ?>
    <div class="card mb-3">
        <div class="card-body">
            <h2><?= $post->title ?></h2>
            <div>
                <?php foreach($post->getTags() as $tag): ?>
                    <span class="badge bg-success">
                        <a href="/weuzySite/tags/<?= $tag->id ?>" class="text-white text-decoration-none">
                            <?= $tag->name ?>
                        </a>
                    </span>
                <?php endforeach ?>
            </div>
            <small class="text-info">Publié le <?= $post->getCreatedat() ?></small>
            <p><?= $post->getExcerpt() ?></p>
            <?= $post->getButtons() ?>
        </div>
    </div>
<?php endforeach; ?>

