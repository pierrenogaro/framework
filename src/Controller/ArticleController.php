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
}