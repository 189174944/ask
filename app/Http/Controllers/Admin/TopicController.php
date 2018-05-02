<?php

namespace App\Http\Controllers\Admin;

use App\Models\TopicManagerModel;
use App\Models\TopicModel;
use App\Models\TopicRelative;
use App\Models\UsersModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
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
        if (\request()->get('edit')) {
            $id = request()->get('id');
//            Select2中的选定的标签
            $selectedLabel = TopicModel::whereIn('id', $selectedLabel = TopicRelative::where('topic_id', $id)->pluck('arrow_id'))->select('id', 'name')->get();

            $theTopic = TopicModel::find($id);
            $p_topic = TopicRelative::where('topic_id', $id)->pluck('arrow_id')->toArray();
            return view('admin.topic', compact('topic', 'topicAll', 'theTopic', 'p_topic', 'selectedLabel'));
        }
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

        if (!TopicModel::where('name', $request->get('name'))->count() > 0) {
            $topic = new TopicModel();
            $topic->fill($request->except([
                '_token'
            ]));
            if ($topic->save()) {
                return response()->json([
                    'code' => 1,
                    'info' => '添加父话题成功',
                    'data' => $request->except([
                        '_token', 'ptopic_id'
                    ])
                ]);
            } else {
                return response()->json([
                    'code' => 0,
                    'info' => '未知错误'
                ]);
            }
        } else {
            return response()->json([
                'code' => 0,
                'info' => '该话题已存在'
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
        $result = TopicModel::find($id)->update($request->except(['_token', 'id', 'p_topic']));
        if ($result) {
            $manyData = [];
            $p_topic = $request->get('p_topic');
            if (count($p_topic) > 0) {
                foreach ($p_topic as $p) {
                    array_push($manyData, [
                        'topic_id' => $id,
                        'arrow_id' => $p
                    ]);
                }
                Log::info($manyData);
                TopicRelative::where('topic_id', $id)->delete();
                if (TopicRelative::insert($manyData)) {
                    return response()->json([
                        'code' => 1,
                        'info' => '成功',
                    ]);
                } else {
                    return response()->json([
                        'code' => 0,
                        'info' => '未知错误2',
                    ]);
                }
            } else {
                TopicRelative::where('topic_id', $id)->delete();
                return response()->json([
                    'code' => 1,
                    'info' => '成功',
                ]);
            }
        } else {
            return response()->json([
                'code' => 0,
                'info' => '未知错误1',
            ]);
        }
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


    public function insertArrowId(Request $request)
    {
        $topic_id = $request->get('topic_id');
        $arrow_id = $request->get('arrow_id');
        $count = TopicRelative::where([
            ['topic_id', $topic_id],
            ['arrow_id', $arrow_id],
        ])->count();
//      当即将插入的父子关系大于0当或改话题的关系数量大于等于5都会失败，目的就是限制关系数量
        if ($count > 0 || TopicRelative::where([
                ['topic_id', $topic_id]
            ])->count() >= 5) {
            return response()->json([
                'code' => 0,
                'info' => 'error2',
            ]);
        } else {
            $topicRelative = new TopicRelative();
            $topicRelative->fill([
                'topic_id' => $topic_id,
                'arrow_id' => $arrow_id,
            ]);
            if ($topicRelative->save()) {
                return response()->json([
                    'code' => 1,
                    'info' => 'success',
                ]);
            } else {
                return response()->json([
                    'code' => 0,
                    'info' => 'error1',
                ]);
            }
        }
    }

    public function deleteArrowId(Request $request)
    {
        $topic_id = $request->get('topic_id');
        $arrow_id = $request->get('arrow_id');
        $result = TopicRelative::where([
            ['topic_id', $topic_id],
            ['arrow_id', $arrow_id],
        ])->delete();
        if ($result) {
            return response()->json([
                'code' => 1,
                'info' => 'success',
            ]);
        } else {
            return response()->json([
                'code' => 0,
                'info' => 'error',
            ]);
        }
    }

    public function search(Request $request)
    {
//        话题搜索接口
//        $topic_id = $request->get('topic_id');
        $keywords = $request->get('keyword');
        return response()->json([
            'code' => 0,
            'info' => 'success',
            'results' => TopicModel::where('name', 'like', $keywords . '%')->select('id', 'name as text')->get()
        ]);
    }
}
