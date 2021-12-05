<?php

namespace Modules\Article\Http\Controllers;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Article\Services\ArticleService;


class ArticleController extends Controller
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
     * @return Renderable
     */
    public function index()
    {
        //return view('article::index');
        // $result =['status'=>200];

        // try {
        //     $result['data'] = $this->articleService->getAll();
        // } catch (Exception $e) {
        //     //throw $th;
        //     $result = [
        //         'status'=>500,
        //         'error'=>$e->getMessage()
        //     ];
        // }

        // return response()->json($result,$result['status']);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('article::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
        // $data = $request->only([
        //     'created_by',
        //     'title',
        //     'description',
        // ]);

        // $result = ['status'=>200];

        // try {
        //     $result['data' ] = $this->articleService->addArticle($data);
        // } catch (Exception $e) {
        //     //throw $th;
        //     $result = [
        //         'status'=> 500,
        //         'error'=> $e->getMessage()
        //     ];
        // }

        // return response()->json($result,$result['status']);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('article::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('article::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
