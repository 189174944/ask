<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{

    /*
     * 名称:用户注册
     * 方法：posts
     * 需要秘钥:否
     * 参数:用户名、密码
     * 返回：users_id
     * 备注：注册成功以后，直接登录，省去用户再次输入密码的麻烦
     * 验证：用户名[a-Z]，6位-11位，以字母开头
     */
    public function register()
    {
//        记录登录时间、创建秘钥
//        检查用户名是否已经被注册
        return response()->json([
            'result_code' => 10001,
            'result_info' => '登录成功',
            'data' => [
                'users_id' => '',
                'nickname' => '',
                'token' => '',
            ]
        ]);
    }


    /*
     * 名称:用户登录
     * 方法：posts
     * 需要秘钥:否
     * 参数:用户名、密码、渠道
     * 返回：users_id
     */
    public function login()
    {
//        记录登录时间、创建秘钥
        return response()->json([
            'result_code' => 10001,
            'result_info' => '登录成功',
            'data' => [
                'users_id' => '',
                'nickname' => '',
                'token' => '',
            ]
        ]);
    }

    //用户退出
    public function logout()
    {

    }

    //用户资料
    public function getUserInfo()
    {
        return response()->json([
            'code' => 10001,
            'info' => 'ok',
            'data' => [
                'users_id' => '',
                'nickname' => '',
                'token' => '',
            ]
        ]);
    }

    //我关注的
    public function getIFollow()
    {
        $sex = 1;

        return response()->json([
            'code' => 10001,
            'info' => 'ok',
            'data' => [
                [
                    'users_id' => '',
                    'nickname' => '',
                    'avatar' => '头像地址',
                    'default_avatar_type' => $sex,
                    'created_at' => '2018-4-24'           //关注时间
                ],
                [
                    'users_id' => '',
                    'nickname' => '',
                    'avatar' => '头像地址',
                    'default_avatar_type' => $sex,
                    'created_at' => '2018-4-24'           //关注时间
                ],
                [
                    'users_id' => '',
                    'nickname' => '',
                    'avatar' => '头像地址',
                    'default_avatar_type' => $sex,
                    'created_at' => '2018-4-24'           //关注时间
                ]
            ]
        ]);
    }

    //关注我的
    public function getFollowI()
    {
        return response()->json([
            'code' => 10001,
            'info' => 'ok',
            'data' => [
                'users_id' => '',
                'nickname' => '',
                'token' => '',
            ]
        ]);
    }
}
