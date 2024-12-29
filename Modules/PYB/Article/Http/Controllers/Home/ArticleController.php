<?php

namespace PYB\Article\Http\Controllers\Home;

use PYB\Article\Models\Article;
use PYB\Home\Repositories\HomeRepo;
use App\Http\Controllers\Controller;
use PYB\Share\Repositories\ShareRepo;
use PYB\Article\Services\ArticleService;
use PYB\Article\Repositories\ArticleRepo;
use PYB\Comment\Repositories\CommentRepo;
use PYB\Category\Repositories\CategoryRepo;
use PYB\Article\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    public ArticleRepo $repo;

    public function __construct(ArticleRepo $articleRepo)
    {
        $this->repo = $articleRepo;
    }

       public function home(CommentRepo $commentRepo)
       {
           $articles = $this->repo->index()->paginate(6);
           $viewsArticles = $this->repo->getArticlesByViews()->latest()->limit(5)->get();
           $latestComments = $commentRepo->getlatestComments()->limit(5)->get();
           return view('Article::Home.home', compact('articles', 'viewsArticles', 'latestComments'));
       }

    public function details($slug, HomeRepo $homeRepo)
    {
        $article = $this->repo->findBySlug($slug);

        if (is_null($article)) abort(404);
        $relatedArticles = $this->repo->relatedArticles($article->category_id, $article->id)->limit(3)->get();

        return view('Article::Home.details', compact(['article', 'relatedArticles', 'homeRepo']));
    }
}
