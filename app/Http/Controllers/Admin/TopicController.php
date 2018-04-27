<?php

namespace App\Http\Controllers\Admin;

use App\Models\TopicModel;
use App\Models\TopicRelative;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topic = TopicModel::paginate(12);
        $topicAll = TopicModel::all();
        return view('admin.topic', compact('topic', 'topicAll'));
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
        $validator = Validator::make($request->all(), [
            'introduce' => 'required',
            'name' => 'required',
            'notice' => 'required',
        ]);
        if ($validator->fails()) {
//            return redirect('post/create')
//                ->withErrors($validator)
//                ->withInput();
            die('参数错误!');
        }
        $topic = new TopicModel();
        $topic->fill($request->except([
            '_token'
        ]));
        if ($topic->save()) {
            return response()->json([
                'code' => 1,
                'info' => 'success',
                'data' => $request->except([
                    '_token', 'ptopic_id'
                ])
            ]);
        } else {
            return response()->json([
                'code' => 0,
                'info' => 'fail'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
