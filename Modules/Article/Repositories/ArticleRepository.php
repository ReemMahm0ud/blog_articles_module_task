<?php

namespace Modules\Article\Repositories;

use Modules\Article\Entities\Article;
use Modules\Article\Repositories\Interfaces\BaseRepositoryInterface;

class ArticleRepository implements BaseRepositoryInterface
{

    /**
     * @var Article
     */

     protected $article;

    public function __construct(Article $article)
    {
        //
        $this->article = $article;

    }

    /**
     * save article
     * @param $data
     * @return $message
     */

    public function saveArticle($data)
    {
        $article = new $this->article;
        $article->created_by = $data['created_by'];
        $article->title = $data['title'];
        $article->description = $data['description'];
        $article->save();

        //return $article->fresh();
        return response()->json('article created!');
    }
    /**
     * get all articles
     * @return article $article
     */

    public function getAllArticles ()
    {
        return $this->article->get();
    }

    /**
     * get article by id
     * @param $id
     * @return mixed
     */

    public function getArticleById($id)
    {
        return $this->article->where('id',$id)->get();
    }

    public function updateArticle ($data,$id)
    {
        $article = $this->article->find($id);
        if ($data['created_by']){
            $article->created_by = $data['created_by'];
        };
        if ($data['title']){
            $article->created_by = $data['title'];
        };
        if ($data['description']){
            $article->created_by = $data['description'];
        };

        $article->update();

        return response()->json('article updated!');

    }

    public function deleteArticle ($id)
    {
        $article = $this->article->find($id);
        $article->delete();

        return response()->json('article deleted!');
    }

}