<?php

namespace PYB\Article\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use PYB\Advertising\Models\Advertising;
use PYB\Advertising\Repositories\AdvertisingRepo;
use PYB\Article\Repositories\ArticleRepo;
use PYB\Comment\Repositories\CommentRepo;
use PYB\Home\Repositories\HomeRepo;

class ArticleController extends Controller
{
    public ArticleRepo $repo;

    public function __construct(ArticleRepo $articleRepo)
    {
        $this->repo = $articleRepo;
    }

    public function home(CommentRepo $commentRepo)
    {
        $articles = $this->repo->home()->paginate(6);
        $viewsArticles = $this->repo->getArticlesByViews()->latest()->limit(5)->get();
        $latestComments = $commentRepo->getLatestComments()->limit(3)->get();

        return view('Article::Home.home', compact(['articles', 'viewsArticles', 'latestComments']));
    }

    public function details($slug, HomeRepo $homeRepo, CommentRepo $commentRepo, AdvertisingRepo $advertisingRepo)
    {
        $article = $this->repo->findBySlug($slug);

        if (is_null($article)) abort(404);

        $relatedArticles = $this->repo->relatedArticles($article->category_id, $article->id)->limit(3)->get();
        $latestComments = $commentRepo->getLatestComments()->limit(3)->get();
        $adv = $advertisingRepo->getAdvByLocation(Advertising::LOCATION_DETAIL_ARTICLES)->latest()->first();

        return view('Article::Home.details', compact([
            'article', 'relatedArticles', 'homeRepo', 'latestComments', 'adv'
        ]));
    }
}
