<?php
declare (strict_types = 1);

namespace app\controller;
use think\Request;
use think\exception\ValidateException;
use think\facade\Validate;
use app\controller\User as UserModel;
use think\Facade\Db;
class User extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index($pass,$id)
    {
        if($pass =='jxjs'){
        //获取数据列表
           $code=200;
           $msg = '数据操作成功!';
           $data = Db::table('user')->where('username',$id)->find();
          //查询所有数据
        }else{
            $data=[];
            $code = 503;
            $msg='秘钥不正确,无权操作!';
        }
        return $this->create($data,$msg,$code);
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
       //账号注册
       $data = $request->param();
     //判断邮箱是否为空
       if(!$data['email']){
           return $this->create([],'邮箱不能为空',204);
       }
       if(!$data['password']){
        return $this->create([],'密码不能为空',204);
       }
       //判断是否已经注册
       $res =  Db::table('user')->where('username',$data['username'])->find();
       if($res){
           return $this->create([],'用户名已经被注册',204);
       }else{
        Db::name('user')->insert($data);
        $data2 =[
            'id'=>$data['username'],
            'username'=>$data['username'],
            'bz'=>'家',
            'name'=>'锦绣疆山',
       ];
        Db::name('address')->insert($data2);
        $res2= Db::table('user')->where('username',$data['username'])->find();
        $res3= Db::table('address')->where('username',$data['username'])->find();
        if($res2){
            //判断注册结果
            if($res3){
                return $this->create($res2,'注册成功',200);
            }
           
        }else{
            return $this->create([],'注册失败',204);
        }
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
    public function update(Request $request)
    {
        $data = $request->param();
        $update = Db::name('user')->where('username', $data['id'])->update($data);
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
       Db::name('address')->where('username', $data['id'])->delete();
        $res = Db::name('user')->where('username', $data['id'])->delete();
        if($res){
            return $this->create([],'注销成功',200);
        }else{
            return $this->create([$data['id']],'注销失败',204);
        }
    }
}
