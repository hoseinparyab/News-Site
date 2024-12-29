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

    private function query()
    {
        return Article::query();
    }
     public function findBySlug($slug)
     {
          return $this->query()->whereSlug($slug)->first();
     }


}

