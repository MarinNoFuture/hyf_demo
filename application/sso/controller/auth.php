<?php
namespace application\sso\controller;

use application\sso\conf\table;
use application\sso\lib\jwt;
use application\sso\lib\res;
use application\sso\lib\vcode;
use hyf\component\exception\myException;

class auth
{
    public static $expr = 60 * 60 * 2;


    public function vcode()
    {
        $vcode = new vcode(4,80,20,14);
        $im = $vcode->doimg();

        $filename = $vcode->getFileName();
        table('user')->set($filename, [
            'vcode' => $vcode->getCode()
        ]);
        response()->cookie('TOKEN', $filename, time() + self::$expr, '/');
        return res::success(['url' => $im, 'token'=> $filename]);
    }

    public function login()
    {
        if (empty(request()->get['upass'])) {
            throw new myException('请求失败！upass参数不正确！');
        }

        if (empty(request()->get['uname'])) {
            throw new myException('请求失败！uname参数不正确！');
        }

        if (empty(request()->get['vcode'])) {
            throw new myException('请求失败！vcode参数不正确！');
        }
        $token = request()->cookie['TOKEN'];
        if (empty($token)) {
            throw new myException('请求失败！非法登陆！');
        }
        $user = table('user')->get($token);

        if (empty($user)) {
            throw new myException('请求失败！非法登陆！');
        }

        if ($user['vcode'] != request()->get['vcode']) {
            throw new myException('请求失败！验证码错误！');
        }

        $uid = $this->checkLogin();


        if ($uid) {
            $jwt = new jwt();
            $jwt_token = $jwt->genToken($uid);

            table('user')->del($token);

            table('user')->set($jwt_token, [
                'uid' => $uid,
                'last_active_time' => (int)time()
            ]);

            response()->cookie('TOKEN', $jwt_token, time() + self::$expr, '/');

            return res::success(['token' => $jwt_token]);
        } else {
            return res::error(['msg'=>'验证失败']);
        }
    }

    public function gettoken()
    {
        $token = request()->cookie['TOKEN'];
        var_dump($token);
        if (empty($token)) {
            throw new myException('请求失败！token参数错误！');
        }

        $user = table('user')->get($token);
        if (empty($user)) {
            throw new myException('请求失败！token不存在！');
        }

        return res::success(['token' => $token]);
    }

    public function logout()
    {
        $token = request()->get['token'];
        if (empty($token)) {
            throw new myException('请求失败！token参数错误！');
        }

        $user = table('user')->get($token);
        if (empty($user)) {
            return res::success();
        }

        if(table('user')->del($token)){
            return res::success();
        }

        return res::error(['msg' => '退出失败！']);
    }


    public function verify()
    {
        $token = request()->get['token'];
        if (empty($token)) {
            throw new myException('请求失败！token参数不正确！');
        }
        // todo: jwt要不要验证
        //$return res = $this->jwt->verifyToken(request()->get['token']);

        $user = table('user')->get($token);
        if (empty($user)) {
            throw new myException('请求失败！token不存在！');
        }
        if (empty($user['uid'])) {
            throw new myException('请求失败！您还未登陆！');
        }

        if ((int)time()-$user['last_active_time'] > self::$expr) {
            throw new myException('您的登陆已过期，请重新登陆！');
        }

        $user['last_active_time'] = time();

        table('user')->set($token, $user);

        return res::success(['msg' => '验证成功']);
    }

    private function checkLogin()
    {
        // 表记删除了的用户不可以登录
        $query = "SELECT
					id
				  FROM
					uni_pmp.pmp_config_user
				  WHERE
					MD5(CONCAT(MD5(username),'".md5(request()->get['vcode'])."')) = '" . request()->get['uname'] . "'
				    AND MD5(CONCAT(password,'".md5(request()->get['vcode'])."')) = '" .request()->get['upass'] . "'
				    AND status = 1
				    AND isdel = 1";
        $result = mysql()->query($query);
        if (!empty($result)) {
            return $result[0]['id'];
        }

        return false;
    }
}