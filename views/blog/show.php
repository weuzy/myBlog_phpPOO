<div class="card">
    <div class="card-body">
    <h1><?= $params['post']->title ?></h1>
    <div>
        <?php foreach($params['post']->getTags() as $tag): ?>
            <span class="badge bg-info"><?= $tag->name ?></span>
        <?php endforeach ?>
    </div>
    <p><?= $params['post']->content ?></p>
    <a href="/weuzySite/posts" class="btn btn-secondary">Retourner en arrière</a>
    </div>
</div>