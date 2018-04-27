<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticalController extends Controller
{
    //获取首页文章列表（大标题、摘要、点赞数量、收藏数）
    public function get()
    {
    }

    //获取首页文章详细信息（大标题、摘要、点赞数量、收藏数、作者头像、作者身份、作者昵称）
    public function getDetail()
    {
        $commentCount = 5;//获取文章的同时，连带获取的评论的数量
        return response()->json([
            'code' => 1,
            'info' => 'ok',
            'data' => [
                'author_info' => [
                    'users_id' => 100001,
                    'nickname' => '昵称',
                    'avatar' => 'http://***/demo.img'
                ],
                'artical_info' => [
                    'artical_id' => 1,
                    'title' => '这是文章的标题',
                    'content' => '这是文章的标题',
                    'likes' => 1314,
                    'dislikes' => 9,
                    'created_at' => '这是文章的发布时间',
                ],
                'comments' => [
                    [
                        'user_info' => [
                            'users_id' => 100001,
                            'nickname' => '昵称',
                            'avatar' => 'http://***/demo.img'
                        ],
                        'comment_info' => [
                            'comments_id' => 1,
                            'comment_content' => '评论内容',
                            'created_at' => '创建时间'
                        ]
                    ],
                    [
                        'user_info' => [
                            'users_id' => 100001,
                            'nickname' => '昵称',
                            'avatar' => 'http://***/demo.img'
                        ],
                        'comment_info' => [
                            'comments_id' => 1,
                            'comment_content' => '评论内容',
                            'created_at' => '创建时间'
                        ]
                    ],
                    [
                        'user_info' => [
                            'users_id' => 100001,
                            'nickname' => '昵称',
                            'avatar' => 'http://***/demo.img'
                        ],
                        'comment_info' => [
                            'comments_id' => 1,
                            'comment_content' => '评论内容',
                            'created_at' => '创建时间'
                        ]
                    ]
                ]
            ]
        ]);
    }

    //发布文章
    public function posts()
    {
    }

    /*
     * 名称:评论文章
     * 参数:文章id 用户id 内容id
     * 返回：
     */
    public function comment()
    {
    }

    /*
     * 名称:点赞文章
     * 参数:文章id 用户id
     * 返回：
     */
    public function likes()
    {
    }

    /*
     * 名称:收藏文章
     * 方法：posts
     * 需要秘钥:是
     * 参数:文章id 用户id
     * 返回：
     */
    public function collect()
    {
    }
}
