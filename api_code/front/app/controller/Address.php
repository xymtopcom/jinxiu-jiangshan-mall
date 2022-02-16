<?php
declare (strict_types = 1);

namespace app\controller;

use app\model\Address as ModelAddress;
use app\model\Admin;
use think\Request;
use think\facade\Db;

class Address extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index(Request $request)
    {
        $data = $request->param();
     if($data['action']==1){
        $data = Db::query('select * from address where username='.$data['username']);
        return json($data);
     }else{
        $data = Db::table('address')->where('id',$data['id'])->find();
        return json($data);
     }
        // $data = Db::table('address')->where('username',$id)->find();
       
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
        Db::name('address')->insert($data);
        $res2= Db::table('address')->where('id',$data['id'])->select();
        if($res2){
            return $this->create([],'添加成功!',200);
        }else{
            return $this->create([],'添加失败!',204);
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
         $data = Db::table('address')->where('id',$id)->find();
         return json($data);
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
        $update = Db::name('address')->where('id', $data['id'])->update($data);
        if($update){
            return $this->create([],'修改成功!',200);
        }else{
            return $this->create([],'修改失败,请检查!',204);
        }
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
