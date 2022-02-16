<?php
declare (strict_types = 1);

namespace app\controller;

use think\Request;
use think\facade\Db;

class Login extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */

    
    public function index(Request $request)
    {
        $data = $request->param();
         $username = '\''.$data['username'].'\'';
         $password = '\''.$data['password'].'\'';
        // $res = Db::query('select * from seller where username = 1 and password =1');
        $res = Db::query('select * from seller where username = '.$username.'and password = '.$password);
        if($res){
        return $this->create($res,'成功',200);
        }else{
            // return json($this->create([],'登录失败',204));
            // return json(204);
            return $this->create($res,'失败',204);
        }
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
        $username = Db::table('seller')->where('username',$data['username'])->find();
        if($username){
            return $this->create($username,'用户名已被注册',204);
        }
        $name = Db::table('seller')->where('name',$data['name'])->find();
        if($name){
            return $this->create([],'该主体已经开店已被注册',204);
        }
        $nameid = Db::table('seller')->where('nameid',$data['nameid'])->find();
        if($nameid){
            return $this->create([],'身份证号已被注册',204);
        }
        $email = Db::table('seller')->where('email',$data['email'])->find();
        if($email){
            return $this->create([],'该邮箱已被注册',204);
        }
        Db::name('seller')->insert($data);
        $res = Db::table('seller')->where('username',$data['username'])->find();
        if($res){
            return $this->create([],'注册成功',200);
        }else{
            return $this->create([],'注册失败',204);
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($username)
    {
        $data = Db::query('select * from seller where username = '.$username);
        if(!$data){
            return $this->create([],'查无此人',204);
        }
        return $this->create($data,'查询成功',200);
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request)
    {
        $data = $request->param();
        $update = Db::name('seller')->where('username', $data['username'])->update($data);
        if($update){
            return $this->create($data,'修改成功',200);
        }else{
            return $this->create([],'修改失败',204);
        }
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete(Request $request)
    {
        $data = $request->param();
        $r = Db::table('seller')->where('username',$data['username'])->find();
        if(!$r){
            return $this->create([],'查无此人',204);
        }
        Db::name('seller')->where('username', $data['username'])->delete();
        $res = Db::table('seller')->where('username',$data['username'])->find();
         if(!$res){
             return $this->create([],'注销成功',200);
         }else{
             return $this->create($data['username'],'注销失败',204);
         }
    }
}
