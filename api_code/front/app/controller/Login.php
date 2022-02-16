<?php
declare (strict_types = 1);

namespace app\controller;

use Symfony\Component\VarDumper\Cloner\Data;
use think\Request;
use think\facade\Db;


class Login extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
       $data = $request->param();
        $res = Db::table('user')->where('username',$data['username'])->find();
        //  return $res['userpassword'];
        if($res['username'] == $data['username']  && $res['password'] == $data['password']){
            return $this->create($res,'登陆成功',200);
        }else{
            return $this->create([],'登录失败,账号或密码错误',204);
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
