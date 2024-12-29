<?php

namespace PYB\Article\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use PYB\Article\Http\Requests\ArticleRequest;
use PYB\Article\Models\Article;
use PYB\Article\Repositories\ArticleRepo;
use PYB\Article\Services\ArticleService;
use PYB\Category\Repositories\CategoryRepo;
use PYB\Share\Repositories\ShareRepo;

class ArticleController extends Controller
{
    public ArticleRepo $repo;

    public function __construct(ArticleRepo $articleRepo)
    {
        $this->repo = $articleRepo;
    }

    //    public function index()
    //    {
    //        $articles = $this->repo->index()->paginate(10);
    //
    //        return view('Article::Admin.index', compact('articles'));
    //    }

    public function details($slug)
    {
        $article = $this->repo->findBySlug($slug);

        if (is_null($article)) abort(404);

        return view('Article::Home.details', compact('article'));
    }
}
