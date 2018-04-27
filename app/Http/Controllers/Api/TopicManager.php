<?php

namespace App\Http\Controllers\Api;

use App\Models\TopicManagerModel;
use App\Models\TopicModel;
use App\Models\UsersModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopicManager extends Controller
{
    public function postManager(Request $request)
    {
        $topic_id = $request->get('topic_id');
        $users_id = $request->get('users_id');
        $topicCount = TopicModel::where('id', $topic_id)->count();
        $usersCount = UsersModel::where('id', $users_id)->count();
        if ($topicCount > 0 && $usersCount > 0) {

            if (TopicManagerModel::where(compact('users_id', 'topic_id'))->count() > 0) {
                return response()->json([
                    'code' => 0,
                    'info' => '该管理员已被设置',
                ]);
            } else {
                $topicManagerModel = new TopicManagerModel();
                $topicManagerModel->fill(compact('users_id', 'topic_id'));
                if ($topicManagerModel->save()) {
                    return response()->json([
                        'code' => 1,
                        'info' => '成功',
                    ]);
                } else {
                    return response()->json([
                        'code' => 0,
                        'info' => '未知错误',
                    ]);
                }
            }
        } else {
            return response()->json([
                'code' => -1,
                'info' => '非法提交',
            ]);
        }

    }

    public function getManager(Request $request)
    {
        $manager = TopicManagerModel::with(['users' => function ($query) {
            return $query->select('id', 'avatar', 'nickname');
        }])->where('topic_id', $request->get('topic_id'))->get();
        return response()->json([
            'code' => 1,
            'info' => '成功',
            'data' => $manager
        ]);
    }

    public function deleteManager(Request $request)
    {
        $users_id = $request->get('users_id');
        $topic_id = $request->get('topic_id');
        $result = TopicManagerModel::where(compact('users_id', 'topic_id'))->delete();

        if ($result) {
            return response()->json([
                'code' => 1,
                'info' => '成功'
            ]);
        }
    }
}
