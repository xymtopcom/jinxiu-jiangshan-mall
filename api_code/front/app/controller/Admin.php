<?php
declare (strict_types = 1);

namespace app\controller;

use think\Request;
use think\facade\Db;
class Admin extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index($pass,$id)
    {
        //管理员信息查询
        if($pass =='jxjs'){
            //获取数据列表
               $data = Db::table('admin')->where('adminname',$id)->find();
               if(!$data){
                    return $this->create([],'查无此人',204);
               }else{
                   return $this->create($data,'查询成功',200);
               }
              //查询所有数据
            }else{
               return $this->create([],'秘钥错误,无权操作',503);
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
    //管理员登录
    $data = $request->param();
        $res = Db::table('admin')->where('adminname',$data['adminname'])->find();
        //  return $res['userpassword'];
        if($res['adminname'] == $data['adminname']  && $res['adminpassword'] == $data['password']){
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
        $update = Db::name('admin')->where('adminname', $data['adminname'])->update($data);
        $data = Db::table('admin')->where('adminname',$data['adminname'])->find();
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
        $res = Db::name('admin')->where('adminname', $data['adminname'])->delete();
        if($res){
            return $this->create([],'删除成功',200);
        }else{
            return $this->create([$data['adminname']],'删除失败',204);
        }
    }
}
