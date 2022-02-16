<?php
declare (strict_types = 1);

namespace app\controller;

use think\Request;
use think\facade\Db;

class Product extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index($username)
    {
        $data = Db::query('select * from product where userid ='.$username);
        if($data){
            return $this->create($data,'成功',200);
        }else{
            return $this->create($data,'无数据',204);
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
       $res  =  Db::name('product')->insert($data);
       if($res){
           return $this->create([],'成功',200);
       }else{
           return $this->create([],'失败',204);
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
        $update = Db::name('product')->where('productid', $data['productid'])->update($data);
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
        $r = Db::table('product')->where('productid',$data['productid'])->find();
        if(!$r){
            return $this->create([],'查无此商品',204);
        }
        Db::name('product')->where('productid', $data['productid'])->delete();
        $res = Db::table('product')->where('productid',$data['productid'])->find();
         if(!$res){
             return $this->create([],'删除商品成功',200);
         }else{
             return $this->create($data['productid'],'删除商品失败',204);
         }
    }
}
