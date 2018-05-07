<?php

namespace App\Http\Controllers\Admin;

use App\Models\ArticalModel;
use App\Models\UsersArticalModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->get('type') == 1) {
            $artical = ArticalModel::where([
                ['type', '=', 1],
                ['status', '>', 1]
            ])->with('topic')->paginate(12);
            return view('admin.artical', compact('artical'));
        } elseif ($request->get('type') == 2) {
            $question = ArticalModel::where([
                ['type', '=', 2],
                ['status', '>', 1]
            ])->paginate(12);
            return view('admin.question', compact('question'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artical = ArticalModel::find($id);
        if ($artical) {
            $artical->with('users', 'topic')->get();
//            收藏数量
            $collectCount = UsersArticalModel::where('artical_id', $id)->count();

            return view('admin.artical_show', compact('artical', 'collectCount'));
        } else {
            dd("文章不存在");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
