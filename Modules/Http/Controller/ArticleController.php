<?php


namespace App\Modules\Http\Controller;

use PDO;
use App\Modules\App;
use BadMethodCallException;
use App\Modules\Http\Controller\BaseController;
use App\Modules\Models\Article;
use DateTime;
use PDOException;

class ArticleController extends BaseController{
    public function index(){
        $articles = Article::all();

        return view('articles/index', ['articles'=> $articles]);
    }

    public function show(){
        $article = Article::select('SELECT * from articles where name = ?', [$_GET['name']]);

        return view('articles/show', ['article' => $article]);
    }

    public function checkStock(){
        $article = Article::select('SELECT * from articles where name = ?', [$_GET['name']]);
        $stock = $article->count;

        header('Content-Type: application/json');
        echo json_encode($stock);
    }
}