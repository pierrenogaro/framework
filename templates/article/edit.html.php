<h2>Editer un article</h2>

<form method="post" action="?type=article&action=edit&id=<?= $article->getId() ?>" class="form-control">
    <input type="text" name="name" class="form-control mb-2" placeholder="name" value="<?= $article->getName() ?? '' ?>" required>
    <textarea name="description" class="form-control" cols="30" rows="3" placeholder="description" required><?= $article->getDescription() ?? '' ?></textarea>
    <button type="submit" class="btn btn-primary mt-3">Modifier</button>
</form>

<a href="?type=article&action=index" class="btn btn-secondary mt-3">Retour</a>
