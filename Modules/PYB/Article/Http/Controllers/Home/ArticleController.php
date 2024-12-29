<?php

namespace PYB\Article\Http\Controllers\Home;

use PYB\Article\Models\Article;
use PYB\Home\Repositories\HomeRepo;
use App\Http\Controllers\Controller;
use PYB\Share\Repositories\ShareRepo;
use PYB\Article\Services\ArticleService;
use PYB\Article\Repositories\ArticleRepo;
use PYB\Category\Repositories\CategoryRepo;
use PYB\Article\Http\Requests\ArticleRequest;

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

    public function details($slug, HomeRepo $homeRepo)
    {
        $article = $this->repo->findBySlug($slug);

        if (is_null($article)) abort(404);
        $relatedArticles = $this->repo->relatedArticles($article->category_id, $article->id)->limit(3)->get();

        return view('Article::Home.details', compact(['article', 'relatedArticles', 'homeRepo']));
    }
}
