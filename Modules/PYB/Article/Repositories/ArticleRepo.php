<?php

namespace PYB\Article\Repositories;

use PYB\Article\Models\Article;

class ArticleRepo
{
    public function index()
    {
        return $this->query()->latest();
    }

    public function findById($id)
    {
        return $this->query()->findOrFail($id);
    }

    public function delete($id)
    {
        return $this->query()->where('id', $id)->delete();
    }

    public function findBySlug($slug)
    {
        return $this->query()->whereSlug($slug)->first();
    }

    public function relatedArticles($categorId, $id)
    {
        return $this->query()
            ->where('category_id', $categorId)
            ->whereStatus(Article::STATUS_ACTIVE)
            ->where('id', '!=', $id);
    }
    public function home()
    {
        return $this->query()->whereStatus(Article::STATUS_ACTIVE)->latest()->paginate(6);
    }

    public function getArticlesByViews()
    {
        return $this->query()->whereStatus(Article::STATUS_ACTIVE)->orderByViews();
    }
    public function getArticlesByUserId($user_id)
    {
        return $this->query()->whereStatus(Article::STATUS_ACTIVE)->where('user_id', $user_id);
    }

    public function getArticlesByCategoryId($id)
    {
        return $this->query()->whereStatus(Article::STATUS_ACTIVE)->where('category_id', $id);
    }

    private function query()
    {
        return Article::query();
    }
}
