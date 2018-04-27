<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopicController extends Controller
{
    //获取首页话题
    public function getIndexTopic()
    {
        return response()->json([
            'code' => 1,
            'info' => 'ok',
            'data' => [
                '推荐',
                '热门',
                '城市',
                '校园',
            ]
        ]);
    }

    //获取所有父级话题
    public function getAllTopic()
    {
    }

    //获取所有校园话题
    public function getAllSchoolTopic()
    {
    }

    //获取所有城市话题
    public function getAllCityTopic()
    {

    }
}
