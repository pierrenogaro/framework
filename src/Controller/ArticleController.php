<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Core\Http\Response;

class ArticleController extends \Core\Controller\Controller {
    public function index():Response
    {
        $articleRepository = new ArticleRepository();
        return $this->render("article/index", [
            "pageTitle"=>"Les articles",
            "articles"=>$articleRepository->findAll()
        ]);
    }

    public function show(): Response
    {
        $id = null;
        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $id = (int)$_GET['id'];
        }

        if (!$id) {
            return $this->redirect();
        }

        $articleRepository = new ArticleRepository();
        $article = $articleRepository->find($id);

        if (!$article) {
            return $this->redirect();
        }

        return $this->render("article/show", [
            "pageTitle" => $article->getName(),
            "article" => $article,
        ]);
    }

}