<?php

namespace App\Controller;

use App\Entity\Article;
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

    public function create():Response
    {

        $name = null;
        $description = null;

        if(!empty($_POST['name'])){
            $name = $_POST['name'];
        }

        if(!empty($_POST['description'])){
            $description = $_POST['description'];
        }


        if($name && $description)
        {

            $article = new Article();

            $article->setName($name);
            $article->setDescription($description);


            $articlepository = new ArticleRepository();

            $article =  $articlepository->save($article);

            return $this->redirect("?type=article&action=index");


        }

        return $this->render("article/create", [
            "pageTitle"=>"Nouvel Article"
        ]);
    }

    public function delete(): Response
    {
        $id = $_GET['id'] ?? null;

        if ($id && ctype_digit($id)) {
            $articleRepository = new ArticleRepository();
            $article = $articleRepository->find($id);

            if ($article) {
                $articleRepository->delete($article);
            }
        }

        return $this->redirect("?type=article&action=index");
    }


    public function edit(): Response
    {
        $id = $_GET['id'] ?? null;

        if ($id && ctype_digit($id)) {
            $articleRepository = new ArticleRepository();
            $article = $articleRepository->find((int)$id);

            if (!$article) {
                return $this->redirect("?type=article&action=index");
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'] ?? null;
                $description = $_POST['description'] ?? null;

                if ($name && $description) {
                    $article->setName($name);
                    $article->setDescription($description);

                    $articleRepository->save($article);

                    return $this->redirect("?type=article&action=index");
                }
            }

            return $this->render("article/edit", [
                "pageTitle" => "Editer un article",
                "article" => $article,
            ]);
        }

        return $this->redirect("?type=article&action=index");
    }
}