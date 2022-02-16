<?php
declare (strict_types = 1);

namespace app\controller;

use think\Request;
use think\facade\Db;

class Order extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index(Request $request)
    {
        $data = $request->param();
        $sellername = '\''.$data['username'].'\'';
        // $db = '\''.'order'.'\'';
        // $res = Db::query('select * from order where seller ='.$sellername);
        $res=Db::query('select * from `dd` where seller = '.$sellername);
        if(!$res){
            return $this->create([],'没有数据',204);
        }
        return $this->create($res,'查询成功',200);
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
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
        $data = $request->param();
        // Db::name('dd')->where('id', $data['id'])->delete();
         $res = Db::name('product')->where('id', $data['id'])->delete();
         if($res){
             return $this->create([],'删除成功',200);
         }else{
             return $this->create([$data['id']],'删除失败',204);
         }
    }
}
