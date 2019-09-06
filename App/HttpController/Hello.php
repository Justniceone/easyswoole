<?php

namespace App\HttpController;

use EasySwoole\Http\AbstractInterface\Controller;
use EasySwoole\Component\Di;

class Hello extends Controller
{
    function index()
    {
        $request = $this->request();

        //获得get内容
        $get = $request->getQueryParams();
        //获得post内容
        $post = $request->getParsedBody();
        //$this->response()->write('Hello easySwoole!');
        //获取db对象
        $db = Di::getInstance()->get('MYSQL');
        $users = $db->get('litemall_user', 5, ['*']);
        //获取单条
        $user = $db->where ('id', 1)->getOne ('litemall_user');
        //总数
        $count = $db->getValue ("litemall_user", "count(*)");
        //获取字段
        $logins = $db->getValue ("users", "login", null);
        // select login from users
        $logins = $db->getValue ("users", "login", 5);
        // select login from users limit 5
        //$this->response()->write(json_encode($users));

        //连表
        $table_name = '`xsk_test` as b';
        $data = $db->join('`xsk_test_b` as a','a.id = b.id')->get($table_name, null, '*');
        //获取sql
        $sql = $db->getLastQuery();
        var_dump($data,$sql);

        $this->writeJson(200, ['data' => $users], 'success');
    }



    /*public function onRequest($action)
    {
        $request = $this->request();
        $header = $request->getHeaders();
        if (!$header) return false;
        return true;
    }*/


}
