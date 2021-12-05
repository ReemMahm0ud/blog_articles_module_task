<?php

namespace Modules\Article\Services;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use Modules\Article\Repositories\ArticleRepository;

class ArticleService
{

    /**
     * @var $ArticleRepository
     */

     protected $articleRepository;

     /**
      * article constructor
      * @param ArticleRepository $articleRepository
      */


    public function __construct(ArticleRepository $articleRepository)
    {
        //
        $this->articleRepository = $articleRepository;
    }

    public function addArticle($data)
    {
        $validator = Validator::make($data,[
            'created_by'=>'required|unique',
            'title'=>'required',
            'description'=>'required'
        ]);

        if ($validator->fails()){
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->articleRepository->saveArticle($data);

        return $result;
    }

    public function getAll()
    {
        return $this->articleRepository->getAllArticles();
    }

    public function getById($id)
    {
        return $this->articleRepository->getArticleById($id);
    }

    public function update($data,$id)
    {
        $validator = Validator::make($data,[
            'title'=>'bail|min:2',
            'description' => 'bail|max:255'
        ]);
        if ($validator->fails()){
            throw new InvalidArgumentException($validator->errors()->first());
        }

        DB::beginTransaction();

        try {
            $article = $this->articleRepository->updateArticle($data,$id);
        } catch (Exception $e) {
            //throw $th;
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException("Error Processing Request,unable to update");

        }

        DB::commit();

        return $article;
    }

    public function delete($id)
    {
        DB::beginTransaction();

        try {
            $article = $this->articleRepository->deleteArticle($id);
        } catch (Exception $e) {
            //throw $th;
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('unable to delete article');
        }

        DB::commit();

        return $article;
    }
}