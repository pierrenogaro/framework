<h1><?= htmlspecialchars($pageTitle) ?></h1>

<div class="border border-dark p-4">
    <h2>Nom : <?= htmlspecialchars($article->getName()) ?></h2>
    <p><strong>Description :</strong></p>
    <p><?= nl2br(htmlspecialchars($article->getDescription())) ?></p>

    <a href="/?type=article&action=index" class="btn btn-secondary mt-3">Retour à la liste des articles</a>
</div>
