<?php

namespace Modules\Article\Repositories\Interfaces;

interface BaseRepositoryInterface
{
    public function saveArticle($data);

    public function getAllArticles ();

    public function getArticleById($id);

    public function updateArticle ($data,$id);

    public function deleteArticle ($id);
}
