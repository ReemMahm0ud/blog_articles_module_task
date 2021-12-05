<?php

namespace Modules\Article\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Exception;
use Modules\Article\Services\ArticleService;

class ArticleAPIController extends Controller
{
    /**
     *  @var ArticleService
     */
    protected $articleService;

    /**
     * articleController constructor
     *
     * @param articleService $articleService
     */
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        //
        $result =['status'=>200];

        try {
            $result['data'] = $this->articleService->getAll();
        } catch (Exception $e) {
            //throw $th;
            $result = [
                'status'=>500,
                'error'=>$e->getMessage()
            ];
        }

        return response()->json($result,$result['status']);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->only([
            'created_by',
            'title',
            'description',
        ]);

        $result = ['status'=>200];

        try {
            $result['data' ] = $this->articleService->addArticle($data);
        } catch (Exception $e) {
            //throw $th;
            $result = [
                'status'=> 500,
                'error'=> $e->getMessage()
            ];
        }

        return response()->json($result,$result['status']);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
        $result =['status'=>200];

        try {
            $result['data'] = $this->articleService->getById($id);
        } catch (Exception $e) {
            //throw $th;
            $result = [
                'status'=> 500,
                'error'=>$e->getMessage()
            ];
        }
        return response()->json($result,$result['status']);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
        $data =$request->only([
            'title',
            'description'
        ]);

        $result = ['status'=>200];

        try {
            $result['data']=$this->articleService->update($data,$id);
        } catch (Exception $e) {
            //throw $th;
            $result = [
                'status'=> 500,
                'error'=>$e->getMessage()
            ];
        }
        return response()->json($result,$result['status']);


    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $result = ['status'=>200];

        try {
            $result['data'] =$this->articleService->delete($id);
        } catch (Exception $e) {
            //throw $th;
            $result = [
                'status'=> 500,
                'error'=>$e->getMessage()
            ];
        }

        return response()->json($result,$result['status']);

    }
}
