<h1>Les articles</h1>

<?php foreach ($articles as $article) : ?>

    <div class="border border-dark p-3 mb-3">
        <h2>Nom : <?= htmlspecialchars($article->getName()) ?></h2>
        <p>Description : <?= htmlspecialchars($article->getDescription()) ?></p>
        <a href="?type=article&action=delete&id=<?= $article->getId() ?>" class="btn btn-danger mt-3">Supprimer</a>
        <a href="?type=article&action=edit&id=<?= $article->getId() ?>" class="btn btn-secondary">Modifier</a>
        <a href="/?type=article&action=show&id=<?= $article->getId() ?>" class="btn btn-info">Voir les détails</a>
    </div>

<?php endforeach; ?>

<a href="?type=article&action=create" class="btn btn-success mt-5">Ajouter un produit</a>
