<h1>Les articles</h1>

<?php foreach ($articles as $article) : ?>

    <div class="border border-dark p-3 mb-3">
        <h2>Nom : <?= htmlspecialchars($article->getName()) ?></h2>
        <p>Description : <?= htmlspecialchars($article->getDescription()) ?></p>
        <a href="/?type=article&action=show&id=<?= $article->getId() ?>" class="btn btn-info">Voir les détails</a>
    </div>

<?php endforeach; ?>
